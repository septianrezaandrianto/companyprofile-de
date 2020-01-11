<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	//Main page - Profil
	public function index()
	{
		$data = array(	'title'		=> 'Profile - Dominic English',
						'isi'		=> 'profile/list'
	);
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profil.php */