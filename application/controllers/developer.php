<?php

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Developer extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('index');
      $this->request_methods['POST'] = array('authenticate');
      $this->required_validations = array(
        'index' => 'developer'
      );

      $this->_check_request_method();
      $this->_check_required_validation();
      $this->load->model('developer_model', 'developer');
      $this->load->helper('application_helper');
    }

    public function authenticate() {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $result = $this->developer->authenticate($username, $password);
      if (count($result) == 1) {
        $this->session->set_userdata('developer', $result->username);
        echo 'true';
      } else {
        echo 'false';
      }
    }

    public function index() {
      $this->load->view('developer/index');
    }

  }

// End of file developer.php
// Location: ./application/controllers/developer.php