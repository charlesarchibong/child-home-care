<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Record_model extends CI_Model
{
	private $table_name = 'children_records';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($data)
	{
		$this->db->insert($this->table_name, $data);
	}

	public function update($id, $data)
	{
		$this->db->where('child_id', $id);
		return $this->db->update($this->table_name, $data);
	}

	public function get($child_id)
	{
		$opt = array('child_id' => $child_id);
		$this->db->where($opt);
		$user = $this->db->get($this->table_name)->result();
		if (count((array)$user) > 0) {
			return $user;
		} else {
			return null;
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_name);
	}

	public function get_all()
	{
		$query = $this->db->get($this->table_name);
		return $query->result();
	}

}
