<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_weight extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_all()
	{		
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get('weight');

		return $query->result_array();
	}
	
	public function get($condition)
	{
		$query = $this->db->get_where('weight', $condition);

		return $query->row_array();
	}

	public function insert($data)
	{
		$this->db->insert('weight', $data);
	}
	
	public function update($data, $condition)
	{
		$this->db->update('weight', $data, $condition);
	}

	public function delete($condition)
	{
		$this->db->delete('weight', $condition);
	}

}