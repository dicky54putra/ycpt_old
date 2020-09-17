<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_bulanan_spp extends CI_Model
{

    public function select_all_unit_pendidikan($id)
    {
        $sql = "SELECT * FROM unit_pendidikan
				LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
				WHERE user.id_user = '$id'";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function select_all_tahun_ajaran()
    {
        $sql = "SELECT * FROM tahun_ajaran
				ORDER BY id_tahun_ajaran DESC 
				LIMIT 1";
        $data = $this->db->query($sql);
        return $data->result();
    }
}
