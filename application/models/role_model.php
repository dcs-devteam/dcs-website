<?php
    class Role_model extends CI_Model {
        public function __construct() {
            parent:: __construct();
            $this->load->database();
        }

        public function getAllRoles() {
            $query = "SELECT * FROM roles";
            $res = $this->db->query($query);
            return $res->result();
        }

    }
?>