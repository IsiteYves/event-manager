<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterEvent extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('EventModel');
    }

    function index(){
        if($this->session->userdata("userId") == NULL){
            redirect('login');
        } else {
            $data['data'] = $this->EventModel->select();
            $this->load->view('welcome_message',$data);
            $this->load->view('events-page/createEvent');
        }
    }

    function validation(){
        $config['allowed_types'] = 'jpg|png|gif';
        $config['upload_path'] = './event_images_uploads/';
        $config['encrypt_name'] = true;

        $this->load->library('upload',$config);

        $this->form_validation->set_rules('event_name','Event Name','required|trim');
        $this->form_validation->set_rules('event_description','Event Description','required|trim');
        $this->form_validation->set_rules('event_duration','Event Duration','required');

        if($this->form_validation->run()){
            if($this->upload->do_upload('event_image')){
                $image_name = $this->upload->data();
                $data = array(
                    'event_name' => $this->input->post('event_name'),
                    'event_description' => $this->input->post('event_description'),
                    'event_duration' => $this->input->post('event_duration'),
                    'event_image' => $image_name['file_name']
                ); 
                $id = $this->EventModel->insert($data);
                if($id > 0){
                    redirect('displayEvents');
                }       
            }
            else{
                $this->session->set_flashdata('message',$this->upload->display_errors());
                redirect('createEvent');
            }
            
        }
        else{
            $this->index();
        }
    }
}