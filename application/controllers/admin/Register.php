<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'encryption'));
        $this->load->helper(array('form', 'string'));
        $this->load->model(array('admin_model', 'pin_model'));
    }
    public function index()
    {
        if ($this->session->adminLogin) {
            redirect(base_url('admin/home'));
        } else {
            if ($_POST) {
                $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[6]');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admins.email]');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');
                $this->form_validation->set_rules('pin', 'Admin Authentication Pin', 'required|trim');
                if ($this->form_validation->run() === FALSE) {
                    $data['title'] = "Admin Registration";
                    $this->load->view('admin-dashboard/register', $data);
                } else {
                    $pin = $this->pin_model->authenticated_pin($_POST['pin']);
                    if (!$pin) {
                        $data['title'] = "Admin Registration";
                        $this->session->set_flashdata('pinError', "Invalid Pin, Please try another!");
                        $this->load->view('admin-dashboard/register', $data);
                    } elseif ($pin->no_of_usage > 0) {
                        $data['title'] = "Admin Registration";
                        $this->session->set_flashdata('pinError', "This pin has been used!");
                        $this->load->view('admin-dashboard/register', $data);
                    } else {
                        $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $userData = array(
                            'name' => $_POST['name'],
                            'email' => $_POST['email'],
                            'password' => $hashPassword,
                            'id' => random_string('alpha', '50')
                        );
                        $pinData = array(
                            'pin' => $_POST['pin'],
                            'no_of_usage' => 1,
                            'used_by' => $_POST['name']
                        );
                        $this->pin_model->update_pin($pinData);
                        $this->admin_model->register_admin($userData);
                        $user = $this->admin_model->get_one($_POST['email']);
                        $this->session->set_userdata('adminLogin', $user);
                        redirect(base_url('admin/home'));
                    }
                }
            } else {
                $data['title'] = "Admin Registration";
                $this->load->view('admin-dashboard/register', $data);
            }
        }
    }
}
