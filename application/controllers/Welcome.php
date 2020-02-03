<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data['title'] = " Child Home Care - Home";
		$this->load->view('landing/home-page', $data);
	}

	public function contact()
	{
		$data['title'] = " Child Home Care - Contact";
		$this->load->view('landing/contact', $data);
	}

	public function static_page()
	{
		$data['title'] = " Child Home Care - Static-Page";
		$this->load->view('landing/static-page', $data);
	}
}
