<?php
  class news_model extends CI_Model {

    public function __construct() {
      parent:: __construct();
      $this->load->database();
    }

    public function add($title, $content, $user_id) {
      $query = $this->db->query("INSERT INTO news (title, content, u_id) VALUES ('".addslashes(trim($title))."', 
                                '".addslashes(trim($content))."', '".addslashes($user_id)."')");
      return mysql_insert_id();      
    }

    public function getImageByName($name) {
      $query = $this->db->query("SELECT * FROM news_images WHERE name = '".addslashes($name)."'");
      return $query->result();
    }

  }

?>