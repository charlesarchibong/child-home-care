<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->library(array('session'));
        $this->load->model(array('pin_model', 'admin_model'));

        if (!$this->session->adminLogin) {
            redirect(base_url('admin/login/logout'));
        }
    }
    public function index()
    {
        $data['title'] = 'Admin Pin';
        $data['year'] = date("Y");
        $pins = $this->pin_model->get_pins();
        $data['pins'] = $pins;
        $data['user'] = $this->admin_model->get_one($this->session->adminLogin->email);
        $this->load->view('admin-dashboard/admin-pin', $data);
    }
    public function generate()
    {
        $user = $this->session->adminLogin;
        $data = array(
            'pin' => random_string('alnum', 15),
            'created_by' => $user->name,
            'date_created' => date('Y-m-d g:i:s', time()),
        );
        if ($this->pin_model->insert_pin($data)) {
            $this->session->set_userdata('pinMsg', 'Pin was generated sucessfully!');
            redirect(base_url('admin/pin'));
        } else {
            $this->session->set_userdata('loginError', 'Pin was not generated, try again!');
            redirect(base_url('admin/pin'));
        }
    }
}
