<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function manage($manage = NULL){
        $data['title'] = 'Manage ';
        if($manage == 'book')$data['title'] .= 'Books';
        else if($manage == 'bookgenre')$data['title'] .= 'Book Genres';
        else if($manage == 'bookfeatured')$data['title'] .= 'Featured Books';
        else if($manage == 'bookpromotion')$data['title'] .= 'Promoted Books';
        else if($manage == 'users')$data['title'] .= 'Users';
        else if($manage == 'userbook')$data['title'] .= 'Users\' Books, Rating, & Review';
        else if($manage == 'cart')$data['title'] .= 'User Carts';
        else if($manage == 'transactions')$data['title'] .= 'Transactions';
        else if($manage == 'transactiondetail')$data['title'] .= 'Transaction Details';

		$crud = new grocery_CRUD();
        $crud->set_table($manage);
        $crud->set_theme('datatables');
        $crud->unset_jquery();
        $data['crud']= $crud->render();

		$this->load->view('template/header',$data);
        $this->load->view('admin',$data);
        $this->load->view('template/footer',$data);
	}
}