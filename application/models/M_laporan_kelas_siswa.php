<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_kelas_siswa extends CI_Model
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

	public function select_all_kelas_siswa1($id_kelas_siswa)
	{
		$sql = "SELECT * FROM kelas_siswa
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN tipe_kelas ON tipe_kelas.id_tipe_kelas = kelas.id_tipe_kelas
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas_siswa.id_unit_pendidikan
				WHERE kelas_siswa.id_kelas_siswa = '$id_kelas_siswa'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_kelas_siswa_detail($id_kelas_siswa)
	{
		$sql = "SELECT * FROM kelas_siswa_detail
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				WHERE kelas_siswa_detail.id_kelas_siswa = '$id_kelas_siswa'
				ORDER BY siswa.nis ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}
}
