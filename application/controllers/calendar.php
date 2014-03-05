<?php

  class Calendar extends DCS_Controller {

    public function __construct() {
      parent::__construct();

      $this->_determine_route();
      $this->load->helper('application_helper');
    }

    public function index() {
      $data['page_title'] = 'Department of Computer Science';
      $data['main_content'] = $this->load->view("calendar/index", array(), true);
      $this->parser->parse('layouts/full', $data);
    }

  }

?>