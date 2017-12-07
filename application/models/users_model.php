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
            if($query->num_rows()>0)return TRUE;
            else return FALSE;
        }
    }
    
    public function user_info($email, $col){
        if(!$email)return FALSE;
        else{
            $this->db->select($col);
            $query = $this->db->get_where('users', array('email' => $email));
            return $query->row_array()[$col];
        }
    }

    public function user_verify($email, $pass){
        if($this->user_info($email, 'pass')===hash('sha256', $pass.$this->user_info($email, 'salt')))return TRUE;
        else return FALSE;
    }

    public function generate_random_string($len = 5){
        $dict = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $res = "";
        for($i=0; $i<$len; $i++)$res .= $dict[rand(0, 61)];
        return $res;
    }

    public function user_register($data){
        $data['salt'] = $this->generate_random_string();
        $data['pass'] = hash('sha256',$data['pass'].$data['salt']);
        if($data['lname']=='')$data['lname']=NULL;
        $this->db->insert('users', $data);
        redirect(base_url());
    }

    public function user_get($email = FALSE){
        $this->db->select('*');
        $this->db->from('users');
        if($email)$this->db->where('email', $email);
        $query = $this->db->get();
        if($email)return $query->row_array();
        else if(isset($query))return $query->result_array();
        else return FALSE;
    }

    public function user_books($email){
        if($this->user_exists($email)){
            $query = $this->db->get_where('userbook', array('email' => $email));
            return $query->result_array();
        }else{
            return NULL;
        }
    }

    public function user_own($email, $isbn13){
        $query = $this->db->get_where('userbook', array('email' => $email, 'isbn13' => $isbn13));
        if($query->num_rows()==0)return FALSE;
        else return TRUE;
    }
}