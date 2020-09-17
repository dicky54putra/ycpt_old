<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

	public function select_all_tahun_ajaran()
	{
		$sql = "SELECT * FROM tahun_ajaran 
				ORDER BY id_tahun_ajaran DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_siswa($id) 
	{
		$sql = "SELECT * FROM siswa
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id' 
				ORDER BY siswa.nis ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_kelas_siswa($id) 
	{
		$sql = "SELECT * FROM kelas_siswa
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas_siswa.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id' 
				ORDER BY kelas_siswa.id_kelas_siswa DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_kelas_siswa_detail($id_kelas_siswa) 
	{
		$sql = "SELECT * FROM kelas_siswa_detail
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				WHERE kelas_siswa_detail.id_kelas_siswa = '$id_kelas_siswa' 
				ORDER BY siswa.nis ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_kelas_siswa_detail1($id_kelas_siswa_detail) 
	{
		$sql = "SELECT * FROM kelas_siswa_detail
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				WHERE kelas_siswa_detail.id_kelas_siswa_detail = '$id_kelas_siswa_detail'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_kelas($id) 
	{
		$sql = "SELECT * FROM kelas
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id' 
				ORDER BY kelas.kelas ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('pembayaran',$data);
	}

	public function select_all_pembayaran($id) 
	{
		$sql = "SELECT pembayaran.*, pembayaran.tanggal, tahun_ajaran.tahun_ajaran, siswa.nis, siswa.nama_siswa, kelas.kelas, unit_pendidikan.unit_pendidikan, unit_pendidikan.alamat_sekolah FROM pembayaran
				LEFT JOIN kelas_siswa_detail ON kelas_siswa_detail.id_kelas_siswa_detail = pembayaran.id_kelas_siswa_detail
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				ORDER BY pembayaran.id_pembayaran DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_pembayaran_detail($id_pembayaran) 
	{
		$sql = "SELECT pembayaran.*, pembayaran.id_pembayaran, pembayaran.tanggal, tahun_ajaran.tahun_ajaran, siswa.nis, siswa.nama_siswa, siswa.tempat_lahir, siswa.tanggal_lahir, siswa.nama_ortu, siswa.alamat, kelas.kelas FROM pembayaran
				LEFT JOIN kelas_siswa_detail ON kelas_siswa_detail.id_kelas_siswa_detail = pembayaran.id_kelas_siswa_detail
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				LEFT JOIN siswa ON siswa.id_siswa = kelas_siswa_detail.id_siswa
				WHERE pembayaran.id_pembayaran = '$id_pembayaran'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_setting_pembayaran($id) 
	{
		$sql = "SELECT * FROM setting_pembayaran 
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'
				ORDER BY setting_pembayaran.id_setting_pembayaran DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_detail_pembayaran($id_pembayaran) 
	{
		$sql = "SELECT detail_pembayaran.*, tipe_pembayaran.tipe_pembayaran, detail_pembayaran.nominal FROM detail_pembayaran
				LEFT JOIN setting_pembayaran ON setting_pembayaran.id_setting_pembayaran = detail_pembayaran.id_setting_pembayaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				WHERE detail_pembayaran.id_pembayaran = '$id_pembayaran'
				ORDER BY detail_pembayaran.id_pembayaran ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_total_pembayaran($id_pembayaran) 
	{
		$sql = "SELECT detail_pembayaran.*, sum(detail_pembayaran.nominal) AS total FROM detail_pembayaran
				LEFT JOIN setting_pembayaran ON setting_pembayaran.id_setting_pembayaran = detail_pembayaran.id_setting_pembayaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				WHERE detail_pembayaran.id_pembayaran = '$id_pembayaran'
				ORDER BY detail_pembayaran.id_pembayaran ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert_detail_pembayaran($data)
	{
		$this->db->insert('detail_pembayaran',$data);
	}

	public function select_nomor() 
	{
		$sql = "SELECT * FROM pembayaran
				ORDER BY id_pembayaran DESC 
				LIMIT 1";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function delete($data,$table) 
	{
		$this->db->where($data);
		$this->db->delete($table);
	}

}