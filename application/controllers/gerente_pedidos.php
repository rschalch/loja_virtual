<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Gerente_Pedidos extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Order');
		}

		public function index() {

			// Carrega variaveis e inicia página

			$username = $this->session->userdata('nome');

			$data = array(
				'name'      => $username,
				'hasOrders' => $this->Order->getOrder(),
			);

			$this->auth->manage('v_admin_pedidos', $data);
		}

    public function resultado() {

      $username = $this->session->userdata('nome');

      $date1 = implode("-",array_reverse(explode("/", $this->input->post('date1'))));
      $date2 = implode("-",array_reverse(explode("/", $this->input->post('date2'))));

      $date1br = $this->input->post('date1');
      $date2br = $this->input->post('date2');

      $result = $this->Order->getBetweenDates($date1, $date2, "all");

      $data = array(
        'name'      => $username,
        'date1'     => $date1br,
        'date2'     => $date2br,
        'pedidos'   => $result
      );

      $this->auth->manage('v_admin_pedidos_resultado', $data);
    }
  }