<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
    public function register(){
        $data['title'] = 'Register New User';

        $this->load->view('template/header', $data);
        $this->load->view('register', $data);
        $this->load->view('template/footer');
    }
}