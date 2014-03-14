<?php

  class News extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('index', 'show');

      $this->_check_request_method();
      $this->load->helper('application_helper');
    }

    public function index() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('news/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('news/index', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function show() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('news/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('news/show', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

  }

?>