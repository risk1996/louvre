<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller{
	public function index($slug=NULL){
		$data['book'] = $this->books_model->get_books($slug);
		if(empty($data['book']))show_404();
		$data['title'] = 'Book Information';

		$formats = $this->books_model->get_table('formats');
		foreach($formats as $format)$data['format'][$format['format']]['emoji'] = $format['emoji'];
		$langs = $this->books_model->get_table('langs');
		foreach($langs as $lang)$data['lang'][$lang['language']]['emoji'] = $lang['emoji'];

		$this->load->view('template/header',$data);
        $this->load->view('book',$data);
        $this->load->view('template/footer',$data);
	}

	public function slug($str){
		return url_title(strtolower($str));
	}
} 