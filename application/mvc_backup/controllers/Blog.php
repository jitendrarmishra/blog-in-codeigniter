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
    }

    public function index() {
        $data['single_slider'] = $this->index_mod->getpostdata_slider();
        $data['category'] = $this->index_mod->select_data('blog_category', 'category_status', 'active');
        $data['single_post'] = $this->index_mod->getpostdata_row($limit = 1);

        $data['post'] = $this->index_mod->getpostdata();
        $data['featured'] = $this->index_mod->getFeatureddata();

        $data['title'] = "Some Title";
        $data['description'] = "description";
        $data['keyword'] = "keyword";

        $this->load->view('header', $data);
        $this->load->view('blog');
        $this->load->view('footer');
    }

    public function blog_inner() {
        $post_slug = $this->uri->segment(3);
        // getJoinPostData
        //$data['post'] = $this->index_mod->select_data_where_row('blog_post', 'post_slug', $post_slug, 'post_status', 'active');
        $data['post'] = $this->index_mod->getJoinPostData($post_slug);

//        print_r($data['post']);
//        die;
        $value = $data['post']->post_id;
        $category_id = $data['post']->category_id;
        $post_author_id = $data['post']->post_author;
        $data['user_name'] = $this->index_mod->select_data_where_row('user', 'user_id', $post_author_id, 'status', 'active');

        $data['comments'] = $this->index_mod->select_data_where_result('blog_comments', 'post_id', $value, 'status', 'approve');

        $data['related_post'] = $this->index_mod->getJoinDataBlog($category_id, $value);
//print_r($data['related_post']);
//die;
        $data['title'] = $data['post']->meta_title;
        $data['description'] = $data['post']->meta_description;
        $data['keyword'] = $data['post']->meta_keyword;

        $this->load->view('header', $data);
        $this->load->view('blog_inner');
        $this->load->view('footer');
    }

    public function category() {
//        die('11');
        $category_slug = $this->uri->segment(3);
        $data['category_data'] = $this->index_mod->select_data_where_row('blog_category', 'category_slug', $category_slug, 'category_status', 'active');
        $category_id = $data['category_data']->category_id;
        $data['post'] = $this->index_mod->getpostdataCategory($category_id);

        $data['title'] = $data['category_data']->meta_title;
        $data['description'] = $data['category_data']->meta_description;
        $data['keyword'] = $data['category_data']->meta_keyword;

        $this->load->view('header', $data);
        $this->load->view('blog_category');
        $this->load->view('footer');
    }

    public function comment() {
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $post_id = $this->input->post("post_id");
        $message = $this->input->post("message");
        $date = date('Y-m-d');
        $data = array('user_name' => $name, 'email' => $email, 'comment' => $message, 'post_id' => $post_id, 'date' => $date);
        $this->index_mod->insert_data("blog_comments", $data);

        $this->session->set_flashdata('message', 'Thank you for submiting the data');
        redirect('blog/blog_inner/' . $post_id);
    }

    public function blog_search() {
        $search = $this->input->post("search");
        if (!empty($search)) {
            $data['search'] = $search;
            $data['post'] = $this->index_mod->blog_search($search);

            $this->load->view('header', $data);
            $this->load->view('blog_search');
            $this->load->view('footer');
        }else{
            redirect('blog');
        }
    }

}
