<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        $data['title'] = 'Home';
        $data['books'] = $this->books_model->get_limit(4);
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]|max_length[30]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

        if($this->form_validation_run() != FALSE){
            $this->users_model->user_verify();
        }

        $this->load->view('template/header',$data);
        $this->load->view('home',$data);
        $this->load->view('template/footer');
    }
}