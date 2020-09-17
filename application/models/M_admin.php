<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

	public function update($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("admin", $data);
		return $this->db->affected_rows();
	}

	public function update1($data, $id)
	{
		$this->db->where("id_user", $id);
		$this->db->update("user", $data);
		//echo $this->db->affected_rows(); exit;
		return 1;
	}

	public function select($id = '')
	{
		if ($id != '') {
			$this->db->where('id', $id);
		}
		$data = $this->db->get('admin');
		return $data->row();
	}

	public function select1($id = '')
	{
		if ($id != '') {
			$this->db->where('id_user', $id);
		}
		$data = $this->db->get('user');
		return $data->row();
	}

	public function select_all_admin()
	{
		$sql = "SELECT * FROM admin";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('admin', $data);
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
