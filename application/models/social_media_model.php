<?php
    class Contact_media_model extends CI_Model {
        public function __construct() {
            parent:: __construct();
            $this->load->database();
        }

        public function getAllSocialMedia() {
            $query = "SELECT * FROM social_media";
            $res = $this->db->query($query);
            return $res->result();
        }

    }
?>