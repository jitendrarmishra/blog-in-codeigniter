<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
         $this->load->model('index_mod');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
       // $data['slider'] = $this->index_mod->select_data('slider', 'status', 'active');
        
        $this->load->view('welcome_message');
    }
    
        
    public function flagship_store() {
        $this->load->view('header');
        $this->load->view('flagship_store');
        $this->load->view('footer');
    }

//    public function index1() {
//        $this->load->view('header');
//        $this->load->view('home');
//        $this->load->view('footer');
//    }

}
