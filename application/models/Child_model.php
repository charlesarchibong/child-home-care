<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Child_model extends CI_Model
{
	private $table_name = 'children';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function register_child($data)
	{
		return $this->db->insert($this->table_name, $data);
	}

	public function update($data)
	{
		$this->db->where('registration_id', $data['registration_id']);
		return $this->db->update($this->table_name, $data);
	}

	public function get_one($registration_id)
	{
		$opt = array('registration_id' => $registration_id);
		$this->db->where($opt);
		$user = $this->db->get($this->table_name)->row();
		if (count((array)$user) > 0) {
			return $user;
		} else {
			return null;
		}
	}

	public function get_all_child()
	{
		$query = $this->db->get($this->table_name);
		return $query->result();
	}

	public function delete_child($id)
	{
		$this->db->where('registration_id', $id);
		return $this->db->delete($this->table_name);
	}

	public function generate_reg_id()
	{
		$last_row = $this->db->select('*')->order_by('sn', "desc")->limit(1)->get($this->table_name)->row();
		if ($last_row) {
			return sprintf("%s%s", 'MBH-', str_pad($last_row->sn++, 5, "0", STR_PAD_LEFT));
		} else {
			return sprintf("%s%s", 'MBH-', str_pad(0, 5, "0", STR_PAD_LEFT));
		}
	}

}
