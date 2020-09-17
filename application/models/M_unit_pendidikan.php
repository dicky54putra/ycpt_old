<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_unit_pendidikan extends CI_Model {

	public function select_all_unit_pendidikan() 
	{
		$sql = "SELECT * FROM unit_pendidikan ORDER BY id_unit_pendidikan DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('unit_pendidikan',$data);
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

	// function detail_data($where,$table)
	// {		
	// 	return $this->db->get_where($table,$where);
	// }

	public function delete($data,$table) 
	{
		$this->db->where($data);
		$this->db->delete($table);
	}
	
}