<?php

class Home extends CI_Controller {

    public $date;

    public function __construct() {
        parent::__construct();
        $this->load->model("admin/admin_model", "admin_model");
        $this->date = Date('Y-m-d');
        admin();
    }

    function index() {
//  $data['users'] = $this->admin_model->get_users();
        $this->load->view('admin/header');
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }

    function exits() {
        $tablename = $this->input->post('tablename');
        $table_slug = $this->input->post('table_slug');
        $slug_val = strtolower($this->input->post('slug_val'));
        echo $this->admin_model->exits($tablename, $table_slug, $slug_val);
    }

//do_resize
    public function do_resize($filename) {
        //   echo $filename; die;
        // $filename = $this->input->post('new_val');
        $source_path = './uploads/services/' . $filename;
        $target_path = './uploads/services/thumb';


        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
//            'thumb_marker' => '_thumb',
            'width' => 373,
            'height' => 303
        );
        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        } 
        // die('111');
        $this->image_lib->clear();
    }

/////////////////////////////////////Services////////////////

    function services() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('services', 'service_id', $id);
            $data['service_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('services');
        $this->load->view('admin/header');
        $this->load->view('admin/services', $data);
        $this->load->view('admin/footer');
    }

    function add_service() {
//  $service_id = $this->input->post('service_id');
        $service_name = $this->input->post('service_name');
        $service_slug = strtolower(str_replace(" ", "-", $service_name));
        $service_heading = $this->input->post('service_heading');
        $text = $this->input->post('text');
        $btext = $this->input->post('btext');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $status = $this->input->post('status');

//Image Config 
        $config['upload_path'] = './uploads/services/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array('services_slug' => $service_slug, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "btext" => $btext, "banner" => $slider_image, "service_name" => $service_name, "service_heading" => $service_heading, "text" => $text, "service_status" => $status);
            $this->admin_model->insert_data('services', $data);
            $this->do_resize($slider_image);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/services');
    }

    public function update_service() {
        $service_id = $this->input->post('service_id');
        $service_name = $this->input->post('service_name');
        $service_slug = strtolower(str_replace(" ", "-", $service_name));
        $service_heading = $this->input->post('service_heading');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $banner = $this->input->post('banner');
        $btext = $this->input->post('btext');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/services/';
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

                $data = array('services_slug' => $service_slug, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "btext" => $btext, "banner" => $slider_image, "service_name" => $service_name, "service_heading" => $service_heading, "text" => $text, "service_status" => $status);
                $this->admin_model->update_data('services', $data, 'service_id', $service_id);
                $this->do_resize($slider_image);
                $target_path = "./uploads/services/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array('services_slug' => $service_slug, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "btext" => $btext, "service_name" => $service_name, "service_heading" => $service_heading, "text" => $text, "service_status" => $status);
            $this->admin_model->update_data('services', $data, 'service_id', $service_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/services');
    }

    public function delete_service() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('services', 'service_id', $id);
            $target_path = "./uploads/services/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/services');
    }

    /////////////////////////////////////concern////////////////000000000000

    function concern() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('services_concern', 'concern_id', $id);
            $data['concern_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('services_concern');
        $this->load->view('admin/header');
        $this->load->view('admin/concern', $data);
        $this->load->view('admin/footer');
    }

    function add_concern() {

        $title = $this->input->post('title');
        $concern_slug = strtolower(str_replace(" ", "-", $title));
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $btext = $this->input->post('btext');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $btext = $this->input->post('btext');
//Image Config 
        $config['upload_path'] = './uploads/concern/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("concern_slug" => $concern_slug, "btext" => $btext, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner" => $slider_image, "concern_name" => $title, "text" => $text, "concern_status" => $status);
            $this->admin_model->insert_data('services_concern', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }



        redirect('admin/home/concern');
    }

    public function update_concern() {
        $concern_id = $this->input->post('concern_id');

        $title = $this->input->post('title');
        $concern_slug = strtolower(str_replace(" ", "-", $title));
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $banner = $this->input->post('banner');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $btext = $this->input->post('btext');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/concern/';
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

                $data = array("concern_slug" => $concern_slug, "btext" => $btext, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner" => $slider_image, "concern_name" => $title, "text" => $text, "concern_status" => $status);
                $this->admin_model->update_data('services_concern', $data, 'concern_id', $concern_id);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
                if ($banner != "") {
                    $target_path = "./uploads/concern/" . basename($banner);
                    unlink($target_path);
                }

                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("concern_slug" => $concern_slug, "btext" => $btext, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "concern_name" => $title, "text" => $text, "concern_status" => $status);
            $this->admin_model->update_data('services_concern', $data, 'concern_id', $concern_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/concern');
    }

    public function delete_concern() {
        $id = base64_decode($this->uri->segment("4"));
        $banner = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('services_concern', 'concern_id', $id);
            $target_path = "./uploads/concern/" . basename($banner);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/concern');
    }

    /////////////////////////////////////Add cAUSES inner Page////////////////

    function causes() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('services_concern_causes', 'causes_id', $id);
            $data['causes_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('services_concern_causes', 'concern_id', $product_id, 'services_concern', 'concern_id');
//$data['result'] = $this->admin_model->select_data_where_result('steps', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/causes', $data);
        $this->load->view('admin/footer');
    }

    function add_causes() {
        $product_id = base64_decode($this->uri->segment("4"));
        $causes_title = $this->input->post('causes_title');
        $causes_text = $this->input->post('causes_text');
        $concern_id = $this->input->post('concern_id');
        $causes_status = $this->input->post('status');
        //Image Config 
        $config['upload_path'] = './uploads/causes/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("image" => $slider_image, "causes_title" => $causes_title, "causes_text" => $causes_text, "concern_id" => $concern_id, "causes_status" => $causes_status);
            $this->admin_model->insert_data('services_concern_causes', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/causes/' . base64_encode($concern_id));
    }

    public function update_causes() {
        $causes_id = $this->input->post('causes_id');
        $causes_title = $this->input->post('causes_title');
        $causes_text = $this->input->post('causes_text');
        $concern_id = $this->input->post('concern_id');
        $causes_status = $this->input->post('status');
        $banner = $this->input->post('image');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {

//Image Config 
            $config['upload_path'] = './uploads/causes/';
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

                $data = array("image" => $slider_image, "causes_title" => $causes_title, "causes_title" => $causes_title, "causes_text" => $causes_text, "concern_id" => $concern_id, "causes_status" => $causes_status);
                $this->admin_model->update_data('services_concern_causes', $data, 'causes_id', $causes_id);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
                if ($banner != "") {
                    $target_path = "./uploads/causes/" . basename($banner);
                    unlink($target_path);
                }

                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("causes_title" => $causes_title, "causes_text" => $causes_text, "concern_id" => $concern_id, "causes_status" => $causes_status);
            $this->admin_model->update_data('services_concern_causes', $data, 'causes_id', $causes_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }

        redirect('admin/home/causes/' . base64_encode($concern_id) . '/' . base64_encode($causes_id));
    }

    public function delete_causes() {
        $concern_id = $this->uri->segment("4");
        $causes_id = base64_decode($this->uri->segment("5"));
        $banner = base64_decode($this->uri->segment("6"));
        if (!empty($causes_id)) {
            $this->admin_model->delete_data('services_concern_causes', 'causes_id', $causes_id);

            if ($banner != "") {
                $target_path = "./uploads/causes/" . basename($banner);
                unlink($target_path);
            }

            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/causes/' . $concern_id . '/' . base64_encode($causes_id));
    }

/////////////////////////////////////Product Services////////////////

    function service_product() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('services_product', 'services_product_id', $id);
            $data['services_product_id'] = $id;
            $data['edit_category'] = $this->admin_model->select_data_where_result('services_product_category', 'services_product_id', $id);
            $data['edit_concern'] = $this->admin_model->select_data_where_result('services_product_concern', 'services_product_id', $id);
        } else {
            $data['edit'] = "";
        }
        $data['services'] = $this->admin_model->select_data_where_result('services', 'service_status', 'active');
        $data['concern'] = $this->admin_model->select_data_where_result('services_concern', 'concern_status', 'active');




        $data['result'] = $this->admin_model->select_data_where_result('services_product', 'services_product_status', 'active');
        $this->load->view('admin/header');
        $this->load->view('admin/service_product', $data);
        $this->load->view('admin/footer');
    }

    function add_service_product() {
//$services_product_id = $this->input->post('services_product_id');
        $product_type = $this->input->post('product_type');
        $green_text = $this->input->post('green_text');
        $black_text = $this->input->post('black_text');
        $product_slug = strtolower(str_replace(" ", "-", $black_text));
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $service_id = $this->input->post('service_id');
        $concern_id = $this->input->post('concern_id');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $bottom_text = $this->input->post('bottom_text');
        $bottom_subtext = $this->input->post('bottom_subtext');
        $show_product = $this->input->post('show_product');

//Image Config 
        $config['upload_path'] = './uploads/services_product/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 200;
//        $config['max_width'] = 1920;
//        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile1')) {
            $error = array('error' => $this->upload->display_errors());
            $error['error'];
            $this->session->set_flashdata('message', $error['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $image1 = $upload_data['file_name'];
        }

        if (!$this->upload->do_upload('userfile2')) {
            $error1 = array('error' => $this->upload->display_errors());
            $error1['error'];
            $this->session->set_flashdata('message', $error1['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data1 = $this->upload->data();
            $image2 = $upload_data1['file_name'];
        }
        if ($image1 != "" && $image2) {



            $data = array('product_slug' => $product_slug, 'show_product' => $show_product, "product_type" => $product_type, "service_id" => $service_id, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "bottom_text" => $bottom_text, "bottom_subtext" => $bottom_subtext, "image1" => $image1, "image2" => $image2, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $text, "services_product_status" => $status);
            $product_id = $this->admin_model->insert_data('services_product', $data);

//            foreach ($service_id as $row) {
//                $category_data = array("services_id" => $row, "services_product_id" => $product_id);
//                $this->admin_model->insert_data('services_product_category', $category_data);
//            }

            foreach ($concern_id as $row) {
                $concern_data = array("concern_id" => $row, "services_product_id" => $product_id);
                $this->admin_model->insert_data('services_product_concern', $concern_data);
            }

            $this->session->set_flashdata('message', 'Data added Successfully');
        }

        redirect('admin/home/service_product');
    }

    public function update_service_product() {
        $services_product_id = $this->input->post('services_product_id');
        $product_type = $this->input->post('product_type');
        $service_id = $this->input->post('service_id');
        $concern_id = $this->input->post('concern_id');
        $green_text = $this->input->post('green_text');
        $black_text = $this->input->post('black_text');
        $product_slug = strtolower(str_replace(" ", "-", $black_text));

        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $bottom_text = $this->input->post('bottom_text');
        $bottom_subtext = $this->input->post('bottom_subtext');
        $image_1 = $this->input->post('image1');
        $image_2 = $this->input->post('image2');
        $show_product = $this->input->post('show_product');
        //  $banner_type = $this->input->post('banner_type');
//Image Config 
        $config['upload_path'] = './uploads/services_product/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 200;
//        $config['max_width'] = 1920;
//        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile1')) {
            $error = array('error' => $this->upload->display_errors());
            $error['error'];
            $this->session->set_flashdata('message', $error['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $image1 = $upload_data['file_name'];
        }

        if (!$this->upload->do_upload('userfile2')) {
            $error1 = array('error' => $this->upload->display_errors());
            $error1['error'];
            $this->session->set_flashdata('message', $error1['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data1 = $this->upload->data();
            $image2 = $upload_data1['file_name'];
        }

        if (!empty($services_product_id)) {
            $this->admin_model->delete_data('services_product_concern', 'services_product_id', $services_product_id);
//            $this->admin_model->delete_data('services_product_category', 'services_product_id', $services_product_id);
//            foreach ($service_id as $row) {
//                $category_data = array("services_id" => $row, "services_product_id" => $services_product_id);
//                $this->admin_model->insert_data('services_product_category', $category_data);
//            }

            foreach ($concern_id as $row) {
                $concern_data = array("concern_id" => $row, "services_product_id" => $services_product_id);
                $this->admin_model->insert_data('services_product_concern', $concern_data);
            }
        }

        if ($image1 != "" && $image2 != "") {

            $data = array('product_slug' => $product_slug, 'show_product' => $show_product, "product_type" => $product_type, "service_id" => $service_id, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "bottom_text" => $bottom_text, "bottom_subtext" => $bottom_subtext, "image1" => $image1, "image2" => $image2, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $text, "services_product_status" => $status);


            $this->admin_model->update_data('services_product', $data, 'services_product_id', $services_product_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        } else if ($image2 != "" && $image1 == "") {
            $data = array('product_slug' => $product_slug, 'show_product' => $show_product, "product_type" => $product_type, "service_id" => $service_id, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "bottom_text" => $bottom_text, "bottom_subtext" => $bottom_subtext, "image2" => $image2, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $text, "services_product_status" => $status);
            $this->admin_model->update_data('services_product', $data, 'services_product_id', $services_product_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        } else if ($image1 != "" && $image2 == "") {
            $data = array('product_slug' => $product_slug, 'show_product' => $show_product, "product_type" => $product_type, "service_id" => $service_id, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "bottom_text" => $bottom_text, "bottom_subtext" => $bottom_subtext, "image1" => $image1, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $text, "services_product_status" => $status);
            $this->admin_model->update_data('services_product', $data, 'services_product_id', $services_product_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        } else {
            $data = array('product_slug' => $product_slug, 'show_product' => $show_product, "product_type" => $product_type, "service_id" => $service_id, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "bottom_text" => $bottom_text, "bottom_subtext" => $bottom_subtext, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $text, "services_product_status" => $status);
            $this->admin_model->update_data('services_product', $data, 'services_product_id', $services_product_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/service_product');
    }

    public function delete_service_product() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        $name1 = base64_decode($this->uri->segment("6"));
        if (!empty($id)) {
            $this->admin_model->delete_data('services_product', 'services_product_id', $id);
            $target_path = "./uploads/services_product/" . basename($name);
            unlink($target_path);
            $target_path1 = "./uploads/services_product/" . basename($name1);
            unlink($target_path1);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }



        redirect('admin/home/service_product');
    }

/////////////////////////////////////Product service_product_page////////////////

    function service_product_page() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('services_product_inner_page', 'services_product_inner_id', $id);
            $data['services_product_inner_id'] = $id;
        } else {
            $data['edit'] = "";
        }
        $data['services'] = $this->admin_model->select_data('services_product');
//$tableOne, $tableOneColumn, $tableTwo, $tableTwoColumn
        $data['result'] = $this->admin_model->getJoinData('services_product', 'services_product_id', 'services_product_inner_page', 'services_product_id');

        $this->load->view('admin/header');
        $this->load->view('admin/service_product_page', $data);
        $this->load->view('admin/footer');
    }

    function add_service_product_page() {
//$services_product_id = $this->input->post('services_product_id');
        $services_product_id = $this->input->post('services_product_id');
        $this->admin_model->exits('services_product_inner_page', 'services_product_inner_id', $services_product_inner_id);
        $inner_title = $this->input->post('inner_title');
        $text = $this->input->post('text');
        $duration = $this->input->post('duration');
        $status = $this->input->post('status');

        $banner_type = $this->input->post('banner_type');

        //Image Config 
        $config['upload_path'] = './uploads/services_product/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 200;
//        $config['max_width'] = 1920;
//        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile1')) {
            $error = array('error' => $this->upload->display_errors());
            $error['error'];
            $this->session->set_flashdata('message', $error['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $image1 = $upload_data['file_name'];
        }
        if ($banner_type == "img") {
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $error['error'];
                $this->session->set_flashdata('message', $error['error']);
            } else {
                array('upload_data' => $this->upload->data());
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];
                $data = array("duration" => $duration, "services_product_id" => $services_product_id, "image1" => $image1, "image" => $image, "inner_title" => $inner_title, "text" => $text, "product_inner_status" => $status);
                $this->admin_model->insert_data('services_product_inner_page', $data);
                $this->session->set_flashdata('message', 'Data added Successfully');
            }
        } else {
            $image = $this->input->post('userfile');
            $data = array("duration" => $duration, "services_product_id" => $services_product_id, "image1" => $image1, "image" => $image, "inner_title" => $inner_title, "text" => $text, "product_inner_status" => $status);
            $this->admin_model->insert_data('services_product_inner_page', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/service_product_page');
    }

    public function update_service_product_page() {
        $services_product_inner_id = $this->input->post('services_product_inner_id');
        $services_product_id = $this->input->post('services_product_id');
        $inner_title = $this->input->post('inner_title');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $banner = $this->input->post('userfile');
        $duration = $this->input->post('duration');
        $banner_type = $this->input->post('banner_type');

        //Image Config 
        $config['upload_path'] = './uploads/services_product/';
        $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = 200;
//            $config['max_width'] = 1920;
//            $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $file = $_FILES['userfile1']['name'];
        if ($file) {
            if (!$this->upload->do_upload('userfile1')) {
                $error = array('error' => $this->upload->display_errors());
                $error['error'];
                $this->session->set_flashdata('message', $error['error']);
            } else {
                array('upload_data' => $this->upload->data());
                $upload_data = $this->upload->data();
                $slider_image = $upload_data['file_name'];

                $data = array("banner_type" => $banner_type, "duration" => $duration, "services_product_id" => $services_product_id, "image1" => $slider_image, "inner_title" => $inner_title, "text" => $text, "product_inner_status" => $status);
                $this->admin_model->update_data('services_product_inner_page', $data, 'services_product_inner_id', $services_product_inner_id);
                $target_path = "./uploads/services_product/" . basename($image1);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("banner_type" => $banner_type, "duration" => $duration, "services_product_id" => $services_product_id, "inner_title" => $inner_title, "text" => $text, "product_inner_status" => $status);
            $this->admin_model->update_data('services_product_inner_page', $data, 'services_product_inner_id', $services_product_inner_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }

        if ($banner_type == 'img') {
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $error['error'];
                $this->session->set_flashdata('message', $error['error']);
            } else {
                array('upload_data' => $this->upload->data());
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];

                $data = array("image" => $image);
                $this->admin_model->update_data('services_product_inner_page', $data, 'services_product_inner_id', $services_product_inner_id);
                $target_path = "./uploads/services_product/" . basename($image1);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $image = $this->input->post('userfile');
            $data = array("image" => $image);
            $this->admin_model->update_data('services_product_inner_page', $data, 'services_product_inner_id', $services_product_inner_id);
        }
        redirect('admin/home/service_product_page');
    }

    public function delete_service_product_page() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));

        if (!empty($id)) {
            $this->admin_model->delete_data('services_product_inner_page', 'services_product_inner_id', $id);
            $target_path = "./uploads/services_product/" . basename($name);
            unlink($target_path);

            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }



        redirect('admin/home/service_product_page');
    }

/////////////////////////////////////Add Steps inner Page////////////////

    function steps() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('services_steps', 'step_id', $id);
            $data['step_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhere('services_steps', 'services_product_inner_id', $product_id, 'services_product_inner_page', 'services_product_inner_id');
//$data['result'] = $this->admin_model->select_data_where_result('services_steps', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/steps', $data);
        $this->load->view('admin/footer');
    }

    function add_steps() {
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $services_product_inner_id = $this->input->post('services_product_inner_id');
        $data = array("text" => $text, "services_product_inner_id" => $services_product_inner_id, "step_status" => $status);
        $this->admin_model->insert_data('services_steps', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/steps/' . base64_encode($services_product_inner_id));
    }

    public function update_steps() {
        $step_id = $this->input->post('step_id');

        $services_product_inner_id = $this->input->post('services_product_inner_id');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $data = array("services_product_inner_id" => $services_product_inner_id, "text" => $text, "step_status" => $status);
        $this->admin_model->update_data('services_steps', $data, 'step_id', $step_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/steps/' . base64_encode($services_product_inner_id));
    }

    public function delete_steps() {
        $services_product_inner_id = $this->uri->segment("4");
        $step_id = base64_decode($this->uri->segment("5"));
        if (!empty($step_id)) {
            $this->admin_model->delete_data('services_steps', 'step_id', $step_id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/steps/' . $services_product_inner_id);
    }

/////////////////////////////////////Add FAQ inner FAQ////////////////

    function faq() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('services_faq', 'faq_id', $id);
            $data['step_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhere('services_faq', 'services_product_inner_id', $product_id, 'services_product_inner_page', 'services_product_inner_id');
//$data['result'] = $this->admin_model->select_data_where_result('services_faq', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/faq', $data);
        $this->load->view('admin/footer');
    }

    function add_faq() {
        $faq_q = $this->input->post('faq_q');
        $faq_ans = $this->input->post('faq_ans');
        $status = $this->input->post('status');
        $services_product_inner_id = $this->input->post('services_product_inner_id');
        $data = array("faq_q" => $faq_q, 'faq_ans' => $faq_ans, "services_product_inner_id" => $services_product_inner_id, "faq_status" => $status);
        $this->admin_model->insert_data('services_faq', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/faq/' . base64_encode($services_product_inner_id));
    }

    public function update_faq() {
        $faq_id = $this->input->post('faq_id');
        $faq_q = $this->input->post('faq_q');
        $faq_ans = $this->input->post('faq_ans');
        $status = $this->input->post('status');
        $services_product_inner_id = $this->input->post('services_product_inner_id');
        $data = array("faq_q" => $faq_q, 'faq_ans' => $faq_ans, "services_product_inner_id" => $services_product_inner_id, "faq_status" => $status);
        $this->admin_model->update_data('services_faq', $data, 'faq_id', $faq_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/faq/' . base64_encode($services_product_inner_id));
    }

    public function delete_faq() {
        $services_product_inner_id = $this->uri->segment("4");
        $faq_id = base64_decode($this->uri->segment("5"));
        if (!empty($faq_id)) {
            $this->admin_model->delete_data('services_faq', 'faq_id', $faq_id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/faq/' . $services_product_inner_id);
    }

/////////////////////////////////////Add ingredients inner Page////////////////

    function ingredients() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('services_ingredients', 'ingredients_id', $id);
            $data['ingredients_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhere('services_ingredients', 'services_product_inner_id', $product_id, 'services_product_inner_page', 'services_product_inner_id');
// $data['result'] = $this->admin_model->select_data_where_result('ingredients', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/ingredients', $data);
        $this->load->view('admin/footer');
    }

    function add_ingredients() {
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $title = $this->input->post('title');
        $services_product_inner_id = $this->input->post('services_product_inner_id');

        $data = array("title" => $title, "text" => $text, "services_product_inner_id" => $services_product_inner_id, "ingredients_status" => $status);
        $this->admin_model->insert_data('services_ingredients', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/ingredients/' . base64_encode($services_product_inner_id));
    }

    public function update_ingredients() {
        $ingredients_id = $this->input->post('ingredients_id');
        $services_product_inner_id = $this->input->post('services_product_inner_id');
        $text = $this->input->post('text');
        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $data = array("title" => $title, "title" => $title, "services_product_inner_id" => $services_product_inner_id, "text" => $text, "ingredients_status" => $status);
        $this->admin_model->update_data('services_ingredients', $data, 'ingredients_id', $ingredients_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/ingredients/' . base64_encode($services_product_inner_id) . '/' . base64_encode($step_id));
    }

    public function delete_ingredients() {
        $services_product_inner_id = $this->uri->segment("4");
        $ingredients_id = base64_decode($this->uri->segment("5"));
        if (!empty($ingredients_id)) {
            $this->admin_model->delete_data('services_ingredients', 'ingredients_id', $ingredients_id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/ingredients/' . $services_product_inner_id);
    }

    //////////////////////////////////////////Happy Customer Services///////////

    function services_happy_customers() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('services_happy_customers', 'customer_id', $id);
            $data['customer_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('services_happy_customers');
        $data['homecare_product'] = $this->admin_model->select_data_where_result('services_product', 'services_product_status', 'active');
        $this->load->view('admin/header');
        $this->load->view('admin/services_happy_customers', $data);
        $this->load->view('admin/footer');
    }

    function add_services_happy_customers() {
        $services_product_id = $this->input->post('services_product_id');
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $link = $this->input->post('link');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $designation = $this->input->post('designation');

//Image Config 
        $config['upload_path'] = './uploads/customer/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("services_product_id" => $services_product_id, "designation" => $designation, "photo" => $slider_image, "name" => $name, "text" => $text, "link" => $link, "status" => $status);
            $this->admin_model->insert_data('services_happy_customers', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/services_happy_customers');
    }

    public function update_services_happy_customers() {
        $services_product_id = $this->input->post('services_product_id');
        $customer_id = $this->input->post('customer_id');
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $link = $this->input->post('link');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $banner = $this->input->post('banner');

        $designation = $this->input->post('designation');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/customer/';
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

                $data = array("services_product_id" => $services_product_id, "designation" => $designation, "photo" => $slider_image, "name" => $name, "text" => $text, "link" => $link, "status" => $status);
                $this->admin_model->update_data('services_happy_customers', $data, 'customer_id', $customer_id);
                $target_path = "./uploads/customer/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("services_product_id" => $services_product_id, "designation" => $designation, "name" => $name, "text" => $text, "link" => $link, "status" => $status);
            $this->admin_model->update_data('services_happy_customers', $data, 'customer_id', $customer_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/services_happy_customers');
    }

    public function delete_services_happy_customers() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('services_happy_customers', 'customer_id', $id);
            $target_path = "./uploads/customer/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/services_happy_customers');
    }

/////////////////////////////////////Happy Customers////////////////

    function happy_customers() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('happy_customers', 'customer_id', $id);
            $data['customer_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('happy_customers');
        $this->load->view('admin/header');
        $this->load->view('admin/happy_customers', $data);
        $this->load->view('admin/footer');
    }

    function add_happy_customers() {
//  $service_id = $this->input->post('service_id');
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $link = $this->input->post('link');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $designation = $this->input->post('designation');

//Image Config 
        $config['upload_path'] = './uploads/customer/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("designation" => $designation, "photo" => $slider_image, "type" => $type, "name" => $name, "text" => $text, "link" => $link, "status" => $status);
            $this->admin_model->insert_data('happy_customers', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }



        redirect('admin/home/happy_customers');
    }

    public function update_happy_customers() {
        $customer_id = $this->input->post('customer_id');
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $link = $this->input->post('link');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $banner = $this->input->post('banner');

        $designation = $this->input->post('designation');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/customer/';
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

                $data = array("designation" => $designation, "photo" => $slider_image, "type" => $type, "name" => $name, "text" => $text, "link" => $link, "status" => $status);
                $this->admin_model->update_data('happy_customers', $data, 'customer_id', $customer_id);
                $target_path = "./uploads/customer/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("type" => $type, "name" => $name, "text" => $text, "link" => $link, "status" => $status);
            $this->admin_model->update_data('happy_customers', $data, 'customer_id', $customer_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/happy_customers');
    }

    public function delete_happy_customers() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('happy_customers', 'customer_id', $id);
            $target_path = "./uploads/customer/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/happy_customers');
    }

    /////////////////////////////////////Add Expert FAQ////////////////

    function expert_faq() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('expert_faq', 'faq_id', $id);
            $data['faq_id'] = $id;
        } else {
            $data['edit'] = "";
        }
        $data['result'] = $this->admin_model->select_data_where_result('expert_faq', 'faq_status', 'active');
        $this->load->view('admin/header');
        $this->load->view('admin/expert_faq', $data);
        $this->load->view('admin/footer');
    }

    function add_expert_faq() {
        $faq_q = $this->input->post('faq_q');
        $faq_ans = $this->input->post('faq_ans');
        $status = $this->input->post('status');



        $data = array("faq_q" => $faq_q, 'faq_ans' => $faq_ans, "faq_status" => $status);
        $this->admin_model->insert_data('expert_faq', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/expert_faq/');
    }

    public function update_expert_faq() {
        $faq_id = $this->input->post('faq_id');
        $faq_q = $this->input->post('faq_q');
        $faq_ans = $this->input->post('faq_ans');
        $status = $this->input->post('status');

        $data = array("faq_q" => $faq_q, 'faq_ans' => $faq_ans, "faq_status" => $status);
        $this->admin_model->update_data('expert_faq', $data, 'faq_id', $faq_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/expert_faq/');
    }

    public function delete_expert_faq() {

        $faq_id = base64_decode($this->uri->segment("4"));
        if (!empty($step_id)) {
            $this->admin_model->delete_data('expert_faq', 'faq_id', $faq_id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/expert_faq/');
    }

    /////////////////////////////////////Expert speak////////////////

    function experts_speak() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('experts_speak', 'experts_speak_id', $id);
            $data['experts_speak_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('experts_speak');
        $this->load->view('admin/header');
        $this->load->view('admin/experts_speak', $data);
        $this->load->view('admin/footer');
    }

    function add_experts_speak() {
//  $service_id = $this->input->post('service_id');
        $experts_name = $this->input->post('experts_name');
        $experts_designation = $this->input->post('experts_designation');
        $experts_since = $this->input->post('experts_since');
        $experts_text = $this->input->post('experts_text');
        $experts_status = $this->input->post('experts_status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');

//Image Config 
        $config['upload_path'] = './uploads/experts_speak/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "photo" => $slider_image, "experts_name" => $experts_name, "experts_designation" => $experts_designation, "experts_since" => $experts_since, "experts_text" => $experts_text, "experts_status" => $experts_status);
            $this->admin_model->insert_data('experts_speak', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/experts_speak');
    }

    public function update_experts_speak() {
        $experts_speak_id = $this->input->post('experts_speak_id');
        $experts_name = $this->input->post('experts_name');
        $experts_designation = $this->input->post('experts_designation');
        $experts_since = $this->input->post('experts_since');
        $experts_text = $this->input->post('experts_text');
        $experts_status = $this->input->post('experts_status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');


        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/experts_speak/';
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

                $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "photo" => $slider_image, "experts_name" => $experts_name, "experts_designation" => $experts_designation, "experts_since" => $experts_since, "experts_text" => $experts_text, "experts_status" => $experts_status);
                $this->admin_model->update_data('happy_customers', $data, 'customer_id', $customer_id);
                $target_path = "./uploads/customer/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "experts_name" => $experts_name, "experts_designation" => $experts_designation, "experts_since" => $experts_since, "experts_text" => $experts_text, "experts_status" => $experts_status);
            $this->admin_model->update_data('experts_speak', $data, 'experts_speak_id', $experts_speak_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/experts_speak');
    }

    public function delete_experts_speak() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('experts_speak', 'experts_speak_id', $id);
            $target_path = "./uploads/experts_speak/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/experts_speak');
    }

    /////////////////////////////////////Media////////////////

    function media() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('media', 'media_id', $id);
            $data['media_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('media');
        $this->load->view('admin/header');
        $this->load->view('admin/media', $data);
        $this->load->view('admin/footer');
    }

    function add_media() {
//  $service_id = $this->input->post('service_id');
        $title = $this->input->post('title');
        $date = $this->input->post('publish_date');
        $view_article_link = $this->input->post('view_article_link');
        $view_product_link = $this->input->post('view_product_link');
        $media_status = $this->input->post('media_status');


        $publish_date = date("Y-m-d", strtotime($date));

//Image Config 
        $config['upload_path'] = './uploads/media/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("photo" => $slider_image, "title" => $title, "publish_date" => $publish_date, "view_article_link" => $view_article_link, "view_product_link" => $view_product_link, "media_status" => $media_status);
            $this->admin_model->insert_data('media', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/media');
    }

    public function update_media() {
        $media_id = $this->input->post('media_id');
        $title = $this->input->post('title');
        $date = $this->input->post('publish_date');
        $view_article_link = $this->input->post('view_article_link');
        $view_product_link = $this->input->post('view_product_link');
        $media_status = $this->input->post('media_status');
        $file = $_FILES['userfile']['name'];
        $publish_date = date("Y-m-d", strtotime($date));
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/media/';
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

                $data = array("photo" => $slider_image, "title" => $title, "publish_date" => $publish_date, "view_article_link" => $view_article_link, "view_product_link" => $view_product_link, "media_status" => $media_status);
                $this->admin_model->update_data('media', $data, 'media_id', $media_id);
                $target_path = "./uploads/media/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("title" => $title, "publish_date" => $publish_date, "view_article_link" => $view_article_link, "view_product_link" => $view_product_link, "media_status" => $media_status);
            $this->admin_model->update_data('media', $data, 'media_id', $media_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/media');
    }

    public function delete_media() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('media', 'media_id', $id);
            $target_path = "./uploads/media/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/media');
    }

    /////////////////////////////////////Add Expert Speak QA////////////////

    function expert_speak_qa() {
//==============For Edit=============
        $experts_speak_id = base64_decode($this->uri->segment("4"));
        $experts_speak_qa_id = base64_decode($this->uri->segment("5"));

        if ($experts_speak_qa_id != "") {
            $data['edit'] = $this->admin_model->select_data_where('experts_speak_qa', 'experts_speak_qa_id', $experts_speak_qa_id);
            $data['experts_speak_qa_id'] = $id;
            $data['experts_speak_id'] = $experts_speak_id;
        } else {
            $data['edit'] = "";
            $data['experts_speak_id'] = $experts_speak_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('experts_speak_qa', 'experts_speak_id', $experts_speak_id, 'experts_speak', 'experts_speak_id');
        // $data['result'] = $this->admin_model->select_data_where_result('experts_speak_qa', 'experts_speak_status', 'active');
        $this->load->view('admin/header');
        $this->load->view('admin/experts_speak_qa', $data);
        $this->load->view('admin/footer');
    }

    function add_expert_speak_qa() {
        $experts_speak_id = $this->input->post('experts_speak_id');
        $experts_qusertions = $this->input->post('experts_qusertions');
        $experts_answers = $this->input->post('experts_answers');
        $status = $this->input->post('status');

        $data = array("experts_speak_id" => $experts_speak_id, "experts_qusertions" => $experts_qusertions, 'experts_answers' => $experts_answers, "experts_speak_status" => $status);
        $this->admin_model->insert_data('experts_speak_qa', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/expert_speak_qa/' . base64_encode($experts_speak_id));
    }

    public function update_expert_speak_qa() {
        $experts_speak_qa_id = $this->input->post('experts_speak_qa_id');
        $experts_speak_id = $this->input->post('experts_speak_id');
        $experts_qusertions = $this->input->post('experts_qusertions');
        $experts_answers = $this->input->post('experts_answers');
        $status = $this->input->post('status');
        $data = array("experts_speak_id" => $experts_speak_id, "experts_qusertions" => $experts_qusertions, 'experts_answers' => $experts_answers, "experts_speak_status" => $status);
        $this->admin_model->update_data('experts_speak_qa', $data, 'experts_speak_qa_id', $experts_speak_qa_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/expert_speak_qa/' . base64_encode($experts_speak_id));
    }

    public function delete_expert_speak_qa() {

        $experts_speak_id = base64_decode($this->uri->segment("4"));
        $experts_speak_qa_id = base64_decode($this->uri->segment("5"));
        if (!empty($experts_speak_qa_id)) {
            $this->admin_model->delete_data('experts_speak_qa', 'experts_speak_qa_id', $experts_speak_qa_id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/expert_speak_qa/' . base64_encode($experts_speak_id));
    }

    /////////////////////////////////////FAQ category////////////////
    function faqs_category() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('faqs_category', 'faqs_category_id', $id);
            $data['category_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('faqs_category');
        $this->load->view('admin/header');
        $this->load->view('admin/faqs_category', $data);
        $this->load->view('admin/footer');
    }

    function add_faqs_category() {
        $faqs_category = $this->input->post('faqs_category');
        $faqs_status = $this->input->post('faqs_status');
        $data = array("faqs_category" => $faqs_category, "faqs_status" => $faqs_status);
        $this->admin_model->insert_data('faqs_category', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/faqs_category');
    }

    public function update_faqs_category() {
        $faqs_category_id = $this->input->post('faqs_category_id');
        $faqs_category = $this->input->post('faqs_category');
        $faqs_status = $this->input->post('faqs_status');
        $data = array("faqs_category" => $faqs_category, "faqs_status" => $faqs_status);

        $this->admin_model->update_data('faqs_category', $data, 'faqs_category_id', $faqs_category_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/faqs_category');
    }

    public function delete_faqs_category() {
        $id = base64_decode($this->uri->segment("4"));
        if (!empty($id)) {
            $this->admin_model->delete_data('faqs_category', 'faqs_category_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/faqs_category');
    }

    /////////////////////////////////////FAQS////////////////
    function faqs() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('faqs', 'faqs_id', $id);
            $data['faqs_id'] = $id;
        } else {
            $data['edit'] = "";
        }
        $data['faqs_category'] = $this->admin_model->select_data_where_result('faqs_category', 'faqs_status', 'active');
//        $data['result'] = $this->admin_model->select_data('faqs');
        $data['result'] = $this->admin_model->getJoinData('faqs', 'faqs_category_id', 'faqs_category', 'faqs_category_id');
        $this->load->view('admin/header');
        $this->load->view('admin/faqs', $data);
        $this->load->view('admin/footer');
    }

    function add_faqs() {
        $faqs_category_id = $this->input->post('faqs_category_id');
        $faqs_question = $this->input->post('faqs_question');
        $faqs_answer = $this->input->post('faqs_answer');
        $faqs_status = $this->input->post('faqs_status');
        $data = array("faqs_category_id" => $faqs_category_id, "faqs_question" => $faqs_question, "faqs_answer" => $faqs_answer, "faqs_status" => $faqs_status);
        $this->admin_model->insert_data('faqs', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/faqs');
    }

    public function update_faqs() {
        $faqs_id = $this->input->post('faqs_id');
        $faqs_category_id = $this->input->post('faqs_category_id');
        $faqs_question = $this->input->post('faqs_question');
        $faqs_answer = $this->input->post('faqs_answer');
        $faqs_status = $this->input->post('faqs_status');
        $data = array("faqs_category_id" => $faqs_category_id, "faqs_question" => $faqs_question, "faqs_answer" => $faqs_answer, "faqs_status" => $faqs_status);
        $this->admin_model->update_data('faqs', $data, 'faqs_id', $faqs_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/faqs');
    }

    public function delete_faqs() {
        $id = base64_decode($this->uri->segment("4"));
        if (!empty($id)) {
            $this->admin_model->delete_data('faqs', 'faqs_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/faqs');
    }

    /////////////////////////////////////Product Services////////////////

    function our_reach() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));
        $data['result'] = $this->admin_model->select_data('our_reach');
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('our_reach', 'our_reach_id', $id);
            $data['our_reach_id'] = $id;
            $data['show_form'] = '0';
        } else {
            $data['edit'] = "";
            $data['show_form'] = count($data['result']);
        }

        //  $data['result'] = $this->admin_model->getJoinData('services_product', 'service_id', 'services', 'service_id');
        $this->load->view('admin/header');
        $this->load->view('admin/our_reach', $data);
        $this->load->view('admin/footer');
    }

    function add_our_reach() {
//$services_product_id = $this->input->post('services_product_id');
        $top_text = $this->input->post('top_text');
        $number_of_city = $this->input->post('number_of_city');
        $number_of_beauticians = $this->input->post('number_of_beauticians');
        $number_of_consumers = $this->input->post('number_of_consumers');
        $status = $this->input->post('status');
        $btext = $this->input->post('btext');

        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');



//Image Config 
        $config['upload_path'] = './uploads/common/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 200;
//        $config['max_width'] = 1920;
//        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile1')) {
            $error = array('error' => $this->upload->display_errors());
            $error['error'];
            $this->session->set_flashdata('message', $error['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $image1 = $upload_data['file_name'];
        }

        if (!$this->upload->do_upload('userfile2')) {
            $error1 = array('error' => $this->upload->display_errors());
            $error1['error'];
            $this->session->set_flashdata('message', $error1['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data1 = $this->upload->data();
            $image2 = $upload_data1['file_name'];
        }

        if (!$this->upload->do_upload('userfile3')) {
            $error1 = array('error' => $this->upload->display_errors());
            $error1['error'];
            $this->session->set_flashdata('message', $error1['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data1 = $this->upload->data();
            $image3 = $upload_data1['file_name'];
        }

        if ($image1 != "" && $image2 && $image3 != "") {
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "btext" => $btext, "top_text" => $top_text, "city_photo" => $image1, "beauticians_photo" => $image2, "consumers_photo" => $image3, "number_of_city" => $number_of_city, "number_of_beauticians" => $number_of_beauticians, "number_of_consumers" => $number_of_consumers, "our_reach_status" => $status);
            $this->admin_model->insert_data('our_reach', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }

        redirect('admin/home/our_reach');
    }

    public function update_our_reach() {
        $our_reach_id = $this->input->post('our_reach_id');
        $top_text = $this->input->post('top_text');
        $number_of_city = $this->input->post('number_of_city');
        $number_of_beauticians = $this->input->post('number_of_beauticians');
        $number_of_consumers = $this->input->post('number_of_consumers');
        $status = $this->input->post('status');
        $btext = $this->input->post('btext');

        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');

        $image_1 = $this->input->post('city_photo');
        $image_2 = $this->input->post('beauticians_photo');
        $image_3 = $this->input->post('consumers_photo');

//Image Config 
        $config['upload_path'] = './uploads/common/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 200;
//        $config['max_width'] = 1920;
//        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile1')) {
            $error = array('error' => $this->upload->display_errors());
            $error['error'];
            $this->session->set_flashdata('message', $error['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $image1 = $upload_data['file_name'];
        }

        if (!$this->upload->do_upload('userfile2')) {
            $error1 = array('error' => $this->upload->display_errors());
            $error1['error'];
            $this->session->set_flashdata('message', $error1['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data1 = $this->upload->data();
            $image2 = $upload_data1['file_name'];
        }

        if (!$this->upload->do_upload('userfile3')) {
            $error1 = array('error' => $this->upload->display_errors());
            $error1['error'];
            $this->session->set_flashdata('message', $error1['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data1 = $this->upload->data();
            $image3 = $upload_data1['file_name'];
        }



        if ($image1 != "" && $image2 != "" && $image3 != "") {
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "btext" => $btext, "top_text" => $top_text, "city_photo" => $image1, "beauticians_photo" => $image2, "consumers_photo" => $image3, "number_of_city" => $number_of_city, "number_of_beauticians" => $number_of_beauticians, "number_of_consumers" => $number_of_consumers, "our_reach_status" => $status);
            $this->admin_model->update_data('our_reach', $data, 'our_reach_id', $our_reach_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        } else if ($image2 != "" && $image1 == "" && $image3 == "") {
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "btext" => $btext, "top_text" => $top_text, "beauticians_photo" => $image2, "number_of_city" => $number_of_city, "number_of_beauticians" => $number_of_beauticians, "number_of_consumers" => $number_of_consumers, "our_reach_status" => $status);
            $this->admin_model->update_data('our_reach', $data, 'our_reach_id', $our_reach_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        } else if ($image1 != "" && $image2 == "" && $image3 == "") {
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "btext" => $btext, "top_text" => $top_text, "city_photo" => $image1, "number_of_city" => $number_of_city, "number_of_beauticians" => $number_of_beauticians, "number_of_consumers" => $number_of_consumers, "our_reach_status" => $status);
            $this->admin_model->update_data('our_reach', $data, 'our_reach_id', $our_reach_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        } else if ($image3 != "" && $image2 == "" && $image1 == "") {
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "btext" => $btext, "top_text" => $top_text, "consumers_photo" => $image3, "number_of_city" => $number_of_city, "number_of_beauticians" => $number_of_beauticians, "number_of_consumers" => $number_of_consumers, "our_reach_status" => $status);
            $this->admin_model->update_data('our_reach', $data, 'our_reach_id', $our_reach_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        } else {
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "btext" => $btext, "top_text" => $top_text, "number_of_city" => $number_of_city, "number_of_beauticians" => $number_of_beauticians, "number_of_consumers" => $number_of_consumers, "our_reach_status" => $status);
            $this->admin_model->update_data('our_reach', $data, 'our_reach_id', $our_reach_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/our_reach');
    }

    public function delete_our_reach() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        $name1 = base64_decode($this->uri->segment("6"));
        $name2 = base64_decode($this->uri->segment("7"));
        if (!empty($id)) {
            $this->admin_model->delete_data('our_reach', 'our_reach_id', $id);
            $target_path = "./uploads/common/" . basename($name);
            unlink($target_path);
            $target_path1 = "./uploads/common/" . basename($name1);
            unlink($target_path1);
            $target_path2 = "./uploads/common/" . basename($name1);
            unlink($target_path2);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/our_reach');
    }

    //==============For Singup=============

    function singup() {
//==============For Edit=============

        $data['result'] = $this->admin_model->select_data('singup');
        $this->load->view('admin/header');
        $this->load->view('admin/singup', $data);
        $this->load->view('admin/footer');
    }

    //==============For contact_us_form_data=============

    function contact_us_form_data() {
//==============For Edit=============

        $data['result'] = $this->admin_model->select_data('contact_us_form_data');
        $this->load->view('admin/header');
        $this->load->view('admin/contact_us_form_data', $data);
        $this->load->view('admin/footer');
    }

    //==============For expert_faqs_form_data=============

    function faqs_form_data() {
//==============For Edit=============

        $data['result'] = $this->admin_model->select_data('expert_faqs_form_data');
        $this->load->view('admin/header');
        $this->load->view('admin/faqs_form_data', $data);
        $this->load->view('admin/footer');
    }

    /////////////////////////////////////Homecare////////////////

    function homecare() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('homecare_category', 'homecare_id', $id);
            $data['homecare_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data_where_result('homecare_category', 'homecare_category_status', 'active');
        $this->load->view('admin/header');
        $this->load->view('admin/homecare', $data);
        $this->load->view('admin/footer');
    }

    function add_homecare() {

        $homecare_name = $this->input->post('homecare_name');

        $category_slug = strtolower(str_replace(" ", "-", $homecare_name));

        $text = $this->input->post('text');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $status = $this->input->post('status');
        $btext = $this->input->post('btext');
//Image Config 
        $config['upload_path'] = './uploads/homecare/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("category_slug" => $category_slug, "btext" => $btext, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner" => $slider_image, "homecare_category_name" => $homecare_name, "text" => $text, "homecare_category_status" => $status);
            $this->admin_model->insert_data('homecare_category', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/homecare');
    }

    public function update_homecare() {
        $homecare_id = $this->input->post('homecare_id');
        $homecare_name = $this->input->post('homecare_name');
        $category_slug = strtolower(str_replace(" ", "-", $homecare_name));
        $text = $this->input->post('text');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $status = $this->input->post('status');
        $btext = $this->input->post('btext');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/services/';
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

                $data = array("category_slug" => $category_slug, "btext" => $btext, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner" => $slider_image, "homecare_category_name" => $homecare_name, "text" => $text, "homecare_category_status" => $status);
                $this->admin_model->update_data('homecare_category', $data, 'homecare_id', $homecare_id);
                $target_path = "./uploads/services/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("category_slug" => $category_slug, "btext" => $btext, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "homecare_category_name" => $homecare_name, "text" => $text, "homecare_category_status" => $status);
            $this->admin_model->update_data('homecare_category', $data, 'homecare_id', $homecare_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/homecare');
    }

    public function delete_homecare() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('homecare_category', 'homecare_id', $id);
            $target_path = "./uploads/services/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/homecare');
    }

    /////////////////////////////////////Homecare////////////////

    function homecare_concern() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('homecare_concern', 'homecare_concern_id', $id);
            $data['homecare_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data_where_result('homecare_concern', 'homecare_concern_status', 'active');
        $this->load->view('admin/header');
        $this->load->view('admin/homecare_concern', $data);
        $this->load->view('admin/footer');
    }

    function add_homecare_concern() {

        $homecare_concern_name = $this->input->post('homecare_concern_name');
        $concern_slug = strtolower(str_replace(" ", "-", $homecare_concern_name));
        $text = $this->input->post('text');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $status = $this->input->post('status');
        $btext = $this->input->post('btext');
//Image Config 
        $config['upload_path'] = './uploads/homecare/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array('concern_slug' => $concern_slug, "btext" => $btext, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner" => $slider_image, "homecare_concern_name" => $homecare_concern_name, "text" => $text, "homecare_concern_status" => $status);
            $this->admin_model->insert_data('homecare_concern', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/homecare_concern');
    }

    public function update_homecare_concern() {
        $homecare_concern_id = $this->input->post('homecare_concern_id');
        $homecare_concern_name = $this->input->post('homecare_concern_name');
        $concern_slug = strtolower(str_replace(" ", "-", $homecare_concern_name));
        $text = $this->input->post('text');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $status = $this->input->post('status');
        $btext = $this->input->post('btext');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/services/';
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

                $data = array('concern_slug' => $concern_slug, "btext" => $btext, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner" => $slider_image, "homecare_concern_name" => $homecare_concern_name, "text" => $text, "homecare_concern_status" => $status);
                $this->admin_model->update_data('homecare_concern', $data, 'homecare_concern_id', $homecare_concern_id);
                $target_path = "./uploads/services/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array('concern_slug' => $concern_slug, "btext" => $btext, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "homecare_concern_name" => $homecare_concern_name, "text" => $text, "homecare_concern_status" => $status);
            $this->admin_model->update_data('homecare_concern', $data, 'homecare_concern_id', $homecare_concern_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/homecare_concern');
    }

    public function delete_homecare_concern() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('homecare_concern', 'homecare_concern_id', $id);
            $target_path = "./uploads/services/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/homecare_concern');
    }

    /////////////////////////////////////Product homecare////////////////

    function homecare_product() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('homecare_product', 'homecare_product_id', $id);
            $data['edit_category'] = $this->admin_model->select_data_where_result('homecare_product_category', 'homecare_product_id', $id);
            $data['edit_concern'] = $this->admin_model->select_data_where_result('homecare_product_concern', 'homecare_product_id', $id);
            $data['homecare_product_id'] = $id;
            //  print_r( $data['edit_category']);
            //  die;
        } else {
            $data['edit'] = "";
        }

//$tableOne, $tableOneColumn, $tableTwo, $tableTwoColumn
        $data['category_data'] = $this->admin_model->select_data_where_result('homecare_category', 'homecare_category_status', 'active');
        $data['concern_data'] = $this->admin_model->select_data_where_result('homecare_concern', 'homecare_concern_status', 'active');
        $data['result'] = $this->admin_model->select_data('homecare_product');


//        print_r($data['category']);
//        die;

        $this->load->view('admin/header');
        $this->load->view('admin/homecare_product', $data);
        $this->load->view('admin/footer');
    }

    function add_homecare_product() {
//$services_product_id = $this->input->post('services_product_id');
        $green_text = $this->input->post('green_text');
        $black_text = $this->input->post('black_text');
        $product_slug = strtolower(str_replace(" ", "-", $black_text));
        $short_text = $this->input->post('short_text');
        $status = $this->input->post('status');
        $homecare_id = $this->input->post('homecare_id');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $homecare_product_cost = $this->input->post('homecare_product_cost');


        $concern_id = $this->input->post('concern_id');


//Image Config 
        $config['upload_path'] = './uploads/homecare/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 200;
//        $config['max_width'] = 1920;
//        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile1')) {
            $error = array('error' => $this->upload->display_errors());
            $error['error'];
            $this->session->set_flashdata('message', $error['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $image1 = $upload_data['file_name'];
        }

        if (!$this->upload->do_upload('userfile2')) {
            $error1 = array('error' => $this->upload->display_errors());
            $error1['error'];
            $this->session->set_flashdata('message', $error1['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data1 = $this->upload->data();
            $image2 = $upload_data1['file_name'];
        }
        if ($image1 != "" && $image2) {
            $data = array("homecare_id" => $homecare_id, "homecare_product_cost" => $homecare_product_cost, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "thum_image" => $image1, "banner_image" => $image2, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $short_text, "homecare_product_status" => $status);
            $product_id = $this->admin_model->insert_data('homecare_product', $data);

//            foreach ($category_id as $row) {
//                $category_data = array("homecare_id" => $row, "homecare_product_id" => $product_id);
//                $this->admin_model->insert_data('homecare_product_category', $category_data);
//            }

            foreach ($concern_id as $row) {
                $concern_data = array("show_product" => $show_product, "homecare_concern_id" => $row, "homecare_product_id" => $product_id);
                $this->admin_model->insert_data('homecare_product_concern', $concern_data);
            }


            $this->session->set_flashdata('message', 'Data added Successfully');
        }

        redirect('admin/home/homecare_product');
    }

    public function update_homecare_product() {
        $homecare_product_id = $this->input->post('homecare_product_id');
        $green_text = $this->input->post('green_text');
        $black_text = $this->input->post('black_text');
        $product_slug = strtolower(str_replace(" ", "-", $black_text));
        $short_text = $this->input->post('short_text');
        $status = $this->input->post('status');
        $homecare_id = $this->input->post('homecare_id');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $homecare_product_cost = $this->input->post('homecare_product_cost');
        $show_product = $this->input->post('show_product');
        $thum_image = $this->input->post('thum_image');
        $banner_image = $this->input->post('banner_image');

        $homecare_id = $this->input->post('homecare_id');
        $concern_id = $this->input->post('concern_id');
//Image Config 
        $config['upload_path'] = './uploads/homecare/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 200;
//        $config['max_width'] = 1920;
//        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile1')) {
            $error = array('error' => $this->upload->display_errors());
            $error['error'];
            $this->session->set_flashdata('message', $error['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $image1 = $upload_data['file_name'];
        }

        if (!$this->upload->do_upload('userfile2')) {
            $error1 = array('error' => $this->upload->display_errors());
            $error1['error'];
            $this->session->set_flashdata('message', $error1['error']);
        } else {
            array('upload_data' => $this->upload->data());
            $upload_data1 = $this->upload->data();
            $image2 = $upload_data1['file_name'];
        }

        if (!empty($homecare_product_id)) {
            $this->admin_model->delete_data('homecare_product_concern', 'homecare_product_id', $homecare_product_id);
//            $this->admin_model->delete_data('homecare_product_category', 'homecare_product_id', $homecare_product_id);
//            foreach ($category_id as $row) {
//                $category_data = array("homecare_id" => $row, "homecare_product_id" => $homecare_product_id);
//                $this->admin_model->insert_data('homecare_product_category', $category_data);
//            }

            foreach ($concern_id as $row) {
                $concern_data = array("homecare_concern_id" => $row, "homecare_product_id" => $homecare_product_id);
                $this->admin_model->insert_data('homecare_product_concern', $concern_data);
            }
        }
//echo $image1;
//echo $image2;
        if ($image1 != "" && $image2 != "") {
            $data = array("product_slug" => $product_slug, "show_product" => $show_product, "homecare_id" => $homecare_id, "homecare_product_cost" => $homecare_product_cost, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "thum_image" => $image1, "banner_image" => $image2, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $short_text, "homecare_product_status" => $status);
            $this->admin_model->update_data('homecare_product', $data, 'homecare_product_id', $homecare_product_id);
            //To delete file from folder
            $target_path = "./uploads/homecare/" . basename($thum_image);
            unlink($target_path);
            $target_path1 = "./uploads/homecare/" . basename($banner_image);
            unlink($target_path1);

            $this->session->set_flashdata('message', 'Data added Successfully');
        } else if ($image2 != "" && $image1 == "") {
            $data = array("product_slug" => $product_slug, "show_product" => $show_product, "homecare_id" => $homecare_id, "homecare_product_cost" => $homecare_product_cost, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner_image" => $image2, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $short_text, "homecare_product_status" => $status);
            $this->admin_model->update_data('homecare_product', $data, 'homecare_product_id', $homecare_product_id);
            //To delete file from folder
            $target_path1 = "./uploads/homecare/" . basename($banner_image);
            unlink($target_path1);
            $this->session->set_flashdata('message', 'Data added Successfully');
        } else if ($image1 != "" && $image2 == "") {
            $data = array("product_slug" => $product_slug, "show_product" => $show_product, "homecare_id" => $homecare_id, "homecare_product_cost" => $homecare_product_cost, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "thum_image" => $image1, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $short_text, "homecare_product_status" => $status);
            $this->admin_model->update_data('homecare_product', $data, 'homecare_product_id', $homecare_product_id);
            //To delete file from folder
            $target_path = "./uploads/homecare/" . basename($thum_image);
            unlink($target_path);

            $this->session->set_flashdata('message', 'Data added Successfully');
        } else {
            $data = array("product_slug" => $product_slug, "show_product" => $show_product, "homecare_id" => $homecare_id, "homecare_product_cost" => $homecare_product_cost, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "green_text" => $green_text, "black_text" => $black_text, "short_text" => $short_text, "homecare_product_status" => $status);
            $this->admin_model->update_data('homecare_product', $data, 'homecare_product_id', $homecare_product_id);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/homecare_product');
    }

    public function delete_homecare_product() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        $name1 = base64_decode($this->uri->segment("6"));
        if (!empty($id)) {
            $this->admin_model->delete_data('homecare_product', 'homecare_product_id', $id);
            $target_path = "./uploads/homecare/" . basename($name);
            unlink($target_path);
            $target_path1 = "./uploads/homecare/" . basename($name1);
            unlink($target_path1);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/homecare_product');
    }

    /////////////////////////////////////Add homecare Benefits inner Page////////////////

    function homecare_benefits() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('homecare_benefits', 'benefits_id', $id);
            $data['benefits_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('homecare_benefits', 'homecare_product_id', $product_id, 'homecare_product', 'homecare_product_id');
//$data['result'] = $this->admin_model->select_data_where_result('services_steps', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/homecare_benifits', $data);
        $this->load->view('admin/footer');
    }

    function add_homecare_benefits() {
        $homecare_product_id = $this->input->post('homecare_product_id');
        $benefits_title = $this->input->post('benefits_title');
        $benefits_text = $this->input->post('benefits_text');
        $status = $this->input->post('status');

        ////Image Config 
        $config['upload_path'] = './uploads/homecare/';
        $config['allowed_types'] = 'gif|jpg|png|jpes';
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
            $image = $upload_data['file_name'];
            $data = array("benefits_photos" => $image, "benefits_title" => $benefits_title, "benefits_text" => $benefits_text, "homecare_product_id" => $homecare_product_id, "benefits_status" => $status);
            $this->admin_model->insert_data('homecare_benefits', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/homecare_benefits/' . base64_encode($homecare_product_id));
    }

    public function update_homecare_benefits() {
        $benefits_id = $this->input->post('benefits_id');
        $homecare_product_id = $this->input->post('homecare_product_id');
        $benefits_title = $this->input->post('benefits_title');
        $benefits_text = $this->input->post('benefits_text');
        $status = $this->input->post('status');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/homecare/';
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
                $image = $upload_data['file_name'];
                $data = array("benefits_photos" => $image, "benefits_title" => $benefits_title, "benefits_text" => $benefits_text, "homecare_product_id" => $homecare_product_id, "benefits_status" => $status);
                $this->admin_model->update_data('homecare_benefits', $data, 'benefits_id', $benefits_id);

                $target_path = "./uploads/homecare/" . basename($image_name);
                unlink($target_path);

                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("benefits_title" => $benefits_title, "benefits_text" => $benefits_text, "homecare_product_id" => $homecare_product_id, "benefits_status" => $status);
            $this->admin_model->update_data('homecare_benefits', $data, 'benefits_id', $benefits_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/homecare_benefits/' . base64_encode($homecare_product_id));
    }

    public function delete_homecare_benefits() {
        $homecare_product_id = $this->uri->segment("4");
        $benefits_id = base64_decode($this->uri->segment("5"));
        $image_name = base64_decode($this->uri->segment("6"));
        if (!empty($benefits_id)) {
            $this->admin_model->delete_data('homecare_benefits', 'benefits_id', $benefits_id);
            $target_path = "./uploads/homecare/" . basename($image_name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/homecare_benefits/' . $homecare_product_id);
    }

    /////////////////////////////////////Add homecare homecare_ingredients_photos inner Page////////////////

    function homecare_ingredients_photos() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('homecare_ingredients_photos', 'ingredients_photos_id', $id);
            $data['ingredients_photos_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('homecare_ingredients_photos', 'homecare_product_id', $product_id, 'homecare_product', 'homecare_product_id');
//$data['result'] = $this->admin_model->select_data_where_result('services_steps', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/homecare_ingredients_photos', $data);
        $this->load->view('admin/footer');
    }

    function add_homecare_ingredients_photos() {
        $homecare_product_id = $this->input->post('homecare_product_id');
        $ingredients_photos_title = $this->input->post('ingredients_photos_title');
        $ingredients_photos_text = $this->input->post('ingredients_photos_text');
        $status = $this->input->post('status');

        ////Image Config 
        $config['upload_path'] = './uploads/homecare/';
        $config['allowed_types'] = 'gif|jpg|png|jpes';
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
            $image = $upload_data['file_name'];
            $data = array("ingredients_photos" => $image, "ingredients_photos_title" => $ingredients_photos_title, "ingredients_photos_text" => $ingredients_photos_text, "homecare_product_id" => $homecare_product_id, "ingredients_photos_status" => $status);
            $this->admin_model->insert_data('homecare_ingredients_photos', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/homecare_ingredients_photos/' . base64_encode($homecare_product_id));
    }

    public function update_homecare_ingredients_photos() {
        $ingredients_photos_id = $this->input->post('ingredients_photos_id');
        $homecare_product_id = $this->input->post('homecare_product_id');
        $ingredients_photos_title = $this->input->post('ingredients_photos_title');
        $ingredients_photos_text = $this->input->post('ingredients_photos_text');
        $status = $this->input->post('status');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/homecare/';
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
                $image = $upload_data['file_name'];
                $data = array("ingredients_photos" => $image, "ingredients_photos_title" => $ingredients_photos_title, "ingredients_photos_text" => $ingredients_photos_text, "homecare_product_id" => $homecare_product_id, "ingredients_photos_status" => $status);
                $this->admin_model->update_data('homecare_ingredients_photos', $data, 'ingredients_photos_id', $ingredients_photos_id);

                $target_path = "./uploads/homecare/" . basename($image_name);
                unlink($target_path);

                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("ingredients_photos_title" => $ingredients_photos_title, "ingredients_photos_text" => $ingredients_photos_text, "homecare_product_id" => $homecare_product_id, "ingredients_photos_status" => $status);
            $this->admin_model->update_data('homecare_ingredients_photos', $data, 'ingredients_photos_id', $ingredients_photos_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/homecare_ingredients_photos/' . base64_encode($homecare_product_id));
    }

    public function delete_homecare_ingredients_photos() {
        $homecare_product_id = $this->uri->segment("4");
        $ingredients_photos_id = base64_decode($this->uri->segment("5"));
        $image_name = base64_decode($this->uri->segment("6"));
        if (!empty($ingredients_photos_id)) {
            $this->admin_model->delete_data('homecare_ingredients_photos', 'ingredients_photos_id', $ingredients_photos_id);
            $target_path = "./uploads/homecare/" . basename($image_name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/homecare_ingredients_photos/' . $homecare_product_id);
    }

    /////////////////////////////////////Add homecare Steps inner Page////////////////

    function homecare_steps() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('homecare_steps', 'step_id', $id);
            $data['step_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('homecare_steps', 'homecare_product_id', $product_id, 'homecare_product', 'homecare_product_id');
//$data['result'] = $this->admin_model->select_data_where_result('services_steps', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/homecare_steps', $data);
        $this->load->view('admin/footer');
    }

    function add_homecare_steps() {
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $homecare_product_id = $this->input->post('homecare_product_id');

        $step_title = $this->input->post('step_title');
        $step_heading = $this->input->post('step_heading');
        $product_link = $this->input->post('product_link');


        ////Image Config 
        $config['upload_path'] = './uploads/homecare/';
        $config['allowed_types'] = 'gif|jpg|png|jpes';
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
            $image = $upload_data['file_name'];
            $data = array("image" => $image, "step_title" => $step_title, "step_heading" => $step_heading, "product_link" => $product_link, "text" => $text, "homecare_product_id" => $homecare_product_id, "step_status" => $status);
            $this->admin_model->insert_data('homecare_steps', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }


        redirect('admin/home/homecare_steps/' . base64_encode($homecare_product_id));
    }

    public function update_homecare_steps() {
        $step_id = $this->input->post('step_id');
        $step_title = $this->input->post('step_title');
        $step_heading = $this->input->post('step_heading');
        $product_link = $this->input->post('product_link');
        $homecare_product_id = $this->input->post('homecare_product_id');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $image_name = $this->input->post('image');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/homecare/';
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
                $image = $upload_data['file_name'];
                $data = array("image" => $image, "step_title" => $step_title, "step_heading" => $step_heading, "product_link" => $product_link, "homecare_product_id" => $homecare_product_id, "text" => $text, "step_status" => $status);
                $this->admin_model->update_data('homecare_steps', $data, 'step_id', $step_id);

                $target_path = "./uploads/homecare/" . basename($image_name);
                unlink($target_path);

                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("step_title" => $step_title, "step_heading" => $step_heading, "product_link" => $product_link, "homecare_product_id" => $homecare_product_id, "text" => $text, "step_status" => $status);
            $this->admin_model->update_data('homecare_steps', $data, 'step_id', $step_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/homecare_steps/' . base64_encode($homecare_product_id));
    }

    public function delete_homecare_steps() {
        $homecare_product_id = $this->uri->segment("4");
        $step_id = base64_decode($this->uri->segment("5"));
        $image_name = base64_decode($this->uri->segment("6"));
        if (!empty($step_id)) {
            $this->admin_model->delete_data('homecare_steps', 'step_id', $step_id);
            $target_path = "./uploads/homecare/" . basename($image_name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/homecare_steps/' . $homecare_product_id);
    }

/////////////////////////////////////Add Homecare FAQ inner FAQ////////////////

    function homecare_faq() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('homecare_faq', 'faq_id', $id);
            $data['step_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('homecare_faq', 'homecare_product_id', $product_id, 'homecare_product', 'homecare_product_id');
//$data['result'] = $this->admin_model->select_data_where_result('services_faq', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/homecare_faq', $data);
        $this->load->view('admin/footer');
    }

    function add_homecare_faq() {
        $faq_q = $this->input->post('faq_q');
        $faq_ans = $this->input->post('faq_ans');
        $status = $this->input->post('status');
        $homecare_product_id = $this->input->post('homecare_product_id');
        $data = array("faq_q" => $faq_q, 'faq_ans' => $faq_ans, "homecare_product_id" => $homecare_product_id, "faq_status" => $status);
        $this->admin_model->insert_data('homecare_faq', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/homecare_faq/' . base64_encode($homecare_product_id));
    }

    public function update_homecare_faq() {
        $faq_id = $this->input->post('faq_id');
        $faq_q = $this->input->post('faq_q');
        $faq_ans = $this->input->post('faq_ans');
        $status = $this->input->post('status');
        $homecare_product_id = $this->input->post('homecare_product_id');
        $data = array("faq_q" => $faq_q, 'faq_ans' => $faq_ans, "homecare_product_id" => $homecare_product_id, "faq_status" => $status);
        $this->admin_model->update_data('homecare_faq', $data, 'faq_id', $faq_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/homecare_faq/' . base64_encode($homecare_product_id));
    }

    public function delete_homecare_faq() {
        $homecare_product_id = $this->uri->segment("4");
        $faq_id = base64_decode($this->uri->segment("5"));
        if (!empty($faq_id)) {
            $this->admin_model->delete_data('homecare_faq', 'faq_id', $faq_id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/homecare_faq/' . $homecare_product_id);
    }

/////////////////////////////////////Add Homecare ingredients inner Page////////////////

    function homecare_ingredients_list() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('homecare_ingredients_list', 'homecare_ingredients_list_id', $id);
            $data['homecare_ingredients_list_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('homecare_ingredients_list', 'homecare_product_id', $product_id, 'homecare_product', 'homecare_product_id');
// $data['result'] = $this->admin_model->select_data_where_result('ingredients', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/homecare_ingredients_list', $data);
        $this->load->view('admin/footer');
    }

    function add_homecare_ingredients_list() {
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $title = $this->input->post('title');
        $homecare_product_id = $this->input->post('homecare_product_id');

        $data = array("title" => $title, "text" => $text, "homecare_product_id" => $homecare_product_id, "ingredients_status" => $status);
        $this->admin_model->insert_data('homecare_ingredients_list', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/homecare_ingredients_list/' . base64_encode($homecare_product_id));
    }

    public function update_homecare_ingredients_list() {
        $homecare_ingredients_list_id = $this->input->post('homecare_ingredients_list_id');
        $homecare_product_id = $this->input->post('homecare_product_id');
        $text = $this->input->post('text');
        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $data = array("title" => $title, "title" => $title, "homecare_product_id" => $homecare_product_id, "text" => $text, "ingredients_status" => $status);
        $this->admin_model->update_data('homecare_ingredients_list', $data, 'homecare_ingredients_list_id', $homecare_ingredients_list_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/homecare_ingredients_list/' . base64_encode($homecare_product_id));
    }

    public function delete_homecare_ingredients_list() {
        $homecare_product_id = $this->uri->segment("4");
        $homecare_ingredients_list_id = base64_decode($this->uri->segment("5"));
        if (!empty($homecare_ingredients_list_id)) {
            $this->admin_model->delete_data('homecare_ingredients_list', 'homecare_ingredients_list_id', $homecare_ingredients_list_id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/homecare_ingredients_list/' . $homecare_product_id);
    }

    /////////////////////////////////////Happy Customers Homecare////////////////

    function homecare_happy_customers() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('homecare_happy_customers', 'customer_id', $id);
            $data['customer_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('homecare_happy_customers');
        $data['homecare_product'] = $this->admin_model->select_data_where_result('homecare_product', 'homecare_product_status', 'active');
        $this->load->view('admin/header');
        $this->load->view('admin/homecare_happy_customers', $data);
        $this->load->view('admin/footer');
    }

    function add_homecare_happy_customers() {
        $homecare_product_id = $this->input->post('homecare_product_id');
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $link = $this->input->post('link');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $designation = $this->input->post('designation');

//Image Config 
        $config['upload_path'] = './uploads/customer/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("homecare_product_id" => $homecare_product_id, "designation" => $designation, "photo" => $slider_image, "name" => $name, "text" => $text, "link" => $link, "status" => $status);
            $this->admin_model->insert_data('homecare_happy_customers', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/homecare_happy_customers');
    }

    public function update_homecare_happy_customers() {
        $homecare_product_id = $this->input->post('homecare_product_id');
        $customer_id = $this->input->post('customer_id');
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $link = $this->input->post('link');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $banner = $this->input->post('banner');

        $designation = $this->input->post('designation');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/customer/';
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

                $data = array("homecare_product_id" => $homecare_product_id, "designation" => $designation, "photo" => $slider_image, "name" => $name, "text" => $text, "link" => $link, "status" => $status);
                $this->admin_model->update_data('homecare_happy_customers', $data, 'customer_id', $customer_id);
                $target_path = "./uploads/customer/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("homecare_product_id" => $homecare_product_id, "designation" => $designation, "name" => $name, "text" => $text, "link" => $link, "status" => $status);
            $this->admin_model->update_data('homecare_happy_customers', $data, 'customer_id', $customer_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/homecare_happy_customers');
    }

    public function delete_homecare_happy_customers() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('homecare_happy_customers', 'customer_id', $id);
            $target_path = "./uploads/customer/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/homecare_happy_customers');
    }

    //////////////////////////////////////courses_offered////////////////

    function courses_offered() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));
        $data['result'] = $this->admin_model->select_data_where_result('courses_offered', 'courses_offered_status', 'active');
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('courses_offered', 'courses_offered_id', $id);
            $data['courses_offered_id'] = $id;
            $data['show_form'] = '0';
        } else {
            $data['edit'] = "";
            $data['show_form'] = count($data['result']);
        }


        $this->load->view('admin/header');
        $this->load->view('admin/courses_offered', $data);
        $this->load->view('admin/footer');
    }

    function add_courses_offered() {
        $banner_title = $this->input->post('banner_title');
        $banner_bold_title = $this->input->post('banner_bold_title');
        $banner_text = $this->input->post('banner_text');
        $paragraph_title = $this->input->post('paragraph_title');
        $status = $this->input->post('status');
        $paragraph_text = $this->input->post('paragraph_text');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');

//Image Config 
        $config['upload_path'] = './uploads/courses/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $image = $upload_data['file_name'];
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner_title" => $banner_title, "banner" => $image, "banner_bold_title" => $banner_bold_title, "banner_text" => $banner_text, "paragraph_title" => $paragraph_title, "paragraph_text" => $paragraph_text, "courses_offered_status" => $status);
            $this->admin_model->insert_data('courses_offered', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }



        redirect('admin/home/courses_offered');
    }

    public function update_courses_offered() {
        $courses_offered_id = $this->input->post('courses_offered_id');
        $banner_title = $this->input->post('banner_title');
        $banner_bold_title = $this->input->post('banner_bold_title');
        $banner_text = $this->input->post('banner_text');
        $paragraph_title = $this->input->post('paragraph_title');
        $status = $this->input->post('status');
        $paragraph_text = $this->input->post('paragraph_text');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');

        $banner = $this->input->post('banner');

        $designation = $this->input->post('designation');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/courses/';
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
                $image1 = $upload_data['file_name'];
                $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner_title" => $banner_title, "banner" => $image1, "banner_bold_title" => $banner_bold_title, "banner_text" => $banner_text, "paragraph_title" => $paragraph_title, "paragraph_text" => $paragraph_text, "courses_offered_status" => $status);
                $this->admin_model->update_data('courses_offered', $data, 'courses_offered_id', $courses_offered_id);
                $target_path = "./uploads/courses/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {

            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "banner_title" => $banner_title, "banner_bold_title" => $banner_bold_title, "banner_text" => $banner_text, "paragraph_title" => $paragraph_title, "paragraph_text" => $paragraph_text, "courses_offered_status" => $status);
            $this->admin_model->update_data('courses_offered', $data, 'courses_offered_id', $courses_offered_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/courses_offered');
    }

    public function delete_courses_offered() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('courses_offered', 'courses_offered_id', $id);
            $target_path = "./uploads/customer/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/courses_offered');
    }

    //////////////////////////////////////courses_offered List////////////////

    function courses_offered_lists() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('courses_offered_list', 'courses_offered_list_id', $id);
            $data['step_id'] = $id;
            $data['courses_offered_list_id'] = $id;
        } else {
            $data['edit'] = "";
            $data['courses_offered_list_id'] = $id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('courses_offered_list', 'courses_offered_id', $product_id, 'courses_offered', 'courses_offered_id');
//$data['result'] = $this->admin_model->select_data_where_result('services_steps', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/courses_offered_lists', $data);
        $this->load->view('admin/footer');
    }

    function add_courses_offered_lists() {
        $courses_offered_id = $this->input->post('courses_offered_id');
        $status = $this->input->post('status');
        $course_title = $this->input->post('course_title');

        $intro_text = $this->input->post('intro_text');
        $duration = $this->input->post('duration');
        $cost = $this->input->post('cost');


        ////Image Config 
        $config['upload_path'] = './uploads/courses/';
        $config['allowed_types'] = 'gif|jpg|png|jpes';
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
            $image = $upload_data['file_name'];
            $data = array("course_banner" => $image, "courses_offered_id" => $courses_offered_id, "course_title" => $course_title, "intro_text" => $intro_text, "duration" => $duration, "cost" => $cost, "courses_offered_list_status" => $status);
            $this->admin_model->insert_data('courses_offered_list', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }


        redirect('admin/home/courses_offered_lists/' . base64_encode($courses_offered_id));
    }

    public function update_courses_offered_lists() {
        $courses_offered_list_id = $this->input->post('courses_offered_list_id');
        $courses_offered_id = $this->input->post('courses_offered_id');
        $status = $this->input->post('status');
        $course_title = $this->input->post('course_title');

        $intro_text = $this->input->post('intro_text');
        $duration = $this->input->post('duration');
        $cost = $this->input->post('cost');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/courses/';
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
                $image = $upload_data['file_name'];
                $data = array("course_banner" => $image, "courses_offered_id" => $courses_offered_id, "course_title" => $course_title, "intro_text" => $intro_text, "duration" => $duration, "cost" => $cost, "courses_offered_list_status" => $status);
                $this->admin_model->update_data('courses_offered_list', $data, 'courses_offered_list_id', $courses_offered_list_id);

                $target_path = "./uploads/homecare/" . basename($image_name);
                unlink($target_path);

                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("courses_offered_id" => $courses_offered_id, "course_title" => $course_title, "intro_text" => $intro_text, "duration" => $duration, "cost" => $cost, "courses_offered_list_status" => $status);
            $this->admin_model->update_data('courses_offered_list', $data, 'courses_offered_list_id', $courses_offered_list_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/courses_offered_lists/' . base64_encode($courses_offered_id));
    }

    public function delete_courses_offered_lists() {
        $courses_offered_id = $this->uri->segment("4");
        $courses_offered_list_id = base64_decode($this->uri->segment("5"));
        $image_name = base64_decode($this->uri->segment("6"));
        if (!empty($courses_offered_list_id)) {
            $this->admin_model->delete_data('courses_offered_list', 'courses_offered_list_id', $courses_offered_list_id);
            $target_path = "./uploads/courses/" . basename($image_name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/courses_offered_lists/' . $courses_offered_id);
    }

    /////////////////////////////////////Media////////////////

    function education_show() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('education_show', 'education_show_id', $id);
            $data['education_show_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('education_show');
        $this->load->view('admin/header');
        $this->load->view('admin/education_show', $data);
        $this->load->view('admin/footer');
    }

    function add_education_show() {
//  $service_id = $this->input->post('service_id');
        $title = $this->input->post('title');
        $date = $this->input->post('publish_date');
        $place = $this->input->post('place');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $publish_date = date("Y-m-d", strtotime($date));
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
//Image Config 
        $config['upload_path'] = './uploads/education/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "photo" => $slider_image, "title" => $title, "publish_date" => $publish_date, "place" => $place, "text" => $text, "education_show_status" => $status);
            $this->admin_model->insert_data('education_show', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/education_show');
    }

    public function update_education_show() {
        $education_show_id = $this->input->post('education_show_id');
        $title = $this->input->post('title');
        $date = $this->input->post('publish_date');
        $place = $this->input->post('place');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $file = $_FILES['userfile']['name'];
        $publish_date = date("Y-m-d", strtotime($date));
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/education/';
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

                $data = array("photo" => $slider_image, "title" => $title, "publish_date" => $publish_date, "place" => $place, "text" => $text, "education_show_status" => $status, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword);
                $this->admin_model->update_data('education_show', $data, 'education_show_id', $education_show_id);
                $target_path = "./uploads/education/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("title" => $title, "publish_date" => $publish_date, "place" => $place, "text" => $text, "education_show_status" => $status, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword);
            $this->admin_model->update_data('education_show', $data, 'education_show_id', $education_show_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/education_show');
    }

    public function delete_education_show() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('education_show', 'education_show_id', $id);
            $target_path = "./uploads/education/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/education_show');
    }

    /////////////////////////////////////////////////////////education_show_slider//////////////////
    function education_show_slider() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('education_show_slider', 'education_show_id', $id);
            $data['slider_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('education_show_slider', 'education_show_id', $product_id, 'education_show', 'education_show_id');
//$data['result'] = $this->admin_model->select_data_where_result('services_steps', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/education_show_slider', $data);
        $this->load->view('admin/footer');
    }

    function add_education_show_slider() {
        $education_show_id = $this->input->post('education_show_id');
        $status = $this->input->post('status');

        ////Image Config 
        $config['upload_path'] = './uploads/education/';
        $config['allowed_types'] = 'gif|jpg|png|jpes';
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
            $image = $upload_data['file_name'];
            $data = array("slider_image" => $image, "status" => $status, "education_show_id" => $education_show_id);
            $this->admin_model->insert_data('education_show_slider', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/education_show_slider/' . base64_encode($education_show_id));
    }

    public function delete_education_show_slider() {
        $education_show_id = $this->uri->segment("4");
        $slider_id = base64_decode($this->uri->segment("5"));
        $image_name = base64_decode($this->uri->segment("6"));
        if (!empty($slider_id)) {
            $this->admin_model->delete_data('education_show_slider', 'slider_id', $slider_id);
            $target_path = "./uploads/education/" . basename($image_name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/education_show_slider/' . $education_show_id);
    }

    /////////////////////////////////////center_city////////////////
    function center_city() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('center_city', 'city_id', $id);
            $data['city_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('center_city');
        $this->load->view('admin/header');
        $this->load->view('admin/center_city', $data);
        $this->load->view('admin/footer');
    }

    function add_center_city() {
        $city_name = $this->input->post('city_name');
        $status = $this->input->post('status');
        $data = array("city_name" => $city_name, "city_status" => $status);
        $this->admin_model->insert_data('center_city', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/center_city');
    }

    public function update_center_city() {
        $city_id = $this->input->post('city_id');
        $city_name = $this->input->post('city_name');
        $status = $this->input->post('status');
        $data = array("city_name" => $city_name, "city_status" => $status);
        $this->admin_model->update_data('center_city', $data, 'city_id', $city_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/center_city');
    }

    public function delete_center_city() {
        $id = base64_decode($this->uri->segment("4"));
        if (!empty($id)) {
            $this->admin_model->delete_data('center_city', 'city_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/center_city');
    }

    /////////////////////////////////////center_details////////////////
    function center_details() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('center_details', 'center_id', $id);
            $data['center_id'] = $id;
        } else {
            $data['edit'] = "";
        }
        $data['city'] = $this->admin_model->select_data_where_result('center_city', 'city_status', 'active');
        $data['result'] = $this->admin_model->select_data('center_details');

        $this->load->view('admin/header');
        $this->load->view('admin/center_details', $data);
        $this->load->view('admin/footer');
    }

    function add_center_details() {
        $city_id = $this->input->post('city_id');
        $center_name = $this->input->post('center_name');
        $center_area = $this->input->post('center_area');
        $center_address = $this->input->post('center_address');
        $center_number = $this->input->post('center_number');
        $status = $this->input->post('status');
        $data = array("city_id" => $city_id, "center_name" => $center_name, "center_area" => $center_area, "center_address" => $center_address, "center_number" => $center_number, "center_status" => $status);
        $this->admin_model->insert_data('center_details', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/center_details');
    }

    public function update_center_details() {
        $city_id = $this->input->post('city_id');
        $center_id = $this->input->post('center_id');
        $center_name = $this->input->post('center_name');
        $center_area = $this->input->post('center_area');
        $center_address = $this->input->post('center_address');
        $center_number = $this->input->post('center_number');
        $status = $this->input->post('status');
        $data = array("city_id" => $city_id, "center_name" => $center_name, "center_area" => $center_area, "center_address" => $center_address, "center_number" => $center_number, "center_status" => $status);
        $this->admin_model->update_data('center_details', $data, 'center_id', $center_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/center_details');
    }

    public function delete_center_details() {
        $id = base64_decode($this->uri->segment("4"));
        if (!empty($id)) {
            $this->admin_model->delete_data('center_details', 'center_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/center_details');
    }

    /////////////////////////////////////Store Locator////////////////
    function salon_locator() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('salon_locator', 'id', $id);
            $data['id'] = $id;
        } else {
            $data['edit'] = "";
        }
        $data['city'] = $this->admin_model->select_data_where_result('center_city', 'city_status', 'active');
        $data['result'] = $this->admin_model->select_data('salon_locator');

        $this->load->view('admin/header');
        $this->load->view('admin/salon_locator', $data);
        $this->load->view('admin/footer');
    }

    function add_salon_locator() {
        $city_id = $this->input->post('city_id');
        $center_name = $this->input->post('center_name');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $center_address = $this->input->post('center_address');
        $center_number = $this->input->post('center_number');
        $status = $this->input->post('status');
        $data = array("lat" => $lat, "lng" => $lng, "city_id" => $city_id, "name" => $center_name, "address" => $center_address, "number" => $center_number, "status" => $status);
        $this->admin_model->insert_data('salon_locator', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/salon_locator');
    }

    public function update_salon_locator() {
        $id = $this->input->post('id');
        $city_id = $this->input->post('city_id');
        $center_name = $this->input->post('center_name');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $center_address = $this->input->post('center_address');
        $center_number = $this->input->post('center_number');
        $status = $this->input->post('status');
        $data = array("lat" => $lat, "lng" => $lng, "city_id" => $city_id, "name" => $center_name, "address" => $center_address, "number" => $center_number, "status" => $status);
        $this->admin_model->update_data('salon_locator', $data, 'id', $id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/salon_locator');
    }

    public function delete_salon_locator() {
        $id = base64_decode($this->uri->segment("4"));
        if (!empty($id)) {
            $this->admin_model->delete_data('salon_locator', 'id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/salon_locator');
    }

    /////////////////////////////////////////////////////////education_show_slider//////////////////
    function center_gallery() {
//==============For Edit=============
        $product_id = base64_decode($this->uri->segment("4"));
        $id = base64_decode($this->uri->segment("5"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('center_gallery', 'center_gallery_id', $id);
            $data['center_gallery_id'] = $id;
            $data['product_id'] = $product_id;
        } else {
            $data['edit'] = "";
            $data['product_id'] = $product_id;
        }
        $data['result'] = $this->admin_model->getJoinDataWhereResult('center_gallery', 'center_id', $product_id, 'center_details', 'center_id');
//$data['result'] = $this->admin_model->select_data_where_result('services_steps', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/center_gallery', $data);
        $this->load->view('admin/footer');
    }

    function add_center_gallery() {
        $center_id = $this->input->post('center_id');
        ////Image Config 
        $config['upload_path'] = './uploads/tcenter/';
        $config['allowed_types'] = 'gif|jpg|png|jpes';
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
            $image = $upload_data['file_name'];
            $data = array("image" => $image, "center_id" => $center_id);
            $this->admin_model->insert_data('center_gallery', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/center_gallery/' . base64_encode($center_id));
    }

    public function delete_center_gallery() {
        $center_id = $this->uri->segment("4");
        $center_gallery_id = base64_decode($this->uri->segment("5"));
        $image_name = base64_decode($this->uri->segment("6"));
        if (!empty($center_id)) {
            $this->admin_model->delete_data('center_gallery', 'center_gallery_id', $center_gallery_id);
            $target_path = "./uploads/tcenter/" . basename($image_name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/center_gallery/' . $center_id);
    }

    ////////////////////////////////////////////////////flagship_slider//////////////////
    function flagship_slider() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('flagship_slider', 'flagship_slider_id', $id);
            $data['slider_id'] = $id;
        } else {
            $data['edit'] = "";
        }
//==============Get All data=============
        $data['result'] = $this->admin_model->select_data('flagship_slider', 'flagship_status', 'active');
        $this->load->view('admin/header');
        $this->load->view('admin/flagship_slider', $data);
        $this->load->view('admin/footer');
    }

    public function add_flagship_slider() {
        $title = $this->input->post('title');
        $status = $this->input->post('status');

        //Image Config 
        $config['upload_path'] = './uploads/flagship/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("title" => $title, "image" => $slider_image, "flagship_status" => $status);
            $this->admin_model->insert_data('flagship_slider', $data);
            $this->session->set_flashdata('message', 'Images Uploaded Successfully');
        }
        redirect('admin/home/flagship_slider');
    }

    public function update_flagship_slider() {
        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $flagship_slider_id = $this->input->post('flagship_slider_id');
        $file = $_FILES['userfile']['name'];
        //File is not empty
        if ($file) {
            //Image Config 
            $config['upload_path'] = './uploads/flagship/';
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
                $data = array("title" => $title, "image" => $slider_image, "flagship_status" => $status);
                $this->admin_model->update_data('flagship_slider', $data, 'flagship_slider_id', $flagship_slider_id);
                $this->session->set_flashdata('message', 'Slider Updated Successfully');
            }
        } else {
            $data = array("title" => $title, "flagship_status" => $status);
            $this->admin_model->update_data('flagship_slider', $data, 'flagship_slider_id', $flagship_slider_id);
            $this->session->set_flashdata('message', 'Slider Updated Successfully');
        }

        redirect('admin/home/flagship_slider');
    }

    public function delete_flagship_slider() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('flagship_slider', 'flagship_slider_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }

//To remove the file from folder
        $target_path = "./uploads/flagship/" . basename($name);
        unlink($target_path);
        redirect("admin/home/flagship_slider");
    }

    ////////////////////////////////////////////////////why_flagship//////////////////
    function why_flagship() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('flagship_why', 'flagship_why_id', $id);
            $data['flagship_why_id'] = $id;
        } else {
            $data['edit'] = "";
        }
//==============Get All data=============
        $data['result'] = $this->admin_model->select_data('flagship_why', 'status', 'active');
        $this->load->view('admin/header');
        $this->load->view('admin/why_flagship', $data);
        $this->load->view('admin/footer');
    }

    public function add_why_flagship() {
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $status = $this->input->post('status');

//Image Config 
        $config['upload_path'] = './uploads/flagship/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array('text' => $text, "title" => $title, "image" => $slider_image, "status" => $status);
            $this->admin_model->insert_data('flagship_why', $data);
            $this->session->set_flashdata('message', 'Data Uploaded Successfully');
        }
        redirect('admin/home/why_flagship');
    }

    public function update_why_flagship() {
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $flagship_why_id = $this->input->post('flagship_why_id');
        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/flagship/';
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
                $data = array('text' => $text, "title" => $title, "image" => $slider_image, "status" => $status);
                $this->admin_model->update_data('flagship_why', $data, 'flagship_why_id', $flagship_why_id);
                $this->session->set_flashdata('message', 'Slider Updated Successfully');
            }
        } else {
            $data = array('text' => $text, "title" => $title, "status" => $status);
            $this->admin_model->update_data('flagship_why', $data, 'flagship_why_id', $flagship_why_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/why_flagship');
    }

    public function delete_why_flagship() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('flagship_why', 'flagship_why_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }

//To remove the file from folder
        $target_path = "./uploads/flagship/" . basename($name);
        unlink($target_path);
        redirect("admin/home/why_flagship");
    }

    ////////////////////////////////////////////////////flagship_slider//////////////////
    function flagship_experience() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('flagship_experience', 'flagship_experience_id', $id);
            $data['slider_id'] = $id;
        } else {
            $data['edit'] = "";
        }
//==============Get All data=============
        $data['result'] = $this->admin_model->select_data('flagship_experience', 'status', 'active');
        // print_r($data['result']);die;
        $this->load->view('admin/header');
        $this->load->view('admin/flagship_experience', $data);
        $this->load->view('admin/footer');
    }

    public function add_flagship_experience() {
        $text = $this->input->post('text');
        $status = $this->input->post('status');

//Image Config 
        $config['upload_path'] = './uploads/flagship/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("text" => $text, "image" => $slider_image, "status" => $status);
            $this->admin_model->insert_data('flagship_experience', $data);
            $this->session->set_flashdata('message', 'Images Uploaded Successfully');
        }
        redirect('admin/home/flagship_experience');
    }

    public function update_flagship_experience() {
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $flagship_experience_id = $this->input->post('flagship_experience_id');
        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/flagship/';
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
                $data = array("text" => $text, "image" => $slider_image, "status" => $status);
                $this->admin_model->update_data('flagship_experience', $data, 'flagship_experience_id', $flagship_experience_id);
                $this->session->set_flashdata('message', 'Slider Updated Successfully');
            }
        } else {
            $data = array("text" => $text, "status" => $status);
            $this->admin_model->update_data('flagship_experience', $data, 'flagship_experience_id', $flagship_experience_id);
            $this->session->set_flashdata('message', 'Slider Updated Successfully');
        }

        redirect('admin/home/flagship_experience');
    }

    public function delete_flagship_experience() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('flagship_experience', 'flagship_experience_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }

//To remove the file from folder
        $target_path = "./uploads/flagship/" . basename($name);
        unlink($target_path);
        redirect("admin/home/flagship_experience");
    }

    /////////////////////////////////////center_details////////////////
    function flagship_store() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('flagship_store', 'center_id', $id);
            $data['center_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('flagship_store');

        $this->load->view('admin/header');
        $this->load->view('admin/flagship_store', $data);
        $this->load->view('admin/footer');
    }

    function add_flagship_store() {
        $store_open_time1 = $this->input->post('store_open_time1');
        $store_open_time2 = $this->input->post('store_open_time2');
        $center_name = $this->input->post('center_name');
        $email = $this->input->post('email');
        $center_address = $this->input->post('center_address');
        $center_number = $this->input->post('center_number');
        $status = $this->input->post('status');
        $data = array("store_open_time2" => $store_open_time2, "store_open_time1" => $store_open_time1, "center_name" => $center_name, "email" => $email, "center_address" => $center_address, "center_number" => $center_number, "center_status" => $status);
        $this->admin_model->insert_data('flagship_store', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/flagship_store');
    }

    public function update_flagship_store() {
        $center_id = $this->input->post('center_id');
        $store_open_time1 = $this->input->post('store_open_time1');
        $store_open_time2 = $this->input->post('store_open_time2');
        $center_name = $this->input->post('center_name');
        $email = $this->input->post('email');
        $center_address = $this->input->post('center_address');
        $center_number = $this->input->post('center_number');
        $status = $this->input->post('status');
        $data = array("store_open_time2" => $store_open_time2, "store_open_time1" => $store_open_time1, "center_name" => $center_name, "email" => $email, "center_address" => $center_address, "center_number" => $center_number, "center_status" => $status);
        $this->admin_model->update_data('flagship_store', $data, 'center_id', $center_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/flagship_store');
    }

    public function delete_flagship_store() {
        $id = base64_decode($this->uri->segment("4"));
        if (!empty($id)) {
            $this->admin_model->delete_data('flagship_store', 'center_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/flagship_store');
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

        $category_slug = strtolower(str_replace(" ", "-", $title));

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
        $category_slug = strtolower(str_replace(" ", "-", $title));
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

        $post_slug = strtolower(str_replace(" ", "-", $post_title));
        $post_text = trim($this->input->post('post_text'));
        $post_author = $this->input->post('post_author');
        $status = $this->input->post('status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $is_featured = $this->input->post('is_featured');
        $post_author = 1;
        //Image Config 
        $config['upload_path'] = './uploads/blog/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("post_slug" => $post_slug, "is_featured" => $is_featured, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "image" => $slider_image, "post_date" => $this->date, "category_id" => $category_id, "post_title" => $post_title, "post_text" => $post_text, "post_author" => $post_author, "post_status" => $status);
            $this->admin_model->insert_data('blog_post', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/blog_posts');
    }

    public function update_blog_posts() {
        $post_id = $this->input->post('post_id');
        $category_id = $this->input->post('category_id');
        $post_title = trim($this->input->post('post_title'));
        $post_slug = strtolower(str_replace(" ", "-", $post_title));
        $post_text = trim($this->input->post('post_text'));
        $post_author = $this->input->post('post_author');
        $status = $this->input->post('status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $banner = $this->input->post('image');
        $is_featured = $this->input->post('is_featured');
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

                $data = array("post_slug" => $post_slug, "is_featured" => $is_featured, "image" => $slider_image, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "post_date" => $this->date, "category_id" => $category_id, "post_title" => $post_title, "post_text" => $post_text, "post_author" => $post_author, "post_status" => $status);
                $this->admin_model->update_data('blog_post', $data, 'post_id', $post_id);
                $target_path = "./uploads/blog/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("post_slug" => $post_slug, "is_featured" => $is_featured, "meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "post_date" => $this->date, "category_id" => $category_id, "post_title" => $post_title, "post_text" => $post_text, "post_author" => $post_author, "post_status" => $status);
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

    ///////////////////////////////////////Blog Slider////////////////
//
    function blog_slider() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('blog_slider', 'blog_slider_id', $id);
            $data['post_id'] = $id;
        } else {
            $data['edit'] = "";
        }
        $data['category'] = $this->admin_model->select_data('blog_post');
        // $data['result'] = $this->admin_model->select_data('blog_slider');
        $data['result'] = $this->admin_model->getJoinDataBlog('blog_slider', 'post_id', 'blog_post', 'post_id');
        $this->load->view('admin/header');
        $this->load->view('admin/blog_slider', $data);
        $this->load->view('admin/footer');
    }

    function add_blog_slider() {
        $post_id = $this->input->post('post_id');
        $status = $this->input->post('status');

        //Image Config 
        $config['upload_path'] = './uploads/blog/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("post_id" => $post_id, "image" => $slider_image, "status" => $status);
            $this->admin_model->insert_data('blog_slider', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/blog_slider');
    }

    public function update_blog_slider() {
        $blog_slider_id = $this->input->post('blog_slider_id');
        $post_id = $this->input->post('post_id');
        $banner = $this->input->post('image');
        $status = $this->input->post('status');

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

                $data = array("post_id" => $post_id, "image" => $slider_image, "status" => $status);
                $this->admin_model->update_data('blog_slider', $data, 'blog_slider_id', $blog_slider_id);
                $target_path = "./uploads/blog/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("post_id" => $post_id, "status" => $status);
//      print_r($data);die;
            $this->admin_model->update_data('blog_slider', $data, 'blog_slider_id', $blog_slider_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }

        redirect('admin/home/blog_slider');
    }

    public function delete_blog_slider() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('blog_slider', 'blog_slider_id', $id);
            $target_path = "./uploads/blog/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/blog_slider');
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
            $this->admin_model->delete_data('user', $data, 'user_id', $user_id);

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
            $this->admin_model->delete_data('blog_comments', $data, 'comment_id', $id);

            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/blog_comments');
    }

    ///////////////////////////////////// Innovative treatments////////////////

    function innovative_treatments() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));
        $data['result'] = $this->admin_model->select_data('insta_page');
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('insta_page', 'page_id', $id);
            $data['page_id'] = $id;
            $data['show_form'] = '0';
        } else {
            $data['edit'] = "";
            $data['show_form'] = count($data['result']);
        }


        $this->load->view('admin/header');
        $this->load->view('admin/innovative_treatments', $data);
        $this->load->view('admin/footer');
    }

    function add_innovative_treatments() {
        $bold_text = $this->input->post('bold_text');
        $normal_text = $this->input->post('normal_text');
        $image_below_text = $this->input->post('image_below_text');
        $service_offerd_top_text = $this->input->post('service_offerd_top_text');
        $service_offerd_bottom_text = $this->input->post('service_offerd_bottom_text');
        $status = $this->input->post('status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
//Image Config 
        $config['upload_path'] = './uploads/common/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "image" => $slider_image, "bold_text" => $bold_text, "normal_text" => $normal_text, "image_below_text" => $image_below_text, "service_offerd_top_text" => $service_offerd_top_text, "service_offerd_bottom_text" => $service_offerd_bottom_text, "insta_status" => $status);
            $this->admin_model->insert_data('insta_page', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/innovative_treatments');
    }

    public function update_innovative_treatments() {
        $page_id = $this->input->post('page_id');
        $bold_text = $this->input->post('bold_text');
        $normal_text = $this->input->post('normal_text');
        $image_below_text = $this->input->post('image_below_text');
        $service_offerd_top_text = $this->input->post('service_offerd_top_text');
        $service_offerd_bottom_text = $this->input->post('service_offerd_bottom_text');
        $status = $this->input->post('status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $banner = $this->input->post('banner');
        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/common/';
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

                $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "image" => $slider_image, "bold_text" => $bold_text, "normal_text" => $normal_text, "image_below_text" => $image_below_text, "service_offerd_top_text" => $service_offerd_top_text, "service_offerd_bottom_text" => $service_offerd_bottom_text, "insta_status" => $status);
                $this->admin_model->update_data('insta_page', $data, 'page_id', $page_id);
                $target_path = "./uploads/common/" . basename($banner);
                unlink($target_path);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "bold_text" => $bold_text, "normal_text" => $normal_text, "image_below_text" => $image_below_text, "service_offerd_top_text" => $service_offerd_top_text, "service_offerd_bottom_text" => $service_offerd_bottom_text, "insta_status" => $status);
            $this->admin_model->update_data('insta_page', $data, 'page_id', $page_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/innovative_treatments');
    }

    public function delete_innovative_treatments() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        if (!empty($id)) {
            $this->admin_model->delete_data('insta_page', 'page_id', $id);
            $target_path = "./uploads/common/" . basename($name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/innovative_treatments');
    }

/////////////////////////////////////insta_services////////////////

    function insta_services() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));

        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('insta_services', 'insta_service_id', $id);
            $data['service_id'] = $id;
        } else {
            $data['edit'] = "";
        }

        $data['result'] = $this->admin_model->select_data('insta_services');
        $this->load->view('admin/header');
        $this->load->view('admin/insta_services', $data);
        $this->load->view('admin/footer');
    }

    function add_insta_services() {
//  $service_id = $this->input->post('service_id');
        $service_name = $this->input->post('service_name');
        $service_heading = $this->input->post('service_heading');
        $text = $this->input->post('text');
        $status = $this->input->post('status');
        $data = array("service_name" => $service_name, "service_heading" => $service_heading, "text" => $text, "service_status" => $status);
        $this->admin_model->insert_data('insta_services', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/insta_services');
    }

    public function update_insta_services() {
        $service_id = $this->input->post('insta_services_id');
        $service_name = $this->input->post('service_name');
        $service_heading = $this->input->post('service_heading');
        $text = $this->input->post('text');
        $status = $this->input->post('status');

        $data = array("service_name" => $service_name, "service_heading" => $service_heading, "text" => $text, "service_status" => $status);
        $this->admin_model->update_data('insta_services', $data, 'insta_service_id', $service_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/insta_services');
    }

    public function delete_insta_services() {
        $id = base64_decode($this->uri->segment("4"));

        if (!empty($id)) {
            $this->admin_model->delete_data('insta_services', 'insta_service_id', $id);

            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/insta_services');
    }

    /////////////////////////////////////Add homecare Benefits inner Page////////////////

    function insta_points() {
//==============For Edit=============

        $id = base64_decode($this->uri->segment("4"));
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('insta_points', 'insta_points_id', $id);
            $data['insta_points_id'] = $id;
        } else {
            $data['edit'] = "";
        }
        $data['result'] = $this->admin_model->select_data('insta_points');
//$data['result'] = $this->admin_model->select_data_where_result('services_steps', 'services_product_inner_id', $product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/insta_points', $data);
        $this->load->view('admin/footer');
    }

    function add_insta_points() {
        $point_title = $this->input->post('point_title');
        $status = $this->input->post('status');

        ////Image Config 
        $config['upload_path'] = './uploads/common/';
        $config['allowed_types'] = 'gif|jpg|png|jpes';
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
            $image = $upload_data['file_name'];
            $data = array("point_photos" => $image, "point_title" => $point_title, "point_status" => $status);
            $this->admin_model->insert_data('insta_points', $data);
            $this->session->set_flashdata('message', 'Data added Successfully');
        }
        redirect('admin/home/insta_points/');
    }

    public function update_insta_points() {
        $insta_points_id = $this->input->post('insta_points_id');
        $point_title = $this->input->post('point_title');
        $status = $this->input->post('status');
        $image_name = $this->input->post('point_photos');

        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/common/';
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
                $image = $upload_data['file_name'];
                $data = array("point_photos" => $image, "point_title" => $point_title, "point_status" => $status);
                $this->admin_model->update_data('insta_points', $data, 'insta_points_id', $insta_points_id);

                $target_path = "./uploads/common/" . basename($image_name);
                unlink($target_path);

                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("point_title" => $point_title, "point_status" => $status);
            $this->admin_model->update_data('insta_points', $data, 'insta_points_id', $insta_points_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }
        redirect('admin/home/insta_points/');
    }

    public function delete_insta_points() {
        $insta_points_id = base64_decode($this->uri->segment("4"));

        $image_name = base64_decode($this->uri->segment("5"));
        if (!empty($insta_points_id)) {
            $this->admin_model->delete_data('insta_points', 'insta_points_id', $insta_points_id);
            $target_path = "./uploads/homecare/" . basename($image_name);
            unlink($target_path);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/insta_points/');
    }

    /////////////////////////////////////insta_services////////////////

    function business_support() {
//==============For Edit=============
        $id = base64_decode($this->uri->segment("4"));
        $data['result'] = $this->admin_model->select_data('business_support');
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('business_support', 'business_support_id', $id);
            $data['business_support_id'] = $id;
            $data['show_form'] = '0';
        } else {
            $data['edit'] = "";
            $data['show_form'] = count($data['result']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/business_support', $data);
        $this->load->view('admin/footer');
    }

    function add_business_support() {
//  $service_id = $this->input->post('service_id');
        $flagship_stores_text = $this->input->post('flagship_stores_text');
        $flagship_stores_sub_text = $this->input->post('flagship_stores_sub_text');
        $business_development_text = $this->input->post('business_development_text');
        $business_development_sub_text = $this->input->post('business_development_sub_text');
        $Professionalising_salon_text = $this->input->post('Professionalising_salon_text');
        $status = $this->input->post('status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "flagship_stores_text" => $flagship_stores_text, "flagship_stores_sub_text" => $flagship_stores_sub_text, "business_development_text" => $business_development_text, "business_development_sub_text" => $business_development_sub_text, "Professionalising_salon_text" => $Professionalising_salon_text, "business_support_status" => $status);
        $this->admin_model->insert_data('business_support', $data);
        $this->session->set_flashdata('message', 'Data added Successfully');
        redirect('admin/home/business_support');
    }

    public function update_business_support() {
        $business_support_id = $this->input->post('business_support_id');
        $flagship_stores_text = $this->input->post('flagship_stores_text');
        $flagship_stores_sub_text = $this->input->post('flagship_stores_sub_text');
        $business_development_text = $this->input->post('business_development_text');
        $business_development_sub_text = $this->input->post('business_development_sub_text');
        $Professionalising_salon_text = $this->input->post('Professionalising_salon_text');
        $status = $this->input->post('status');
        $meta_title = $this->input->post('meta_title');
        $meta_description = $this->input->post('meta_description');
        $meta_keyword = $this->input->post('meta_keyword');
        $data = array("meta_title" => $meta_title, "meta_description" => $meta_description, "meta_keyword" => $meta_keyword, "flagship_stores_text" => $flagship_stores_text, "flagship_stores_sub_text" => $flagship_stores_sub_text, "business_development_text" => $business_development_text, "business_development_sub_text" => $business_development_sub_text, "Professionalising_salon_text" => $Professionalising_salon_text, "business_support_status" => $status);
        $this->admin_model->update_data('business_support', $data, 'business_support_id', $business_support_id);
        $this->session->set_flashdata('message', 'Data Updated Successfully');
        redirect('admin/home/business_support');
    }

    public function delete_business_support() {
        $id = base64_decode($this->uri->segment("4"));
        if (!empty($id)) {
            $this->admin_model->delete_data('business_support', 'business_support_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }
        redirect('admin/home/business_support');
    }

    //==============business_support Images Text =============
    function business_support_slider() {

        $id = base64_decode($this->uri->segment("4"));
        $data['result'] = $this->admin_model->select_data_where_result('business_support_slider', 'type', 'top_slider');
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('business_support_slider', 'business_support_slider_id', $id);
            $data['slider_id'] = $id;
        } else {
            $data['edit'] = "";
        }
//==============Get All data=============

        $this->load->view('admin/header');
        $this->load->view('admin/business_support_slider', $data);
        $this->load->view('admin/footer');
    }

    function business_advantage() {

        $id = base64_decode($this->uri->segment("4"));
        $data['result'] = $this->admin_model->select_data_where_result('business_support_slider', 'type', 'advantage');
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('business_support_slider', 'business_support_slider_id', $id);
            $data['business_support_slider_id'] = $id;
            $data['show_form'] = '0';
        } else {
            $data['edit'] = "";
            $data['show_form'] = count($data['result']);
        }
//==============Get All data=============

        $this->load->view('admin/header');
        $this->load->view('admin/advantage', $data);
        $this->load->view('admin/footer');
    }

    function business_promotions() {

        $id = base64_decode($this->uri->segment("4"));
        $data['result'] = $this->admin_model->select_data_where_result('business_support_slider', 'type', 'promotions');
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('business_support_slider', 'business_support_slider_id', $id);
            $data['business_support_slider_id'] = $id;
            $data['show_form'] = '0';
        } else {
            $data['edit'] = "";
            $data['show_form'] = count($data['result']);
        }
//==============Get All data=============

        $this->load->view('admin/header');
        $this->load->view('admin/business_promotions', $data);
        $this->load->view('admin/footer');
    }

    function business_insta_wow() {

        $id = base64_decode($this->uri->segment("4"));
        $data['result'] = $this->admin_model->select_data_where_result('business_support_slider', 'type', 'insta_wow');
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('business_support_slider', 'business_support_slider_id', $id);
            $data['business_support_slider_id'] = $id;
            $data['show_form'] = '0';
        } else {
            $data['edit'] = "";
            $data['show_form'] = count($data['result']);
        }
//==============Get All data=============

        $this->load->view('admin/header');
        $this->load->view('admin/business_insta_wow', $data);
        $this->load->view('admin/footer');
    }

    function business_bottom_slider() {
        $id = base64_decode($this->uri->segment("4"));
        $data['result'] = $this->admin_model->select_data_where_result('business_support_slider', 'type', 'bootom_slider');
        if ($id != "") {
            $data['edit'] = $this->admin_model->select_data_where('business_support_slider', 'business_support_slider_id', $id);
            $data['business_support_slider_id'] = $id;
        } else {
            $data['edit'] = "";
        }
        $this->load->view('admin/header');
        $this->load->view('admin/business_bottom_slider', $data);
        $this->load->view('admin/footer');
    }

    public function add_business_support_slider() {
        $redirect = $this->input->post('redirect');
        $type = $this->input->post('type');
        if ($type == 'top_slider') {
            $business_support_photos_title = "-";
            $business_support_photos_text = "-";
        } else {
            $business_support_photos_title = $this->input->post('business_support_photos_title');
            $business_support_photos_text = $this->input->post('business_support_photos_text');
        }
        $status = $this->input->post('status');
//Image Config 
        $config['upload_path'] = './uploads/common/';
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array("type" => $type, "business_support_photos" => $slider_image, "business_support_photos_title" => $business_support_photos_title, "business_support_photos_text" => $business_support_photos_text, "business_support_photos_status" => $status);
            $this->admin_model->insert_data('business_support_slider', $data);
            $this->session->set_flashdata('message', 'Data Uploaded Successfully');
        }
        redirect('admin/home/' . $redirect);
    }

    public function update_business_support_slider() {
        $redirect = $this->input->post('redirect');
        $business_support_slider_id = $this->input->post('business_support_slider_id');
        $type = $this->input->post('type');
        if ($type == 'top_slider') {
            $business_support_photos_title = "-";
            $business_support_photos_text = "-";
        } else {
            $business_support_photos_title = $this->input->post('business_support_photos_title');
            $business_support_photos_text = $this->input->post('business_support_photos_text');
        }
        $status = $this->input->post('status');
        $file = $_FILES['userfile']['name'];
//File is not empty
        if ($file) {
//Image Config 
            $config['upload_path'] = './uploads/common/';
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
                $data = array("type" => $type, "business_support_photos" => $slider_image, "business_support_photos_title" => $business_support_photos_title, "business_support_photos_text" => $business_support_photos_text, "business_support_photos_status" => $status);
                $this->admin_model->update_data('business_support_slider', $data, 'business_support_slider_id', $business_support_slider_id);
                $this->session->set_flashdata('message', 'Data Updated Successfully');
            }
        } else {
            $data = array("type" => $type, "business_support_photos_title" => $business_support_photos_title, "business_support_photos_text" => $business_support_photos_text, "business_support_photos_status" => $status);
            $this->admin_model->update_data('business_support_slider', $data, 'business_support_slider_id', $business_support_slider_id);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
        }

        redirect('admin/home/' . $redirect);
    }

    public function delete_business_support_slider() {
        $id = base64_decode($this->uri->segment("4"));
        $name = base64_decode($this->uri->segment("5"));
        $redirect = base64_decode($this->uri->segment("6"));
        if (!empty($id)) {
            $this->admin_model->delete_data('business_support_slider', 'business_support_slider_id', $id);
            $this->session->set_flashdata('message', 'Data Deleted Successfully');
        }

//To remove the file from folder
        $target_path = "./uploads/common/" . basename($name);
        unlink($target_path);
        redirect('admin/home/' . $redirect);
    }

/////////////////////////////////////////////////////////Slider//////////////////
//    function slider() {
////==============For Edit=============
//        $id = base64_decode($this->uri->segment("4"));
//        if ($id != "") {
//            $data['edit'] = $this->admin_model->select_data_where('slider', 'slider_id', $id);
//            $data['slider_id'] = $id;
//        } else {
//            $data['edit'] = "";
//        }
////==============Get All data=============
//        $data['slider'] = $this->admin_model->select_data('slider', 'status', 'active');
//        $this->load->view('admin/header');
//        $this->load->view('admin/slider', $data);
//        $this->load->view('admin/footer');
//    }
//
//    public function insert_slider() {
//        $title = $this->input->post('title');
//        $status = $this->input->post('status');
//
////Image Config 
//        $config['upload_path'] = './uploads/sliders/';
//        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 200;
//        $config['max_width'] = 1920;
//        $config['max_height'] = 768;
//        $this->load->library('upload', $config);
//        if (!$this->upload->do_upload('userfile')) {
//            $error = array('error' => $this->upload->display_errors());
//            $error['error'];
//            $this->session->set_flashdata('message', $error['error']);
//        } else {
//            array('upload_data' => $this->upload->data());
//            $upload_data = $this->upload->data();
//            $slider_image = $upload_data['file_name'];
//            $data = array("slider_title" => $title, "slider_image" => $slider_image, "date" => $this->date, "status" => $status);
//            $this->admin_model->insert_data('slider', $data);
//            $this->session->set_flashdata('message', 'Images Uploaded Successfully');
//        }
//        redirect('admin/home/slider');
//    }
//
//    public function update_slider() {
////
//        $title = $this->input->post('title');
//        $status = $this->input->post('status');
//        $slider_id = $this->input->post('slider_id');
//        $file = $_FILES['userfile']['name'];
////File is not empty
//        if ($file) {
////Image Config 
//            $config['upload_path'] = './uploads/sliders/';
//            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = 200;
//            $config['max_width'] = 1920;
//            $config['max_height'] = 768;
//            $this->load->library('upload', $config);
//            if (!$this->upload->do_upload('userfile')) {
//                $error = array('error' => $this->upload->display_errors());
//                $error['error'];
//                $this->session->set_flashdata('message', $error['error']);
//            } else {
//                array('upload_data' => $this->upload->data());
//                $upload_data = $this->upload->data();
//                $slider_image = $upload_data['file_name'];
//                $data = array("slider_title" => $title, "slider_image" => $slider_image, "status" => $status);
//                $this->admin_model->update_data('slider', $data, 'slider_id', $slider_id);
//                $this->session->set_flashdata('message', 'Slider Updated Successfully');
//            }
//        } else {
//            $data = array("slider_title" => $title, "status" => $status);
//            $this->admin_model->update_data('slider', $data, 'slider_id', $slider_id);
//            $this->session->set_flashdata('message', 'Slider Updated Successfully');
//        }
//
//        redirect('admin/home/slider');
//    }
//
//    public function delete_slider() {
//        $id = base64_decode($this->uri->segment("4"));
//        $name = base64_decode($this->uri->segment("5"));
//        if (!empty($id)) {
//            $this->admin_model->delete_data('slider', 'slider_id', $id);
//            $this->session->set_flashdata('message', 'Data Deleted Successfully');
//        }
//
////To remove the file from folder
//        $target_path = "./uploads/sliders/" . basename($name);
//        unlink($target_path);
//        redirect("admin/home/slider");
//    }
//
/////////////////////////////////////////////////////////////////////////////////Slider End======
////==================Product Start==========================
//    function add_products() {
////==============For Edit=============
//        $id = base64_decode($this->uri->segment("4"));
//        if ($id != "") {
//            $data['edit'] = $this->admin_model->select_data_where('product', 'product_id', $id);
//            $data['product_id'] = $id;
//        } else {
//            $data['edit'] = "";
//        }
//        $data['all_products'] = $this->admin_model->select_data('product');
//
//        $this->load->view('admin/header');
//        $this->load->view('admin/add_product', $data);
//        $this->load->view('admin/footer');
//    }
//
//    public function insert_product() {
//        $product_title = $this->input->post('product_title');
//        $product_description = $this->input->post('product_description');
//        $product_tag = $this->input->post('product_tag');
//        $product_bid_end_date = $this->input->post('product_bid_end_date');
//        $product_bid_cost = $this->input->post('product_bid_cost');
//        $product_status = $this->input->post('product_status');
////
////Image Config 
//        $config['upload_path'] = './uploads/products/';
//        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = 100;
//        $config['max_width'] = 550;
//        $config['max_height'] = 310;
//        $this->load->library('upload', $config);
//        if (!$this->upload->do_upload('userfile')) {
//            $error = array('error' => $this->upload->display_errors());
//            $error['error'];
//            $this->session->set_flashdata('message', $error['error']);
//        } else {
//            array('upload_data' => $this->upload->data());
//            $upload_data = $this->upload->data();
//            $product_image = $upload_data['file_name'];
//            $data = array("product_title" => $product_title, "product_image" => $product_image,
//                "product_description" => $product_description, "product_tag" => $product_tag,
//                "product_bid_end_date" => $product_bid_end_date, "product_bid_cost" => $product_bid_cost,
//                "product_add_date" => $this->date, "product_status" => $product_status);
//            $this->admin_model->insert_data('product', $data);
//            $this->session->set_flashdata('message', 'Product Uploaded Successfully!');
//        }
//        redirect('admin/home/add_products');
//    }
//
//    public function update_product() {
//        $product_title = $this->input->post('product_title');
//        $product_description = $this->input->post('product_description');
//        $product_tag = $this->input->post('product_tag');
//        $product_bid_end_date = $this->input->post('product_bid_end_date');
//        $product_bid_cost = $this->input->post('product_bid_cost');
//        $product_status = $this->input->post('product_status');
//        $product_id = $this->input->post('product_id');
//        $file = $_FILES['userfile']['name'];
////File is not empty
//        if ($file) {
////Image Config 
//            $config['upload_path'] = './uploads/products/';
//            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = 100;
//            $config['max_width'] = 550;
//            $config['max_height'] = 310;
//            $this->load->library('upload', $config);
//            if (!$this->upload->do_upload('userfile')) {
//                $error = array('error' => $this->upload->display_errors());
//                $error['error'];
//                $this->session->set_flashdata('message', $error['error']);
//            } else {
//                array('upload_data' => $this->upload->data());
//                $upload_data = $this->upload->data();
//                $product_image = $upload_data['file_name'];
//                $data = array("product_title" => $product_title, "product_image" => $product_image,
//                    "product_description" => $product_description, "product_tag" => $product_tag,
//                    "product_bid_end_date" => $product_bid_end_date, "product_bid_cost" => $product_bid_cost,
//                    "product_add_date" => $this->date, "product_status" => $product_status);
//                $this->admin_model->update_data('product', $data, 'product_id', $product_id);
//                $this->session->set_flashdata('message', 'Product Updated Successfully');
//            }
//        } else {
//            $data = array("product_title" => $product_title, "product_description" => $product_description,
//                "product_tag" => $product_tag, "product_bid_end_date" => $product_bid_end_date,
//                "product_bid_cost" => $product_bid_cost, "product_status" => $product_status);
//            $this->admin_model->update_data('product', $data, 'product_id', $product_id);
//            $this->session->set_flashdata('message', 'Product Updated Successfully!');
//        }
//
//        redirect('admin/home/add_products');
//    }
//
//    public function delete_product() {
//        $id = base64_decode($this->uri->segment("4"));
//        $name = base64_decode($this->uri->segment("5"));
//        if (!empty($id)) {
//            $this->admin_model->delete_data('product', 'product_id', $id);
////To remove the file from folder
//            $target_path = "./uploads/products/" . basename($name);
//            unlink($target_path);
//            $this->session->set_flashdata('message', 'Product Deleted Successfully');
//        }
//        redirect("admin/home/add_products");
//    }
//========================End Product=================
}
