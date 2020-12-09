<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_setting_pembayaran extends CI_Model
{

	public function select_all_setting_pembayaran($id)
	{
		$sql = "SELECT * FROM setting_pembayaran 
				LEFT JOIN tipe_kelas ON tipe_kelas.id_tipe_kelas = setting_pembayaran.id_tipe_kelas
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				ORDER BY setting_pembayaran.id_setting_pembayaran DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_setting_pembayaran_spp($id, $idt)
	{
		$sql = "SELECT * FROM setting_pembayaran 
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran.id_unit_pendidikan
				-- LEFT JOIN tipe_kelas ON tipe_kelas.id_tipe_kelas = setting_pembayaran.id_tipe_kelas
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE unit_pendidikan.id_unit_pendidikan = '$id' 
				AND tipe_pembayaran LIKE 'SPP Bulan%'
				AND tahun_ajaran.id_tahun_ajaran = '$idt' 
				GROUP BY tipe_pembayaran
				ORDER BY setting_pembayaran.id_setting_pembayaran DESC";
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
		$this->db->insert('setting_pembayaran', $data);
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
