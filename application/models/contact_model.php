<?php
    class Contact_model extends CI_Model {
        public function __construct() {
            parent:: __construct();
            $this->load->database();
        }

        public function isEmailAvailable($email, $user_id=0) {
            $query = "SELECT * FROM contact_information WHERE email='".addslashes(trim($email))."'";
            if ($user_id != 0) {                
                $query = $query . " AND user_id!='". addslashes($user_id) ."'";
            }

            $row = $this->db->query($query);
            if ($row->result()) {             
                return false;
            }            
            return true;            
        }


    }
?>