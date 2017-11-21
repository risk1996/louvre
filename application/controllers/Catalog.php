<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller{
	public function index($pg = 0){
		$criteria = array();
		$filters = array('isbn13', 'title', 'author', 'price', 'pages', 'lang', 'format', 'genre');
		foreach($filters as $filter)if($this->input->post($filter) !== NULL){
			if($filter=='genre')$criteria[$filter] = implode(',',$this->input->post($filter));
			else $criteria[$filter] = $this->input->post($filter);
		}
		if($this->input->post('searchby') !== NULL){
			$criteria[$this->input->post('searchby')] = $this->input->post('keyword');
		}
		$data['books'] = $this->books_model->find_book($criteria);
		$data['langs'] = $this->books_model->get_column('lang');
		$data['formats'] = $this->books_model->get_column('format');
		$data['genres'] = $this->books_model->get_genres();
		$data['criteria'] = $criteria;
		$data['title'] = 'Books Catalog';
		
		$this->load->library('pagination');
		$cfg['base_url'] = site_url().'catalog';
		$cfg['total_rows'] = count($data['books']);
		$cfg['per_page'] = 12;
		$cfg['full_tag_open'] = '<nav aria-label="Search results pages" style="margin: 0 auto;"><ul class="pagination">';
		$cfg['full_tag_close'] = '</ul></nav>';
		$cfg['attributes'] = array('class' => 'page-link');
		$cfg['first_tag_open'] = $cfg['prev_tag_open'] = $cfg['num_tag_open'] = $cfg['next_tag_open'] = $cfg['last_tag_open'] = '<li class="page-item">';
		$cfg['first_tag_close'] = $cfg['prev_tag_close'] = $cfg['num_tag_close'] = $cfg['next_tag_close']= $cfg['last_tag_close'] = '</li>';
		$cfg['first_link'] = '<span class="fa fa-angle-left"></span><span class="fa fa-angle-left"></span>';
		$cfg['prev_link'] = '</span><span class="fa fa-angle-left"></span>';
		$cfg['next_link'] = '</span><span class="fa fa-angle-right"></span>';
		$cfg['last_link'] = '</span><span class="fa fa-angle-right"></span></span><span class="fa fa-angle-right"></span>';
		$cfg['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$cfg['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($cfg);
		$data['pagination'] = $this->pagination->create_links();
		$data['page'] = intval($pg/$cfg['per_page']);

		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
        $this->load->view('template/footer');
    }

    public function recomended(){
		$data['books'] = $this->books_model->get_recommended();
		$data['title'] = 'Recommended Books Catalog';
		
		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
        $this->load->view('template/footer');
	}
}