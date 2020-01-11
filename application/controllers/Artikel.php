<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
		$this->load->model('kategori_model');
	}

	//Main page - Artikel
	public function index()
	{
		$konfigurasi	= $this->konfigurasi_model->listing();
		// Start listing artikel dengan pagination
		$this->load->library('pagination');

		$config['base_url']		= base_url('artikel/index/');
		$config['total_rows']	= count($this->artikel_model->total());
		$config['per_page']		= 12;
		$config['uri_segment'] 	= 3;
		// Start Limit dan start
		$limit 					= $config['per_page'];
		$start 					= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		// End limit dan start
		$this->pagination->initialize($config);

		$artikel 				= $this->artikel_model->artikel($limit,$start);
		// End listing artikel dengan pagintion


		$data = array(	'title'			=> 'Artikel - '.$konfigurasi->namaweb,
						'deskripsi'		=> 'Artikel - '.$konfigurasi->namaweb,
						'keywords'		=> 'Artikel - '.$konfigurasi->namaweb,
						'paginasi'		=> $this->pagination->create_links(),
						'artikel'		=> $artikel,
						'limit'			=> $limit,
						'total'			=> $config['total_rows'],
						'isi'			=> 'artikel/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Kategori Artikel
	public function kategori($slug_kategori)
	{
		$kategori 		= $this->kategori_model->read($slug_kategori);
		$id_kategori	= $kategori->id_kategori;
		$konfigurasi	= $this->konfigurasi_model->listing();

		// Start listing artikel dengan pagination
		$this->load->library('pagination');

		$config['base_url']		= base_url('artikel/kategori/'.$slug_kategori.'/index/');
		$config['total_rows']	= count($this->artikel_model->total_kategori($id_kategori));
		$config['per_page']		= 12;
		$config['uri_segment'] 	= 5;
		// Start Limit dan start
		$limit 					= $config['per_page'];
		$start 					= ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
		// End limit dan start
		$this->pagination->initialize($config);

		$artikel 				= $this->artikel_model->artikel_kategori($id_kategori,$limit,$start);
		// End listing artikel dengan pagintion


		$data = array(	'title'			=> 'Kategori artikel: '.$kategori->nama_kategori,
						'deskripsi'		=> 'Kategori artikel: '.$kategori->nama_kategori,
						'keywords'		=> 'Kategori artikel: '.$kategori->nama_kategori,
						'paginasi'		=> $this->pagination->create_links(),
						'artikel'		=> $artikel,
						'limit'			=> $limit,
						'total'			=> $config['total_rows'],
						'isi'			=> 'artikel/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Detail page - Artikel
	public function read($slug_artikel)
	{
		$artikel 	= $this->artikel_model->read($slug_artikel);
		$listing	= $this->artikel_model->home();

		$data 		= array(	'title'		=> $artikel->judul_artikel,
								'deskripsi'	=> $artikel->judul_artikel,
								'keywords'	=> $artikel->judul_artikel,
								'artikel'	=> $artikel,
								'listing'	=> $listing,
								'isi'		=> 'artikel/read'
	);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */