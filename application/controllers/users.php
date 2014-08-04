<?php
  
  class Users extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('profile', 'update_profile', 'create', 'test');
      $this->request_methods['POST'] = array('edit_data', 'update_picture');
      
      $this->_check_request_method();
      $this->load->helper('application_helper');
      $this->load->helper('frontend_helper');
      $this->load->model('user_information_model', 'ui_model');
      $this->load->model('values_model');
      $this->load->model('role_model');
    }

    public function profile($username = null) {
      // If username is not given, check if user is logged in.
      if ($username == null) {
        $username = $this->session->userdata('username');
        if (!$username) {
          show_404();
        }
      }
      $user = $this->ui_model->getUserCredential($username);
      if (!$user) {        
        show_404();
      }
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);

      $info =  $this->ui_model->fetchUserInformation($username);
      $social_media_info = $this->ui_model->getUserSocialAccounts($user->id);

      if (!$info->user_id) {
        if ($username == $this->session->userdata('username')) {
          redirect('users/update_profile');
        } else {
          show_404();
        }
      }

      $data['main_content'] = $this->load->view("users/profile", array('info'=>$info, 'socials'=>$social_media_info), true);
      $this->parser->parse('layouts/default', $data);    
    }

    public function update_profile() {
      $user_id = $this->verifySession();      
      $username = $this->session->userdata('username');
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);

      $info = $this->ui_model->fetchUserInformation($username);
      $social_media_info = $this->ui_model->getUserSocialAccounts($user_id);
      $unset_social_media = $this->ui_model->getUnsetUserSocialAccounts($user_id);
      $courses = $this->values_model->getAllCourses();

      $this->load->helper('inflector');
      $data['main_content'] = $this->load->view("users/update_profile", array('info'=>$info, 'courses'=>$courses, 'social_media'=>$social_media_info, 'unset_social_media'=>$unset_social_media), true);
      $this->parser->parse('layouts/default', $data);
    }

    public function update_picture() {      
      $user_id = $this->verifySession();      
      $username = $this->session->userdata('username');
      $config['upload_path'] = 'assets/images/profile-images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
      $fileformat = end(explode(".", $_FILES['profile-picture']['name']));
      $config['file_name'] = $this->generateImageName(15, $fileformat).'.'.$fileformat;
      $config['max_size'] = '2048';
      $this->load->library('upload', $config);
      if ($_FILES['profile-picture']['size'] > 0) {        
        if  (!$this->upload->do_upload('profile-picture')) {
          print_r($this->upload->display_errors());
          $this->session->set_flashdata("alert", "The image is too big or it has an invalid format!");
        } else {
          $image_info = $this->upload->data();
          $prevPic = $this->ui_model->updateProfilePicture($user_id, 'assets/images/profile-images/'. $image_info['file_name']);  
          if ($prevPic) {
            unlink($prevPic->profpic);
          }
          $this->session->set_flashdata("notice", "Update Successful!");                
          $this->session->set_userdata('user_info', $this->ui_model->fetchUserInformation($username));        
        }
      }
      redirect('users/update_profile');
    }

    public function edit_data() {
      $user_id = $this->verifySession();
      $username = $this->session->userdata('username');      
      $info = $_POST['info'];
      $flag = false;
      foreach ($info as $key => $value) {
        if (!$value) {          
          $flag = true;
          break;
        }
      }
      $contacts = $_POST['contact'];
      if (!$flag) {        
        foreach ($contacts as $key => $value) {
          if (!$value && $key != 'number') {
            $flag = true;
            break;
          }
        }
      }
      $socials = $_POST['social'];
      if ($flag) {
        $this->session->set_flashdata('alert','Form Error');
      } else {
        $this->ui_model->editUserInformation($info, $user_id);
        $this->ui_model->editUserContacts($contacts, $user_id);
        $this->ui_model->editUserSocialMediaAccounts($socials, $user_id);
        $this->session->set_userdata('user_info', $this->ui_model->fetchUserInformation($username));
        $this->session->set_flashdata('notice','Update Success');
      }

      redirect('/users/update_profile','location');

    }

    public function create() {
      $this->verifyPrivilege('create user');

      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);

      // Data passed on view.
      $privileges = $this->values_model->getAllPrivileges();
      $roles = $this->role_model->getAllRoles();
      $this->load->helper('inflector');

      $data['main_content'] = $this->load->view("users/create", array('privilege_list' => $privileges, 'role_list' => $roles), true);
      
      $this->parser->parse('layouts/default', $data);
    }

    public function addUser() {
      $this->verifyUserPrivilege('create user');
      $_POST['email'] = trim($_POST['email']);      
      if ($_POST['email'] != "") {
        
      } else {
        $this->session->set_flashdata("alert", "Email is required!");
        redirect('users/create');
      }
    }

    private function generateImageName($length, $type) {
      $characters = "1234567890qwertyuiopasdfghjklzxcvbnm";      
      while(true) {
        $name = "";
        for ($i = 0; $i < $length; $i++) {
          $name .= $characters[rand(0, strlen($characters) - 1)];
        }
        if (!$this->ui_model->getImageByName('assets/images/profile-images/'.$name.$type)) {
          return $name;
        }
      }
    }

    private function verifyPrivilege($privilege_name) {
      $user_id = $this->verifySession();      
      if (!$this->ui_model->hasPrivilege($privilege_name, $user_id)) {
        $this->session->set_flashdata("alert", "You are not allowed to create users!");
        redirect('users/profile');
      }
      return $user_id;
    }

    private function verifySession() {
      $user_id = $this->session->userdata('user_id');    
      if (!$user_id) {        
        $this->session->set_flashdata("alert", "You are not logged in!");
        redirect('session/index');
      }
      return $user_id;
    }
  }

?>