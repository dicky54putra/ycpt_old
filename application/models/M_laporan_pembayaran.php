<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_pembayaran extends CI_Model
{

	public function select_all_pembayaran($id, $dari_tanggal, $sampai_tanggal)
	{
		// pembayaran.*, detail_pembayaran.*, setting_pembayaran.id_tipe_pembayaran
		$sql = "SELECT pembayaran.*, detail_pembayaran.*,tipe_pembayaran.*, kelas_siswa_detail.*, kelas_siswa.*, tahun_ajaran.*, kelas.*, siswa.*, unit_pendidikan.*, user.*, setting_pembayaran.id_setting_pembayaran, setting_pembayaran.id_tipe_pembayaran FROM detail_pembayaran
				LEFT JOIN setting_pembayaran ON setting_pembayaran.id_setting_pembayaran = detail_pembayaran.id_setting_pembayaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				LEFT JOIN pembayaran ON pembayaran.id_pembayaran = detail_pembayaran.id_pembayaran
				LEFT JOIN kelas_siswa_detail ON kelas_siswa_detail.id_kelas_siswa_detail = pembayaran.id_kelas_siswa_detail
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE pembayaran.tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal' 
				AND user.id_user = '$id'
				ORDER BY pembayaran.tanggal ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_pembayaran1($id, $dari_tanggal, $sampai_tanggal)
	{
		$sql = "SELECT detail_pembayaran.*, pembayaran.tanggal, tahun_ajaran.tahun_ajaran, kelas.kelas, siswa.nis, siswa.nama_siswa, tipe_pembayaran.tipe_pembayaran, detail_pembayaran.nominal, SUM(detail_pembayaran.nominal) AS TOTAL FROM detail_pembayaran
				LEFT JOIN setting_pembayaran ON setting_pembayaran.id_setting_pembayaran = detail_pembayaran.id_setting_pembayaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				LEFT JOIN pembayaran ON pembayaran.id_pembayaran = detail_pembayaran.id_pembayaran
				LEFT JOIN kelas_siswa_detail ON kelas_siswa_detail.id_kelas_siswa_detail = pembayaran.id_kelas_siswa_detail
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE pembayaran.tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal'
				AND user.id_user = '$id'
				ORDER BY pembayaran.tanggal ASC";
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

	public function select_pembayaran($id, $dari_tanggal, $sampai_tanggal)
	{
		$sql = "SELECT * FROM detail_pembayaran
				LEFT JOIN setting_pembayaran ON setting_pembayaran.id_setting_pembayaran = detail_pembayaran.id_setting_pembayaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				LEFT JOIN pembayaran ON pembayaran.id_pembayaran = detail_pembayaran.id_pembayaran
				LEFT JOIN kelas_siswa_detail ON kelas_siswa_detail.id_kelas_siswa_detail = pembayaran.id_kelas_siswa_detail
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				WHERE pembayaran.tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal' 
				AND unit_pendidikan.id_unit_pendidikan = '$id'
				ORDER BY pembayaran.tanggal ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_pembayaran1($id, $dari_tanggal, $sampai_tanggal)
	{
		$sql = "SELECT detail_pembayaran.*, pembayaran.tanggal, tahun_ajaran.tahun_ajaran, kelas.kelas, siswa.nis, siswa.nama_siswa, tipe_pembayaran.tipe_pembayaran, detail_pembayaran.nominal, SUM(detail_pembayaran.nominal) AS TOTAL FROM detail_pembayaran
				LEFT JOIN setting_pembayaran ON setting_pembayaran.id_setting_pembayaran = detail_pembayaran.id_setting_pembayaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				LEFT JOIN pembayaran ON pembayaran.id_pembayaran = detail_pembayaran.id_pembayaran
				LEFT JOIN kelas_siswa_detail ON kelas_siswa_detail.id_kelas_siswa_detail = pembayaran.id_kelas_siswa_detail
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				WHERE pembayaran.tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal'
				AND unit_pendidikan.id_unit_pendidikan = '$id'
				ORDER BY pembayaran.tanggal ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}
}
