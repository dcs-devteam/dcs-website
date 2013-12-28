<?php

  class Poll_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function latest() {
      $this->db->order_by('created_at', 'DESC');
      $result = $this->db->get('polls', 1);
      return $result->row();
    }

    public function answer($poll_answer) {
      $this->db->insert('poll_answers', $poll_answer);
    }

  }

// End of file poll_model.php
// Location: ./application/models/poll_model.php