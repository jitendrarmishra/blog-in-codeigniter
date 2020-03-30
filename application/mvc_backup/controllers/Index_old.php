<?php

if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Index extends CI_Controller {

    public $user_id;
    public $dept;

    public function __construct() {

        parent::__construct();
        $this->load->model('index_mod');
       
       
//        $this->user_id = $this->session->userdata['logged_in']['id'];
    }

    public function index() {
        $data['services'] = $this->index_mod->select_data('services', 'service_status', 'active');
        // Note : select_data_where_row('tablename', 'columnone', 'value', 'column2', 'value');
        $data['customer'] = $this->index_mod->select_data_where_result('happy_customers', 'type', 'customer', 'status', 'active');
        $data['owner'] = $this->index_mod->select_data_where_result('happy_customers', 'type', 'owner', 'status', 'active');
        $this->load->view('header');
        $this->load->view('home', $data);
        $this->load->view('footer');
    }

    public function services() {
        $value = base64_decode($this->uri->segment(3));

        // Note : select_data_where_row('tablename', 'columnone', 'value', 'column2', 'value');
        $data['services'] = $this->index_mod->select_data_where_row('services', 'service_id', $value, 'service_status', 'active');
        $data['products'] = $this->index_mod->select_data_where_result('services_product', 'service_id', $value, 'services_product_status', 'active');
        $this->load->view('header');
        $this->load->view('services', $data);
        $this->load->view('footer');
    }

    public function product() {
        $value = base64_decode($this->uri->segment(3));
        // Note : select_data_where_row('tablename', 'columnone', 'value', 'column2', 'value');
        $data['product'] = $this->index_mod->select_data_where_row('services_product', 'services_product_id', $value, 'services_product_status', 'active');
        $service_id = $data['product']->service_id;
        $data['related_product'] = $this->index_mod->select_data_not_equal('services', 'service_id', $service_id, 'service_status', 'active');
// $data['product'] = $this->index_mod->select_data_where_row('services_product', 'services_product_id', $value, 'services_product_status', 'active');
        $data['products_details'] = $this->index_mod->select_data_where('services_product_inner_page', 'product_inner_status', 'active');
        $data['customer'] = $this->index_mod->select_data('happy_customers_product', 'status', 'active');
        $value = $data['products_details']->services_product_inner_id;
        $data['faq'] = $this->index_mod->select_data_where_result('product_faq', 'services_product_inner_id', $value, 'faq_status', 'active');
        $data['steps'] = $this->index_mod->select_data_where_result('steps', 'services_product_inner_id', $value, 'step_status', 'active');
        $data['ingredients'] = $this->index_mod->select_data_where_result('ingredients', 'services_product_inner_id', $value, 'ingredients_status', 'active');
//print_r($data['faq']);
//die;
        $this->load->view('header');
        $this->load->view('services_inner', $data);
        $this->load->view('footer');
    }

    public function submit() {
        $data = array("name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "number" => $this->input->post('number'),
            "product_id" => $this->input->post('product_id'),
            "amount" => $this->input->post('amount'));
        $this->index_mod->insert_data('register_user', $data);
        redirect('index');
    }
    
    public function flagship_store() {
        $this->load->view('header');
        $this->load->view('flagship_store');
        $this->load->view('footer');
    }
    
      public function salon_locator() {
        $this->load->view('header');
        $this->load->view('salon_locator');
        $this->load->view('footer');
    }
    
      public function contact_us() {
        $this->load->view('header');
        $this->load->view('contact_us');
        $this->load->view('footer');
    }

       public function career() {
        $this->load->view('header');
        $this->load->view('career');
        $this->load->view('footer');
    }
    
    
    
    
}
