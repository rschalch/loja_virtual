<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Acompanha_Pedido extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Kit');
			$this->load->model('Order');
		}

		public function index() {

			// Carrega variaveis e inicia página

			$username = $this->session->userdata('nome');

			$data = array(
				'name'      => $username,
				'kits'      => $this->Kit->kits(),
				'hasOrders' => $this->Order->getOrder()
			);

			$this->auth->attempt('v_acompanha_pedido', $data);
		}
	}