<?php 

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Pages extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('parking');

      $this->_check_request_method();
      $this->load->helper('application_helper');
    }

    public function parking() {
      $this->load->view('pages/parking');
    }

  }

// End of file pages.php
// Location: ./application/controllers/pages.php