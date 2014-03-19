<?php
  
  class Users extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('profile', 'update_profile');
      
      $this->_check_request_method();
      $this->load->helper('application_helper');
      $this->load->model('user_information_model', 'ui_model');
    }

    public function profile() {
      $data['page_title'] = 'Department of Computer Science';
      $info =  $this->ui_model->fetchUserInformation('1');
      $data['main_content'] = $this->load->view("users/profile", array('info'=>$info), true);
      $this->parser->parse('layouts/profile', $data);
    }

    public function update_profile() {
      $data['page_title'] = 'Department of Computer Science';
      $data['main_content'] = $this->load->view("users/update_profile", array(), true);
      $this->parser->parse('layouts/profile', $data);
    }

  }

?>