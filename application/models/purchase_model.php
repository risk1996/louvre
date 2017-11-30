<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function cart_get($email){
        $query = $this->db->get_where('cart', array('email', $email));
        return $query->result_array();
    }
}