<?php

  class Info extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('department', 'people', 'academic_programs');

      $this->_check_request_method();
      $this->load->model('meta_model', 'meta');
      $this->load->model('poll_model', 'poll');
      $this->load->model('secret_model', 'secret');
      $this->load->helper('application_helper');
    }

    public function department() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['main_content'] = $this->load->view('info/department', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function academic_programs() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['main_content'] = $this->load->view('info/academic_programs', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function people() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['main_content'] = $this->load->view('info/people', array(), true);
      $this->parser->parse('layouts/default', $data);
    }
  }

?>