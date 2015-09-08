<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Orders extends CI_Controller {
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
				'name'      => $this->session->userdata('nome'),
				'kits'      => $kits,
				'products'  => $products,
				'hasOrders' => $this->Order->getOrder()
			);

			$this->auth->attempt('v_order', $data);
		}

		public function add_to_cart($kit_id) {

			$id  = $this->input->post('id');
			$qty = $this->input->post('quantity');

			$total = $this->cart->total_items();
			$cart  = $this->cart->contents();

			$add_data = array(
				'id'    => $this->input->post('id'),
				'qty'   => $this->input->post('quantity'),
				'price' => $this->input->post('price'),
				'name'  => $this->input->post('name')
				// 'options' => array('Size' => 'L', 'Color' => 'Red')
			);

			if ($total > 0) {
				// para cada item do carrinho
				foreach ($cart as $item) {
					// se o id do produto for igual ao id postado ...
					if ($item['id'] === $id) {
						$update_data = array(
							'rowid' => $item['rowid'],
							'qty'   => $qty + $item['qty']
						);

						$this->cart->update($update_data);

						break;
					}
					else {
						$this->cart->insert($add_data);
					}
				}
			}
			else {
				$this->cart->insert($add_data);
			}

			$this->index();
		}

		public function update_cart() {
			$cart = $this->cart->contents();
			$i    = 1;

			foreach ($cart as $item) {
				$update_data = array(
					'rowid' => $item['rowid'],
					'qty'   => $this->input->post('quantity_' . $i)
				);

				$this->cart->update($update_data);

				$i++;
			}

			redirect('pedidos');
		}

		public function delete_from_cart($id) {
			$id   = $this->uri->segment(3);
			$cart = $this->cart->contents();

			foreach ($cart as $item) {
				// se o id do produto for igual ao id postado ...
				if ($item['id'] == $id) {
					$update_data = array(
						'rowid' => $item['rowid'],
						'qty'   => 0
					);

					$this->cart->update($update_data);

					break;
				}
			}

			redirect('pedidos');
		}

		public function clearcart() {
			$this->cart->destroy();
			redirect('kit/1');
		}
	}