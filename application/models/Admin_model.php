<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database();
	}

	// Listing admin
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('id_admin');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail admin
	public function detail($id_admin)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin',$id_admin);
		$this->db->order_by('id_admin');
		$query = $this->db->get();
		return $query->row();
	}

	// Login admin
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array('username_admin'	=> $username,
								'password_admin'	=> $password));
								//'password_admin'	=> sha1($password)));
		$this->db->order_by('id_admin');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah/ insert data
	public function tambah($data)
	{
		$this->db->insert('admin',$data);
	}

	// Edit  data
	public function edit($data)
	{
		$this->db->where('id_admin',$data['id_admin']);
		$this->db->update('admin',$data);
	} 

	//Delete data 
	public function delete($data)
	{
		$this->db->where('id_admin',$data['id_admin']);
		$this->db->delete('admin',$data);
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */