<?php

class Index_mod extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function login($email, $pwd) {
        $this->db->where('email', $email);
        $this->db->where('password', sha1($pwd));
        $this->db->where('status','active');
        $this->db->limit(1);
        $query = $this->db->get('register');
       // echo $this->db->last_query();
       // die;
        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

    public function getpostdata() {
        $this->db->select("a.*,b.category_name,b.category_slug");
        $this->db->where("a.post_status", 'active');
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_post a");
       // echo $this->db->last_query();
       // die;
        return $query->result();
    }

    public function insert_data($tablename, $data) {
        $this->db->insert($tablename, $data);
    }

    public function select_data_where_result($tablename, $columnName, $value, $status=false, $statusValue=false) {
        $this->db->where($columnName, $value);
        $this->db->where($status, $statusValue);
        $query = $this->db->get($tablename);
        return $query->result();
    }

    public function select_data_where_row($tablename, $columnName, $value, $status=false, $statusValue=false) {
        $this->db->where($columnName, $value);
        $this->db->where($status, $statusValue);
        $query = $this->db->get($tablename);
        return $query->row();
    }

      function getJoinPostData($post_slug,$category_id=false) {
        $this->db->select("a.*,b.category_name,b.category_slug");
        $this->db->join("blog_category b", "a.category_id = b.category_id");
        if($category_id)
        {
           $this->db->where('a.category_id', $category_id);  
        }
        $this->db->where('a.post_slug', $post_slug);
        $this->db->where('a.post_status', 'active');
//        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("blog_post a");
        return $query->row();
    }

}
