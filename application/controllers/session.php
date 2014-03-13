<?php

  class Session extends DCS_Controller {

    public function __construct() {
      parent::__construct();

      $this->request_methods['POST'] = array('login');
      $this->request_methods['GET'] = array('index');
      $this->_check_request_method();
      $this->load->helper('application_helper');
    }

    public function index() {
      $data['page_title'] = "Department of Computer Science";
      $data['main_content'] = $this->load->view("session/index.php", array(), true);
      $this->parser->parse('layouts/profile', $data);
    }
  }

?>