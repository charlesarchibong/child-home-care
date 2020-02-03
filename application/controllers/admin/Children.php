<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Children extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'encryption'));
		$this->load->model(array('admin_model', 'parent_model', 'child_model', 'country_model', 'record_model'));
		if (!$this->session->adminLogin)
			redirect(base_url('admin/login'));
	}

	public function index()
	{
		$this->data['children'] = $this->child_model->get_all_child();
		$this->data['title'] = 'View Children';
		$this->data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
		$this->load->view('admin-dashboard/view-children', $this->data);
	}

	public function add_child()
	{
		if ($_POST) {
			$this->form_validation->set_rules('surname', 'Surname', 'required|trim');
			$this->form_validation->set_rules('othername', 'Other Name', 'required|trim');
			$this->form_validation->set_rules('address', 'Address', 'required|trim');
			$this->form_validation->set_rules('lga', 'Local Government Area', 'required|trim');
			$this->form_validation->set_rules('state_of_origin', 'State of Origin', 'required|trim');
			$this->form_validation->set_rules('nationality', 'Nationality', 'required|trim');
			$this->form_validation->set_rules('hobbie', 'Hobbies', 'required|trim');
			$this->form_validation->set_rules('education[]', 'Hobbies', 'trim');
			$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
			$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$this->data['countries'] = $this->country_model->get_all_countries();
				$this->data['title'] = "Child Registration";
				$this->data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
				$this->load->view('admin-dashboard/add-child', $this->data);
			} else {
				$hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$id = '';
				/* This post test loop (do-while) is to ensure that the Registration id of children
					will never be the same because it is a unique id in the database.
				*/
				do {
					$id = $this->child_model->generate_reg_id();
				} while ($this->child_model->get_one($id));
				$educations = '';
				if ($this->input->post('education[]'))
					foreach ($this->input->post('education[]') as $education) {
						$educations .= ' ' . $education . ',';
					}
				$child_country = $this->country_model->get_country($_POST['nationality']);
//				var_dump($child_country);
//				die;
				$parent_country = $this->country_model->get_country($_POST['parent_nationality']);
				$userData = array(
					'name' => $_POST['surname'] . ' ' . $_POST['othername'],
					'date_of_birth' => $_POST['date_of_birth'],
					'gender' => $_POST['gender'],
					'lga' => $_POST['lga'],
					'address' => $_POST['address'],
					'state_of_origin' => $_POST['state_of_origin'],
					'nationality' => $child_country->country,
					'hobbies' => $_POST['hobbie'],
					'education' => $educations,
					'password' => $hashPassword,
					'registration_date' => date('Y-m-d h:i:s'),
					'registration_id' => $id
				);
				$parentData = array(
					'child_id' => $id,
					'title' => $_POST['parent_title'],
					'name' => $_POST['parent_name'],
					'address' => $_POST['parent_address'],
					'occupation' => $_POST['parent_occupation'],
					'marital_status' => $_POST['parent_marital_status'],
					'phone_no' => $_POST['parent_phone'],
					'lga' => $_POST['parent_lga'],
					'state_of_orgin' => $_POST['parent_lga'],
					'nationality' => $parent_country->country,
				);
				$this->child_model->register_child($userData);
				$this->parent_model->register_parent($parentData);
				$this->session->set_flashdata('register_success', 'Child account was successfully created');
				redirect(base_url('admin/children/add_child'), 'refresh');
			}
		} else {
			$this->data['countries'] = $this->country_model->get_all_countries();
			$this->data['title'] = 'Add Child';
			$this->data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
			$this->load->view('admin-dashboard/add-child', $this->data);
		}
	}

	public function update_child($registration_id)
	{
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('lga', 'Local Government Area', 'required|trim');
		$this->form_validation->set_rules('state_of_origin', 'State of Origin', 'required|trim');
		$this->form_validation->set_rules('nationality', 'Nationality', 'required|trim');
		$this->form_validation->set_rules('hobbie', 'Hobbies', 'required|trim');
		$this->form_validation->set_rules('education', 'Hobbies', 'trim');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');
		}
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('register_error', validation_errors());
			redirect(base_url('admin/children/view_child/' . $registration_id));
		} else {
			if ($this->input->post('password')) {
				$hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
			}
			$child_country = $this->country_model->get_country($_POST['nationality']);
			$parent_country = $this->country_model->get_country($_POST['parent_nationality']);
			$userData = array(
				'name' => $_POST['name'],
				'gender' => $_POST['gender'],
				'lga' => $_POST['lga'],
				'address' => $_POST['address'],
				'state_of_origin' => $_POST['state_of_origin'],
				'nationality' => $child_country->country,
				'hobbies' => $_POST['hobbie'],
				'education' => $this->input->post('education'),
				'registration_id' => $registration_id

			);
			if ($this->input->post('password')) {
				$userData += array('password' => $hashPassword);
			}
			$parentData = array(
				'title' => $_POST['parent_title'],
				'name' => $_POST['parent_name'],
				'address' => $_POST['parent_address'],
				'occupation' => $_POST['parent_occupation'],
				'marital_status' => $_POST['parent_marital_status'],
				'phone_no' => $_POST['parent_phone'],
				'lga' => $_POST['parent_lga'],
				'state_of_orgin' => $_POST['parent_lga'],
				'nationality' => $parent_country->country
			);
			$this->child_model->update($userData);
			$this->parent_model->update($registration_id, $parentData);
			$this->session->set_flashdata('register_success', 'Child account was successfully updated');
			redirect(base_url('admin/children/view_child/' . $registration_id));
		}
	}

	function view_child($registration_id)
	{
		if ($registration_id) {
			$child = $this->child_model->get_one($registration_id);
			if ($child) {
				$this->data['children'] = $this->child_model->get_all_child();
				$this->data['title'] = 'View Child Details';
				$this->data['child'] = $child;
				$this->data['parent'] = $this->parent_model->get_one($registration_id);
				$this->data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
				$this->data['countries'] = $this->country_model->get_all_countries();
				$this->data['registration_id'] = $registration_id;
//				var_dump($this->data['parent']);
//				die();
				$this->load->view('admin-dashboard/child_details', $this->data);
			} else {
				$this->session->set_flashdata('delete_error', 'No child exist with this registration number - ' . $registration_id);
				redirect(base_url('admin/children'));
			}
		} else {
			$this->session->set_flashdata('delete_error', 'Invalid Child Registration Number');
			redirect(base_url('admin/children'));
		}
	}

	public function add_record($registration_id)
	{
		if ($registration_id) {
			$child = $this->child_model->get_one($registration_id);
			if ($child) {
				$this->form_validation->set_rules('type', 'Record Type', 'trim|required');
				$record_type = $this->input->post('type');
				if ($record_type == 'Feeding') {
					$this->form_validation->set_rules('feeding_method', 'Child\'s Feeding Method', 'trim|required');
				} elseif ($record_type == 'Medical') {
					$this->form_validation->set_rules('immunization', 'No of Immunization', 'trim|required');
					$this->form_validation->set_rules('blood_group', 'Blood Group', 'trim|required');
					$this->form_validation->set_rules('genotype', 'Genotype', 'trim|required');
					if ($this->input->post('disability') == 'Yes') {
						$this->form_validation->set_rules('disability_details', 'Disability Details', 'trim|required');
					}
					$this->form_validation->set_rules('disability', 'Disability', 'trim|required');
					$this->form_validation->set_rules('check_ups', 'No of check up', 'trim|required');
					$this->form_validation->set_rules('physician_phone', 'Physician Phone', 'trim|required');
					$this->form_validation->set_rules('physician_name', 'Physician Name', 'trim|required');
					$this->form_validation->set_rules('physician_hospital', 'Physician Hospital', 'trim|required');
					$this->form_validation->set_rules('physician_gender', 'Physician Gender', 'trim|required');
					$this->form_validation->set_rules('physician_address', 'Physician Address', 'trim|required');
				}
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('record_error', validation_errors());
					redirect(base_url('admin/children/view_child/' . $registration_id), 'refresh');
				} else {
					$value = '';
					if ($record_type == 'Feeding') {
						$value = $this->input->post('feeding_method');
					} elseif ($record_type == 'Medical') {
						$value = array(
							'immunization' => $this->input->post('immunization'),
							'blood_group' => $this->input->post('blood_group'),
							'genotype' => $this->input->post('genotype'),
							'disability' => $this->input->post('disability'),
							'check_ups' => $this->input->post('check_ups'),
							'physician_phone' => $this->input->post('physician_phone'),
							'physician_name' => $this->input->post('physician_name'),
							'physician_hospital' => $this->input->post('physician_hospital'),
							'physician_gender' => $this->input->post('physician_gender'),
							'physician_address' => $this->input->post('physician_address')
						);
						if ($this->input->post('disability') == 'Yes') {
							$value += array('disability_details' => $this->input->post('disability_details'));
							$value = serialize($value);
						} else {
							$value = serialize($value);
						}
					}
					$data = array(
						'child_id' => $registration_id,
						'type' => $record_type,
						'value' => $value,
						'date_recorded' => date('Y-m-d h-i-s')
					);
					$this->record_model->insert($data);
					$this->session->set_flashdata('success', 'Child Record Successfully Added!!!');
					redirect(base_url('admin/children/view_child/' . $registration_id), 'refresh');
				}
			} else {
				$this->session->set_flashdata('delete_error', 'No child exist with this registration number - ' . $registration_id);
				redirect(base_url('admin/children'));
			}
		} else {
			$this->session->set_flashdata('error', 'Invalid Child Registration Number');
			redirect(base_url('admin/children'));
		}
	}

	public function child_record()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('id', 'Registration ID', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', validation_errors());
				$this->data['title'] = 'View Child Record';
				$this->data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
				$this->load->view('admin-dashboard/child_record', $this->data);
			} else {
				$child = $this->child_model->get_one($this->input->post('id'));
				if ($child) {
					$records = $this->record_model->get($child->registration_id);
//					var_dump($records);
//					die;
					if ($records != NULL) {
						$this->data['records'] = $records;
						$this->data['child_id'] = $this->input->post('id');
						$this->data['title'] = 'View Child Records';
						$this->data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
						$this->load->view('admin-dashboard/child_view_record', $this->data);
					} else {
						$this->session->set_flashdata('error', 'Opps, No record available for this child');
						$this->data['title'] = 'View Child Record';
						$this->data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
						$this->load->view('admin-dashboard/child_record', $this->data);
					}
				} else {
					$this->session->set_flashdata('error', 'No child exist with this registration number - ' . $this->input->post('id'));
					$this->data['title'] = 'View Child Record';
					$this->data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
					$this->load->view('admin-dashboard/child_record', $this->data);
				}
			}
		} else {
			$this->data['title'] = 'View Children Record';
			$this->data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
			$this->load->view('admin-dashboard/child_record', $this->data);
		}
	}

	public function delete_record($id)
	{
		if ($this->record_model->delete($id)) {
			$this->session->set_flashdata('success', 'Record successfully deleted');
			redirect(base_url('admin/children/child_record'));
		} else {
			$this->session->set_flashdata('error', 'Record was not deleted, please try again');
			redirect(base_url('admin/children/child_record'));
		}
	}
}
