<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){

        if($this->session->userdata('roles') == "buyer"){

            $data['user']['email'] = $this->session->userdata('email');
            $data['user']['fname'] = $this->session->userdata('fname');
            $data['user']['lname'] = $this->session->userdata('lname');
            $data['user']['gender'] = $this->users_model->user_info($data['user']['email'],'gender');
            if($data['user']['gender'] == 'M')$data['user']['gender'] = "Male";
            else if($data['user']['gender'] == 'F')$data['user']['gender'] = "Female";
            else $data['user']['gender'] = "Rather not say";

            $data['user']['booksrating'] = $this->books_model->get_users_books($data['user']['email']);
            //$data['users']['bookdetails'] = [];
            // foreach($data['user']['bookrating'] as $value){
            //     array_push($data['users']['bookdetails'],$this->books_model->find_book('isbn13' => $value))
            // }


            $data['title'] = $data['user']['fname'];

            $this->load->view('template/header',$data);
            $this->load->view('user',$data);
            $this->load->view('template/footer',$data);
        }else{
            redirect(base_url());
        }
    }
    
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
            $this->load->view('template/footer',$data);
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