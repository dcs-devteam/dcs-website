<?php

  class News extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('index', 'show', 'make');
      $this->request_methods['POST'] = array('add');

      $this->_check_request_method();
      $this->load->helper('application_helper');
      $this->load->model('news_model', 'model');
    }

    public function index() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('news/index', array("news"=>$this->model->getAll()), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function show($id) {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('news/show', array("news" => $this->model->getNewsById(trim($id))), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function make() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('news/make', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function add() {      
      $title = trim($_POST['title']);
      $content = trim($_POST['content']);
      if ($title == "" || $content == "") {
        $this->session->set_flashdata("alert", "Please fill-up all required field!");
        redirect('news/make');
      }      
      $config['upload_path'] = 'assets/images/news-images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
      $config['file_name'] = $this->generateImageName(15).'.png';
      $config['max_size'] = '1024';
      $this->load->library('upload', $config);      
      if (($_FILES['news_image']['size'] > 0) && (!$this->upload->do_upload('news_image'))) {
        $this->session->set_flashdata("alert", "The image is too big or it has an invalid format!");        
        redirect('news/make');
      }
      $content = preg_replace('/\n{2,}/', "</p><p>", $content);
      $content = preg_replace('/\n/', '</p><p>',$content);
      $content = "<p>".$content."</p>";
      $news_id = $this->model->add($title, $content, 1);
      if ($news_id) {
        $this->session->set_flashdata("notice", "News was added successfully!");
        $image_info = $this->upload->data();        
        if ($_FILES['news_image']['size'] > 0) {
          $this->model->addNewsImage($news_id, $image_info['file_name']);
        }
      }  else {
        $this->session->set_flashdata("alert", "An error was encountered while adding the news!");
      }
      redirect('news/make');
    }

    private function generateImageName($length) {
      $characters = "1234567890qwertyuiopasdfghjklzxcvbnm";      
      while(true) {
        $name = "";
        for ($i = 0; $i < $length; $i++) {
          $name .= $characters[rand(0, strlen($characters) - 1)];
        }
        if (!$this->model->getImageByName($name)) {
          return $name;
        }
      }
    }
  }

?>