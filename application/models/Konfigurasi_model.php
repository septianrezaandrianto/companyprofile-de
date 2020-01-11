<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database();
	}

	// Listing
	public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi',$data['id_konfigurasi']);
		$this->db->update('konfigurasi',$data);
	}

	// Menu artikel
	public function menu_artikel()
	{
		$this->db->select('artikel.*,
							kategori.nama_kategori, kategori.slug_kategori,
							admin.nama_admin');
		$this->db->from('artikel');
		// Start join
		$this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','LEFT');
		$this->db->join('admin','admin.id_admin = artikel.id_admin','LEFT');
		// End join
		$this->db->where(array('artikel.status_artikel'	=> 'Publish',
								'artikel.jenis_artikel'	=> 'Artikel'));
		$this->db->group_by('artikel.id_artikel');
		$this->db->order_by('id_artikel','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Menu Layanan
	public function menu_layanan()
	{
		$this->db->select('layanan.*,
							admin.nama_admin');
		$this->db->from('layanan');
		// Start join
		$this->db->join('admin','admin.id_admin = layanan.id_admin','LEFT');
		// End join
		$this->db->where('layanan.status_layanan','Publish');
		$this->db->order_by('id_layanan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Menu profile
	public function menu_profile()
	{
		$this->db->select('artikel.*,
							kategori.nama_kategori, kategori.slug_kategori,
							admin.nama_admin');
		$this->db->from('artikel');
		// Start join
		$this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','LEFT');
		$this->db->join('admin','admin.id_admin = artikel.id_admin','LEFT');
		// End join
		$this->db->where(array('artikel.status_artikel'	=> 'Publish',
								'artikel.jenis_artikel'	=> 'Profile'));
		$this->db->order_by('id_artikel','DESC');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */