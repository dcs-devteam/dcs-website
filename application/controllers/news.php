<?php

  class News extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('index', 'show', 'make');
      $this->request_methods['POST'] = array('add');

      $this->_check_request_method();
      $this->load->helper('application_helper');
      $this->load->model('news_model', 'model');
      $this->load->model('user_information_model', 'user_model');
    }

    public function index() {
      $user_id = $this->session->userdata('user_id');
      $canWrite = ($user_id && $this->user_model->hasPrivilege("create news", $user_id));
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('news/index', array("news"=>$this->model->getAll(), "canWrite"=>$canWrite), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function show($slug = "'") {
      if ($slug == "'") {
        show_404();
      }      
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('news/show', array("news" => $this->model->getNewsBySlug(trim($slug))), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function make() {
      $user_id = $this->session->userdata('user_id');
      if (!$user_id) {
        $this->session->set_flashdata("alert", "You are not logged in!");
        redirect('session/index');
      }
      if (!$this->user_model->hasPrivilege("create news", $user_id)) {
        $this->session->set_flashdata("alert", "You are not allowed write a news article!");
        redirect('news/index');
      }
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('news/make', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function add() {
      $user_id = $this->session->userdata('user_id');
      if (!$user_id) {
        $this->session->set_flashdata("alert", "You are not logged in!");
        redirect('session/index');
      }
      $title = trim($_POST['title']);
      $content = trim($_POST['content']);
      if ($title == "" || $content == "") {
        $this->session->set_flashdata("alert", "Please fill-up all required field!");
        redirect('news/make');
      }      
      $config['upload_path'] = 'assets/images/news-images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
      $fileformat = end(explode(".", $_FILES['news_image']['name']));
      $config['file_name'] = $this->generateImageName(15, $fileformat).'.'.$fileformat;
      $config['max_size'] = '1024';
      $this->load->library('upload', $config);
      if ($_FILES['news_image']['size'] > 0) {        
        if  (!$this->upload->do_upload('news_image')) {
          $this->session->set_flashdata("alert", "The image is too big or it has an invalid format!");        
          redirect('news/make');
        }
      }
      $content = preg_replace('/\n{2,}/', "</p><p>", $content);
      $content = preg_replace('/\n/', '</p><p>',$content);
      $content = "<p>".$content."</p>";
      $news_id = $this->model->add($title, $content, $this->generateSlug($title), $user_id);
      if ($news_id) {
        $this->session->set_flashdata("notice", "News was added successfully!");
        $image_info = $this->upload->data();        
        if ($_FILES['news_image']['size'] > 0) {
          $this->model->addNewsImage($news_id, 'assets/images/news-images/'. $image_info['file_name']);
        }
      }  else {
        $this->session->set_flashdata("alert", "An error was encountered while adding the news!");
      }
      redirect('news/make');
    }

    public function upload() {
      // TODO
      // assigned: eman
      // @file retrieve from $_FILES['file']
      // @return JSON object in this format: { "fileLink": url/to/uploaded/image }
      // @notes
      //  -- if naay error like 404, maybe i-set pa sa request_methods sa taas nga POST/GET ang pag-access ani nga function
    }

    private function generateImageName($length, $type) {
      $characters = "1234567890qwertyuiopasdfghjklzxcvbnm";      
      while(true) {
        $name = "";
        for ($i = 0; $i < $length; $i++) {
          $name .= $characters[rand(0, strlen($characters) - 1)];
        }
        if (!$this->model->getImageByName('assets/images/news-images/'.$name.$type)) {
          return $name;
        }
      }
    }

    private function generateSlug($title) {      
      $title = url_title($title);
      $ctr = 1;
      while(true) {
        if (!$this->model->getNewsBySlug($title)) {
          return $title;
        } else {
          if ($ctr == 1) {
            $title .= "-1";
          } else {
            $title .= $ctr;
          }
          $ctr++;
        }
      }
    }
  }

?>