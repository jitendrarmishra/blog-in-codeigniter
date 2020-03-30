<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller {

    public $user_id;
    public $dept;

    public function __construct() {

        parent::__construct();
        $this->load->model('index_mod');
    }

    public function index() {
        $data['services'] = $this->index_mod->select_data('services', 'service_status', 'active');
        // Note : select_data_where_row('tablename', 'columnone', 'value', 'column2', 'value');
        $data['customer'] = $this->index_mod->select_data_where_result('happy_customers', 'type', 'customer', 'status', 'active');
        $data['owner'] = $this->index_mod->select_data_where_result('happy_customers', 'type', 'owner', 'status', 'active');

        $data['title'] = "Some Title";
        $data['description'] = "description";
        $data['keyword'] = "keyword";
        $data["js"] = "home.js";
        $this->load->view('header', $data);
        $this->load->view('home');
        $this->load->view('footer');
    }

    ////////////////////////////     HOMECARE CONTROLLER STARTS     /////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function homecare_concern() {
        $concern_slug = $this->uri->segment(2);
        $data['home_concern'] = $this->index_mod->select_data_where_row('homecare_concern', 'concern_slug', $concern_slug, 'homecare_concern_status', 'active');
        $value = $data['home_concern']->homecare_concern_id;
        $data['category_list'] = $this->index_mod->select_data('homecare_category', 'homecare_category_status', 'active');

        $data['products'] = $this->index_mod->getHomecareConcernProduct($value);


        //SEO
        $data['title'] = $data['home_concern']->meta_title;
        $data['description'] = $data['home_concern']->meta_description;
        $data['keyword'] = $data['home_concern']->meta_keyword;


        $this->load->view('header', $data);
        $this->load->view('homecare_concern');
        $this->load->view('footer');
    }

    public function homecare_category() {
        $category_slug = $this->uri->segment(2);
        $data['home_category'] = $this->index_mod->select_data_where_row('homecare_category', 'category_slug', $category_slug, 'homecare_category_status', 'active');
        $value = $data['home_category']->homecare_id;

        $data['concern_list'] = $this->index_mod->select_data('homecare_concern', 'homecare_concern_status', 'active');


        $data['products'] = $this->index_mod->getHomecareCategoryProduct($value);
//        $data['products'] = $this->index_mod->select_data_where_result('homecare_product', 'homecare_id', $value, 'homecare_product_status', 'active');

        $data['title'] = $data['home_category']->meta_title;
        $data['description'] = $data['home_category']->meta_description;
        $data['keyword'] = $data['home_category']->meta_keyword;

        $this->load->view('header', $data);
        $this->load->view('homecare_category');
        $this->load->view('footer');
    }

    public function homecare_product() {
        $product_slug = $this->uri->segment(3);
        // Note : select_data_where_row('tablename', 'columnone', 'value', 'column2', 'value');
        $data['product'] = $this->index_mod->select_data_where_row('homecare_product', 'product_slug', $product_slug, 'homecare_product_status', 'active');

        $value = $data['product']->homecare_product_id;
        $data['benefits'] = $this->index_mod->select_data_where_result('homecare_benefits', 'homecare_product_id', $value, 'benefits_status', 'active');
        $data['customer'] = $this->index_mod->select_data('homecare_happy_customers', 'homecare_product_id', $value, 'status', 'active');
        // $value                    = $data['products_details']->services_product_inner_id;
        $data['steps'] = $this->index_mod->select_data_where_result('homecare_steps', 'homecare_product_id', $value, 'step_status', 'active');
        $data['faq'] = $this->index_mod->select_data_where_result('homecare_faq', 'homecare_product_id', $value, 'faq_status', 'active');
        $data['ingredients_photo'] = $this->index_mod->select_data_where_result('homecare_ingredients_photos', 'homecare_product_id', $value, 'ingredients_photos_status', 'active');
        $data['ingredients_list'] = $this->index_mod->select_data_where_result('homecare_ingredients_list', 'homecare_product_id', $value, 'ingredients_status', 'active');
        //print_r($data['faq']);
        //die;
        //For SEO
        $data['title'] = $data['product']->meta_title;
        $data['description'] = $data['product']->meta_description;
        $data['keyword'] = $data['product']->meta_keyword;

        //
        $data["js"] = "homecare_inner.js";

        $this->load->view('header', $data);
        $this->load->view('homecare_inner');
        $this->load->view('footer');
    }

    public function category_filter() {

         $category_id = $this->input->post("category_id");
         $concern_id = $this->input->post("concern_id");

        $data2['category_products'] = $this->index_mod->filterByCategory($category_id, $concern_id);


        echo $this->load->view('common', $data2, true);
    }

    public function concern_filter() {

        $concern_id = $this->input->post("concern_id");
        $category_id = $this->input->post("category_id");
        $data2['concern_products'] = $this->index_mod->filterByConcern($concern_id, $category_id);
        echo $this->load->view('common', $data2, true);
    }

    ////////////////////////////     HOMECARE CONTROLLER ENDS     ////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////     SALON CONTROLLER STARTS     ////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function salon_concern() {
        $concern_slug = $this->uri->segment(2);
        $data['salon_concern'] = $this->index_mod->select_data_where_row('services_concern', 'concern_slug', $concern_slug, 'concern_status', 'active');

        $value = $data['salon_concern']->concern_id;
        $data['causes'] = $this->index_mod->select_data_where_result('services_concern_causes', 'concern_id', $value, 'causes_status', 'active');
        $data['facial'] = $this->index_mod->getSalonConcernProduct($value);
        $data['treatment'] = $this->index_mod->getSalonConcernProduct_treatment($value);

        //SEO
        $data['title'] = $data['salon_concern']->meta_title;
        $data['description'] = $data['salon_concern']->meta_description;
        $data['keyword'] = $data['salon_concern']->meta_keyword;

        $this->load->view('header', $data);
        $this->load->view('salon_concern');
        $this->load->view('footer');
    }

    public function salon_category() {
        $services_slug = $this->uri->segment(2);

        // Note : select_data_where_row('tablename', 'columnone', 'value', 'column2', 'value');
        $data['salon_category'] = $this->index_mod->select_data_where_row('services', 'services_slug', $services_slug, 'service_status', 'active');

        $value = $data['salon_category']->service_id;
        $data['causes'] = $this->index_mod->select_data_where_result('services_concern_causes', 'concern_id', $value, 'causes_status', 'active');
        // $data['products'] = $this->index_mod->getSalonCategoryProduct($value);
        $data['products'] = $this->index_mod->select_data_where_result('services_product', 'service_id', $value, 'services_product_status', 'active');

        //SEO
        $data['title'] = $data['salon_category']->meta_title;
        $data['description'] = $data['salon_category']->meta_description;
        $data['keyword'] = $data['salon_category']->meta_keyword;

        $this->load->view('header', $data);
        $this->load->view('services');
        $this->load->view('footer');
    }

    public function salon_product() {
        $product_category = $this->uri->segment(2);
        $product_slug = $this->uri->segment(3);
        // Note : select_data_where_row('tablename', 'columnane', 'value', 'column2', 'value');
        $data['product'] = $this->index_mod->select_data_where_row('services_product', 'product_slug', $product_slug, 'services_product_status', 'active');
        $services_product_id = $data['product']->services_product_id;
        $data['product_details'] = $this->index_mod->select_data_where('services_product_inner_page', 'services_product_id', $services_product_id, 'product_inner_status', 'active');
        $service_id = $data['product']->service_id;
        $services_product_inner_id = $data['product_details']->services_product_inner_id;
        $data['faq'] = $this->index_mod->select_data_where_result('services_faq', 'services_product_inner_id', $services_product_inner_id, 'faq_status', 'active');
        $data['steps'] = $this->index_mod->select_data_where_result('services_steps', 'services_product_inner_id', $services_product_inner_id, 'step_status', 'active');
        $data['ingredients'] = $this->index_mod->select_data_where_result('services_ingredients', 'services_product_inner_id', $services_product_inner_id, 'ingredients_status', 'active');

        $data['customer'] = $this->index_mod->select_data_where_result('services_happy_customers', 'services_product_id', $services_product_id, 'status', 'active');
        $data['related_product'] = $this->index_mod->select_data_not_equal('services_product', 'services_product_id', $services_product_id, 'service_id', $service_id, 'services_product_status', 'active');
        $data['services_offered'] = $this->index_mod->select_data('services', 'service_status', 'active');
        $data['product_category'] = $product_category;
        //SEO
        $data['title'] = $data['product']->meta_title;
        $data['description'] = $data['product']->meta_description;
        $data['keyword'] = $data['product']->meta_keyword;

        $data["js"] = "service_inner.js";
        $this->load->view('header', $data);
        $this->load->view('salon_product');
        $this->load->view('footer');
    }

    ////////////////////////////     SALON CONTROLLER ENDS   ////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function flagship_store() {
        //SEO
        $data['title'] = "flagship Store";
        $data['description'] = "flagship Store";
        $data['keyword'] = "flagship Store";

        $data['slider'] = $this->index_mod->select_data('flagship_slider', 'flagship_status', 'active');
        $data['why_flagship'] = $this->index_mod->select_data('flagship_why', 'status', 'active');
        $data['experience'] = $this->index_mod->select_data('flagship_experience', 'status', 'active');
        $data['store'] = $this->index_mod->select_data('flagship_store', 'center_status', 'active');

        $this->load->view('header', $data);
        $this->load->view('flagship_store');
        $this->load->view('footer');
    }

    public function xml() {
        $res = $this->db->query("SELECT * FROM store_locator WHERE STATUS='active'");
        if ($res->num_rows() > 0) {
            $data['salon_details'] = $this->index_mod->select_data('store_locator', 'status', 'active');
            $dom = new DOMDocument("1.0");
            $node = $dom->createElement("markers");
            $parnode = $dom->appendChild($node);
            header("Content-type: text/xml");

            foreach ($data['salon_details'] as $row) {
                // Add to XML document node
                $node = $dom->createElement("markers");
                $newnode = $parnode->appendChild($node);
                $newnode->setAttribute("id", $row->id);
                $newnode->setAttribute("name", $row->name);
                $newnode->setAttribute("address", $row->address);
                $newnode->setAttribute("number", $row->number);
                $newnode->setAttribute("city_id", $row->city_id);
                $newnode->setAttribute("lat", $row->lat);
                $newnode->setAttribute("lng", $row->lng);
            }
        }

        echo $dom->saveXML();
    }

    public function salon_locator() {

        $data['salon_centers'] = $this->index_mod->select_data('center_city', 'city_status', 'active');
        $data['salon_details'] = $this->index_mod->select_data('store_locator', 'status', 'active');

        $data['title'] = "flagship Store";
        $data['description'] = "store locator";
        $data['keyword'] = "flagship Store";


        $this->load->view('header', $data);
        $this->load->view('store_locator');
        $this->load->view('footer');
    }

    public function contact_us() {
        $this->load->view('header');
        $this->load->view('contact_us');
        $this->load->view('footer');
    }

    public function career() {
        $this->load->view('header');
        $this->load->view('careers');
        $this->load->view('footer');
    }

    ////////////////////////////  ABOUT CHERYLS SECTION CONTROLLER STARTS      //////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function our_story() {
        $data["js"] = "our_story.js";
        $this->load->view('header', $data);
        $this->load->view('our_story');
        $this->load->view('footer');
    }

    public function mission_vision() {
        $this->load->view('header');
        $this->load->view('mission_and_vision');
        $this->load->view('footer');
    }

    public function our_reach() {

        $data['our_reach'] = $this->index_mod->select_data_where('our_reach', 'our_reach_status', 'active');

        $data['title'] = $data['our_reach']->meta_title;
        $data['description'] = $data['our_reach']->meta_description;
        $data['keyword'] = $data['our_reach']->meta_keyword;
        $this->load->view('header', $data);
        $this->load->view('our_reach');
        $this->load->view('footer');
    }

    ////////////////////////////     ABOUT CHERYLS SECTION CONTROLLER ENDS  //////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////     PROFESSIONALS SECTION CONTROLLER STARTS  ////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function introduction() {
        $this->load->view('header');
        $this->load->view('introduction');
        $this->load->view('footer');
    }

    public function courses_offered() {
        $data['course_details'] = $this->index_mod->select_single_row('courses_offered', 'courses_offered_status', 'active');
        $data['course_list'] = $this->index_mod->select_course_list('courses_offered_list', 'courses_offered_list_status', 'active');

        $data['title'] = $data['course_details']->meta_title;
        $data['description'] = $data['course_details']->meta_description;
        $data['keyword'] = $data['course_details']->meta_keyword;

        $this->load->view('header', $data);
        $this->load->view('courses_offered');
        $this->load->view('footer');
    }

    public function experts_speaker() {
        $data['experts_speak'] = $this->index_mod->select_data('experts_speak', 'experts_status', 'active');

        $data['title'] = "Some title";
        $data['description'] = "description";
        $data['keyword'] = "keyword";

        $this->load->view('header', $data);
        $this->load->view('experts_speak');
        $this->load->view('footer');
    }

    public function experts_speaker_inner() {
        $value = base64_decode($this->uri->segment(3));
        $data['experts_speak'] = $this->index_mod->select_data_where_row('experts_speak', 'experts_speak_id', $value, 'experts_status', 'active');
        $data['experts_speak_qa'] = $this->index_mod->select_data_where_result('experts_speak_qa', 'experts_speak_id', $value, 'experts_speak_status', 'active');

        $data['title'] = $data['experts_speak']->meta_title;
        $data['description'] = $data['experts_speak']->meta_description;
        $data['keyword'] = $data['experts_speak']->meta_keyword;

        $this->load->view('header', $data);
        $this->load->view('experts_speaker_inner');
        $this->load->view('footer');
    }

    public function expert_faqs() {
        $data['expert_faqs'] = $this->index_mod->select_data('expert_faq', 'faq_status', 'active');

        $data['title'] = "sdsad";
        $data['description'] = "sadsad";
        $data['keyword'] = "sadasdasd";

        $this->load->view('header', $data);
        $this->load->view('expert_faqs');
        $this->load->view('footer');
    }

    ////////////////////////////     PROFESSIONALS SECTION CONTROLLER ENDS  //////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////




    public function media() {
        $data['media'] = $this->index_mod->select_data('media', 'media_status', 'active');

        $data['title'] = "sdsad";
        $data['description'] = "sadsad";
        $data['keyword'] = "sadasdasd";

        $this->load->view('header', $data);
        $this->load->view('media');
        $this->load->view('footer');
    }

    public function month_media() {
        $month = $this->input->post("field1");
        $year = $this->input->post("field2");
        $data['media'] = $this->index_mod->select_data_of_date_where_result($year, $month);


        echo $this->load->view('common', $data, true);
    }

    public function faqs() {
        $data['faqs_category'] = $this->index_mod->select_data('faqs_category', 'faqs_status', 'active');
        // $data['faqs_qa'] = $this->index_mod->getJoinDataForFaqs($category_id);

        $data['title'] = "sdsad";
        $data['description'] = "sadsad";
        $data['keyword'] = "sadasdasd";
        $data["js"] = "faqs.js";
        $this->load->view('header', $data);
        $this->load->view('faqs');
        $this->load->view('footer');
    }

    public function send_email() {

        $email = $this->input->post("email");

        $type = $this->input->post("type");
        $data = array('email_id' => $email, 'who_is' => $type);
        $this->index_mod->insert_data("singup", $data);

        echo '1';
    }

    public function contactus() {
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $number = $this->input->post("number");
        $type = $this->input->post("type");
        $message = $this->input->post("message");


        $data = array('name' => $name, 'email' => $email, 'message' => $message, 'phone' => $number, 'type' => $type);
        $this->index_mod->insert_data("contact_us_form_data", $data);

        $this->session->set_flashdata('message', 'Thank you for submiting the data');
        redirect('home/contact_us');
    }

    public function expertfaqs() {

        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $message = $this->input->post("message");

        $data = array('name' => $name, 'email' => $email, 'message' => $message);
        $this->index_mod->insert_data("expert_faqs_form_data", $data);

        $this->session->set_flashdata('message', 'Thank you for submiting the data');
        redirect('home/expert_faqs');
    }

    public function training_centres() {
        $data['centers'] = $this->index_mod->select_data('center_city', 'city_status', 'active');
        $data['center_details'] = $this->index_mod->select_data('center_details', 'center_status', 'active');

        $data['title'] = "sdsad";
        $data['description'] = "sadsad";
        $data['keyword'] = "sadasdasd";

        $this->load->view('header', $data);
        $this->load->view('training_centres');
        $this->load->view('footer');
    }

    public function training_centres_gallery() {
        $center_id = base64_decode($this->uri->segment(3));
        $data['gallery'] = $this->index_mod->select_data_where_result('center_gallery', 'center_id', $center_id, 'gallery_status', 'active');
        $data['center_name'] = $this->index_mod->select_data_where_row('center_details', 'center_id', $center_id, 'center_status', 'active');
        $data['title'] = "sdsad";
        $data['description'] = "sadsad";
        $data['keyword'] = "sadasdasd";

        $this->load->view('header', $data);
        $this->load->view('training_centres_gallery');
        $this->load->view('footer');
    }

    public function education_show() {
        $data['education_show'] = $this->index_mod->select_data('education_show', 'education_show_status', 'active');
        // $data['faqs_qa'] = $this->index_mod->getJoinDataForFaqs($category_id);

        $data['title'] = "sdsad";
        $data['description'] = "sadsad";
        $data['keyword'] = "sadasdasd";

        $this->load->view('header', $data);
        $this->load->view('education_show');
        $this->load->view('footer');
    }

    public function education_show_year() {
        $eventname = $this->input->post('event');
        $year = $this->input->post('year');
        $data['eventname'] = $this->index_mod->search_field($eventname, $year);
        // print_r($data['eventname']);die;
        echo $this->load->view('common', $data, true);
    }

    public function education_show_inner() {
        $education_show_id = base64_decode($this->uri->segment(3));
        $data['education_show'] = $this->index_mod->select_data_where_row('education_show', 'education_show_id', $education_show_id, 'education_show_status', 'active');
        $data['slider'] = $this->index_mod->select_data_where_result('education_show_slider', 'education_show_id', $education_show_id, 'status', 'active');
        $data['title'] = $data['education_show']->meta_title;
        $data['description'] = $data['education_show']->meta_description;
        $data['keyword'] = $data['education_show']->meta_keyword;

        $this->load->view('header', $data);
        $this->load->view('education_show_inner');
        $this->load->view('footer');
    }

    public function business_support() {
        $data['flagship_details'] = $this->index_mod->select_single_row('business_support', 'business_support_status', 'active');
        $data['top_slider'] = $this->index_mod->select_data_where_result('business_support_slider', 'type', 'top_slider', 'business_support_photos_status', 'active');
        $data['advantage'] = $this->index_mod->select_data_where_result('business_support_slider', 'type', 'advantage', 'business_support_photos_status', 'active');
        $data['promotions'] = $this->index_mod->select_data_where_result('business_support_slider', 'type', 'promotions', 'business_support_photos_status', 'active');
        $data['insta_wow'] = $this->index_mod->select_data_where_result('business_support_slider', 'type', 'insta_wow', 'business_support_photos_status', 'active');
        $data['bootom_slider'] = $this->index_mod->select_data_where_result('business_support_slider', 'type', 'bootom_slider', 'business_support_photos_status', 'active');
        $this->load->view('header', $data);
        $this->load->view('business_support');
        $this->load->view('footer');
    }

    public function innovative_treatments() {
        $data['wow_treatmensts_details'] = $this->index_mod->select_single_row('insta_page', 'insta_status', 'active');
        $data['insta_points'] = $this->index_mod->select_data('insta_points', 'point_status', 'active');
        $data['insta_services'] = $this->index_mod->select_data('insta_services', 'service_status', 'active');
        $data['insta_products'] = $this->index_mod->innovative_treatments_salon();
        $data['insta_products2'] = $this->index_mod->innovative_treatments_homecare();
//        $data["js"] = "home.js";
        $this->load->view('header', $data);
        $this->load->view('innovative_treatment');
        $this->load->view('footer');
    }

    function map() {
        $latLanQuery = $this->db->query('select name,lat,lng from salon_locator');
        $userData = $latLanQuery->result_array();

        $locations = '[';
        foreach ($userData as $key => $row) {
            $name = $row['name'];
            $longitude = $row['lat'];
            $latitude = $row['lng'];

            $locations .= '["' . $name . '","' . $latitude . '","' . $longitude . '"],';
        }
        $locations .= ']';

        $data['markers'] = $data['insta_services'] = $this->index_mod->select_data('salon_locator', 'status', 'active');


        $this->load->view('header');
        $this->load->view('map', $data);
        $this->load->view('footer');
    }

    public function search() {
        $search = $this->input->post("search");
        if (!empty($search)) {
            $data['search'] = $search;
            $data['post'] = $this->index_mod->blog_search($search);
            $data['salon'] = $this->index_mod->salon_search($search);
            $data['homecare'] = $this->index_mod->homecare_search($search);

//        print_r($data);
//        die;
            $this->load->view('header', $data);
            $this->load->view('search');
            $this->load->view('footer');
        } else {
            redirect(base_url());
        }
    }

}
