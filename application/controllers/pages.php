<?php 

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Pages extends DCS_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function parking() {
      $this->load->view('pages/parking');
    }

  }

// End of file pages.php
// Location: ./application/controllers/pages.php