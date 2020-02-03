<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
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
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');
                if ($this->form_validation->run() === FALSE) {
                    $data['title'] = "Admin Login";
                    $this->load->view('admin-dashboard/login', $data);
                } else {
                    $user = $this->admin_model->get_one($_POST['email']);
                    if ($user) {
                        if (password_verify($_POST['password'], $user->password)) {
                            $this->session->set_userdata('adminLogin', $user);
                            redirect(base_url('admin/home'));
                        } else {
                            $this->session->set_flashdata('loginError', 'Incorrect password/email');
                            $data['title'] = "Admin Login";
                            $this->load->view('admin-dashboard/login', $data);
                        }
                    } else {
                        $this->session->set_flashdata('loginError', 'No account exist with this credentials');
                        $data['title'] = "Admin Login";
                        $this->load->view('admin-dashboard/login', $data);
                    }
                }
            } else {
                $data['title'] = "Admin Login";
                $this->load->view('admin-dashboard/login', $data);
            }
        }
    }


    public function logout()
    {
        if (!$this->session->adminLogin) {
            redirect(base_url('admin/login'));
        } else {
            $this->session->unset_userdata('adminLogin');
            redirect(base_url('admin/login'));
        }
    }
}
