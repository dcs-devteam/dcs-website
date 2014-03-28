<?php
  
  class Users extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('profile', 'update_profile', 'create');
      $this->request_methods['POST'] = array('edit_data', 'update_picture');
      
      $this->_check_request_method();
      $this->load->helper('application_helper');
      $this->load->helper('frontend_helper');
      $this->load->model('user_information_model', 'ui_model');
      $this->load->model('values_model');
    }

    public function profile($id = 0) {
      if ($id == 0) {
        $id = $this->session->userdata('user_id');
        if (!$id) {
          show_404();
        }
      }
      $user = $this->ui_model->getUserCredential($id);
      if (!$user) {
        show_404();
      }
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $info =  $this->ui_model->fetchUserInformation($id);      
      if (!$info->user_id) {
        if ($id == $this->session->userdata('user_id')) {
          redirect('users/update_profile');
        } else {
          show_404();
        }
      } 
      $data['main_content'] = $this->load->view("users/profile", array('info'=>$info), true);
      $this->parser->parse('layouts/default', $data);    
    }

    public function update_profile() {
      $user_id = $this->session->userdata('user_id');
      if (!$user_id) {
        $this->session->set_flashdata("alert", "You are not logged in!");
        redirect('session/index');
      }
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);
      $info =  $this->ui_model->fetchUserInformation($user_id);
      $data['main_content'] = $this->load->view("users/update_profile", array('info'=>$info, 'courses'=>$this->values_model->getAllCourses()), true);      
      $this->parser->parse('layouts/default', $data);
    }

    public function update_picture() {
      $user_id = $this->session->userdata('user_id');
      if (!$user_id) {
        $this->session->set_flashdata("alert", "You are not logged in!");
        redirect('session/index');
      }
      $config['upload_path'] = 'assets/images/profile-images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
      $fileformat = end(explode(".", $_FILES['profile-picture']['name']));
      $config['file_name'] = $this->generateImageName(15, $fileformat).'.'.$fileformat;
      $config['max_size'] = '1024';
      $this->load->library('upload', $config);
      if ($_FILES['profile-picture']['size'] > 0) {        
        if  (!$this->upload->do_upload('profile-picture')) {
          $this->session->set_flashdata("alert", "The image is too big or it has an invalid format!");          
          echo $this->update->error();
        } else {          
          $image_info = $this->upload->data();
          $prevPic = $this->ui_model->updateProfilePicture($user_id, 'assets/images/profile-images/'. $image_info['file_name']);  
          if ($prevPic) {
            unlink($prevPic->profpic);
          }
          $this->session->set_flashdata("notice", "Update Successful!");                
          $this->session->set_userdata('user_info', $this->ui_model->fetchUserInformation($user_id));        
          // if ($prevPic) {                                    
          //   unlink($prevPic->profpic);            
          //   $this->session->set_flashdata("notice", "Update Successful!");                
          //   $this->session->set_userdata('user_info', $this->ui_model->fetchUserInformation($user_id));
          // } else {
          //   unlink('assets/images/profile-images/'. $image_info['file_name']);
          //   $this->session->set_flashdata("alert", "Please fill out the form before changing your picture!");
          // }
        }
      }
      redirect('users/update_profile');
    }

    public function edit_data() {
      $user_id = $this->session->userdata('user_id');
      if (!$user_id) {
        $this->session->set_flashdata("alert", "You are not logged in!");
        redirect('session/index');
      }
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
          if (!$value) {          
            $flag = true;
            break;
          }
        }
      }
      if ($flag) {
        $this->session->set_flashdata('alert','Form Error');
      } else {
        $this->ui_model->editUserInformation($info, $contacts, $user_id);
        $this->session->set_userdata('user_info', $this->ui_model->fetchUserInformation($user_id));
        $this->session->set_flashdata('notice','Update Success');
      }

      redirect('/users/update_profile','location');

    }

    public function create() {
      $data['page_title'] = 'Department Of Computer Science';
      $data['sidebar_content'] = $this->load->view('partials/sidebar', array(), true);      
      $data['main_content'] = $this->load->view("users/create", array(), true);
      $this->parser->parse('layouts/default', $data);
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
  }

?>