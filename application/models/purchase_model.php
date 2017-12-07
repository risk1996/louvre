<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function cart_get($email){
        $this->db->from('cart');
        $this->db->join('bookdetail', 'bookdetail.isbn13 = cart.isbn13');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function in_cart($email, $isbn13){
        $query = $this->db->get_where('cart', array('email' => $email, 'isbn13' => $isbn13));
        if($query->num_rows()==0)return FALSE;
        else return TRUE;
    }

    public function add_to_cart($data){
        $query = $this->db->insert('cart', $data);
    }

    public function remove_from_cart($data){
        $query = $this->db->delete('cart', $data);
    }
}