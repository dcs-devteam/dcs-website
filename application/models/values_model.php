<?php

  class values_model extends CI_Model {

    public function __construct() {
      parent:: __construct();
      $this->load->database();
    }

    public function getAllCourses() {
      $query = $this->db->query("SELECT * FROM courses order by id asc");
      return $query->result();
    }

  }
?>