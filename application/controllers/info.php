<?php

  class Info extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('department', 'academic_programs', 'research');

      $this->_check_request_method();
      $this->load->helper('application_helper');
    }

    public function department() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/department', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function academic_programs($program='ap-bachelor-of-science') {      
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/academic_programs', array('program'=>$program), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function research() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/research', array(), true);
      $this->parser->parse('layouts/default', $data);
    }
  }

?>