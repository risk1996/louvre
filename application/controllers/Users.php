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
            $userdata = $this->users_model->user_get($email);
            $user = array(
                'email' => $email,
                'roles' => $userdata['roles'],
                'fname' => $userdata['fname'],
                'lname' => $userdata['lname']
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

        $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email|is_unique[users.email]|max_length[30]');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|max_length[25]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|alpha|max_length[25]');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confpass', 'Password Confirmation', 'trim|required|min_length[6]|matches[pass]');
        $this->form_validation->set_rules('eulaaccept', 'EULA acceptance declaration', 'required');

        if($this->form_validation->run()==FALSE){
            $data['email'] = $this->input->post('email');
            $data['fname'] = $this->input->post('fname');
            $data['lname'] = $this->input->post('lname');
            $data['gender'] = $this->input->post('gender');
            $this->load->view('template/header', $data);
            $this->load->view('register', $data);
            $this->load->view('template/footer');
        }
        else{
            $this->users_model->user_register(array(
                'email'  => $this->input->post('email'),
                'roles'  => 'buyer',
                'fname'  => $this->input->post('fname'),
                'lname'  => $this->input->post('lname'),
                'gender' => $this->input->post('gender'),
                'pass'   => $this->input->post('pass')
            ));
        }
        
    }
}