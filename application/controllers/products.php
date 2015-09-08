<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Products extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Product');
			$this->load->model('Kit');
			$this->load->model('Order');
		}

		public function index() {
			$products = array();
			$kits     = $this->Kit->kits();

			$data = array(
				'name'     => $this->session->userdata('nome'),
				'kits'     => $kits,
				'products' => $products
			);

			$this->auth->attempt('v_product', $data);
		}

		public function show($cod) {

			$kits = $this->Kit->kits();

			$data = array(
				'name'          => $this->session->userdata('nome'),
				'kits'          => $kits,
				'product'       => $this->Product->getProduct($cod),
				'product_value' => $this->Product->getProductValue($cod),
				'hasOrders'     => $this->Order->getOrder()
			);

			$this->auth->attempt('v_product', $data);
		}
	}