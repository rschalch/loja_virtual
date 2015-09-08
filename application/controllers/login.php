<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data = array(
			'flashdata' => $this->session->flashdata('message')
		);

		$this->load->view('v_login', $data);
	}
}