<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	// Load data konfigurasi
	public function __construct()
	{
		parent::__construct();

		// Start Proteksi akses admin
		if($this->session->userdata('akses_level') != "Admin")
		{
			$this->session->set_flashdata('sukses', 'Anda tidak berhak mengkases halaman ini');
			redirect(base_url('admin/dashboard'),'refresh');
		}
		// End proteksi akses admin

		$this->load->model('konfigurasi_model');
	}

	//Konfigurasi umum 
	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// Start validasi
		$this->form_validation->set_rules('namaweb','Nama Lembaga','required',
			array(	'required'	=> '%s harus diisi'
		));

		if($this->form_validation->run() === FALSE) {
		// End validasi


		$data = array(	'title'			=> 'Konfigurasi Website',
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/list'
					);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk ke database
		}else{
			$i = $this->input;

			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
							'id_admin'			=> $this->session->userdata('id_admin'),
							'namaweb'			=> $i->post('namaweb'),
							'tagline'			=> $i->post('tagline'),
							'email'				=> $i->post('email'),
							'no_telepon'		=> $i->post('no_telepon'),
							'alamat'			=> $i->post('alamat'),
							'website'			=> $i->post('website'),
							'deskripsi'			=> $i->post('deskripsi'),
							'keywords'			=> $i->post('keywords'),
							'metatext'			=> $i->post('metatext'),
							'maps'				=> $i->post('maps'),
							'facebook'			=> $i->post('facebook'),
							'instagram'			=> $i->post('instagram')
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/konfigurasi'),'refresh');

		}
		// End masuk ke database
	}

	//Konfigurasi logo 
	public function logo()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// Start validasi
		$this->form_validation->set_rules('id_konfigurasi','Nama Lembaga','required',
			array(	'required'	=> '%s harus diisi'
		));

		if($this->form_validation->run()) {
			$config['upload_path']		= './assets/upload/images/asli/';
            $config['allowed_types']	= 'gif|jpg|png|jpeg';
            $config['max_size']			= 5000; // Dalam kilobyte
            $config['max_width']		= 5000; // Dalam pixel
            $config['max_height']		= 5000; // Dalam pixel

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('logo')) {
		// End validasi


		$data = array(	'title'			=> 'Konfigurasi Website',
						'konfigurasi'	=> $konfigurasi,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/konfigurasi/logo'
					);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk ke database
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
			$i = $this->input;

			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
							'id_admin'			=> $this->session->userdata('id_admin'),
							'logo'				=> $upload_data['uploads']['file_name']
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/konfigurasi/logo'),'refresh');

		}}
		// End masuk ke database
		$data = array(	'title'			=> 'Konfigurasi Logo Website',
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/logo'
					);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Konfigurasi icon 
	public function icon()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// Start validasi
		$this->form_validation->set_rules('id_konfigurasi','Nama Lembaga','required',
			array(	'required'	=> '%s harus diisi'
		));

		if($this->form_validation->run()) {
			$config['upload_path']		= './assets/upload/images/asli/';
            $config['allowed_types']	= 'gif|jpg|png|jpeg';
            $config['max_size']			= 5000; // Dalam kilobyte
            $config['max_width']		= 5000; // Dalam pixel
            $config['max_height']		= 5000; // Dalam pixel

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('icon')) {
		// End validasi


		$data = array(	'title'			=> 'Konfigurasi Icon',
						'konfigurasi'	=> $konfigurasi,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/konfigurasi/icon'
					);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk ke database
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
			$i = $this->input;

			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
							'id_admin'			=> $this->session->userdata('id_admin'),
							'icon'				=> $upload_data['uploads']['file_name']
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/konfigurasi/icon'),'refresh');

		}}
		// End masuk ke database
		$data = array(	'title'			=> 'Konfigurasi Icon  Website',
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'admin/konfigurasi/icon'
					);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */