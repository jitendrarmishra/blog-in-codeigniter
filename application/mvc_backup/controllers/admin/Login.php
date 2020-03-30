<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("admin/admin_model", "admin_model");
    }

    function index() {

        // $this->load->view('admin/header');
        $this->load->view('admin/login');
        // $this->load->view('admin/footer');
    }

    function check() {
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page

            $this->load->view('admin/login');
        } else {
            $user_id_pass = $this->session->userdata['logged_in']['user_id'];
            redirect('admin/home/contact_us_form_data');
        }
    }

    function check_database($password) {
        $email = $this->input->post('email');
        $result = $this->admin_model->login($email, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'user_id' => $row->user_id,
                    'f_name' => $row->f_name,
                    'l_name' => $row->l_name,
                    'email_id' => $row->email_id,
                    'status' => $row->status,
                );

                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Username or Password is incorrect, please try again or 
contact the Administrator');
            return false;
        }
    }

    function logout() {
        //session_start();
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('admin/login', 'refresh');
    }

}
