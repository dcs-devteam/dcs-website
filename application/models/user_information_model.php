<?php
	class User_information_model extends CI_Model {
		public function __construct() {
			parent:: __construct();
			$this->load->database();
		}

		public function getUserCredential($username) {
			$this->db->where ('username', $username);
			$result = $this->db->get ('user');
			return $result->row();			
		}

		public function authentication($username, $password) {
			$query = $this->db->query("SELECT * FROM user WHERE username = '".addslashes($username)."' AND password = '".md5(addslashes($password))."'");
			return $query->row();
		}

		public function fetchUserInformation($username) {
			$this->db->select('user_information.*, contact.*, courses.name as "course_name"');
			$this->db->from('user');
			$this->db->join('user_information', 'user_information.user_id = user.id', 'left');
			$this->db->join('courses', 'courses.id = user_information.course_id', 'left');
			$this->db->join('contact', 'contact.u_id = user.id', 'left');
			$this->db->where ('user.username', addslashes($username));

			$result = $this->db->get();
			return $result->row();
		}

		public function hasPrivilege($privilege_name, $user_id) {
			$query = $this->db->query("SELECT * FROM user_privileges JOIN privileges ON user_privileges.privilege_id = privileges.id 
				                         WHERE user_privileges.user_id = '".addslashes($user_id)."' AND privileges.name = '".addslashes(trim($privilege_name))."'");
			if ($query->result()) {
				return true;
			}
			return false;
		}
		
		public function editUserInformation($info, $contact, $user_id) {
			$user_info = $this->db->query("SELECT * FROM user_information WHERE user_id = '".addslashes($user_id)."'");
			if (!$user_info->result()) {
				$this->db->query("INSERT INTO user_information (user_id, firstname, middlename, lastname, course_id, address, age, birthday, studentnumber, yearlevel)
					                values ('".addslashes($user_id)."', '".addslashes(trim($info['firstname']))."', '".addslashes(trim($info['middlename']))."', '".addslashes(trim($info['lastname']))."',
					                '".addslashes($info['course'])."', '".addslashes(trim($info['address']))."', '".addslashes(trim($info['age']))."', '".addslashes(trim($info['birthday']))."',
					                '".addslashes(trim($info['studentnumber']))."', '".addslashes(trim($info['yearlevel']))."')");
			}	else {
				$this->db->query("UPDATE user_information SET firstname = '".addslashes(trim($info['firstname']))."', middlename = '".addslashes(trim($info['middlename']))."', lastname = '".addslashes(trim($info['lastname']))."',
					                course_id = '".addslashes($info['course'])."', address = '".addslashes(trim($info['address']))."', age = '".addslashes(trim($info['age']))."',
					                birthday = '".addslashes($info['birthday'])."', studentnumber = '".addslashes(trim($info['studentnumber']))."', yearlevel = '".addslashes(trim($info['yearlevel']))."'
					                WHERE user_id = '".addslashes($user_id)."'");
			}
			$contact_info = $this->db->query("SELECT * FROM contact WHERE u_id = '".addslashes($user_id)."'");
			if (!$contact_info->result()) {
				$this->db->query("INSERT INTO contact (contact_number, facebook, twitter, email, u_id) VALUES ('".addslashes(trim($contact['number']))."', '".addslashes(($contact['facebook']))."', 
					               '".addslashes(trim($contact['twitter']))."', '".addslashes(trim($contact['email']))."', '".addslashes($user_id)."')");
			}	else {
				$this->db->query("UPDATE contact SET contact_number = '".addslashes(trim($contact['number']))."', facebook = '".addslashes(trim($contact['facebook']))."', twitter = '".addslashes(trim($contact['twitter']))."',
					               email = '".addslashes(trim($contact['email']))."' WHERE u_id = '".addslashes($user_id)."'");
			}
		}

		public function updateProfilePicture($user_id, $name) {
			$prev = $this->db->query("SELECT * FROM user_information WHERE user_id = '".addslashes($user_id)."'");
			$res = $prev->row();
			if ($res) {
				$this->db->query("UPDATE user_information SET profpic = '".addslashes($name)."' WHERE user_id = '".addslashes($user_id)."'");
				return $res;
			}	else {
				$this->db->query("INSERT INTO user_information (profpic, user_id) VALUES ('".addslashes(trim($name))."', '".addslashes($user_id)."')");
				return false;
			}
		}

		public function getImageByName($name) {
			$query = $this->db->query("SELECT * FROM user_information WHERE profpic = '".addslashes(trim($name))."'");
			return $query->result();
		}

	}
?>