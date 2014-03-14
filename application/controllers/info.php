<?php

  class Info extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('department', 'admission', 'research', 'faculty', 'campus_activities', 'initiatives_and_society');

      $this->_check_request_method();
      $this->load->helper('application_helper');
    }

    public function department() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/department', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function admission($program='ap-bachelor-of-science') {      
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/admission', array('program'=>$program), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function research() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/research', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function faculty() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/faculty', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function campus_activities() {
      $data['page_title'] = 'Department of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/campus_activities', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function initiatives_and_society() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/initiatives_and_society', array(), true);
      $this->parser->parse('layouts/default', $data);
    }    
  }

?>