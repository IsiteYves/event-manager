<?php
class UpdateUser extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        if(!$this->session->userdata('userId')){
            redirect(base_url().'login');
        }
    }

    function index(){
        $userId = $this->session->userdata('userId');
        $data['user']=$this->UserModel->userProfile($userId);
        $this->load->view('users-page/profileManagement',$data);
    }

    function validation(){
        $this->form_validation->set_rules('first_name','First Name','required|trim');
        $this->form_validation->set_rules('last_name','Last Name','required|trim');    
        
        if($this->form_validation->run()){
                $userId = $this->session->userdata('userId');
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                ); 

                $this->UserModel->update($userId,$data);
                redirect(base_url());
        }
        else{
            $this->index();
        }
            
    }
   }
?>