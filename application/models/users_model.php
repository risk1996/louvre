<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model{

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

    // public function user_register($data = NULL){
    //     if(isset($data))return FALSE;
    //     else{
    //         $salt = generate_random_string();
    //     }
    // }

    public function user_verify($email = FALSE, $pass = FALSE, $remember = FALSE){
        if($email || $pass)return FALSE;
        else{
            $query = $this->db->get_where('users', array('email' => $email, 'pass' => hash('sha256', $pass)));
            if($query->num_rows())return $query->result_array();
            else return FALSE;
        }
    }
}