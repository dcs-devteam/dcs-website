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
			$this->db->select('user_information.*, contact_information.*, courses.name as "course_name"');
			$this->db->from('user');
			$this->db->join('user_information', 'user_information.user_id = user.id', 'left');
			$this->db->join('contact_information', 'contact_information.user_id = user.id', 'left');
			$this->db->join('courses', 'courses.id = user_information.course_id', 'left');
			$this->db->where ('user.username', addslashes($username));

			$result = $this->db->get();
			return $result->row();
		}

		public function getUserSocialAccounts($user_id) {			
			$query = "SELECT social_media.*, user_social_media.value FROM social_media LEFT JOIN user_social_media ON user_social_media.social_media_id = social_media.id WHERE user_social_media.user_id='". addslashes($user_id) ."'";
			$res = $this->db->query($query);
			return $res->result();
		}

		public function getUnsetUserSocialAccounts($user_id) {
            $query = "SELECT social_media.* FROM social_media WHERE social_media.id NOT IN (SELECT user_social_media.social_media_id FROM user_social_media WHERE user_id = '". $user_id ."')";
            $res = $this->db->query($query);
            return $res->result();
        }


		public function hasPrivilege($privilege_name, $user_id) {
			$query = $this->db->query("SELECT * FROM user_privileges JOIN privileges ON user_privileges.privilege_id = privileges.id 
				                         WHERE user_privileges.user_id = '".addslashes($user_id)."' AND privileges.name = '".addslashes(trim($privilege_name))."'");
			if ($query->result()) {
				return true;
			}
			return false;
		}
		
		public function editUserInformation($info, $user_id) {
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
		}

		public function editUserContacts($contact, $user_id) {
			$contact_info = $this->db->query("SELECT * FROM contact_information WHERE user_id = '".addslashes($user_id)."'");
			if (!$contact_info->result()) {
				$this->db->query("INSERT INTO contact_information VALUES ('".addslashes($user_id)."', '".addslashes(trim(($contact['number'])))."', 
					               '".addslashes(trim($contact['email']))."')");
			}	else {
				$this->db->query("UPDATE contact_information SET phone_number = '".addslashes(trim($contact['number']))."', email = '".addslashes(trim($contact['email']))."' WHERE user_id = '".addslashes($user_id)."'");
			}
		}

		public function editUserSocialMediaAccounts($socials, $user_id) {
			foreach ($socials as $key => $value) {
				$check_query = "SELECT * FROM user_social_media WHERE user_id='". addslashes($user_id) ."' AND social_media_id='". addslashes($key) ."'";
				$social = $this->db->query($check_query);
				if (!$social->result()) {
					$add_query = "INSERT INTO user_social_media values ('". addslashes($user_id) ."', '". addslashes($key) ."', '". addslashes(trim($value)) ."')";
					$this->db->query($add_query);
				}	else {
					$update_query = "UPDATE user_social_media SET value='". addslashes(trim($value)) ."' WHERE user_id='". addslashes($user_id) ."' AND social_media_id='". addslashes($key) ."'";
					$this->db->query($update_query);
				}
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