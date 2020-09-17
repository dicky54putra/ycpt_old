<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting_pembayaran_psb extends CI_Model {

	public function select_all_setting_pembayaran_psb($id) 
	{
		$sql = "SELECT * FROM setting_pembayaran_psb 
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran_psb.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran_psb.id_tipe_pembayaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran_psb.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				ORDER BY setting_pembayaran_psb.id_setting_pembayaran_psb DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_tahun_ajaran() 
	{
		$sql = "SELECT * FROM tahun_ajaran 
				ORDER BY id_tahun_ajaran DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_tipe_pembayaran() 
	{
		$sql = "SELECT * FROM tipe_pembayaran 
				ORDER BY id_tipe_pembayaran DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function select_all_user($id) 
	{
		$sql = "SELECT * FROM user
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = user.id_unit_pendidikan
				WHERE user.id_user = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('setting_pembayaran_psb',$data);
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
	
}