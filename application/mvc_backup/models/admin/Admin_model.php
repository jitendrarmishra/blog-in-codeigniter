<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function login($email, $pwd) {
        $this->db->where('email_id', $email);
        $this->db->where('password', md5($pwd));
        $this->db->limit(1);
        $query = $this->db->get('user');
//        echo $this->db->last_query();
//        die;
        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

    function exits($tablename, $columnName, $value) {
        $this->db->where($columnName, $value);
        $query = $this->db->get($tablename);
//                echo $this->db->last_query();
//        die;
        if ($query->num_rows() == 1) {

            return 1;
        } else {
            return 0;
        }
    }

    function insert_data($tablename, $data) {
        $this->db->insert($tablename, $data);
        return $this->db->insert_id();
    }

    function select_data($tablename) {
        $query = $this->db->get($tablename);
//                echo $this->db->last_query();
//        die;
        return $query->result();
    }

    function select_data_where($tablename, $columnName, $value) {
        $this->db->where($columnName, $value);
        $query = $this->db->get($tablename);
        return $query->row();
    }

    function select_data_where_result($tablename, $columnName, $value) {
        $this->db->where($columnName, $value);
        $this->db->order_by("add_time", "DESC");
        $query = $this->db->get($tablename);
//                                         echo $this->db->last_query();
//        die;
        return $query->result();
    }

    function update_data($tablename, $data, $columnName, $value) {
        $this->db->where($columnName, $value);
        $this->db->update($tablename, $data);
//                                 echo $this->db->last_query();
//        die;
    }

    function delete_data($tablename, $columnName, $id) {
        $this->db->where($columnName, $id);
        $this->db->delete($tablename);
    }

    function getJoinData($tableOne, $tableOneColumn, $tableTwo, $tableTwoColumn) {
        $this->db->select("a.*,b.*");
        $this->db->join("$tableTwo b", "a.$tableOneColumn = b.$tableTwoColumn");
        $this->db->order_by("a.add_time", "DESC");
        $query = $this->db->get("$tableOne a");
        return $query->result();
    }  
    
    function getJoinDataResult($tableOne, $tableOneColumn, $tableTwo, $tableTwoColumn) {
        $this->db->select("a.*,b.*");
        $this->db->join("$tableTwo b", "a.$tableOneColumn = b.$tableTwoColumn");
        $this->db->order_by("a.date_time", "DESC");
        $query = $this->db->get("$tableOne a");
        return $query->result();
    }
    
    
    
     function getJoinDataBlog($tableOne, $tableOneColumn, $tableTwo, $tableTwoColumn) {
        $this->db->select("a.*,b.post_title");
        $this->db->join("$tableTwo b", "a.$tableOneColumn = b.$tableTwoColumn");
        $this->db->order_by("a.add_time", "DESC");
        $query = $this->db->get("$tableOne a");
        return $query->result();
    }

    function getJoinDataWhere($tableOne, $tableOneColumn, $tableOneColumnValue, $tableTwo, $tableTwoColumn) {
        $this->db->select("a.*,b.inner_title");
        $this->db->where("a.$tableOneColumn", $tableOneColumnValue);
        $this->db->join("$tableTwo b", "a.$tableOneColumn = b.$tableTwoColumn");
        $this->db->order_by("a.add_time", "DESC");
        $query = $this->db->get("$tableOne a");
        return $query->result();
    }

    function getJoinDataWhereResult($tableOne, $tableOneColumn, $tableOneColumnValue, $tableTwo, $tableTwoColumn) {
        $this->db->select("a.*,b.*");
        $this->db->where("a.$tableOneColumn", $tableOneColumnValue);
        $this->db->join("$tableTwo b", "a.$tableOneColumn = b.$tableTwoColumn");
        $query = $this->db->get("$tableOne a");
        return $query->result();
    }
    
     function getBlogComment() {
        $this->db->select("a.*,b.post_title,b.category_id");
//        $this->db->where("a.post_status", 'active');
//        $this->db->where("b.category_id", $category_id);
        $this->db->join("blog_post b", "a.post_id = b.post_id");
        $this->db->order_by("a.date_added", "DESC");
        $query = $this->db->get("blog_comments a");
        return $query->result();
    }
    
    

}

?>