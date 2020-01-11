<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
	}

	// fungsi check login
	public function check()
	{
		if($this->CI->session->userdata('username_admin') == "" &&
			$this->CI->session->userdata('akses_level') == "")
		{
			$this->CI->session->set_flashdata('sukses', 'Anda belum login');
			redirect(base_url('login'), 'refresh');
		}	
	}

	// Fungsi check logout
	public function logout()
	{
		$this->CI->session->unset_userdata('id_admin');
		$this->CI->session->unset_userdata('username_admin');
		$this->CI->session->unset_userdata('nama_admin');
		$this->CI->session->unset_userdata('akses_level');

		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Check_login.php */
/* Location: ./application/libraries/Check_login.php */
