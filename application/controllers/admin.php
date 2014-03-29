<?php

  class Admin extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('users', 'spotlights');

      $this->_check_request_method();
      $this->load->helper('application_helper');
    }

    public function users($page = 'index') {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('admin/users/' . $page, array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function spotlights($page = 'index') {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('admin/spotlights/' . $page, array(), true);
      $this->parser->parse('layouts/default', $data);
    }
  }

?>