<?php
  class news_model extends CI_Model {

    public function __construct() {
      parent:: __construct();
      $this->load->database();
    }

    public function add($title, $content, $slug, $user_id) {
      $query = $this->db->query("INSERT INTO news (title, content, slug, u_id) VALUES ('".addslashes(trim($title))."', 
                                '".addslashes(trim($content))."', '".addslashes($slug)."', '".addslashes($user_id)."')");
      return mysql_insert_id();      
    }

    public function addNewsImage($news_id, $name) {
      $query = $this->db->query("INSERT INTO news_images (news_id, name) VALUES ('".addslashes($news_id)."', '".addslashes($name)."')");
      return mysql_insert_id();
    }

    public function getAll() {
      $query = $this->db->query("SELECT news.*, news_images.name, user_information.* FROM news LEFT JOIN news_images ON news_images.news_id = news.id
                                 LEFT JOIN user_information ON user_information.user_id = news.u_id order by news.date desc");
      return $query->result();
    }

    public function getNewsById($id) {
      $query = $this->db->query("SELECT news.*, news_images.name, user_information.* FROM news LEFT JOIN news_images ON news_images.news_id = news.id LEFT JOIN user_information 
                                 ON user_information.user_id = news.u_id WHERE news.id='".addslashes($id)."'");
      return $query->row();
    }

    public function getRecentNews() {
      $query = $this->db->query("SELECT news.*, news_images.name, user_information.* FROM news LEFT JOIN news_images ON news_images.news_id = news.id
                                 LEFT JOIN user_information ON user_information.user_id = news.u_id order by news.date desc LIMIT 5");
      return $query->result();
    }


    public function getNewsBySlug($slug) {
      $query = $this->db->query("SELECT news.*, news_images.name, user_information.* FROM news LEFT JOIN news_images ON news_images.news_id = news.id LEFT JOIN 
                                 user_information ON user_information.user_id = news.u_id WHERE news.slug='".addslashes(trim($slug))."'");
      return $query->row();
    }    

    public function getImageByName($name) {
      $query = $this->db->query("SELECT * FROM news_images WHERE name = '".addslashes($name)."'");
      return $query->result();
    }
    
  }

?>