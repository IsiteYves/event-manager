<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisplayEvent extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('EventModel');
    }

    function index(){
        if($this->session->userdata("userId") == NULL){
            redirect('login');
        } else {
            $data['data'] = $this->EventModel->select();
            $this->load->view('welcome_message',$data);
        }
    }
}