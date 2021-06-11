<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisplayEvent extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('EventModel');
        $this->load->model('RegisterModel');
        if(!$this->session->userdata('userId')){
            redirect(base_url()."login");
        }
    }

    function index(){
        $data['data'] = $this->EventModel->select();
        $data['user_info'] = $this->RegisterModel->select($this->session->userdata('userId'));
        $this->load->view('welcome_message',$data);
    }

    function Logout(){
        $data = $this->session->all_userdata();

        foreach($data as $row=>$rows_value){
            $this->session->unset_userdata($row);
        }
        session_unset();
        session_destroy();
        redirect(base_url()."login");
    }
}