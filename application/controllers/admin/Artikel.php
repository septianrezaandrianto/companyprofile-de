<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
		$this->load->model('kategori_model');
	}

	// Listing data artikel
	public function index()
	{
		$artikel  = $this->artikel_model->Listing();
		$data = array(	'title'		=> 'Data artikel ('.count($artikel).')',
						'artikel'		=> $artikel,
						'isi'		=> 'admin/artikel/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah artikel
	public function tambah()
	{
		$kategori = $this->kategori_model->listing();

		// Start Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_artikel' , 'Judul artikel' , 'required',
			array(	'required'			=> '%s harus diisi'));

		$valid->set_rules('isi_artikel' , 'Isi artikel' , 'required',
			array(	'required'			=> '%s harus diisi'));
		
		
		if($valid->run()) {
			$config['upload_path']		= './assets/upload/images/asli/';
            $config['allowed_types']	= 'gif|jpg|png|jpeg';
            $config['max_size']			= 5000; // Dalam kilobyte
            $config['max_width']		= 5000; // Dalam pixel
            $config['max_height']		= 5000; // Dalam pixel

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar_artikel')) {
			// End validasi

		$data = array(	'title'				=> 'Tambah Artikel',
						'kategori'			=> $kategori,
						'error_upload'		=> $this->upload->display_errors(),
						'isi'				=> 'admin/artikel/tambah'
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
							'id_kategori'		=> $i->post('id_kategori'),
							'slug_artikel'		=> url_title($this->input->post('judul_artikel'), 'dash', TRUE),
							'judul_artikel'		=> $i->post('judul_artikel'),
							'isi_artikel'		=> $i->post('isi_artikel'),
							'gambar_artikel'	=> $upload_data['uploads']['file_name'],
							'status_artikel'	=> $i->post('status_artikel'),
							'jenis_artikel'		=> $i->post('jenis_artikel'),
							'keywords'			=> $i->post('keywords'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
							);
			$this->artikel_model->tambah($data);
			$this->session->set_flashdata('sukses' , 'Data telah ditambah');
			redirect(base_url('admin/artikel'),'refresh');
		}}
		// End masuk database

		$data = array(	'title'				=> 'Tambah Artikel',
						'kategori'			=> $kategori,
						'isi'				=> 'admin/artikel/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit artikel
	public function edit($id_artikel)
	{

		$artikel 	= $this->artikel_model->detail($id_artikel);
		$kategori 	= $this->kategori_model->listing();

		// Start Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_artikel' , 'Judul artikel' , 'required',
			array(	'required'			=> '%s harus diisi'));

		$valid->set_rules('isi_artikel' , 'Isi artikel' , 'required',
			array(	'required'			=> '%s harus diisi'));
		
		
		if($valid->run()) {
			// Kalau ga ganti gambar
			if(!empty($_FILES['gambar_artikel']['name'])) {

			$config['upload_path']		= './assets/upload/images/asli/';
            $config['allowed_types']	= 'gif|jpg|png|jpeg';
            $config['max_size']			= 5000; // Dalam kilobyte
            $config['max_width']		= 5000; // Dalam pixel
            $config['max_height']		= 5000; // Dalam pixel

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar_artikel')) {
			// End validasi

		$data = array(	'title'				=> 'Edit Artikel',
						'kategori'			=> $kategori,
						'artikel'			=> $artikel,
						'error_upload'		=> $this->upload->display_errors(),
						'isi'				=> 'admin/artikel/edit'
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
			if ($artikel->gambar_artikel != "")
			{
				unlink('./assets/upload/images/asli/'.$artikel->gambar_artikel);
				unlink('./assets/upload/images/thumbs/'.$artikel->gambar_artikel);	
			}
			// End hapus gambar lama, jika ada upload gambar baru

			$data = array(	'id_artikel'		=> $id_artikel,
							'id_admin'			=> $this->session->userdata('id_admin'),
							'id_kategori'		=> $i->post('id_kategori'),
							'slug_artikel'		=> url_title($this->input->post('judul_artikel'), 'dash', TRUE),
							'judul_artikel'		=> $i->post('judul_artikel'),
							'isi_artikel'		=> $i->post('isi_artikel'),
							'gambar_artikel'	=> $upload_data['uploads']['file_name'],
							'status_artikel'	=> $i->post('status_artikel'),
							'jenis_artikel'		=> $i->post('jenis_artikel'),
							'keywords'			=> $i->post('keywords')
						);
			$this->artikel_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/artikel'),'refresh');
		}}else {
			// Update berita tanpa ganti gambar baru
			$i = $this->input;
			$data = array(	'id_artikel'		=> $id_artikel,
							'id_admin'			=> $this->session->userdata('id_admin'),
							'id_kategori'		=> $i->post('id_kategori'),
							'slug_artikel'		=> url_title($this->input->post('judul_artikel'), 'dash', TRUE),
							'judul_artikel'		=> $i->post('judul_artikel'),
							'isi_artikel'		=> $i->post('isi_artikel'),
							'status_artikel'	=> $i->post('status_artikel'),
							'jenis_artikel'		=> $i->post('jenis_artikel'),
							'keywords'			=> $i->post('keywords')
						);
			$this->artikel_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/artikel'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit Artikel',
						'kategori'			=> $kategori,
						'artikel'			=> $artikel,
						'isi'				=> 'admin/artikel/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete($id_artikel)
	{
		// Start Proteksi delete
		$this->check_login->check();
		// End proteksi delete
		
		$artikel = $this->artikel_model->detail($id_artikel);

		// Hapus gambar
		if ($artikel->gambar_artikel != "")
		{
			unlink('./assets/upload/images/asli/'.$artikel->gambar_artikel);
			unlink('./assets/upload/images/thumbs/'.$artikel->gambar_artikel);	
		}
		// End hapus gambar
		$data = array(	'id_artikel'	=> $artikel->id_artikel);

		$this->artikel_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/artikel'),'refresh');
	}
}
/* End of file Artikel.php */
/* Location: ./application/controllers/artikel/Artikel.php */