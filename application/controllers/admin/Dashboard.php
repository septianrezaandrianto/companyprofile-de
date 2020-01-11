<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
		$this->load->model('galeri_model');
		$this->load->model('layanan_model');
		$this->load->model('admin_model');
		$this->load->model('konfigurasi_model');

	}
	public function index()
	{
		$artikel 		= $this->artikel_model->listing();
		$galeri 		= $this->galeri_model->listing();
		$layanan 		= $this->layanan_model->listing();
		$admin 			= $this->admin_model->listing();
		// $konfigurasi 	=$this->konfigurasi_model->listing();

		$data 			= array(	'title'		=> 'Dashboard - Dominic English',
									'artikel'	=> $artikel,
									'galeri'	=> $galeri,
									'layanan'	=> $layanan,
									'admin'		=> $admin,
									'isi'		=> 'admin/dashboard/list'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */