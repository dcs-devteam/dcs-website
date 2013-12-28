<?php 

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Pages extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('parking');

      $this->_check_request_method();
      $this->load->model('poll_model', 'poll');
      $this->load->helper('application_helper');
    }

    public function parking() {
      $data['poll'] = $this->poll->latest();
      $this->load->view('pages/parking', $data);
    }

  }

// End of file pages.php
// Location: ./application/controllers/pages.php