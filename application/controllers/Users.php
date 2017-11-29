<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){}
    
    public function login(){
        $email = $this->input->post('email');
        $pass  = $this->input->post('pass');
        if($this->users_model->user_exists($email) && $this->users_model->user_verify($email, $pass)){
            $user = array(
                'fname'     => $this->users_model->user_info($email, 'fname'),
                'lname'     => $this->users_model->user_info($email, 'lname'),
                'email'     => $email
            );
            $this->session->set_userdata($user);
        }
        $this->session->set_flashdata('log', 'Invalid login credentials');
        redirect(base_url());
    }

    public function logout(){
        $session_data = array('fname', 'lname', 'email');
        $this->session->unset_userdata($session_data);
        redirect(base_url());
    }

    public function register(){
        $data['title'] = 'Register New User';

        $this->load->view('template/header', $data);
        $this->load->view('register', $data);
        $this->load->view('template/footer');
    }
}