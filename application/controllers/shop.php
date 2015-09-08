<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Shop extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Product');
			$this->load->model('Kit');
			$this->load->model('Order');
		}

		public function index()
		{
			$this->kit_cod(1);
		}

		public function kit_cod($cod)
		{
			$username = $this->session->userdata('nome');
			$usercode = $this->session->userdata('codigo');

			$data = array(
				'name'     => $username,
				'kits'     => $this->Kit->kits(),
				'kit_name' => $this->Kit->kit_name($cod),
				'results'  => $this->Product->getKit($cod),
				'hasOrders' => $this->Order->getOrder()
			);

			$this->auth->attempt('v_shop', $data);
		}
	}