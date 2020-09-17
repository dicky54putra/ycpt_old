<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendaftaran extends CI_Model {

	public function select_all_pendaftaran($id) 
	{
		$sql = "SELECT * FROM pendaftaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = pendaftaran.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				ORDER BY pendaftaran.id_daftar DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_unit_pendidikan($id) 
	{
		$sql = "SELECT * FROM unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_tahun_ajaran() 
	{
		$sql = "SELECT * FROM tahun_ajaran
				ORDER BY id_tahun_ajaran DESC LIMIT 1";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('pendaftaran',$data);
	}

	public function insert_siswa($data_siswa)
	{
		$this->db->insert('siswa',$data_siswa);
	}

	function edit_data($where,$table)
	{		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// function detail_data($where,$table)
	// {		
	// 	return $this->db->get_where($table,$where);
	// }

	public function delete($data,$table) 
	{
		$this->db->where($data);
		$this->db->delete($table);
	}

	public function buat_kode()   {
		  $this->db->select('RIGHT(pendaftaran.nomor_daftar,5) as kode', FALSE);
		  $this->db->order_by('nomor_daftar','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pendaftaran');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
}