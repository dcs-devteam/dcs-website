<?php

  class Cockpit_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function all() {
      // $this->db->order_by('created_at', 'ASC');
      // $results = $this->db->get('metas');
      return $results->result();
    }

    public function find($title, $single = true) {      
      $this->db->where('heading', $title);
      $result = $this->db->get('content');
      if ($single) {
        return $result->row();
      } else {
        return $result->result();
      }
    }

    public function create($meta) {
      // if ($this->find($meta['property'])) {
      //   return array('success' => false, 'message' => 'Property already exists.');
      // } else {
      //   $this->db->insert('metas', $meta);
      //   return array('success' => true, 'message' => 'Metadata successfully created.');
      // }
    }

    public function update($meta) {
      // if ($this->find($meta['property'])) {
      //   $this->db->where('property', $meta['property']);
      //   $this->db->update('metas', $meta);
      //   return array('success' => true, 'message' => 'Metadata successfully updated.');
      // } else {
      //   return array('success' => false, 'message' => 'Property does not exist.');
      // }
    }

  }

?>