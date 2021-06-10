<?php

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('RegisterModel');
  }
  public function index(){
    // if($this->session->userdata("userId") != NULL){
    //   redirect('displayEvents');
    // } 
    // else {
    // }
       $this->load->view('login');

  }

  function login_process(){
    $this->form_validation->set_rules('user_name','Username','required|trim');
    $this->form_validation->set_rules('user_password','password','required|trim');
     
    if ($this->form_validation->run()){
      $username=$this->input->post('user_name');
      $password=$this->input->post('user_password');
 
      $pass=hash("SHA256",$password);
      
        $row=$this->RegisterModel->login($username,$pass);
        if($row== false){
            $this->session->set_flashdata('error_msg', 'The username or password is incorrect.');
            $this->load->view('login');  
        }
        else{
            $userId = $row['userId'];
            $this->session->set_userdata('userId',$userId);
            $data['user_info'] = $this->RegisterModel->select($this->session->userdata('userId'));
            redirect('');
        }
    }
    else {
        $this->index();
    }
    
  }

}
?>