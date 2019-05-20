<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('login2');
	}

public function check()
{
		$emp_username=$this->input->post('emp_username');
		$emp_password=$this->input->post('emp_password');
		if($emp_username=='admin' && $emp_password=='admin'){
		$data['result'] = "Login Successfully";
		$this->load->view('loginok',$data);
	}else{
		redirect('?act=F', 'refresh');
	}
}
}
