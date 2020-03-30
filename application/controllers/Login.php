<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("index_mod");
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('user_agent');


    }

    function index() {
     $this->load->view('header');
     $this->load->view('login');
     $this->load->view('footer');
 }

 function check() {
    if($this->input->post('submit')){
            //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        $redirect = $this->input->post('redirect');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 'Username or Password is incorrect, please try again or contact the Administrator');

            redirect('login',refresh);
        } else {
                // $user_id_pass = $this->session->userdata['logged_in']['register_id'];
            redirect($redirect."#top");



       }

   }
   else
   {
     $this->session->set_flashdata('message', 'Username or Password is incorrect, please try again or contact the Administrator');
     redirect('login');
 }
}

function check_database($password) {
    $email = $this->input->post('email');
    $result = $this->index_mod->login($email, $password);
    if ($result) {
        $sess_array = array();
        foreach ($result as $row) {
            $sess_array = array(
                'register_id' => $row->register_id,
                'name' => $row->name,
                'email' => $row->email,
                'status' => $row->status,
            );
            $this->session->set_userdata('logged_in', $sess_array);
            }//To Update the login sesstion

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
        redirect('blog', 'refresh');
    }   


}