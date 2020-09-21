<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas_siswa extends CI_Model
{

	public function select_all_kelas_siswa($id)
	{
		$sql = "SELECT * FROM kelas_siswa 
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas_siswa.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				ORDER BY kelas_siswa.id_kelas_siswa DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_kelas_siswa($id)
	{
		$sql = "SELECT * FROM kelas_siswa 
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas_siswa.id_unit_pendidikan
				WHERE unit_pendidikan.id_unit_pendidikan = '$id'
				ORDER BY kelas_siswa.id_kelas_siswa DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_kelas_siswa1($id)
	{
		$sql = "SELECT * FROM kelas_siswa 
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				WHERE kelas_siswa.id_kelas_siswa = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_kelas_siswa_detail($id)
	{
		$sql = "SELECT * FROM kelas_siswa_detail
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				WHERE kelas_siswa_detail.id_kelas_siswa = '$id'";
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

	public function select_all_kelas($id)
	{
		$sql = "SELECT * FROM kelas
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_kelas1($id_user)
	{
		$sql = "SELECT * FROM kelas
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id_user'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_siswa($id_user)
	{
		$sql = "SELECT * FROM siswa
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id_user' 
				AND siswa.id_kelas_siswa = '0'";
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
		$this->db->insert('kelas_siswa', $data);
	}

	public function insert_siswa($data)
	{
		$this->db->insert('kelas_siswa_detail', $data);
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
