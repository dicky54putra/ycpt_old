<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tipe_kelas extends CI_Model
{

    public function select_all_tipe_kelas()
    {
        $sql = "SELECT * FROM tipe_kelas";
        $data = $this->db->query($sql);
        return $data->result();
    }
    public function insert($data)
    {
        $this->db->insert('tipe_kelas', $data);
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
    public function delete($data, $table)
    {
        $this->db->where($data);
        $this->db->delete($table);
    }
}
