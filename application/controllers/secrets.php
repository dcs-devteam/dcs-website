<?php

  class Secrets extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('enable', 'disable');
      $this->request_methods['POST'] = array('create');
      $this->required_validations = array(
        'create' => 'developer',
        'enable' => 'developer',
        'disable' => 'developer'
      );

      $this->_check_request_method();
      $this->_check_required_validation();
      $this->load->model('secret_model', 'secret');
    }

    public function create() {
      $command = $_POST['command'];
      $script_path = $_POST['script_path'];
      $result = $this->secret->create(array('command' => $command, 'script_path' => $script_path));
      if ($result['success']) {
        $this->session->set_flashdata('notice', $result['message']);
      } else {
        $this->session->set_flashdata('alert', $result['message']);
      }
      redirect('developers/index');
    }

    public function enable($command) {
      $this->secret->enable($command);
      redirect('developers/index');
    }

    public function disable($command) {
      $this->secret->disable($command);
      redirect('developers/index');
    }

  }

?>