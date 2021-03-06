<?php 

  class Pages extends DCS_Controller {

    public function __construct() {
      parent::__construct();
      $this->request_methods['GET'] = array('parking', 'home', 'faculty');

      $this->_check_request_method();
      $this->load->model('meta_model', 'meta');
      $this->load->model('poll_model', 'poll');
      $this->load->model('secret_model', 'secret');
      $this->load->model("news_model", "news");
      $this->load->helper('application_helper');
    }

    public function parking() {
      $data['meta']['website_status'] = $this->meta->find('website status');
      $data['meta']['website_completion'] = $this->meta->find('website completion');
      $data['developer'] = $this->session->userdata('developer');
      $data['poll'] = $this->poll->latest();
      $data['secrets'] = $this->secret->enabled();
      $this->load->view('pages/parking', $data);
    }

    public function home() {      
      $this->load->view('pages/home', array("news"=>$this->news->getRecentNews()));
    }    

  }

?>