<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	// Load database
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

		$this->load->model('admin_model');
	}

	// Listing data admin
	public function index()
	{
		$admin  = $this->admin_model->Listing();
		$data = array(	'title'		=> 'Data Administrator ('.count($admin).')',
						'admin'		=> $admin,
						'isi'		=> 'admin/admin/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah admin
	public function tambah()
	{

		// Start Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_admin' , 'Nama' , 'required',
			array(	'required'			=> '%s harus diisi'));
		
		$valid->set_rules('email_admin' , 'Email' , 'required|valid_email',
			array(	'required'			=> '%s harus diisi',
					'valid_email'		=> 'Format %s tidak valid'));
		
		$valid->set_rules('username_admin' , 'Username' , 'required|trim|min_length[6]|max_length[32]|is_unique[admin.username_admin]',
				array(	'required'		=> '%s harus diisi',
						'min_length'	=> '%s minimal 6 karakter',
						'max_length'	=> '%s maksimal 32 karakter',
						'is_unique'		=> '%s <strong>'.$this->input->post('username_admin').'</strong> sudah digunakan. Buat username baru!'));

		$valid->set_rules('password_admin' , 'Password' , 'required|trim|min_length[6]',
				array(	'required'		=> '%s harus diisi',
						'min_length'	=> '%s minimal 6 karakter'));
		if($valid->run() === FALSE) {
			// End validasi

		$data = array(	'title'		=> 'Tambah Administrator',
						'isi'		=> 'admin/admin/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Start masuk database
		}else{
			$i = $this->input;
			$data = array(	'nama_admin'		=> $i->post('nama_admin'),
							'email_admin'		=> $i->post('email_admin'),
							'username_admin'	=> $i->post('username_admin'),
							'password_admin'	=> $i->post('password_admin'),
							// 'password_admin'	=> sha1($i->post('password_admin')),
							'akses_level'		=> $i->post('akses_level')
							);
			$this->admin_model->tambah($data);
			$this->session->set_flashdata('sukses' , 'Data telah ditambah');
			redirect(base_url('admin/admin'),'refresh');
		}
		// End masuk database
	}

	// Edit admin
	public function edit($id_admin)
	{

		$admin = $this->admin_model->detail($id_admin);

		// Start Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_admin' , 'Nama' , 'required',
			array(	'required'			=> '%s harus diisi'));
		
		$valid->set_rules('email_admin' , 'Email' , 'required|valid_email',
			array(	'required'			=> '%s harus diisi',
					'valid_email'		=> 'Format %s tidak valid'));

		$valid->set_rules('password_admin' , 'Password' , 'required|trim|min_length[6]',
				array(	'required'		=> '%s harus diisi',
						'min_length'	=> '%s minimal 6 karakter'));
		if($valid->run() === FALSE) {
			// End validasi

		$data = array(	'title'		=> 'Edit Administrator: '.$admin->nama_admin,
						'admin'		=>$admin,
						'isi'		=> 'admin/admin/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Start masuk database
		}else{
			$i = $this->input;
			$data = array(	'id_admin'			=> $id_admin,
							'nama_admin'		=> $i->post('nama_admin'),
							'email_admin'		=> $i->post('email_admin'),
							'username_admin'	=> $i->post('username_admin'),
							'password_admin'	=> $i->post('password_admin'),
							// 'password_admin'	=> sha1($i->post('password_admin')),
							'akses_level'		=> $i->post('akses_level')
							);
			$this->admin_model->edit($data);
			$this->session->set_flashdata('sukses' , 'Data telah diupdate');
			redirect(base_url('admin/admin'),'refresh');
		}
		// End masuk database
	}

	// Delete
	public function delete($id_admin)
	{
		// Start Proteksi delete
		$this->check_login->check();
		// End proteksi delete
		
		$admin = $this->admin_model->detail($id_admin);
		$data = array(	'id_admin'	=> $admin->id_admin);

		$this->admin_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/admin'),'refresh');
	}
}
/* End of file Admin.php */
/* Location: ./application/controllers/admin/Admin.php */