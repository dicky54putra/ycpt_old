<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function select_all_user() 
	{
		$sql = "SELECT * FROM user
				LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = user.id_unit_pendidikan
				ORDER BY id_user DESC";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all_unit_pendidikan() 
	{
		$sql = "SELECT * FROM unit_pendidikan";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('user',$data);
	}

	function edit_data($where,$table)
	{		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete($data,$table) 
	{
		$this->db->where($data);
		$this->db->delete($table);
	}

}