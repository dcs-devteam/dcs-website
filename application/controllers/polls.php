<?php 

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Polls extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['POST'] = array('answer');

      $this->_check_request_method();
      $this->load->model('poll_model', 'poll');
      $this->load->helper('application_helper');
    }

    public function answer() {
      $poll_id = $_POST['id'];
      $answer = $_POST['answer'];
      $this->poll->answer(array('poll_id' => $poll_id, 'answer' => $answer));
    }

  }

// End of file polls.php
// Location: ./application/controllers/polls.php