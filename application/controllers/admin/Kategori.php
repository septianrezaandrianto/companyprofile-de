<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}

	// Main page kategori
	public function index()
	{
		$kategori = $this->kategori_model->listing();

		// Start validasi
		$this->form_validation->set_rules('nama_kategori','Nama Kategori','required|is_unique[kategori.nama_kategori]',
			array(	'required'	=> '%s harus diisi',
					'is_unique'	=> '%s <strong>'.$this->input->post('nama_kategori').
						'</strong> sudah ada. Buat kategori baru!'));
		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Data kategori artikel ('.count($kategori).')',
						'kategori'	=> $kategori,
						'isi'		=> 'admin/kategori/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$i = $this->input;

			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data = array(	'slug_kategori'			=> $slug_kategori,
							'nama_kategori'			=> $i->post('nama_kategori'),
							'urutan_kategori'		=> $i->post('urutan_kategori')
							);
			$this->kategori_model->tambah($data);
			$this->session->set_flashdata('sukses' , 'Data telah ditambah');
			redirect(base_url('admin/kategori'),'refresh');

		}
		// End masuk ke database
	}

	// Edit kategori
	public function edit($id_kategori)
	{
		$kategori = $this->kategori_model->detail($id_kategori);

		// Start validasi
		$this->form_validation->set_rules('nama_kategori','Nama Kategori','required',
			array(	'required'	=> '%s harus diisi'
					));
		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit kategori artikel ('.count($kategori).')',
						'kategori'	=> $kategori,
						'isi'		=> 'admin/kategori/edit'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$i = $this->input;

			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data = array(	'id_kategori'			=> $id_kategori,
							'slug_kategori'			=> $slug_kategori,
							'nama_kategori'			=> $i->post('nama_kategori'),
							'urutan_kategori'		=> $i->post('urutan_kategori')
							);
			$this->kategori_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/kategori'),'refresh');

		}
		// End masuk ke database
	}

	// Delete
	public function delete($id_kategori)
	{
		// Start Proteksi delete
		$this->check_login->check();
		// End proteksi delete
		
		$admin = $this->kategori_model->detail($id_kategori);
		$data = array(	'id_kategori'	=> $admin->id_kategori);

		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */