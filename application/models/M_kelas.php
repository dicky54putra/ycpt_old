<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas extends CI_Model
{

	public function select_all_kelas($id)
	{
		$sql = "SELECT * FROM kelas 
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				LEFT JOIN tipe_kelas ON kelas.id_tipe_kelas = tipe_kelas.id_tipe_kelas
				WHERE user.id_user = '$id'
				ORDER BY kelas.id_kelas DESC";
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

	public function insert($data)
	{
		$this->db->insert('kelas', $data);
	}

	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	// function detail_data($where,$table)
	// {		
	// 	return $this->db->get_where($table,$where);
	// }

	public function delete($data, $table)
	{
		$this->db->where($data);
		$this->db->delete($table);
	}
}
