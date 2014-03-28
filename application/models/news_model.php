<?php
  class news_model extends CI_Model {

    public function __construct() {
      parent:: __construct();
      $this->load->database();
    }

    public function getAll() {
      $query = $this->db->query("SELECT news.*, news_images.name FROM news LEFT JOIN news_images ON news_images.news_id = news.id order by news.date desc");
      return $query->result();
    }

    public function getNewsById($id) {
      $query = $this->db->query("SELECT news.*, news_images.name FROM news LEFT JOIN news_images ON news_images.news_id = news.id WHERE news.id='".addslashes($id)."'");
      return $query->row();
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

    public function addNewsImage($news_id, $name) {
      $query = $this->db->query("INSERT INTO news_images (news_id, name) VALUES ('".addslashes($news_id)."', '".addslashes($name)."')");
      return mysql_insert_id();
    }

  }

?>