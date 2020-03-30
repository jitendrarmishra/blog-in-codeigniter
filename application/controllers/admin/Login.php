<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("admin/admin_model", "admin_model");
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    function index() {
         $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'font_path'     => 'system/fonts/texb.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 4,
            'font_size'     => 24
        );
        $captcha = create_captcha($config);
      
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        
        // Pass captcha image to view
         $data['captchaImg'] = $captcha['image'];
        $this->load->view('admin/login',$data);
    }

function check() {
       

    if($this->input->post('submit')){
    $inputCaptcha = $this->input->post('captcha');
    $sessCaptcha = $this->session->userdata('captchaCode');
        if($inputCaptcha === $sessCaptcha){

                    //This method will have the credentials validation
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

                if ($this->form_validation->run() == FALSE) {
                    // die('1');
                      $this->session->set_flashdata('message', 'Username or Password is incorrect, please try again or contact the Administrator');
           redirect('admin/login',refresh);
                } else {
                    $user_id_pass = $this->session->userdata['logged_in']['user_id'];
                    print_r($user_id_pass);
                   // die('2');
                    redirect('admin/home/blog_posts');
                }

        }
        else
        {
        $this->session->set_flashdata('message', 'Captcha code does not match, please try again.');
           redirect('admin/login',refresh);
        }
        

    }
    else
        {
        $this->session->set_flashdata('message', 'Captcha code does not match, please try again.');
           redirect('admin/login',refresh);
        }
        
    }

    function check_database($password) {
        $email = $this->input->post('email');
        $result = $this->admin_model->login($email, $password);

        if ($result) {
            $hash = md5(bin2hex(random_bytes(16)));
            
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'user_id' => $row->user_id,
                    'f_name' => $row->f_name,
                    'l_name' => $row->l_name,
                    'email_id' => $row->email_id,
                    'status' => $row->status,
                    'login_sesstion' => $hash,
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }//To Update the login sesstion
            $data = array(
                    'login_sesstion' => $hash,
                );    
             
             $user_id = $this->session->userdata['logged_in']['user_id'];
             $this->admin_model->update_data('user',$data ,'user_id',$user_id);
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Username or Password is incorrect, please try again or contact the Administrator');
            return false;
        }
    }

    function logout() {
        //session_start();
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('admin/login', 'refresh');
    }   


     function forgot_password() {
            if($this->input->post('submit')){
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha === $sessCaptcha){

                    //This method will have the credentials validation
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
                if ($this->form_validation->run() == FALSE) {
                      $this->session->set_flashdata('message', 'Failed to Recover your password, try again');
                      redirect('admin/login',refresh);
                } else {

                   
                    $this->session->set_flashdata('message', 'Your Password has been sent to your email id');
                      redirect('admin/login',refresh);
                }

            }
               else{
            $this->session->set_flashdata('message', 'Failed to Recover your password, try again');
                      redirect('admin/login',refresh);

         }
         }
         else{
            $this->session->set_flashdata('message', 'Failed to Recover your password, try again');
                      redirect('admin/login',refresh);

         }
    }

    function genrate_password() {
            $hash = md5(bin2hex(random_bytes(16)));
            $data = array(
                    'login_sesstion' => $hash,
                );    
             $user_id = $this->session->userdata['logged_in']['user_id'];
             $this->admin_model->update_data('user',$data ,'user_id',$user_id);
         
    }
}
