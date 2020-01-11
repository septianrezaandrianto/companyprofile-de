<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	// Update profil
	public function index()
	{
		$id_admin	= $this->session->userdata('id_admin');
		$admin 		= $this->admin_model->detail($id_admin);

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

		$data = array(	'title'		=> 'Update profile: '.$admin->nama_admin,
						'admin'		=>$admin,
						'isi'		=> 'admin/profile/list'
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
			$this->session->set_flashdata('sukses' , 'Profile telah diupdate');
			redirect(base_url('admin/profile'),'refresh');
		}
		// End masuk database
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/admin/Profil.php */