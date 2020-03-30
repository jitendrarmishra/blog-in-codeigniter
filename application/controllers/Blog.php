<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Blog extends CI_Controller {

    public $user_id;
    public $dept;

    public function __construct() {

        parent::__construct();
        $this->load->model('index_mod');
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $data['post'] = $this->index_mod->getpostdata();
        $data['title'] = "Schbang Assignment-Blog";
        $data['description'] = "Schbang Assignment-Blog";
        $data['keyword'] = "";

        $this->load->view('header', $data);
        $this->load->view('blog');
        $this->load->view('footer');
    }

     public function blog_inner() {
        $post_slug = $this->uri->segment(3);
        $cat_slug = $this->uri->segment(2);
        // getJoinPostData
        $data['blog_category_id'] = $this->index_mod->select_data_where_row('blog_category', 'category_slug', $cat_slug, 'category_status', 'active');
        $category_id = $data['blog_category_id']->category_id;
        ;
        $data['post'] = $this->index_mod->getJoinPostData($post_slug,$category_id);
        $data['category_slug'] = $cat_slug;
        $data['post_slug'] = $post_slug;

         if (empty($data['post'])) {
            $this->load->view('header');
            $this->load->view('404');
            $this->load->view('footer');
        }
        else{
            $value = $data['post']->post_id;
            $category_id = $data['post']->category_id;
            $post_author_id = $data['post']->post_author;
            $data['user_name'] = $this->index_mod->select_data_where_row('user', 'user_id', $post_author_id, 'status', 'active');
          

            $data['comments'] = $this->index_mod->select_data_where_result('blog_comments', 'post_id', $value, 'status', 'approve');


            $data['title'] = $data['post']->meta_title;
            $data['description'] = $data['post']->meta_description;
            $data['keyword'] = $data['post']->meta_keyword;


            $this->load->view('header', $data);
            $this->load->view('blog_inner');
            $this->load->view('footer');
        }
    }



    public function category() {
//        die('11');
        $category_slug = $this->uri->segment(3);
        $data['category_data'] = $this->index_mod->select_data_where_row('blog_category', 'category_slug', $category_slug, 'category_status', 'active');
        if (empty($data['category_data'])) {
            $this->load->view('header');
            $this->load->view('404');
            $this->load->view('footer');
        }
        else{
            $category_id = $data['category_data']->category_id;
            $data['post'] = $this->index_mod->getpostdataCategory($category_id);

            $data['title'] = $data['category_data']->meta_title;
            $data['description'] = $data['category_data']->meta_description;
            $data['keyword'] = $data['category_data']->meta_keyword;

            $this->load->view('header', $data);
            $this->load->view('blog_category');
            $this->load->view('footer');
        }
    }

   public function comment() {
     if($this->input->post('submit')){
          

                $this->form_validation->set_rules('name', 'Name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('post_id', 'post_id', 'required');
                $this->form_validation->set_rules('category_slug', 'category slug', 'required');
                $this->form_validation->set_rules('post_slug', 'post slug', 'required');
                $this->form_validation->set_rules('message', 'Message', 'required');
                if ($this->form_validation->run() == FALSE)
                { 
                     redirect('blog/' . $category_slug."/".$post_slug."#success");
                }
                else
                {
                    $name = $this->input->post("name");
                    $email = $this->input->post("email");
                    $post_id = $this->input->post("post_id");
                    $message = $this->input->post("message");
                    $category_slug = $this->input->post("category_slug");
                    $post_slug = $this->input->post("post_slug");
                    $date = date('Y-m-d');
                    $data = array('user_name' => $name, 'email' => $email, 'comment' => $message, 'post_id' => $post_id, 'date' => $date);
                    $this->index_mod->insert_data("blog_comments", $data);
                    $this->session->set_flashdata('message', 'Success! Thanks for submitting');
                    redirect('blog/' . $category_slug."/".$post_slug."#success");
                }
            
           }
        
    }

}