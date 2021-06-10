<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisplayEvent extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('EventModel');
    }

    function index(){
        $data['data'] = $this->EventModel->select();
        $this->load->view('welcome_message',$data);
    }
}