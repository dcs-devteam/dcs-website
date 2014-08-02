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

        public function verifyUserPrivilege($user_id, $privilege_name) {
            $query = "SELECT user_privileges.* FROM user_privileges JOIN privileges ON privileges.id = user_privileges.privilege_id WHERE user_privileges.user_id='".addslashes($user_id)."' AND privileges.name='".addslashes($privilege_name)."'";
            $res = $this->db->query($query);        
            return $res->row();
        }

    }

?>