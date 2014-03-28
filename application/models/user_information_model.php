<?php
	class User_information_model extends CI_Model {
		public function __construct() {
			parent:: __construct();
			$this->load->database();
		}

		public function getUserCredential($id) {
			$this->db->where ('id', $id);
			$result = $this->db->get ('user');
			return $result->row();			
		}

		public function authentication($username, $password) {
			$query = $this->db->query("SELECT * FROM user WHERE username = '".addslashes($username)."' AND password = '".md5(addslashes($password))."'");
			return $query->row();
		}

		public function fetchUserInformation($id) {
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('information', 'information.u_id = user.id', 'left');
			$this->db->join('contact', 'contact.u_id = user.id', 'left');
			$this->db->where ('user.id', addslashes($id));

			$result = $this->db->get();
			return $result->row();
		}

		public function getPrivileges($user_id) {

		}
		
		public function editUserInformation($info, $contact_num) {
			
		}

	}
?>