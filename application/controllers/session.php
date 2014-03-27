<?php

  class Session extends DCS_Controller {

    public function __construct() {
      parent::__construct();

      $this->request_methods['POST'] = array('login');
      $this->request_methods['GET'] = array('index', 'logout');
      $this->_check_request_method();
      $this->load->helper('application_helper');
      $this->load->model('user_information_model', 'user_model');
    }

    public function index() {
      if ($this->session->userdata('user_id')) {
        redirect('users/profile');
      }
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);      
      $data['main_content'] = $this->load->view("session/index.php", array(), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function login() {
      $username = trim($_POST['username']);
      $password = trim($_POST['password']);

      if ($username == "" || $password == "") {
        $this->session->set_flashdata("alert", "Please fill-out all field!");
        redirect('session/index');
      }

      $user = $this->user_model->authentication($username, $password);
      if ($user) {        
        $user_info = $this->user_model->fetchUserInformation($user->id);
        $this->session->set_userdata('user_id', $user->id);
        $this->session->set_userdata('firstname', ($user_info && $user_info->firstname != NULL) ? $user_info->firstname : "");
        $this->session->set_userdata('lastname', ($user_info && $user_info->lastname != NULL) ? $user_info->lastname : "");
        redirect("users/profile");      
      } else {
        $this->session->set_flashdata("alert", "Wrong username or password!");
        redirect('session/index');
      }
    }

    public function logout() {
      $this->session->sess_destroy();
      redirect("session/index");
    }
  }

?>