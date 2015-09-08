<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class OrderFinal extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Product');
			$this->load->model('Kit');
			$this->load->model('Order');
		}

		public function index() {
			$products = array();
			$kits     = $this->Kit->kits();

			foreach ($kits as $kit) {
				$products[$kit['cod']] = $this->Product->getKit($kit['cod']);
			}


			$data = array(
				'name'         => $this->session->userdata('nome'),
				'lastname'     => $this->session->userdata('sobrenome'),
				'ddd'          => $this->session->userdata('ddd'),
				'phone'        => $this->session->userdata('telefone'),
				'email'        => $this->session->userdata('email'),
				'address'      => $this->session->userdata('endereco'),
				'number'       => $this->session->userdata('numero'),
				'complement'   => $this->session->userdata('complemento'),
				'neighborhood' => $this->session->userdata('bairro'),
				'city'         => $this->session->userdata('cidade'),
				'state'        => $this->session->userdata('estado'),
				'cep'          => $this->session->userdata('cep'),
				'kits'         => $kits,
				'products'     => $products,
				'hasOrders'    => $this->Order->getOrder()
			);

			$this->auth->attempt('v_final', $data);
		}
	}