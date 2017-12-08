<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller{
    public function cart(){
        if($this->session->userdata('roles') == 'buyer'){
            $data['title'] = 'Your Shopping Cart';
            $data['books'] = $this->purchase_model->cart_get($this->session->userdata('email'));

            $formats = $this->books_model->get_table('formats');
            foreach($formats as $format)$data['format'][$format['format']]['emoji'] = $format['emoji'];
            $langs = $this->books_model->get_table('langs');
            foreach($langs as $lang)$data['lang'][$lang['language']]['emoji'] = $lang['emoji'];

            while(!isset($data['invoiceno']) || $this->purchase_model->invoice_exists($data['invoiceno']))$data['invoiceno'] = $this->generate_invoice();

            $this->purchase_model->cart_get($this->session->userdata('email'));
            $this->load->view('template/header',$data);
            $this->load->view('cart',$data);
            $this->load->view('template/footer',$data);
        }else{
            redirect(site_url());
        }
    }

    public function generate_invoice(){
        $res = 'TR-';
        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        for($i=0; $i<4; $i++)$res.=$alpha[rand(0, 51)];
        for($i=0; $i<5; $i++)$res.=rand(0, 9);
        return $res;
    }

    public function add(){
        $data = array(
            'email' => $this->session->userdata('email'),
            'isbn13' => $this->input->post('isbn13'),
            'discount' => $this->books_model->get_datum($this->input->post('isbn13'), 'discount'),
            'added' => date('Y-m-d')
        );
        $this->purchase_model->add_to_cart($data);
        redirect($this->input->post('caller'));
    }
    
    public function remove(){
        $data = array(
            'email' => $this->session->userdata('email'),
            'isbn13' => $this->input->post('isbn13')
        );
        $this->purchase_model->remove_from_cart($data);
        redirect(site_url().'cart');
    }

    public function checkout(){
        $this->purchase_model->purchase_books(array(
            'email' => $this->session->userdata('email'),
            'invoiceno' => $this->input->post('invoiceno'),
            'payment' => $this->input->post('payment'),
            'invdate' => date('Y-m-d')
        ));
        redirect(site_url().'users');
    }
}