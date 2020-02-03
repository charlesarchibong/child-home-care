<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'encryption'));
		$this->load->helper(array('form', 'string'));
		$this->load->model(array('admin_model', 'parent_model', 'child_model', 'country_model', 'record_model'));
		if (!$this->session->adminLogin)
			redirect(base_url('admin/login'));
	}

	public function index()
	{

		$user = $this->admin_model->get_one($this->session->adminLogin->email);
		$data['title'] = $user->name . " | Dashboard";
		$data['year'] = date("Y");
		$data['user'] = $user;
		$data['admins'] = $this->admin_model->get_all();
		$data['children'] = $this->child_model->get_all_child();
		$this->load->view('admin-dashboard/home', $data);
	}
}
