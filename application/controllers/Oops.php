<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oops extends CI_Controller {

	// Main page - Oops
	public function index()
	{
		$data = array(	'title'		=> 'Oops - Dominic English',
						'isi'		=> 'oops/list'
	);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Oops.php */
/* Location: ./application/controllers/Oops.php */