<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_riwayat_pembayaran_psb extends CI_Model
{

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

	public function select_all_setting_bayar($id_tahun_ajaran, $id, $jk)
	{
		$jkel = ($jk == 1) ? 2 : $retVal = ($jk == 2) ? 1 : 0;
		$sql = "SELECT * FROM setting_pembayaran_psb 
	 			LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran_psb.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran_psb.id_tipe_pembayaran
	 			LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran_psb.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
	 			WHERE user.id_user = '$id' 
				AND tahun_ajaran.id_tahun_ajaran = '$id_tahun_ajaran'
				AND setting_pembayaran_psb.jenis_kelamin != $jkel
	 			ORDER BY setting_pembayaran_psb.id_setting_pembayaran_psb ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	// public function select_all_total_bayar_by_tipe($nomor_daftar) 
	// {
	// 	$sql = "select sum(a.nominal) from detail_pembayaran a 
	// 			left join pembayaran b on b.id_pembayaran = a.id_pembayaran
	// 			left join pendaftaran c on c.id_daftar = b.id_daftar
	// 			left join setting_pembayaran d on d.id_setting_pembayaran = a.id_setting_pembayaran
	// 			left join tipe_pembayaran e on e.id_tipe_pembayaran = d.id_tipe_pembayaran
	// 			where c.nomor_daftar = '$nomor_daftar'
	// 			and e.id_tipe_pembayaran = 1";
	//  	$data = $this->db->query($sql);
	//  	return $data->result();
	// }

	public function select_all_detail_pendaftaran($nomor_daftar)
	{
		$sql = "SELECT * FROM pendaftaran
				WHERE nomor_daftar = '$nomor_daftar' ";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_unit_pendidikan()
	{
		$sql = "SELECT * FROM unit_pendidikan
				ORDER BY id_unit_pendidikan ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_pendaftaran($id)
	{
		$sql = "SELECT * FROM pendaftaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = pendaftaran.id_unit_pendidikan
				WHERE pendaftaran.id_unit_pendidikan = '$id' 
				ORDER BY pendaftaran.nomor_daftar ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_setting_bayar1($id_tahun_ajaran, $id_unit_pendidikan)
	{
		$sql = "SELECT * FROM setting_pembayaran_psb 
	 			LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran_psb.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran_psb.id_tipe_pembayaran
	 			LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran_psb.id_unit_pendidikan
	 			WHERE unit_pendidikan.id_unit_pendidikan = '$id_unit_pendidikan' AND tahun_ajaran.id_tahun_ajaran = '$id_tahun_ajaran'
	 			ORDER BY setting_pembayaran_psb.id_setting_pembayaran_psb ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_detail_pendaftaran1($nomor_daftar)
	{
		$sql = "SELECT * FROM pendaftaran
				WHERE nomor_daftar = '$nomor_daftar' ";
		$data = $this->db->query($sql);
		return $data->result();
	}
}
