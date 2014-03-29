<?php

  class Info extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('department', 'admission', 'research', 'faculty', 'campus_activities',
        'developer_corner', 'initiatives_and_society', 'partners');

      $this->_check_request_method();
      $this->load->model('cockpit_model', 'cockpit');
      $this->load->helper('application_helper');
    }

    public function department() {
      $data['page_title'] = 'Department Of Computer Science';
      $content['message'] = $this->cockpit->find('Message from the Chair', true);
      $content['history'] = $this->cockpit->find('History', true);
      $content['vision'] = $this->cockpit->find('Vision', true);
      $content['mission'] = $this->cockpit->find('Mission', true);
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/department', $content, true);
      $this->parser->parse('layouts/default', $data);
    }

    public function admission($program='ap-bachelor-of-science') {      
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/admission', array('program'=>$program), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function research() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/research', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function faculty() {
      $data['page_title'] = 'Department Of Computer Science';
      $content['faculty'] = $this->cockpit->find('Faculty', false);
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/faculty', $content, true);
      $this->parser->parse('layouts/default', $data);
    }

    public function campus_activities() {
      $data['page_title'] = 'Department of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/campus_activities', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function developer_corner() {
      $data['page_title'] = 'Department Of Computer Science';
      $content['programming_contest'] = $this->cockpit->find('Programming Contest', true);
      $content['codetabai'] = $this->cockpit->find('Codetabai', true);
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/developer_corner', $content, true);
      $this->parser->parse('layouts/default', $data);
    }

    public function initiatives_and_society() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/initiatives_and_society', array(), true);
      $this->parser->parse('layouts/default', $data);
    }    

    public function partners() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/partners', array(), true);
      $this->parser->parse('layouts/default', $data);
    }
  }

?>