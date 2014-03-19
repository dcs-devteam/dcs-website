<?php
  
  class Users extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('profile', 'update_profile');
      $this->request_methods['POST'] = array('edit_data');
      
      $this->_check_request_method();
      $this->load->helper('application_helper');
      $this->load->helper('frontend_helper');
      $this->load->model('user_information_model', 'ui_model');
    }

    public function profile() {                  
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $info =  $this->ui_model->fetchUserInformation('1');
      $data['main_content'] = $this->load->view("users/profile", array('info'=>$info), true);
      $this->parser->parse('layouts/default', $data);    
    }

    public function update_profile() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('info/partials/sidebar', array(), true);
      $data['main_content'] = $this->load->view("users/update_profile", array(), true);      
      $this->parser->parse('layouts/default', $data);
    }

    public function edit_data() {
      $info = array(
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'], 
        'address' => $_POST['address'], 
        'birthday' => $_POST['birthday'],
        'age' => $_POST['age'],
        'student_number' => $_POST['student_number'],
        'course' => $_POST['course'],
        'year' => $_POST['year']
      );

      $contacts = array(
        'email' => $_POST['email'],
        'number' => $_POST['number'],
        'facebook' => $_POST['facebook'],
        'twitter' => $_POST['twitter']
      ); 
      $flag = 0;
      foreach ($info as $key => $value) {
        if (isset($value)) {
          $flag = 1;
          break;
        }
      }
      foreach ($contacts as $key => $value) {
        if (isset($value)) {
          $flag = 1;
          break;
        }
      }

      if ($flag) {
        $this->session->set_flashdata('alert','Form Error');
      } else {
        $this->session->set_flashdata('Notice','Update Success');
      }

      redirect('/users/update_profile','location');

    }
  }

?>