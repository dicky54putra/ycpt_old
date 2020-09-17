<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_riwayat_pembayaran extends CI_Model {

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

	public function select_all_setting_bayar($nis,$id,$id_tahun_ajaran) 
	{
		$sql = "SELECT * FROM setting_pembayaran 
	 			LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
	 			LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran.id_unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
	 			WHERE user.id_user = '$id' AND setting_pembayaran.id_tahun_ajaran >='$id_tahun_ajaran'
	 			ORDER BY setting_pembayaran.id_setting_pembayaran ASC";
	 	$data = $this->db->query($sql);
	 	return $data->result();
	}

	// public function select_all_total_bayar_by_tipe($nis) 
	// {
	// 	$sql = "select sum(a.nominal) from detail_pembayaran a 
	// 			left join pembayaran b on b.id_pembayaran = a.id_pembayaran
	// 			left join siswa c on c.id_siswa = b.id_siswa
	// 			left join setting_pembayaran d on d.id_setting_pembayaran = a.id_setting_pembayaran
	// 			left join tipe_pembayaran e on e.id_tipe_pembayaran = d.id_tipe_pembayaran
	// 			where c.nis = '$nis'
	// 			and e.id_tipe_pembayaran = 1";
	//  	$data = $this->db->query($sql);
	//  	return $data->result();
	// }

	public function select_all_detail_siswa($nis) 
	{
		$sql = "SELECT * FROM siswa
				WHERE nis = '$nis' ";
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

	public function select_siswa($id) 
	{
		$sql = "SELECT * FROM siswa
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
				WHERE siswa.id_unit_pendidikan = '$id' 
				ORDER BY siswa.nis ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_all_setting_bayar1($nis,$id_unit_pendidikan) 
	{
		$sql = "SELECT * FROM setting_pembayaran 
	 			LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
	 			LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran.id_unit_pendidikan
	 			WHERE unit_pendidikan.id_unit_pendidikan = '$id_unit_pendidikan'
	 			ORDER BY setting_pembayaran.id_setting_pembayaran ASC";
	 	$data = $this->db->query($sql);
	 	return $data->result();
	}
	
	public function select_all_detail_siswa1($nis) 
	{
		$sql = "SELECT * FROM siswa
				WHERE nis = '$nis' ";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_siswa_cetak($id_siswa) 
	{
		$sql = "SELECT * FROM siswa
				WHERE id_siswa = '$id_siswa'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_setting_pembayaran_cetak($id_setting_pembayaran) 
	{
		$sql = "SELECT * FROM setting_pembayaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				WHERE setting_pembayaran.id_setting_pembayaran = '$id_setting_pembayaran'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_setting_pembayaran_cetak1($id_setting_pembayaran) 
	{
		$sql = "SELECT * FROM setting_pembayaran
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
				LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
				WHERE setting_pembayaran.id_setting_pembayaran = '$id_setting_pembayaran'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_unit_pendidikan_cetak($id) 
	{
		$sql = "SELECT * FROM user
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = user.id_unit_pendidikan
				WHERE user.id_user = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_nomor() 
	{
		$sql = "SELECT * FROM pembayaran
				ORDER BY id_pembayaran DESC 
				LIMIT 1";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert_pembayaran($data1)
	{
		$this->db->insert('pembayaran',$data1);
	}

	public function insert_detail_pembayaran($data2)
	{
		$this->db->insert('detail_pembayaran',$data2);
	}

}