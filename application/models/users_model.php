<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function user_exists($email = FALSE){
        if(!$email)return FALSE;
        else{
            $query = $this->db->get_where('users', array('email' => $email));
            if($query->num_rows())return TRUE;
            else return FALSE;
        }
    }
    
    public function generate_random_string($len = 5){
        $dict = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $res = "";
        for($i=0; $i<$len; $i++)$res .= $dict[rand(0, 61)];
        return $res;
    }

    public function user_register($data){
        $email = $data['email'];
        $pass = $data['pass'];
        $fname = $data['fname'];
        $lname = $data['lname'];
        $gender = $data['gender'];
        $salt = generate_random_string();
    }

    public function get_user($email = FALSE){
        $this->db->select('*');
        $this->db->from('user');
        if($email)$this->db->where('email = '.$email);
        $query = $this->db->get();
        if($email)return $query->row_result();
        else if(isset($query))return $query->result_array();
        else return FALSE;
    }
}