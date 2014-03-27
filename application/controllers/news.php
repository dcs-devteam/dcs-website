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
      $data['main_content'] = $this->load->view('news/index', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function show() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('news/show', array(), true);
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
      $content = preg_replace('/\n{2,}/', "</p><p>", $content);
      $content = preg_replace('/\n/', '</p><p>',$content);
      $content = "<p>".$content."</p>";
      $news_id = $this->model->add($title, $content, 1);
      if ($news_id) {
        $this->session->set_flashdata("notice", "News was added successfully!");
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