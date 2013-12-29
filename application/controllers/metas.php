<?php

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Metas extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['POST'] = array('create', 'update');
      $this->required_validations = array(
        'create' => 'developer',
        'update' => 'developer'
      );

      $this->_check_request_method();
      $this->_check_required_validation();
      $this->load->model('meta_model', 'meta');
    }

    public function create() {
      $property = $_POST['property'];
      $value = $_POST['value'];
      $result = $this->meta->create(array('property' => $property, 'value' => $value));
      if ($result['success']) {
        $this->session->set_flashdata('notice', $result['message']);
      } else {
        $this->session->set_flashdata('alert', $result['message']);
      }
      redirect('developer/index');
    }

    public function update() {
      $property = $_POST['property'];
      $value = $_POST['value'];
      $result = $this->meta->update(array('property' => $property, 'value' => $value));
      if ($result['success']) {
        $this->session->set_flashdata('notice', $result['message']);
      } else {
        $this->session->set_flashdata('alert', $result['message']);
      }
      redirect('developer/index');
    }

  }

// End of file metas.php
// Location: ./application/controllers/metas.php