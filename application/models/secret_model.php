<?php

  class Secret_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function all() {
      $results = $this->db->get('secrets');
      return $results->result();
    }

    public function enabled() {
      $this->db->where('enabled', true);
      $results = $this->db->get('secrets');
      return $results->result();
    }

    public function find($command) {
      $this->db->where('command', $command);
      $result = $this->db->get('secrets');
      return $result->row();
    }

    public function create($secret) {
      if ($this->find($secret['command'])) {
        return array('success' => false, 'message' => 'Secret command "' . $secret['command'] . '" already taken.');
      } else {
        $this->db->insert('secrets', $secret);
        return array('success' => true, 'message' => 'Secret command successfully created.');
      }
    }

    public function enable($command) {
      $this->db->where('command', $command);
      $this->db->update('secrets', array('enabled' => true));
    }

    public function disable($command) {
      $this->db->where('command', $command);
      $this->db->update('secrets', array('enabled' => false));
    }

  }  

?>