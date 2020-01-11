<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('artikel_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('layanan_model');
		$this->load->model('galeri_model');
	}

	//Main page - Homepage
	public function index()
	{
		$konfigurasi 	= $this->konfigurasi_model->listing();
		$slider			= $this->galeri_model->slider();
		$layanan 		= $this->layanan_model->home();
		$artikel 		= $this->artikel_model->home();

		$data = array(	'title'		=> $konfigurasi->namaweb.' - '.$konfigurasi->tagline,
						'keywords'	=> $konfigurasi->namaweb.' - '.$konfigurasi->tagline.','.$konfigurasi->keywords,
						'deskripsi'	=> $konfigurasi->deskripsi,
						'slider'	=> $slider,
						'layanan'	=> $layanan,
						'artikel'	=> $artikel,
						'isi'		=> 'home/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */