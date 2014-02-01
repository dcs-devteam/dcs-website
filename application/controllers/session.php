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
      $this->load->view("session/index.php");
    }
  }

?>