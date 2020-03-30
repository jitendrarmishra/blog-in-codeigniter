<?php

class Index_mod extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_data($tablename, $columnName, $value) {
        $this->db->where($columnName, $value);
        $query = $this->db->get($tablename);
        return $query->result();
    }

    public function insert_data($tablename, $data) {
        $this->db->insert($tablename, $data);
    }

    public function select_data_where_result($tablename, $columnName, $value, $status, $statusValue) {
        $this->db->where($columnName, $value);
        $this->db->where($status, $statusValue);
        $query = $this->db->get($tablename);
        return $query->result();
    }

    public function select_data_where_row($tablename, $columnName, $value, $status, $statusValue) {
        $this->db->where($columnName, $value);
        $this->db->where($status, $statusValue);
        $query = $this->db->get($tablename);
//           echo $this->db->last_query();
//         die;
        return $query->row();
    }

    public function select_single_row($tablename, $status, $statusValue) {

        $this->db->where($status, $statusValue);
        $query = $this->db->get($tablename);
        return $query->row();
    }

    public function select_data_where($tablename, $columnName, $value) {
        $this->db->where($columnName, $value);
        $query = $this->db->get($tablename);
        return $query->row();
    }

    public function select_data_not_equal($tablename, $columnName, $value, $columname2, $value2, $status, $statusValue) {
        $this->db->where("$columnName !=", $value);
        $this->db->where($columname2, $value2);
        $this->db->where($status, $statusValue);
        $query = $this->db->get($tablename);
        return $query->result();
    }

//    'blog_post', 'post_slug', $post_slug, 'post_status', 'active'
    function getJoinPostData($post_slug) {
        $this->db->select("a.*,b.category_name,b.category_slug");
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        $this->db->where('a.post_slug', $post_slug);
        $this->db->where('a.post_status', 'active');
//        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_post a");
        return $query->row();
    }

    function getJoinDataBlog($category_id, $post_id) {
        $this->db->select("a.image,a.post_title,a.post_id,a.post_text,b.category_name");
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        $this->db->where('b.category_id', $category_id);
        $this->db->where('a.post_id != ', $post_id);
        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_post a");
        return $query->result();
    }

    public function select_data_of_date_where_result($value1, $value2) {
        $where = "";
        if ($value1 != "0") {
            $where = " WHERE YEAR(publish_date) = '{$value1}'";
        }

        if ($value2 != "0") {
            $where = " WHERE MONTH(publish_date) = '{$value2}'";
        }

        if ($value2 != "0" && $value1 != "0") {
            $where = " WHERE MONTH(publish_date) = '{$value2}' AND YEAR(publish_date) = '{$value1}'";
        }
        $query = $this->db->query("SELECT * FROM media $where ");
        return $query->result();
    }

    public function getHomecareProducts($tablename, $columnName, $value, $status, $statusValue) {
        $this->db->where($columnName, $value);
        $this->db->where($status, $statusValue);
        $query = $this->db->get($tablename);
        return $query->result();
    }

    public function getHomecareConcernProduct($value) {
        $this->db->select("b.*,c.category_slug");
        $this->db->where("a.homecare_concern_id", $value);
        $this->db->join("homecare_product b", "a.homecare_product_id = b.homecare_product_id");
        $this->db->join("homecare_category c", "b.homecare_id = c.homecare_id");
        $this->db->order_by("a.add_time", "DESC");
        $query = $this->db->get("homecare_product_concern a");
        // echo $this->db->last_query();
        // die;
        return $query->result();
    }

    public function getHomecareCategoryProduct($value) {
        $this->db->select("b.*,c.category_slug");
        $this->db->where("a.homecare_id", $value);
//          
        $this->db->join("homecare_product b", "a.homecare_product_id = b.homecare_product_id");
        $this->db->join("homecare_category c", "b.homecare_id = c.homecare_id");

        // $this->db->order_by("a.add_time", "DESC");
        $this->db->group_by("b.homecare_product_id");

        $query = $this->db->get("homecare_product_category a");
//          echo $this->db->last_query();
//         die;
        return $query->result();
    }

    public function filterByConcern($concern_id, $category_id) {
        $this->db->select("b.*,c.category_slug");
        if ($concern_id != 0) {
            $this->db->where("a.homecare_concern_id", $concern_id);
            $this->db->join("homecare_product b", "a.homecare_product_id = b.homecare_product_id");
            $this->db->join("homecare_category c", "b.homecare_id = c.homecare_id");
            $this->db->order_by("a.add_time", "DESC");
            $query = $this->db->get("homecare_product_concern a");
            // echo $this->db->last_query();
            // die;
            return $query->result();
        } else {
            $query = $this->db->query("SELECT * FROM homecare_product WHERE homecare_id = $category_id ");
            return $query->result();
        }
    }

    public function filterByCategory($category_id, $concern_id) {
        // $this->db->select("b.*");
        if ($category_id != 0) {
            $query = $this->db->query("SELECT homecare_product.*,homecare_category.category_slug FROM homecare_product "
                    . "LEFT JOIN homecare_category ON homecare_product.homecare_id = homecare_category.homecare_id WHERE homecare_product.homecare_id = $category_id");
//              echo $this->db->last_query();
//             die;

            return $query->result();
        } else {
            $this->db->select("b.*,c.category_slug");
            $this->db->where("a.homecare_concern_id", $concern_id);
            $this->db->join("homecare_product b", "a.homecare_product_id = b.homecare_product_id");
            $this->db->join("homecare_category c", "b.homecare_id = c.homecare_id");
//             $this->db->group_by("a.homecare_product_id");
            $this->db->order_by("a.add_time", "DESC");
            $query = $this->db->get("homecare_product_concern a");
//                             echo $this->db->last_query();
//             die;
            return $query->result();
        }
    }

    public function getSalonConcernProduct($value) {
        $this->db->select("b.*,c.services_slug");
        $this->db->where("a.concern_id", $value);
        $this->db->where("b.product_type", 'Facial');
        $this->db->join("services_product b", "a.services_product_id = b.services_product_id");
        $this->db->join("services c", "b.service_id = c.service_id");
        $this->db->order_by("a.add_time", "DESC");
        $query = $this->db->get("services_product_concern a");
        return $query->result();
    }

    public function getSalonConcernProduct_treatment($value) {
        $this->db->select("b.*,c.services_slug");
        $this->db->where("a.concern_id", $value);
        $this->db->where("b.product_type", 'Treatment');
        $this->db->join("services_product b", "a.services_product_id = b.services_product_id");
        $this->db->join("services c", "b.service_id = c.service_id");
        $this->db->order_by("a.add_time", "DESC");
        $query = $this->db->get("services_product_concern a");
        return $query->result();
    }

    // public function getSalonCategoryProduct($value)
    // {
    //     $this->db->select("b.*");
    //     $this->db->where("a.services_id", $value);
    //     $this->db->join("services_product b", "a.services_product_id = b.services_product_id");
    //     $this->db->order_by("a.add_time", "DESC");
    //     $query = $this->db->get("services_product_category a");
    //     //                 echo $this->db->last_query();
    //     // die;
    //     return $query->result();
    // }


    public function getSalonProducts($tablename, $columnName, $value, $status, $statusValue) {
        $this->db->where($columnName, $value);
        $this->db->where($status, $statusValue);
        $query = $this->db->get($tablename);
        return $query->result();
    }

    public function getJoinDataForFaqs($category_id) {
        $this->db->select("b.*");
        $this->db->where("a.faqs_category_id", $category_id);
        $this->db->join("faqs b", "a.faqs_category_id = b.faqs_category_id");
        $this->db->order_by("a.add_time", "DESC");
        $query = $this->db->get("faqs_category a");

        //                 echo $this->db->last_query();
        // die;
        return $query->result();
    }

    public function select_course_list($tablename, $columnName, $value) {
        $this->db->where($columnName, $value);
        $this->db->limit(3);
        $query = $this->db->get($tablename);
        return $query->result();
    }

    public function search_field($eventname, $year) {
        $where = "";
        if ($eventname != " ") {
            $where = " WHERE title LIKE '$eventname%'";
        }
        if ($year != "0") {
            $where = " WHERE YEAR(publish_date) = '{$year}'";
        }
        if ($eventname != "" && $year != "0") {
            $where = " WHERE title LIKE '$eventname%' AND YEAR(publish_date) = '{$year}'";
        }

        $query = $this->db->query("SELECT * FROM education_show $where");
        // echo $this->db->last_query();
        // $abc =  $query->result();
        // print_r($abc);die;
        return $query->result();
    }

    public function getpostdata_row() {
        $this->db->select("a.*,b.category_name,b.category_slug");
        $this->db->where("a.post_status", 'active');
        $this->db->limit(1, 0);
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_post a");
//        echo $this->db->last_query();
//        die;
        return $query->row();
    }

    public function getpostdata_slider() {
        $this->db->select("bs.image,bs.post_id,a.post_title,b.category_name");
        $this->db->where("a.post_status", 'active');
        $this->db->join("blog_post a", "bs.post_id = a.post_id");
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_slider bs");
//        echo $this->db->last_query();
//        die;
        return $query->result();
    }

    public function getpostdata() {
        $this->db->select("a.*,b.category_name,b.category_slug");
        $this->db->where("a.post_status", 'active');
        $this->db->limit(100, 1);
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_post a");
//        echo $this->db->last_query();
//        die;
        return $query->result();
    }

    public function getFeatureddata() {
        $this->db->select("a.*,b.category_name,b.category_slug");
        $this->db->where("a.post_status", 'active');
        $this->db->where("a.is_featured", 'yes');
        $this->db->limit(3, 0);
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_post a");

        //                 echo $this->db->last_query();
        // die;
        return $query->result();
    }

    public function getpostdataCategory($category_id) {
        $this->db->select("a.*,b.category_name,b.category_slug");
        $this->db->where("a.post_status", 'active');
        $this->db->where("b.category_id", $category_id);
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_post a");
        return $query->result();
    }

    public function blog_search($search) {
        $this->db->select("a.*,b.category_name,b.category_slug");
        $this->db->where("a.post_status", 'active');
        $this->db->like("a.post_title", $search);
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_post a");
//                          echo $this->db->last_query();
//         die;
        return $query->result();
    }

    public function homecare_search($search) {
        $this->db->select("a.*,b.category_slug");
        $this->db->like("a.black_text", $search);
//          $this->db->like("b.homecare_category_name", $search);
        $this->db->join("homecare_category b", "a.homecare_id = b.homecare_id");
        $this->db->group_by("a.homecare_product_id");
        $query = $this->db->get("homecare_product a");

        return $query->result();
    }

    public function salon_search($search) {
        $this->db->select("a.*,c.services_slug");
        $this->db->like("a.black_text", $search);
//        $this->db->like("b.homecare_category_name", $search);
        $this->db->join("services c", "a.service_id = c.service_id");
        $this->db->order_by("a.add_time", "DESC");
        $query = $this->db->get("services_product a");
        return $query->result();
    }

    public function innovative_treatments_salon() {
        $this->db->select("a.*,c.services_slug");
        $this->db->where("a.show_product", 'innovative');
        $this->db->where("a.services_product_status", 'active');
//        $this->db->join("services_product b", "a.services_product_id = b.services_product_id");
        $this->db->join("services c", "a.service_id = c.service_id");
        $this->db->order_by("a.add_time", "DESC");
        $query = $this->db->get("services_product a");
//                                  echo $this->db->last_query();
//         die;
        return $query->result();
    }

    public function innovative_treatments_homecare() {
        $this->db->select("a.*,b.category_slug");
        $this->db->like("a.show_product", 'innovative');
        $this->db->where("a.homecare_product_status", 'active');
//          $this->db->like("b.homecare_category_name", $search);
        $this->db->join("homecare_category b", "a.homecare_id = b.homecare_id");
        $this->db->group_by("a.homecare_product_id");
        $query = $this->db->get("homecare_product a");

        return $query->result();
    }

}
