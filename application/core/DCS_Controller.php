<?php

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class DCS_Controller extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    protected function _determine_route() {
      $route['controller'] = $this->uri->rsegment(1);
      $route['action'] = $this->uri->rsegment(2);
      $this->load->vars($route);
    }

  }

// End of file DCS_Controller.php
// Location: ./application/core/DCS_Controller.php