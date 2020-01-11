<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	// Main page - Login
	public function index()
	{

		// Start validasi
		$valid = $this->form_validation;

		$valid->set_rules('username_admin' , 'Username' , 'required|trim|min_length[6]|max_length[32]',
				array(	'required'		=> '%s harus diisi',
						'min_length'	=> '%s minimal 6 karakter',
						'max_length'	=> '%s maksimal 32 karakter'));

		$valid->set_rules('password_admin' , 'Password' , 'required|trim|min_length[6]',
				array(	'required'		=> '%s harus diisi',
						'min_length'	=> '%s minimal 6 karakter'));

		if($valid->run()) {
			$username 		= $this->input->post('username_admin');
			$password 		= $this->input->post('password_admin');
			// Compere dengan data di database
			$check_login	= $this->admin_model->login($username,$password);

			// Kalau ada data yang cocok maka create SESSION ada 4 (id_admin, username_admin, akses_level, dan nama_admin)
			if(count($check_login) == 1) {
				$this->session->set_userdata('id_admin',$check_login->id_admin);
				$this->session->set_userdata('username_admin',$check_login->username_admin);
				$this->session->set_userdata('nama_admin',$check_login->nama_admin);
				$this->session->set_userdata('akses_level',$check_login->akses_level);

				$this->session->set_flashdata('sukses', 'Anda berhasil login');
				redirect(base_url('admin/dashboard'),'refresh');
			}else{
				// Kalo ga cocok maka error dan redirect ke login lagi
				$this->session->set_flashdata('sukses', 'Username atau Password salah');
				redirect(base_url('login'), 'refresh');
			}
		}
		// End validasi

		$data = array(	'title'		=> 'Login Administrator- Dominic English'
						//'isi'		=> 'admin/list'
	);
		$this->load->view('admin/login/list', $data, FALSE);	
	}

	// Logout
	public function logout()
	{
		$this->check_login->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */