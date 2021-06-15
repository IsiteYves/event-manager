<?php
class UpdateUser extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('userId')){
            redirect(base_url().'login');
        }
    }

    function index(){
        $userId = $this->session->userdata('userId');
        $data['user']=$this->UserModel->userProfile($userId);
        $this->load->view('users-page/profileManagement',$data);
    }

    function searchUser(){
        $this->load->model('UserModel');

        if($this->input->post('username')){
            $query = $this->input->post('username');
        }
        $data = $this->UserModel->searchUser($query);
        if($data->num_rows() == 0){
            $data['result'] = "No User Found";
        }
        else{
            $data['result'] = $data->result_array();
            $eventId = $this->input->get('id');
            $userId = $data['result'][0]['userId'];
            $this->load->model('EventModel');
            $this->EventModel->inviteToEvent($eventId,$userId);
            redirect(base_url()."event?id=".$eventId);
        }
    }


   }