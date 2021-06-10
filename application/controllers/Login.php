<?php

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }
  public function index(){
    if($this->session->userdata("userId") != NULL){
      redirect('displayEvents');
    } else {
      $this->load->view('login');
    }
  }

  public function login_process(){
    $this->form_validation->set_rules('user_name','Username','trim|required|alpha_numeric|min_length[6]');
    $this->form_validation->set_rules('password','password','trim|required|alpha_numeric|min_length[6]');
     
    if ($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
      $this->load->view('login');
    } else {
     //Receive user credintial and scan for SQL injections
     $un_username=$this->input->post('username');
     $use1name = str_replace(str_split('\\ \'/:*?"<>|'), '', $un_username);
     $unsafe_pass=$this->input->post('password');
     $passw0rd= str_replace(str_split('\\ \'/:*?"<>|'), '', $unsafe_pass);
     $pass=hash("SHA512",$passw0rd);
     $query=$this->user_model->login($use1name,$pass);
    //  echo print_r($query);
      if($query->num_rows()>0)  {
        $row=$query->row();
        $userId = $row['userId'];
        $this->session->set_userdata($userId);
        redirect('');
      } else {
        $this->session->set_flashdata('error_msg', 'The username and password are incorrect.');
        $this->load->view('login');
      }
    }
  }

}
?>