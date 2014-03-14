<?php

  class Info extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('department', 'admission', 'why_upcdcs', 'research_lab_news', 
        'student_highlights', 'people', 'service_to_society', 'alumni_features', 'industry_partners');

      $this->_check_request_method();
      // $this->load->model('meta_model', 'meta');
      // $this->load->model('poll_model', 'poll');
      // $this->load->model('secret_model', 'secret');
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

    public function why_upcdcs() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/why_upcdcs', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function research_lab_news() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/research_lab_news', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function student_highlights() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/student_highlights', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function faculty() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/faculty', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function service_to_society() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/service_to_society', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function alumni_features() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/alumni_features', array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function industry_partners() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view('info/industry_partners', array(), true);
      $this->parser->parse('layouts/default', $data);
    }
  }

?>