<?php
    class Privilege_model extends CI_Model {
        public function __construct() {
            parent:: __construct();
            $this->load->database();
        }

        public function getAllPrivileges() {
            $query = "SELECT * FROM privileges";
            $res = $this->db->query($query);
            return $res->result();
        }        

    }

?>