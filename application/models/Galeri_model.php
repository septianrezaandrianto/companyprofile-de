<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database();
	}

	// Listing galeri
	public function listing()
	{
		$this->db->select('galeri.*,
							admin.nama_admin');
		$this->db->from('galeri');
		// Start join
		$this->db->join('admin','admin.id_admin = galeri.id_admin','LEFT');
		// End join
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing slider
	public function slider()
	{
		$this->db->select('galeri.*,
							admin.nama_admin');
		$this->db->from('galeri');
		// Start join
		$this->db->join('admin','admin.id_admin = galeri.id_admin','LEFT');
		// End join
		$this->db->where('posisi_galeri','Homepage');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	// Detail galeri
	public function detail($id_galeri)
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri',$id_galeri);
		$this->db->order_by('id_galeri');
		$query = $this->db->get();
		return $query->row();
	}

	// Login galeri
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where(array('username_galeri'	=> $username,
								'password_galeri'	=> $password));
								//'password_galeri'	=> sha1($password)));
		$this->db->order_by('id_galeri');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah/ insert data
	public function tambah($data)
	{
		$this->db->insert('galeri',$data);
	}

	// Edit  data
	public function edit($data)
	{
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->update('galeri',$data);
	} 

	//Delete data 
	public function delete($data)
	{
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->delete('galeri',$data);
	}

}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */