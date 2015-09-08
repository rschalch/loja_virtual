<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Acompanha_Pedido_Resultado extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Kit');
			$this->load->model('Order');
		}

		public function index() {

			// Carrega variaveis e inicia página

			$username = $this->session->userdata('nome');
			$option   = $this->input->post('option');

			$date1 = implode("-",array_reverse(explode("/", $this->input->post('date1'))));
			$date2 = implode("-",array_reverse(explode("/", $this->input->post('date2'))));

			$date1br = $this->input->post('date1');
			$date2br = $this->input->post('date2');

			// ultimos 3 meses
			if ($option == '1') {
				$result = $this->Order->getLast3Months();
			}

			// consulta entre datas
			if ($option == '2') {
				$result = $this->Order->getBetweenDates($date1, $date2);
			}

			// todos os pedidos
			if ($option == '3') {
				$result = $this->Order->getAllOrders();
			}

			$data = array(
				'name'      => $username,
				'kits'      => $this->Kit->kits(),
				'hasOrders' => $this->Order->getOrder(),
				'option'    => $option,
				'date1'     => $date1br,
				'date2'     => $date2br,
				'pedidos'   => $result
			);

			$this->auth->attempt('v_acompanha_pedido_resultado', $data);
		}
	}