<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Parent_model extends CI_Model
{
	private $table_name = 'parents';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function register_parent($data)
	{
		$this->db->insert($this->table_name, $data);
	}

	public function update($id, $data)
	{
		$this->db->where('child_id', $id);
		return $this->db->update($this->table_name, $data);
	}

	public function get_one($child_id)
	{
		$opt = array('child_id' => $child_id);
		$this->db->where($opt);
		$user = $this->db->get($this->table_name)->row();
		if (count((array)$user) > 0) {
			return $user;
		} else {
			return null;
		}
	}

	public function get_all_parents()
	{
		$query = $this->db->get($this->table_name);
		return $query->result();
	}
}
