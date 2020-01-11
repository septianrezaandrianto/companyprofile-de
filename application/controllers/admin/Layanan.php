<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('layanan_model');
	}

	// Listing data layanan
	public function index()
	{
		$layanan  = $this->layanan_model->Listing();
		$data = array(	'title'		=> 'Data layanan ('.count($layanan).')',
						'layanan'		=> $layanan,
						'isi'		=> 'admin/layanan/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah layanan
	public function tambah()
	{

		// Start Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_layanan' , 'Judul layanan' , 'required',
			array(	'required'			=> '%s harus diisi'));

		$valid->set_rules('isi_layanan' , 'Isi layanan' , 'required',
			array(	'required'			=> '%s harus diisi'));
		
		
		if($valid->run()) {
			$config['upload_path']		= './assets/upload/images/asli/';
            $config['allowed_types']	= 'gif|jpg|png|jpeg';
            $config['max_size']			= 5000; // Dalam kilobyte
            $config['max_width']		= 5000; // Dalam pixel
            $config['max_height']		= 5000; // Dalam pixel

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar_layanan')) {
			// End validasi

		$data = array(	'title'				=> 'Tambah Layanan',
						'error_upload'		=> $this->upload->display_errors(),
						'isi'				=> 'admin/layanan/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Start masuk database
		}else{
			// Proses manipulasi gambar
			$upload_data = array('uploads' =>$this->upload->data());
			// Gambar asli disimpan difolder assets/upload/images/asli
			// Lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/images/thumbs
			$config['image_library']	= 'gd2';
			// Gambar versi asli
			$config['source_image'] 	= './assets/upload/images/asli/'.$upload_data['uploads']['file_name'];
			// Gambar versi kecil
			$config['new_image'] 		= './assets/upload/images/thumbs/'.$upload_data['uploads']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 200; // Dalam pixel
			$config['height']       	= 200; // Dalam pixel
			$config['thumb_marker']		='';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();


			$i = $this->input;
			$data = array(	'id_admin'			=> $this->session->userdata('id_admin'),
							'slug_layanan'		=> url_title($this->input->post('judul_layanan'), 'dash', TRUE),
							'judul_layanan'		=> $i->post('judul_layanan'),
							'isi_layanan'		=> $i->post('isi_layanan'),
							'harga_layanan'		=> $i->post('harga_layanan'),
							'gambar_layanan'	=> $upload_data['uploads']['file_name'],
							'status_layanan'	=> $i->post('status_layanan'),
							'keywords'			=> $i->post('keywords'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
							);
			$this->layanan_model->tambah($data);
			$this->session->set_flashdata('sukses' , 'Data telah ditambah');
			redirect(base_url('admin/layanan'),'refresh');
		}}
		// End masuk database

		$data = array(	'title'				=> 'Tambah Layanan',
						'isi'				=> 'admin/layanan/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit layanan
	public function edit($id_layanan)
	{

		$layanan 	= $this->layanan_model->detail($id_layanan);

		// Start Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_layanan' , 'Judul layanan' , 'required',
			array(	'required'			=> '%s harus diisi'));

		$valid->set_rules('isi_layanan' , 'Isi layanan' , 'required',
			array(	'required'			=> '%s harus diisi'));
		
		
		if($valid->run()) {
			// Kalau ga ganti gambar
			if(!empty($_FILES['gambar_layanan']['name'])) {

			$config['upload_path']		= './assets/upload/images/asli/';
            $config['allowed_types']	= 'gif|jpg|png|jpeg';
            $config['max_size']			= 5000; // Dalam kilobyte
            $config['max_width']		= 5000; // Dalam pixel
            $config['max_height']		= 5000; // Dalam pixel

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar_layanan')) {
			// End validasi

		$data = array(	'title'				=> 'Edit Layanan',
						'layanan'			=> $layanan,
						'error_upload'		=> $this->upload->display_errors(),
						'isi'				=> 'admin/layanan/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Start masuk database
		}else{
			// Proses manipulasi gambar
			$upload_data = array('uploads' =>$this->upload->data());
			// Gambar asli disimpan difolder assets/upload/images/asli
			// Lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/images/thumbs
			$config['image_library']	= 'gd2';
			// Gambar versi asli
			$config['source_image'] 	= './assets/upload/images/asli/'.$upload_data['uploads']['file_name'];
			// Gambar versi kecil
			$config['new_image'] 		= './assets/upload/images/thumbs/'.$upload_data['uploads']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 200; // Dalam pixel
			$config['height']       	= 200; // Dalam pixel
			$config['thumb_marker']		='';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();


			$i = $this->input;

			// Hapus gambar lama, jika ada upload gambar baru
			if ($layanan->gambar_layanan != "")
			{
				unlink('./assets/upload/images/asli/'.$layanan->gambar_layanan);
				unlink('./assets/upload/images/thumbs/'.$layanan->gambar_layanan);	
			}
			// End hapus gambar lama, jika ada upload gambar baru

			$data = array(	'id_layanan'		=> $id_layanan,
							'id_admin'			=> $this->session->userdata('id_admin'),
							'slug_layanan'		=> url_title($this->input->post('judul_layanan'), 'dash', TRUE),
							'judul_layanan'		=> $i->post('judul_layanan'),
							'isi_layanan'		=> $i->post('isi_layanan'),
							'harga_layanan'		=> $i->post('harga_layanan'),
							'gambar_layanan'	=> $upload_data['uploads']['file_name'],
							'status_layanan'	=> $i->post('status_layanan'),
							'keywords'			=> $i->post('keywords')
						);
			$this->layanan_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/layanan'),'refresh');
		}}else {
			// Update berita tanpa ganti gambar baru
			$i = $this->input;
			$data = array(	'id_layanan'		=> $id_layanan,
							'id_admin'			=> $this->session->userdata('id_admin'),
							'slug_layanan'		=> url_title($this->input->post('judul_layanan'), 'dash', TRUE),
							'judul_layanan'		=> $i->post('judul_layanan'),
							'isi_layanan'		=> $i->post('isi_layanan'),
							'harga_layanan'		=> $i->post('harga_layanan'),
							'status_layanan'	=> $i->post('status_layanan'),
							'keywords'			=> $i->post('keywords')
						);
			$this->layanan_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/layanan'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit Layanan',
						'layanan'			=> $layanan,
						'isi'				=> 'admin/layanan/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete($id_layanan)
	{
		// Start Proteksi delete
		$this->check_login->check();
		// End proteksi delete
		
		$layanan = $this->layanan_model->detail($id_layanan);

		// Hapus gambar
		if ($layanan->gambar_layanan != "")
		{
			unlink('./assets/upload/images/asli/'.$layanan->gambar_layanan);
			unlink('./assets/upload/images/thumbs/'.$layanan->gambar_layanan);	
		}
		// End hapus gambar
		$data = array(	'id_layanan'	=> $layanan->id_layanan);

		$this->layanan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/layanan'),'refresh');
	}
}
/* End of file Layanan.php */
/* Location: ./application/controllers/layanan/Layanan.php */