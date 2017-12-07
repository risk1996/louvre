<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function manage($manage = NULL){
        if($this->session->userdata('roles')!='manager')redirect(site_url());
        $data['title'] = 'Manage ';

		$crud = new grocery_CRUD();
        $crud->set_table($manage);
        $crud->set_theme('datatables');
        $crud->unset_jquery();

        $booklist = array();
        $books = $this->books_model->get_books();
        foreach($books as $book){
            $booklist[$book['isbn13']] = $book['isbn13'].' - '.$book['title'];
        }

        if($manage == 'book'){
            $data['title'] .= 'Books';
            $crud->set_subject('Book');
            $crud->columns('isbn13','title','price','pages','pubdate','author','lang','format');
            $crud->fields('isbn13','title','slug','price','summary','ed','pages','pubdate','author','lang','format','adddate');
            $crud->field_type('slug', 'invisible');
            $crud->field_type('adddate', 'invisible');
            $crud->required_fields('isbn13','title','price','pages','pubdate','author','lang','format');
            $crud->display_as('isbn13', 'ISBN13');
            $crud->display_as('title', 'Book Title');
            $crud->display_as('slug', 'SLUG');
            $crud->display_as('price', 'Price');
            $crud->display_as('summary', 'Book Summary');
            $crud->display_as('ed', 'Book Edition');
            $crud->display_as('pages', 'Pages');
            $crud->display_as('pubdate', 'Published Date');
            $crud->display_as('author', 'Author');
            $crud->display_as('lang', 'Language');
            $crud->display_as('format', 'Book Format');
            $crud->display_as('adddate', 'Added Date');
            $crud->set_relation('lang','langs','lang');
            $crud->set_relation('format','formats','format');
            $crud->unique_fields(array('isbn13'));
            $crud->callback_before_insert(array($this,'book_add_preapre'));
            $crud->callback_before_update(array($this,'book_edit_preapre'));
        }
        else if($manage == 'bookgenre'){
            $data['title'] .= 'Book Genres';
            $crud->set_subject('Book Genre');
            $crud->required_fields('isbn13','genre');
            $crud->field_type('isbn13', 'dropdown', $booklist);
            $crud->display_as('isbn13', 'ISBN13');
            $crud->display_as('genre', 'Book Genre');
            $crud->set_relation('genre','genres','genre');
        }
        else if($manage == 'bookspecial'){
            $data['title'] .= 'Special Books';
            $crud->set_subject('Special Book');
            $crud->required_fields('isbn13','featured','discount','until');
            $crud->field_type('isbn13', 'dropdown', $booklist);
            $crud->display_as('isbn13', 'ISBN13');
            $crud->display_as('featured', 'Is Featured?');
            $crud->display_as('promotiontitle', 'Promotion Title');
            $crud->display_as('promotionsubtitle', 'Promotion Subtitle');
            $crud->display_as('promotioninfo', 'Promotion Info');
            $crud->display_as('discount', 'Book Discount');
            $crud->display_as('until', 'Valid Until');
            $crud->unique_fields(array('isbn13','until'));
        }
        else if($manage == 'cart'){
            $data['title'] .= 'User Carts';
            $crud->set_subject('User Cart');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->display_as('email', 'User E-Mail');
            $crud->display_as('isbn13', 'ISBN13');
            $crud->display_as('discount', 'Book Discount');
            $crud->display_as('added', 'Added Date');
            $crud->unique_fields(array('email','isbn13'));
        }
        else if($manage == 'formats'){
            $data['title'] .= 'Book Formats';
            $crud->set_subject('Book Format');
            $crud->required_fields('format');
            $crud->display_as('format', 'Book Format');
            $crud->display_as('emoji', 'CSS Emoji');
            $crud->unique_fields(array('format'));
        }
        else if($manage == 'genres'){
            $data['title'] .= 'Book Genres';
            $crud->set_subject('Book Genre');
            $crud->required_fields('genre');
            $crud->display_as('genre', 'Book Genre');
            $crud->display_as('parentgenre', 'Parent Genre');
            $crud->set_relation('parentgenre','genres','genre');
            $crud->unique_fields(array('genre'));
        }
        else if($manage == 'langs'){
            $data['title'] .= 'Book Languages';
            $crud->set_subject('Book Language');
            $crud->required_fields('lang', 'language');
            $crud->display_as('lang', 'Language Code');
            $crud->display_as('language', 'Language');
            $crud->display_as('emoji', 'CSS Emoji');
            $crud->unique_fields(array('lang'));
        }
        else if($manage == 'transactions'){
            $data['title'] .= 'Transactions';
            $crud->set_subject('Transaction');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->display_as('invoiceno', 'Invoice Number');
            $crud->display_as('email', 'User E-Mail');
            $crud->display_as('payment', 'Payment Method');
            $crud->display_as('invdate', 'Invoice Date');
            $crud->unique_fields(array('invoiceno'));
        }
        else if($manage == 'transactiondetail'){
            $data['title'] .= 'Transaction Details';
            $crud->set_subject('Transaction Detail');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->display_as('invoiceno', 'Invoice Number');
            $crud->display_as('isbn13', 'ISBN13');
            $crud->display_as('discount', 'Book Discount');
            $crud->unique_fields(array('invoiceno', 'isbn13'));
        }
        else if($manage == 'userbook'){
            $data['title'] .= 'Users\' Books';
            $crud->set_subject('Users\' Book');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->display_as('email', 'User E-Mail');
            $crud->display_as('isbn13', 'ISBN13');
            $crud->display_as('rating', 'User Rating');
            $crud->display_as('review', 'User Review');
            $crud->unique_fields(array('email', 'isbn13'));
        }
        else if($manage == 'users'){
            $data['title'] .= 'Users';
            $crud->set_subject('User');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->columns('email','roles','fname','lname','gender');
            $crud->display_as('email', 'User E-Mail');
            $crud->display_as('roles', 'User Role');
            $crud->display_as('fname', 'User First Name');
            $crud->display_as('lname', 'User Last Name');
            $crud->display_as('gender', 'User Gender');
            $crud->display_as('pass', 'Password');
            $crud->display_as('salt', 'Password Salt');
            $crud->unique_fields(array('email'));
        }

        $data['crud']= $crud->render();

		$this->load->view('template/header',$data);
        $this->load->view('admin',$data);
        $this->load->view('template/footer',$data);
    }

    public function slug($str){
		return url_title(strtolower($str));
	}

    function book_add_preapre($post){
        $post['slug'] = $this->slug($post['title']);
        $post['adddate'] = date('Y-m-d');
        return $post;
    }

    function book_edit_preapre($post){
        $post['slug'] = $this->slug($post['title']);
        return $post;
    }
}