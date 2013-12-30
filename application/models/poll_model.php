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

    public function answers($id) {
      $this->db->where('poll_id', $id);
      $this->db->order_by('created_at', 'DESC');
      $results = $this->db->get('poll_answers');
      return $results->result();
    }

    public function all() {
      $this->db->order_by('created_at', 'DESC');
      $results = $this->db->get('polls');
      return $results->result();
    }

    public function find($id) {
      $this->db->where('id', $id);
      $result = $this->db->get('polls');
      return $result->row();
    }

    public function create($poll) {
      $this->db->insert('polls', $poll);
    }

    public function delete($id) {
      if ($this->find($id)) {
        $this->db->where('id', $id);
        $this->db->delete('polls');
        return array('success' => true, 'message' => 'Poll message successfully deleted.');
      } else {
        return array('success' => false, 'message' => 'Poll question not found.');
      }
    }

  }

// End of file poll_model.php
// Location: ./application/models/poll_model.php