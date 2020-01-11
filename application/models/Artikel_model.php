<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database();
	}

	// Listing artikel
	public function listing()
	{
		$this->db->select('artikel.*,
							kategori.nama_kategori, kategori.slug_kategori,
							admin.nama_admin');
		$this->db->from('artikel');
		// Start join
		$this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','LEFT');
		$this->db->join('admin','admin.id_admin = artikel.id_admin','LEFT');
		// End join
		$this->db->order_by('id_artikel','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing artikel home
	public function home()
	{
		$this->db->select('artikel.*,
							kategori.nama_kategori, kategori.slug_kategori,
							admin.nama_admin');
		$this->db->from('artikel');
		// Start join
		$this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','LEFT');
		$this->db->join('admin','admin.id_admin = artikel.id_admin','LEFT');
		// End join
		$this->db->where(array('status_artikel'		=>'Publish',
								'jenis_artikel'		=> 'Artikel'));
		$this->db->order_by('id_artikel','DESC');
		$this->db->limit(9);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing artikel main page
	public function artikel($limit,$start)
	{
		$this->db->select('artikel.*,
							kategori.nama_kategori, kategori.slug_kategori,
							admin.nama_admin');
		$this->db->from('artikel');
		// Start join
		$this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','LEFT');
		$this->db->join('admin','admin.id_admin = artikel.id_admin','LEFT');
		// End join
		$this->db->where(array('status_artikel'		=>'Publish'));
		$this->db->order_by('id_artikel','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Total artikel main page
	public function total()
	{
		$this->db->select('artikel.*,
							kategori.nama_kategori, kategori.slug_kategori,
							admin.nama_admin');
		$this->db->from('artikel');
		// Start join
		$this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','LEFT');
		$this->db->join('admin','admin.id_admin = artikel.id_admin','LEFT');
		// End join
		$this->db->where(array('status_artikel'		=>'Publish'));
		$this->db->order_by('id_artikel','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing artikel kategori main page
	public function artikel_kategori($id_kategori,$limit,$start)
	{
		$this->db->select('artikel.*,
							kategori.nama_kategori, kategori.slug_kategori,
							admin.nama_admin');
		$this->db->from('artikel');
		// Start join
		$this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','LEFT');
		$this->db->join('admin','admin.id_admin = artikel.id_admin','LEFT');
		// End join
		$this->db->where(array('status_artikel'			=>'Publish',
								'artikel.id_kategori'	=> $id_kategori));
		$this->db->order_by('id_artikel','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Total kategori artikel main page
	public function total_kategori($id_kategori)
	{
		$this->db->select('artikel.*,
							kategori.nama_kategori, kategori.slug_kategori,
							admin.nama_admin');
		$this->db->from('artikel');
		// Start join
		$this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','LEFT');
		$this->db->join('admin','admin.id_admin = artikel.id_admin','LEFT');
		// End join
		$this->db->where(array('status_artikel'			=>'Publish',
								'artikel.id_kategori'	=> $id_kategori));
		$this->db->order_by('id_artikel','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read artikel main page
	public function read($slug_artikel)
	{
		$this->db->select('artikel.*,
							kategori.nama_kategori, kategori.slug_kategori,
							admin.nama_admin');
		$this->db->from('artikel');
		// Start join
		$this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','LEFT');
		$this->db->join('admin','admin.id_admin = artikel.id_admin','LEFT');
		// End join
		$this->db->where(array('status_artikel'			=>'Publish',
								'artikel.slug_artikel'	=> $slug_artikel));
		$this->db->order_by('id_artikel','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail artikel
	public function detail($id_artikel)
	{
		$this->db->select('*');
		$this->db->from('artikel');
		$this->db->where('id_artikel',$id_artikel);
		$this->db->order_by('id_artikel');
		$query = $this->db->get();
		return $query->row();
	}

	// Login artikel
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('artikel');
		$this->db->where(array('username_artikel'	=> $username,
								'password_artikel'	=> $password));
								//'password_artikel'	=> sha1($password)));
		$this->db->order_by('id_artikel');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah/ insert data
	public function tambah($data)
	{
		$this->db->insert('artikel',$data);
	}

	// Edit  data
	public function edit($data)
	{
		$this->db->where('id_artikel',$data['id_artikel']);
		$this->db->update('artikel',$data);
	} 

	//Delete data 
	public function delete($data)
	{
		$this->db->where('id_artikel',$data['id_artikel']);
		$this->db->delete('artikel',$data);
	}

}

/* End of file Artikel_model.php */
/* Location: ./application/models/Artikel_model.php */