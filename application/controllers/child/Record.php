<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Record extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'encryption'));
        $this->load->helper(array('form', 'string'));
        $this->load->model(array('child_model', 'record_model', 'country_model', 'parent_model'));
        if (!$this->session->childLogin) {
            redirect(base_url('child/login'));
        }
    }

    public function index()
    {
        $child = $this->child_model->get_one($this->session->childLogin->registration_id);
        $records = $this->record_model->get($child->registration_id);
        $user = $this->child_model->get_one($this->session->childLogin->registration_id);
        $this->data['records'] = $records;
        $this->data['child_id'] = $child->registration_id;
        $this->data['title'] = 'View Child Record';
        $this->data['year'] = date("Y");
        $this->data['user'] = $user;
        $this->load->view('child-dashboard/record', $this->data);
    }
}
