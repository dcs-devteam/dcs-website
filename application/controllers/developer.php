<?php

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Developer extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods = array();

      $this->_check_request_method();
      $this->load->helper('application_helper');
    }

  }

// End of file developer.php
// Location: ./application/controllers/developer.php