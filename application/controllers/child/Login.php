<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
                $this->form_validation->set_rules('registration_id', 'Regration ID', 'required|trim');
                $this->form_validation->set_rules('password', 'Password', 'required');
                if ($this->form_validation->run() === FALSE) {
                    $data['title'] = "Child Login";
                    $this->load->view('child-dashboard/login', $data);
                } else {
                    $user = $this->child_model->get_one($_POST['registration_id']);
                    if ($user) {
                        if (password_verify($_POST['password'], $user->password)) {
                            $this->session->set_userdata('childLogin', $user);
                            redirect(base_url('child/home'));
                        } else {
                            $this->session->set_flashdata('loginError', 'Incorrect password/email');
                            $data['title'] = "Child Login";
                            $this->load->view('child-dashboard/login', $data);
                        }
                    } else {
                        $this->session->set_flashdata('loginError', 'No account exist with this credentials');
                        $data['title'] = "Child Login";
                        $this->load->view('child-dashboard/login', $data);
                    }
                }
            } else {
                $data['title'] = "Child Login";
                $this->load->view('child-dashboard/login', $data);
            }
        }
    }
    public function logout()
    {
        if (!$this->session->childLogin) {
            redirect(base_url('child/login'));
        } else {
            $this->session->unset_userdata('childLogin');
            redirect(base_url('child/login'));
        }
    }
}
