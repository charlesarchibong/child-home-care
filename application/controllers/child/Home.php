<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'encryption'));
		$this->load->model(array('child_model', 'country_model', 'parent_model'));
		$this->load->helper(array('form', 'string'));
		$this->load->model(array('child_model', 'country_model', 'parent_model'));
	}

	public function index()
	{
		if (!$this->session->childLogin) {
			redirect(base_url('child/login'));
		}
		$user = $this->child_model->get_one($this->session->childLogin->registration_id);
		$this->data['title'] = $user->name . " | Dashboard";
		$this->data['year'] = date("Y");
		$this->data['user'] = $user;
		$child = $this->child_model->get_one($this->session->childLogin->registration_id);
		$this->data['children'] = $this->child_model->get_all_child();
		$this->data['child'] = $child;
		$this->data['parent'] = $this->parent_model->get_one($this->session->childLogin->registration_id);
		$this->data['countries'] = $this->country_model->get_all_countries();
		$this->data['registration_id'] = $this->session->childLogin->registration_id;
		$this->load->view('child-dashboard/home', $this->data);
	}

	public function delete_child($id)
	{
		if ($this->session->adminLogin->role == 'admin') {
			if ($this->child_model->delete_child($id)) {
				$this->session->set_flashdata('delete_success', 'Child account was successfully removed');
				redirect('admin/children', 'refresh');
			} else {
				$this->session->set_flashdata('delete_error', 'Child account was not successfully removed');
				redirect('admin/children', 'refresh');
			}
		} else {
			$this->session->set_flashdata('delete_error', 'Permission denied');
			redirect('admin/children', 'refresh');
		}
	}
}
