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

    public function all() {
      $this->db->select('username');
      $results = $this->db->get('developers');
      return $results->result();
    }

    public function find($username) {
      $this->db->where('username', $username);
      $result = $this->db->get('developers');
      return $result->row();
    }

    public function create($developer) {
      $developer['password'] = md5($developer['password']);
      if ($this->find($developer['username'])) {
        return array('success' => false, 'message' => 'Username already taken.');
      } else {
        $this->db->insert('developers', $developer);
        return array('success' => true, 'message' => 'Developer successfully added.');
      }
    }

    public function update($developer) {
      $developer['password'] = md5($developer['password']);
      $this->db->where('username', $developer['username']);
      $this->db->update('developers', $developer);
    }

  }

// End of file developer_model.php
// Location: ./application/models/developer_model.php