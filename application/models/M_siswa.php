<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{

	public function select_all_siswa($id)
	{
		$sql = "SELECT * FROM siswa
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				AND siswa.status = 'Aktif'
				ORDER BY siswa.id_siswa DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_siswa($id)
	{
		$sql = "SELECT * FROM siswa
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = siswa.id_tahun_ajaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				WHERE unit_pendidikan.id_unit_pendidikan = '$id'
				ORDER BY siswa.nis ASC";
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

	public function select_unit_pendidikan()
	{
		$sql = "SELECT * FROM unit_pendidikan";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_unit_pendidikan_siswa($id)
	{
		$sql = "SELECT * FROM unit_pendidikan
				WHERE id_unit_pendidikan = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('siswa', $data);
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
