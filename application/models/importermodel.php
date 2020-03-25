<?php

class Importermodel extends CI_Model{
	
	function select()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('members');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('members', $data);
	}
}
?>