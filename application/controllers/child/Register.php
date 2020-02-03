<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Africa/Lagos');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'encryption'));
        $this->load->helper(array('form', 'string'));
        $this->load->model(array('child_model', 'country_model', 'parent_model'));
    }

    public function index()
    {
        if ($this->session->childLogin) {
            redirect(base_url('child/home'));
        } else {
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
                if ($this->form_validation->run() === FALSE) {
                    $data['countries'] = $this->country_model->get_all_countries();
                    $data['title'] = "Child Registration";
                    $this->load->view('child-dashboard/register', $data);
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
                    //var_dump($child_country);
                    //die;
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
                        'registration_date' => date('Y-m-d g:i:s', time()),
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
                    $user = $this->child_model->get_one($id);
                    $this->session->set_userdata('childLogin', $user);
                    redirect(base_url('child/home'));
                }
            } else {
                $data['countries'] = $this->country_model->get_all_countries();
                $data['title'] = "Child Registration";
                $this->load->view('child-dashboard/register', $data);
            }
        }
    }
    public function get_states_json()
    {
        if ($this->input->post('country_id')) {
            echo json_encode($this->country_model->get_state($this->input->post('country_id')));
        }
    }
}
