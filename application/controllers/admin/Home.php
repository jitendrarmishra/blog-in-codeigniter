<?php

class Home extends CI_Controller {

    public $date;

    public function __construct() {
        parent::__construct();
        $this->load->model("admin/admin_model", "admin_model");
        $this->date = Date('Y-m-d');
        
        admin();
    }

function clean($string) {
    $string = strtolower(str_replace(' ', '-', $string)); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
  

/////////////////////////////////////category////////////////
    function category() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('blog_category', 'category_id', $id);
            $data['category_id'] = $id;
        } else {
            $data['edit'] = "";
        }
        // $data['top_menu'] = $this->admin_model->select_data('menu_master');
        $data['result'] = $this->admin_model->select_data('blog_category');
        $this->load->view('admin/header');
        $this->load->view('admin/category', $data);
        $this->load->view('admin/footer');
    }

    function add_category() {

        $title = $this->input->post('title');

       // $category_slug = strtolower(str_replace(" ", "-", $title));
        $category_slug = $this->clean($title);

        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $status = $this->input->post('status');
        $data = array("category_slug" => $category_slug, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "category_name" => $title, "category_status" => $status);
        $this->admin_model->insert_data('blog_category', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/category');
    }

    public function update_category() {
        $category_id = $this->input->post('category_id');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $title = $this->input->post('title');
       // $category_slug = strtolower(str_replace(" ", "-", $title));
$category_slug = $this->clean($title);
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $data = array("category_slug" => $category_slug, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "category_name" => $title, "category_status" => $status);
        $this->admin_model->update_data('blog_category', $data, 'category_id', $category_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/category');
    }

    public function delete_category() {
        $id = base64_decode($this->uri->segment("4"));
        if (!empty($id)) {
            $this->admin_model->delete_data('blog_category', 'category_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/category');
    }

///////////////////////////////////////Blog////////////////
//
    function blog_posts() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('blog_post', 'post_id', $id);
            $data['post_id'] = $id;
        } else {
            $data['edit'] = "";
        }
        $data['category'] = $this->admin_model->select_data('blog_category');
        $data['result'] = $this->admin_model->select_data('blog_post');
        
        $data['result'] = $this->admin_model->getJoinDataResult('blog_post', 'category_id', 'blog_category', 'category_id');
        $this->load->view('admin/header');
        $this->load->view('admin/blog_post', $data);
        $this->load->view('admin/footer');
    }

    function add_blog_posts() {
        $category_id = $this->input->post('category_id');
        $post_title = trim($this->input->post('post_title'));

       // $post_slug = strtolower(str_replace(" ", "-", $post_title));

        $post_slug = $this->clean($post_title);
        $post_text = trim($this->input->post('post_text'));
        $post_author = $this->input->post('post_author');
        $status = $this->input->post('status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $post_author = 1;
        //Image Config 
        $config['upload_path'] = './uploads/blog/';
        $config['allowed_types'] = 'gif|jpg|png|webp|svg';
//        $config['max_size'] = 200;
//        $config['max_width'] = 1920;
//        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $error['error'];
            $this->session->set_flashdata('message', $error['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $slider_image = $upload_data['file_name'];
            $data = array("post_slug" => $post_slug, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "image" => $slider_image, "post_date" => $this->date, "category_id" => $category_id, "post_title" => $post_title, "post_text" => $post_text, "post_author" => $post_author, "post_status" => $status);
            $this->admin_model->insert_data('blog_post', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/blog_posts');
    }

    public function update_blog_posts() {
        $post_id = $this->input->post('post_id');
        $category_id = $this->input->post('category_id');
        $post_title = trim($this->input->post('post_title'));
      //  $post_slug = strtolower(str_replace(" ", "-", $post_title));
        $post_slug = $this->clean($post_title);

        $post_text = trim($this->input->post('post_text'));
        $post_author = $this->input->post('post_author');
        $status = $this->input->post('status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $banner = $this->input->post('image');
        $post_author = 1;

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/blog/';
            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = 200;
//            $config['max_width'] = 1920;
//            $config['max_height'] = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $error['error'];
                $this->session->set_flashdata('message', $error['error']);
            } else {
                array('upload_data' => $this->upload->data());
                $upload_data = $this->upload->data();
                $slider_image = $upload_data['file_name'];

                $data = array("post_slug" => $post_slug, "image" => $slider_image, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "post_date" => $this->date, "category_id" => $category_id, "post_title" => $post_title, "post_text" => $post_text, "post_author" => $post_author, "post_status" => $status);
                $this->admin_model->update_data('blog_post', $data, 'post_id', $post_id);
                $target_path = "./uploads/blog/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("post_slug" => $post_slug, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "post_date" => $this->date, "category_id" => $category_id, "post_title" => $post_title, "post_text" => $post_text, "post_author" => $post_author, "post_status" => $status);
//      print_r($data);die;
            $this->admin_model->update_data('blog_post', $data, 'post_id', $post_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }

        redirect('admin/home/blog_posts');
    }

    public function delete_blog_posts() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('blog_post', 'post_id', $id);
            $target_path = "./uploads/blog/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/blog_posts');
    }

  
    /////////////////////////////////////Blog User////////////////

    function blog_user() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('user', 'user_id', $id);
            $data['user_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('user');
        $this->load->view('admin/header');
        $this->load->view('admin/blog_user', $data);
        $this->load->view('admin/footer');
    }

    function add_blog_user() {
//  $service_id = $this->input->post('service_id');
        $f_name = $this->input->post('f_name');
        $l_name = $this->input->post('l_name');
        $email_id = $this->input->post('email_id');
        $password = $this->input->post('password');
        $type = $this->input->post('type');
        $status = $this->input->post('status');
        $data = array("f_name" => $f_name, "l_name" => $l_name, "email_id" => $email_id, "password" => $password, 'type' => $type, 'status' => $status);
        $this->admin_model->insert_data('user', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/blog_user');
    }

    public function update_blog_user() {
        $user_id = $this->input->post('user_id');
        $f_name = $this->input->post('f_name');
        $l_name = $this->input->post('l_name');
        $email_id = $this->input->post('email_id');
        $password = $this->input->post('password');
        $type = $this->input->post('type');
        $status = $this->input->post('status');

        $data = array("f_name" => $f_name, "l_name" => $l_name, "email_id" => $email_id, "password" => $password, 'type' => $type, 'status' => $status);
        $this->admin_model->update_data('user', $data, 'user_id', $user_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/blog_user');
    }

     public function delete_blog_user() {
        $id = base64_decode($this->uri->segment("4"));

        if (!empty($id)) {
            $this->admin_model->delete_data('user', 'user_id', $id);

            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/blog_user');
    }

    /////////////////////////////////////Blog User////////////////

    function blog_comments() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('blog_comments', 'comment_id', $id);
            $data['comment_id'] = $id;
            $data['showform'] = "1";
        } else {
            $data['edit'] = "";
            $data['showform'] = "0";
        }

        $data['result'] = $this->admin_model->getBlogComment('blog_comments');
        $this->load->view('admin/header');
        $this->load->view('admin/blog_comments', $data);
        $this->load->view('admin/footer');
    }

    public function update_blog_comments() {
        $comment_id = $this->input->post('comment_id');
        $comment = $this->input->post('comment');
        $status = $this->input->post('status');


        $data = array("comment" => $comment, 'status' => $status);
        $this->admin_model->update_data('blog_comments', $data, 'comment_id', $comment_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/blog_comments');
    }

    public function delete_blog_comments() {
        $id = base64_decode($this->uri->segment("4"));

        if (!empty($id)) {
            $this->admin_model->delete_data('blog_comments', 'comment_id', $id);

            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/blog_comments');
    }

    ///////////////////////////////////// Innovative treatments////////////////

   }
