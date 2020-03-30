<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Custom404 extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('index_mod');


//        $this->user_id = $this->session->userdata['logged_in']['id'];
    }

    public function index() {
        $this->output->set_status_header('404');
        $data = $this->data['content'] = 'custom404view';  // View name
       
        $this->load->view('header', $data);
        $this->load->view('404');
        $this->load->view('footer');
    }

}
