<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Gerente_Listas extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Lista_Preco');
			$this->load->model('Product');
			$this->load->model('User');
		}

		// READY
		public function pricelist() {
			$data = array(
				'ctn'   => $this->security->get_csrf_token_name(),
				'ch'    => $this->security->get_csrf_hash(),
				'name'  => $this->session->userdata('nome'),
				'lists' => $this->Lista_Preco->getLists()
			);

			$this->auth->manage('v_admin_lists', $data);
		}

		// READY
		public function add_pricelist() {

			$data = array(
				'ctn'      => $this->security->get_csrf_token_name(),
				'ch'       => $this->security->get_csrf_hash(),
				'name'     => $this->session->userdata('nome'),
				'products' => $this->Product->getAllProducts()
			);

			$this->auth->manage('v_admin_add_list', $data);
		}

		// READY
		public function add_pricelist_db() {

			$nome   = strtoupper($this->input->post('nome'));
			$codigo = $this->input->post('codigo');

			$errors = 0;

			foreach ($codigo as $index => $value) {

				$data = array(
					'nm_lista_preco' => $nome,
					'cd_produto'     => $index,
					'vl_unitario'    => $value
				);

				if (!$this->db->insert('lista_preco', $data)) {
					$errors++;
				}
			}

			if ($errors > 0) {
				redirect('gerente/error');
			}
			else {
				redirect('gerente/listas');
			}
		}

		public function update_pricelist($id) {
			$data = array(
				'ctn'          => $this->security->get_csrf_token_name(),
				'ch'           => $this->security->get_csrf_hash(),
				'name'         => $this->session->userdata('nome'),
				'listname'     => $this->Lista_Preco->getListName($id),
				'listproducts' => $this->Lista_Preco->getListPrices($id),
				'listid'       => $id
			);

			$this->auth->manage('v_admin_update_list', $data);
		}

		public function update_pricelist_db($id) {

			$listname = $this->Lista_Preco->getListName($id);
			$newname = strtoupper($this->input->post('nome'));

			$values = $this->input->post('price');

			$errors = 0;

			foreach ($values as $index => $value) {

				$data = array(
					'nm_lista_preco' => $newname,
					'cd_produto'     => $index,
					'vl_unitario'    => $value
				);

				$this->db->where('nm_lista_preco', $listname);
				$this->db->where('cd_produto', $data['cd_produto']);

				if (!$this->db->update('lista_preco', $data)) {
					$errors++;
				}
			}

			if ($errors > 0) {
				redirect('gerente/error');
			}
			else {
				redirect('gerente/listas');
			}
		}

		public function delete_pricelist($id) {
			$data = array(
				'ctn'     => $this->security->get_csrf_token_name(),
				'ch'      => $this->security->get_csrf_hash(),
				'name'    => $this->session->userdata('nome'),
				'list'    => $this->Lista_Preco->getListName($id),
				'list_id' => $id
			);

			$this->auth->manage('v_admin_del_list', $data);
		}

		public function delete_pricelist_db($id) {

			$listname = $this->Lista_Preco->getListName($id);

			if ($this->db->delete('lista_preco', array('nm_lista_preco' => $listname))) {
				redirect('gerente/listas');
			}
			else {
				redirect('gerente/error');
			}
		}
	}