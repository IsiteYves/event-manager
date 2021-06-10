<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisplayEvent extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('EventModel');
        $this->load->model('RegisterModel');
        if(!$this->session->userdata('userId')){
            redirect("login");
        }
    }

    function index(){
        $data['data'] = $this->EventModel->select();
        $data['user_info'] = $this->RegisterModel->select($this->session->userdata('userId'));
        $this->load->view('welcome_message',$data);
    }
}