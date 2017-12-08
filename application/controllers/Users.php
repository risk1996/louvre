<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
    public function index(){
        if($this->session->userdata('roles') == "buyer" || $this->session->userdata('roles') == "manager"){
            $data['title'] = 'Account Detail';

            $data['user']['email'] = $this->session->userdata('email');
            $data['user']['fname'] = $this->session->userdata('fname');
            $data['user']['lname'] = $this->session->userdata('lname');
            $data['user']['gender'] = $this->users_model->user_info($data['user']['email'],'gender');
            if($data['user']['gender'] == 'M')$data['user']['gender'] = "Male";
            else if($data['user']['gender'] == 'F')$data['user']['gender'] = "Female";
            else $data['user']['gender'] = "Rather not say";

            $books = $this->books_model->get_users_books($data['user']['email']);
            $data['books'] = array();
            
            foreach($books as $value){
                 $book = $this->books_model->find_book(array('isbn13' => $value['isbn13']))[0];
                 $data['books'][$book['isbn13']] = $book;
            }

            $data['transactions'] = $this->purchase_model->transaction_list($data['user']['email']);
            foreach($data['transactions'] as $transaction){
                $data['trans'][$transaction['invoiceno']] = $this->purchase_model->transaction_get($transaction['invoiceno']);
            }

            $formats = $this->books_model->get_table('formats');
            foreach($formats as $format)$data['format'][$format['format']]['emoji'] = $format['emoji'];
            $langs = $this->books_model->get_table('langs');
            foreach($langs as $lang)$data['lang'][$lang['language']]['emoji'] = $lang['emoji'];

            $data['log']   = $this->session->flashdata('log')!=NULL?$this->session->flashdata('log'):NULL;

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
        if($this->session->userdata('email') != NULL)
            redirect(site_url());
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
            redirect(base_url());
        }
        
    }

    public function change(){
        $data['title'] = 'Edit User';

        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|max_length[25]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|alpha|max_length[25]');
        $this->form_validation->set_rules('oldpass', 'Old Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('pass', 'Password', 'trim|min_length[6]|differs[oldpass]');
        $this->form_validation->set_rules('confpass', 'Password Confirmation', 'trim|min_length[6]|matches[pass]');

        if($this->form_validation->run()==FALSE){
            $data['fname'] = $this->session->userdata('fname');
            $data['lname'] = $this->session->userdata('lname');
            $data['email'] = $this->session->userdata('email');
            $this->load->view('template/header', $data);
            $this->load->view('change', $data);
            $this->load->view('template/footer',$data);
        }
        else{
            $email = $this->session->userdata('email');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $oldpass = $this->input->post('oldpass');
            $pass = $this->input->post('pass');
            if($pass == '')$pass = $oldpass;
            if($this->users_model->user_verify($email, $oldpass)){
                $this->users_model->user_edit(array(
                    'email'  => $email,
                    'fname'  => $fname,
                    'lname'  => $lname,
                    'pass'   => $pass
                ));
                $newname = array(
                    'fname' => $fname,
                    'lname' => $lname
                );
                $this->session->set_userdata($newname);
            }else $this->session->set_flashdata('log', 'Invalid login credentials');
            redirect(base_url('users'));
        } 
    }
}