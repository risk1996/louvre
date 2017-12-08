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
        $this->db->insert('cart', $data);
    }

    public function remove_from_cart($data){
        $this->db->delete('cart', $data);
    }

    public function transaction_list($email){
        $query = $this->db->get_where('transactions', array('email' => $email));
        return $query->result_array();
    }

    public function transaction_get($invoiceno){
        $query = $this->db->get_where('transactionsdetail', array('invoiceno' => $invoiceno));
        return $query->result_array();
    }

    public function invoice_exists($invoiceno){
        $query = $this->db->get_where('transactions', array('invoiceno' => $invoiceno));
        return ($query->num_rows()>0);
    }

    public function purchase_books($data){
        $this->db->trans_start();
            $books = $this->cart_get($data['email']);
            $this->db->insert('transactions', $data);
            foreach($books as $book){
                $details = array(
                    'invoiceno' => $data['invoiceno'],
                    'isbn13' => $book['isbn13'],
                    'discount' => $book['discount']
                );
                $this->db->insert('transactionsdetail', $details);
                $own = array(
                    'email' => $book['email'],
                    'isbn13' => $book['isbn13']
                );
                $this->db->insert('userbook', $own);
            }
            $this->db->delete('cart', array('email' => $data['email']));
        $this->db->trans_complete();
        if($this->db->trans_status()==FALSE){
            $this->db->trans_rollback();
        }
        else{
            $this->db->trans_commit();
        }
    }
}