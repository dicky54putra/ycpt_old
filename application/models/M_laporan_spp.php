<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_spp extends CI_Model
{

	public function select_all_kelas_siswa($id)
	{
		$sql = "SELECT * FROM kelas_siswa
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas 
				LEFT JOIN tipe_kelas ON tipe_kelas.id_tipe_kelas = kelas.id_tipe_kelas
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas_siswa.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				ORDER BY kelas_siswa.id_kelas_siswa DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_setting_pembayaran($id)
	{
		$sql = "SELECT * FROM setting_pembayaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran.id_unit_pendidikan
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_pembayaran($id_kelas_siswa, $id_setting_pembayaran)
	{
		$sql = "SELECT * FROM kelas_siswa_detail
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN tipe_kelas ON tipe_kelas.id_tipe_kelas = kelas.id_tipe_kelas
				WHERE kelas_siswa_detail.id_kelas_siswa = '$id_kelas_siswa'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_kelas($id_kelas_siswa)
	{
		$sql = "SELECT * FROM kelas_siswa
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN tipe_kelas ON tipe_kelas.id_tipe_kelas = kelas.id_tipe_kelas
				WHERE kelas_siswa.id_kelas_siswa = '$id_kelas_siswa'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_setting_pembayaran1($id_setting_pembayaran)
	{
		$sql = "SELECT * FROM setting_pembayaran
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				WHERE setting_pembayaran.id_setting_pembayaran = '$id_setting_pembayaran'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_unit_pendidikan()
	{
		$sql = "SELECT * FROM unit_pendidikan";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_unit_pendidikan1($id)
	{
		$sql = "SELECT * FROM unit_pendidikan
				WHERE id_unit_pendidikan = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_kelas_siswa($id)
	{
		$sql = "SELECT * FROM kelas_siswa
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN tipe_kelas ON tipe_kelas.id_tipe_kelas = kelas.id_tipe_kelas
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas_siswa.id_unit_pendidikan
				WHERE unit_pendidikan.id_unit_pendidikan = '$id'
				ORDER BY kelas_siswa.id_kelas_siswa DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_setting_pembayaran($id)
	{
		$sql = "SELECT * FROM setting_pembayaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran.id_unit_pendidikan
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				WHERE unit_pendidikan.id_unit_pendidikan = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}
}
