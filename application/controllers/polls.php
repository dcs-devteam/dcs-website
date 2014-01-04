<?php 

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Polls extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('delete');
      $this->request_methods['POST'] = array('answer', 'answers', 'create');
      $this->required_validations = array(
        'create' => 'developer',
        'answers' => 'developer'
      );

      $this->_check_request_method();
      $this->_check_required_validation();
      $this->load->model('poll_model', 'poll');
      $this->load->helper('application_helper');
    }

    public function answer() {
      $poll_id = $_POST['id'];
      $answer = $_POST['answer'];
      $this->poll->answer(array('poll_id' => $poll_id, 'answer' => $answer));
    }

    public function answers() {
      $poll_id = $_POST['id'];
      $answers = $this->poll->answers($poll_id);
      echo json_encode($answers);
    }

    public function create() {
      $question = $_POST['question'];
      $this->poll->create(array('question' => $question));
      $this->session->set_flashdata('notice', 'Poll question successfully saved.');
      redirect('developers/index');
    }

    public function delete($id) {
      $result = $this->poll->delete($id);
      if ($result['success']) {
        $this->session->set_flashdata('notice', $result['message']);
      } else {
        $this->session->set_flashdata('alert', $result['message']);
      }
      redirect('developers/index');
    }

  }

// End of file polls.php
// Location: ./application/controllers/polls.php