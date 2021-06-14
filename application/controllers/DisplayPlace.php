<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisplayPlace extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('PlaceModel');
        $this->load->model('UserModel');
        if(!$this->session->userdata('userId')){
            redirect(base_url()."login");
        }
    }

    function index(){
        $data['data'] = $this->PlaceModel->select();
        $data['user_info'] = $this->UserModel->select($this->session->userdata('userId'));
        $this->load->view('places-page/displayPlaces',$data);
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

    function place(){
        $id = $this->input->get('id');
        $data['data'] = $this->PlaceModel->selectOnePlace($id);
        $this->load->view('places-page/view_place',$data);
    }
}