<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Gerente_Produtos extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Product');
			$this->load->model('Kit');
			$this->load->model('User');
			$this->load->model('Lista_Preco');
		}

		// READY
		public function products() {
			$data = array(
				'ctn'      => $this->security->get_csrf_token_name(),
				'ch'       => $this->security->get_csrf_hash(),
				'name'     => $this->session->userdata('nome'),
				'products' => $this->Product->getAllProducts()
			);

			$this->auth->manage('v_admin_products', $data);
		}

		// READY
		public function add_product() {
			$data = array(
				'ctn'  => $this->security->get_csrf_token_name(),
				'ch'   => $this->security->get_csrf_hash(),
				'name' => $this->session->userdata('nome'),
				'kits' => $this->Kit->kits()
			);

			$this->auth->manage('v_admin_add_product', $data);
		}

		// READY
		public function add_product_db() {

			$codigo = $this->input->post('codigo');
			$desc   = strtoupper($this->input->post('desc'));
			$peso   = str_replace(',', '.', $this->input->post('peso'));
			$medida = strtoupper($this->input->post('medida'));
			$texto  = $this->input->post('texto');
			$kitqtd = $this->input->post('kitqtd');

			$product_data = array(
				'codigo' => $codigo,
				'desc'   => $desc,
				'peso'   => $peso,
				'medida' => $medida,
				'text'   => $texto
			);

			// insere na tabela produtos
			if (!$this->db->insert('products', $product_data)) {
				redirect('gerente/error');
			}

			$product_id = $this->db->insert_id();

			// variavel usada para checar se ha erros
			$errors = 0;

			// insere o produto em seus kits
			foreach ($kitqtd as $id => $qtde) {

				if ($qtde > 0) {
					$data = array(
						'product_id' => $product_id,
						'kit_id'     => $id,
						'qtde'       => $qtde
					);

					if (!$this->db->insert('products2kits', $data)) {
						$errors++;
					}
				}
			}

			// insere o produto nas listas de preço existentes
			$lists = $this->Lista_Preco->getLists();

			foreach ($lists as $list) {

				$listdata = array(
					'nm_lista_preco' => $list['nm_lista_preco'],
					'cd_produto'     => $codigo,
					'vl_unitario'    => 0.00
				);

				if (!$this->db->insert('lista_preco', $listdata)) {
					$errors++;
				}
			}

			if ($errors > 0) {
				redirect('gerente/error');
			}
			else {
				redirect('gerente/produtos');
			}
		}

		// READY
		public function update_product($id) {
			$data = array(
				'ctn'          => $this->security->get_csrf_token_name(),
				'ch'           => $this->security->get_csrf_hash(),
				'name'         => $this->session->userdata('nome'),
				'image_path'   => base_url() . 'img/products/',
				'product'      => $this->Product->getProductById($id),
				'product_kits' => $this->Kit->getProductKits($id)
			);

			$this->auth->manage('v_admin_update_product', $data);
		}

		public function update_product_db($id) {

			$desc   = strtoupper($this->input->post('desc'));
			$peso   = str_replace(',', '.', $this->input->post('peso'));
			$medida = strtoupper($this->input->post('medida'));
			$kitqtd = $this->input->post('kitqtd');
			$p2kid  = $this->input->post('p2kid');

			$data = array(
				'codigo' => $this->input->post('codigo'),
				'desc'   => $desc,
				'peso'   => $peso,
				'medida' => $medida,
				'text'   => $this->input->post('text'),
			);

			$need_update = array();
			$need_insert = array();
			$need_delete = array();

			foreach ($kitqtd as $index => $qtd) {
				if ($qtd != "0") {
					if ($this->exists('products2kits', 'id', $p2kid[$index])) {
						array_push($need_update, array($p2kid[$index] => $qtd));
					}
					else {
						array_push($need_insert, array($index => $qtd));
					}
				}
				else {
					if ($this->exists('products2kits', 'id', $p2kid[$index])) {
						array_push($need_delete, $p2kid[$index]);
					}
				}
			}

			$errors = 0; // variavel usada para checar se ha erros

			// UPDATE PRODUCT ON 'PRODUCTS'
			$this->db->where('id', $id);

			if (!$this->db->update('products', $data)) {
				$errors++;
			}

			// UPDATE PRODUCT REFERENCES ON 'PRODUCTS2KITS'
			foreach ($need_update as $item) {
				foreach ($item as $p2kid => $qtd) {
					$this->db->where('id', $p2kid);
					if (!$this->db->update('products2kits', array('qtde' => $qtd))) {
						$errors++;
					}
				}
			}

			// INSERT PRODUCT REFERENCES ON 'PRODUCTS2KITS'
			foreach ($need_insert as $item) {
				foreach ($item as $kitid => $qtd) {
					if (!$this->db->insert('products2kits', array('product_id' => $id, 'kit_id' => $kitid, 'qtde' => $qtd))) {
						$errors++;
					}
				}
			}

			// DELETE PRODUCT REFERENCES FROM 'PRODUCTS2KITS'
			foreach ($need_delete as $id) {
				if (!$this->db->delete('products2kits', array('id' => $id))) {
					$errors++;
				}
			}

			if ($errors > 0) {
				redirect('gerente/error');
			}
			else {
				redirect('gerente/produtos');
			}
		}

		// READY
		public function delete_product($id) {
			$data = array(
				'ctn'     => $this->security->get_csrf_token_name(),
				'ch'      => $this->security->get_csrf_hash(),
				'name'    => $this->session->userdata('nome'),
				'product' => $this->Product->getProductById($id)
			);

			$this->auth->manage('v_admin_del_product', $data);
		}

		// READY
		public function delete_product_db($id) {

			$product_code = $this->Product->getProductCode($id);
			$errors = 0; // variavel usada para checar se ha erros

			// deleta da tabela products2kits
			if ($this->db->delete('products2kits', array('product_id' => $id))) {

				// deleta da tabela products
				if (!$this->db->delete('products', array('id' => $id))) {
					$errors++;
				}

				// deleta da tabela lista_preco
				if (!$this->db->delete('lista_preco', array('cd_produto' => $product_code))) {
					$errors++;
				}

			} else {
				$errors++;
			}

			if ($errors > 0) {
				redirect('gerente/error');
			}
			else {
				redirect('gerente/produtos');
			}
		}

		public function error() {
			$this->auth->manage('v_admin_error');
		}

		private function exists($db, $field, $record) {
			$this->db->where($field, $record);
			$query = $this->db->get($db);
			if ($query->num_rows() > 0) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
	}