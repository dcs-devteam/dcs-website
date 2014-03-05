<?php
  
  class Users extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('profile');
      
      $this->_check_request_method();
      $this->load->helper('application_helper');
    }

    public function profile() {
      $data['page_title'] = 'Department of Computer Science';
      $data['main_content'] = $this->load->view("users/profile", array(), true);
      $this->parser->parse('layouts/profile', $data);
    }

  }

?>