<?php

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class DCS_Controller extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods = array(
        'GET' => array(),
        'POST' => array()
      );

      $this->_determine_route();
    }

    protected function _determine_route() {
      $this->route['controller'] = $this->uri->rsegment(1);
      $this->route['action'] = $this->uri->rsegment(2);
      $this->load->vars($this->route);
    }

    protected function _check_request_method() {
      if (!in_array($this->route['action'], $this->request_methods[$_SERVER['REQUEST_METHOD']])) {
        show_404($this->route['controller'] . '/' . $this->route['action'] . ' with method ' . $_SERVER['REQUEST_METHOD'] . ' not found.');
      }
    }

  }

// End of file DCS_Controller.php
// Location: ./application/core/DCS_Controller.php