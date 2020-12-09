<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembayaran_psb extends CI_Model
{

	public function select_all_tahun_ajaran()
	{
		$sql = "SELECT * FROM tahun_ajaran 
				ORDER BY id_tahun_ajaran DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_pendaftaran($id)
	{
		$sql = "SELECT * FROM pendaftaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = pendaftaran.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id' 
				ORDER BY pendaftaran.nomor_daftar ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	// public function select_all_kelas($id) 
	// {
	// 	$sql = "SELECT * FROM kelas
	// 			LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas.id_unit_pendidikan
	// 			LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
	// 			WHERE user.id_user = '$id' 
	// 			ORDER BY kelas.kelas ASC";
	// 	$data = $this->db->query($sql);
	// 	return $data->result();
	// }

	public function insert($data)
	{
		$this->db->insert('pembayaran_psb', $data);
	}

	public function select_all_pembayaran_psb($id)
	{
		$sql = "SELECT pembayaran_psb.*, pembayaran_psb.tanggal, tahun_ajaran.tahun_ajaran, pendaftaran.nomor_daftar, pendaftaran.nama_lengkap, unit_pendidikan.unit_pendidikan, unit_pendidikan.alamat_sekolah FROM pembayaran_psb
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = pembayaran_psb.id_tahun_ajaran
				LEFT JOIN pendaftaran ON pendaftaran.id_daftar = pembayaran_psb.id_daftar
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = pendaftaran.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				ORDER BY pembayaran_psb.id_pembayaran_psb DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_pembayaran_detail($id_pembayaran_psb)
	{
		$sql = "SELECT pembayaran_psb.*, pembayaran_psb.id_pembayaran_psb, pembayaran_psb.tanggal, tahun_ajaran.tahun_ajaran, pendaftaran.nomor_daftar, pendaftaran.tanggal_daftar, pendaftaran.nama_lengkap, pendaftaran.tempat_lahir, pendaftaran.tanggal_lahir, pendaftaran.nama_ortu, pendaftaran.alamat, pendaftaran.jenis_kelamin FROM pembayaran_psb
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = pembayaran_psb.id_tahun_ajaran
				LEFT JOIN pendaftaran ON pendaftaran.id_daftar = pembayaran_psb.id_daftar
				WHERE pembayaran_psb.id_pembayaran_psb = '$id_pembayaran_psb'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_setting_pembayaran_psb($id, $jk)
	{
		$jkel = ($jk == 1) ? 2 : $retVal = ($jk == 2) ? 1 : 0;
		$sql = "SELECT * FROM setting_pembayaran_psb 
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran_psb.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran_psb.id_tipe_pembayaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran_psb.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				-- AND setting_pembayaran_psb.jenis_kelamin = 0
				AND setting_pembayaran_psb.jenis_kelamin != $jkel
				ORDER BY setting_pembayaran_psb.id_setting_pembayaran_psb DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_detail_pembayaran_psb($id_pembayaran_psb)
	{
		$sql = "SELECT detail_pembayaran_psb.*, tipe_pembayaran.tipe_pembayaran, detail_pembayaran_psb.nominal FROM detail_pembayaran_psb
				LEFT JOIN setting_pembayaran_psb ON setting_pembayaran_psb.id_setting_pembayaran_psb = detail_pembayaran_psb.id_setting_pembayaran_psb
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran_psb.id_tipe_pembayaran
				WHERE detail_pembayaran_psb.id_pembayaran_psb = '$id_pembayaran_psb'
				ORDER BY detail_pembayaran_psb.id_pembayaran_psb ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_total_pembayaran($id_pembayaran_psb)
	{
		$sql = "SELECT detail_pembayaran_psb.*, sum(detail_pembayaran_psb.nominal) AS total FROM detail_pembayaran_psb
				LEFT JOIN setting_pembayaran_psb ON setting_pembayaran_psb.id_setting_pembayaran_psb = detail_pembayaran_psb.id_setting_pembayaran_psb
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran_psb.id_tipe_pembayaran
				WHERE detail_pembayaran_psb.id_pembayaran_psb = '$id_pembayaran_psb'
				ORDER BY detail_pembayaran_psb.id_pembayaran_psb ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert_detail_pembayaran_psb($data)
	{
		$this->db->insert('detail_pembayaran_psb', $data);
	}

	public function select_nomor()
	{
		$sql = "SELECT * FROM pembayaran_psb
				ORDER BY id_pembayaran_psb DESC 
				LIMIT 1";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function delete($data, $table)
	{
		$this->db->where($data);
		$this->db->delete($table);
	}

	// public function select_all_setting_bayar() 
	// {
	// 	$sql = "SELECT * FROM setting_pembayaran_psb
	//  			ORDER BY id_setting_pembayaran_psb ASC";
	//  	$data = $this->db->query($sql);
	//  	return $data->result();
	// }

}
