<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tahun_ajaran extends CI_Model {

	public function select_all_tahun_ajaran() 
	{
		$sql = "SELECT * FROM tahun_ajaran ORDER BY id_tahun_ajaran DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('tahun_ajaran',$data);
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