<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Gerente extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Product');
			$this->load->model('Kit');
			$this->load->model('User');
		}

		public function error() {

			$data = array(
				'name' => $this->session->userdata('nome')
			);

			$this->auth->manage('v_admin_error', $data);
		}

		public function client_exists() {

			$data = array(
				'name' => $this->session->userdata('nome')
			);

			$this->auth->manage('v_admin_error_existent_client', $data);
		}
	}