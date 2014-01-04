<?php

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Developers extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('index');
      $this->request_methods['POST'] = array('authenticate', 'create', 'update', 'sign_out');
      $this->required_validations = array(
        'index' => 'developer',
        'create' => 'developer',
        'update' => 'developer',
        'sign_out' => 'developer'
      );

      $this->_check_request_method();
      $this->_check_required_validation();
      $this->load->model('developer_model', 'developer');
      $this->load->model('meta_model', 'meta');
      $this->load->model('poll_model', 'poll');
      $this->load->helper('application_helper');
    }

    public function authenticate() {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $result = $this->developer->authenticate($username, $password);
      if ($result) {
        $this->session->set_userdata('developer', $result->username);
        echo 'true';
      } else {
        echo 'false';
      }
    }

    public function index() {
      $data['metas'] = $this->meta->all();
      $data['developers'] = $this->developer->all();
      $data['polls'] = $this->poll->all();
      $this->load->view('developers/index', $data);
    }

    public function create() {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $result = $this->developer->create(array('username' => $username, 'password' => $password));
      if ($result['success']) {
        $this->session->set_flashdata('notice', $result['message']);
      } else {
        $this->session->set_flashdata('alert', $result['message']);
      }
      redirect('developers/index');
    }

    public function update() {
      $password = $_POST['password'];
      $this->developer->update(array('username' => $this->session->userdata('developer'), 'password' => $password));
      $this->session->set_flashdata('notice', 'Password successfully updated.');
      redirect('developers/index');
    }

    public function sign_out() {
      $this->session->sess_destroy();
    }

  }

// End of file developer.php
// Location: ./application/controllers/developer.php