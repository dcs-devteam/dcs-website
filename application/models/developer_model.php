<?php

  class Developer_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function authenticate($username, $password) {
      $this->db->where(array(
        'username' => $username,
        'password' => md5($password)
      ));
      $result = $this->db->get('developers');
      return $result->row();
    }

  }

// End of file developer.php
// Location: ./application/controllers/developer.php