<?php

class Login extends CI_Controller {

  public function __construct(){
      parent::__construct();
      $this->load->model('UserModel');
  }
  public function index(){
    if($this->session->userdata("userId") != NULL){
      redirect(base_url().'displayEvents');
    } 
    else {
      $this->load->view('login');
    
    }

  }

  function login_process(){
    $this->form_validation->set_rules('user_name','Username','required|trim');
    $this->form_validation->set_rules('user_password','password','required|trim');
     
    if ($this->form_validation->run()){
      $username=$this->input->post('user_name');
      $password=$this->input->post('user_password');
 
      $pass=hash("SHA256",$password);
      
        $row=$this->UserModel->login($username,$pass);
        if($row== false){
            $this->session->set_flashdata('error_msg', 'The username or password is incorrect.');
            $this->load->view('login');  
        }
        else{
            foreach($row as $user_array){
              $this->session->set_userdata('userId',$user_array['userId']);
              redirect(''.base_url());
            }
          }
    }
    else {
        $this->index();
    }
    
  }

}
?>