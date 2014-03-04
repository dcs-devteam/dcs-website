<?php

  class Calendar extends DCS_Controller {

    public function __construct() {
      parent::__construct();

      $this->_determine_route();
      $this->load->helper('application_helper');
    }

    public function index() {
      $this->load->view('calendar/index');
    }

  }

?>