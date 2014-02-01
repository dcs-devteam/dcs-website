<?php

  class Info extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('parking', 'home', 'people');

      $this->_check_request_method();
      $this->load->model('meta_model', 'meta');
      $this->load->model('poll_model', 'poll');
      $this->load->model('secret_model', 'secret');
      $this->load->helper('application_helper');
    }

    public function people() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['main_content'] = $this->load->view('info/people', array(), true);
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $this->parser->parse('layouts/default', $data);
    }
  }

?>