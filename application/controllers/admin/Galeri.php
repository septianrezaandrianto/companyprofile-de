<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('galeri_model');
	}

	// Listing data galeri
	public function index()
	{
		$galeri  = $this->galeri_model->Listing();
		$data = array(	'title'		=> 'Data galeri ('.count($galeri).')',
						'galeri'		=> $galeri,
						'isi'		=> 'admin/galeri/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah galeri
	public function tambah()
	{

		// Start Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_galeri' , 'Judul galeri' , 'required',
			array(	'required'			=> '%s harus diisi'));

		$valid->set_rules('isi_galeri' , 'Isi galeri' , 'required',
			array(	'required'			=> '%s harus diisi'));
		
		
		if($valid->run()) {
			$config['upload_path']		= './assets/upload/images/asli/';
            $config['allowed_types']	= 'gif|jpg|png|jpeg';
            $config['max_size']			= 5000; // Dalam kilobyte
            $config['max_width']		= 5000; // Dalam pixel
            $config['max_height']		= 5000; // Dalam pixel

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar_galeri')) {
			// End validasi

		$data = array(	'title'				=> 'Tambah Galeri',
						'error_upload'		=> $this->upload->display_errors(),
						'isi'				=> 'admin/galeri/tambah'
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
							'judul_galeri'		=> $i->post('judul_galeri'),
							'isi_galeri'		=> $i->post('isi_galeri'),
							'website'			=> $i->post('website'),
							'gambar_galeri'		=> $upload_data['uploads']['file_name'],
							'posisi_galeri'		=> $i->post('posisi_galeri'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
							);
			$this->galeri_model->tambah($data);
			$this->session->set_flashdata('sukses' , 'Data telah ditambah');
			redirect(base_url('admin/galeri'),'refresh');
		}}
		// End masuk database

		$data = array(	'title'				=> 'Tambah Galeri',
						'isi'				=> 'admin/galeri/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit galeri
	public function edit($id_galeri)
	{

		$galeri 	= $this->galeri_model->detail($id_galeri);

		// Start Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_galeri' , 'Judul galeri' , 'required',
			array(	'required'			=> '%s harus diisi'));

		$valid->set_rules('isi_galeri' , 'Isi galeri' , 'required',
			array(	'required'			=> '%s harus diisi'));
		
		
		if($valid->run()) {
			// Kalau ga ganti gambar
			if(!empty($_FILES['gambar_galeri']['name'])) {

			$config['upload_path']		= './assets/upload/images/asli/';
            $config['allowed_types']	= 'gif|jpg|png|jpeg';
            $config['max_size']			= 5000; // Dalam kilobyte
            $config['max_width']		= 5000; // Dalam pixel
            $config['max_height']		= 5000; // Dalam pixel

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar_galeri')) {
			// End validasi

		$data = array(	'title'				=> 'Edit Galeri',
						'galeri'			=> $galeri,
						'error_upload'		=> $this->upload->display_errors(),
						'isi'				=> 'admin/galeri/edit'
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
			if ($galeri->gambar_galeri != "")
			{
				unlink('./assets/upload/images/asli/'.$galeri->gambar_galeri);
				unlink('./assets/upload/images/thumbs/'.$galeri->gambar_galeri);	
			}
			// End hapus gambar lama, jika ada upload gambar baru

			$data = array(	'id_galeri'			=> $id_galeri,
							'id_admin'			=> $this->session->userdata('id_admin'),
							'judul_galeri'		=> $i->post('judul_galeri'),
							'isi_galeri'		=> $i->post('isi_galeri'),
							'website'			=> $i->post('website'),
							'gambar_galeri'		=> $upload_data['uploads']['file_name'],
							'posisi_galeri'		=> $i->post('posisi_galeri')
						);
			$this->galeri_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/galeri'),'refresh');
		}}else {
			// Update berita tanpa ganti gambar baru
			$i = $this->input;
			$data = array(	'id_galeri'			=> $id_galeri,
							'id_admin'			=> $this->session->userdata('id_admin'),
							'judul_galeri'		=> $i->post('judul_galeri'),
							'isi_galeri'		=> $i->post('isi_galeri'),
							'website'			=> $i->post('website'),
							'posisi_galeri'		=> $i->post('posisi_galeri')
						);
			$this->galeri_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/galeri'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit Galeri',
						'galeri'			=> $galeri,
						'isi'				=> 'admin/galeri/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete($id_galeri)
	{
		// Start Proteksi delete
		$this->check_login->check();
		// End proteksi delete
		
		$galeri = $this->galeri_model->detail($id_galeri);

		// Hapus gambar
		if ($galeri->gambar_galeri != "")
		{
			unlink('./assets/upload/images/asli/'.$galeri->gambar_galeri);
			unlink('./assets/upload/images/thumbs/'.$galeri->gambar_galeri);	
		}
		// End hapus gambar
		$data = array(	'id_galeri'	=> $galeri->id_galeri);

		$this->galeri_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/galeri'),'refresh');
	}
}
/* End of file Galeri.php */
/* Location: ./application/controllers/galeri/Galeri.php */