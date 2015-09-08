<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Gerente_Kits extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Product');
			$this->load->model('Kit');
			$this->load->model('User');
		}

		// READY
		public function kits() {
			$data = array(
				'ctn'  => $this->security->get_csrf_token_name(),
				'ch'   => $this->security->get_csrf_hash(),
				'name' => $this->session->userdata('nome'),
				'kits' => $this->Kit->getAllKits()
			);

			$this->auth->manage('v_admin_kits', $data);
		}

		// READY
		public function add_kit() {
			$total = $this->db->count_all('kits');

			$data = array(
				'ctn'    => $this->security->get_csrf_token_name(),
				'ch'     => $this->security->get_csrf_hash(),
				'name'   => $this->session->userdata('nome'),
				'newcod' => $total + 1
			);

			$this->auth->manage('v_admin_add_kit', $data);
		}

		// READY
		public function add_kit_db() {

			$total = $this->db->count_all('kits');

			$data = array(
				//				'cod'       => $total + 1,
				'cod'       => $this->input->post('codigo'),
				'nome'      => strtoupper($this->input->post('nome')),
				'embalagem' => strtoupper($this->input->post('embalagem'))
			);

			if ($this->db->insert('kits', $data)) {
				redirect('gerente/kits');
			}
			else {
				redirect('gerente/error');
			}
		}

		public function update_kit($cod) {
			$data = array(
				'ctn'  => $this->security->get_csrf_token_name(),
				'ch'   => $this->security->get_csrf_hash(),
				'name' => $this->session->userdata('nome'),
				'kit'  => $this->Kit->getKit($cod)
			);

			$this->auth->manage('v_admin_update_kit', $data);
		}

		public function update_kit_db($cod) {

			$nome = strtoupper($this->input->post('nome'));

			$data = array(
				'cod'       => $this->input->post('codigo'),
				'nome'      => $nome,
				'embalagem' => $this->input->post('embalagem')
			);

			$this->db->where('cod', $cod);

			if ($this->db->update('kits', $data)) {
				redirect('gerente/kits');
			}
			else {
				redirect('gerente/error');
			}
		}

		public function delete_kit($cod) {
			$data = array(
				'ctn'  => $this->security->get_csrf_token_name(),
				'ch'   => $this->security->get_csrf_hash(),
				'name' => $this->session->userdata('nome'),
				'kit'  => $this->Kit->getKit($cod)
			);

			$this->auth->manage('v_admin_del_kit', $data);
		}

		public function del_kit_db($id) {

			if ($this->db->delete('products2kits', array('kit_id' => $id))) {

				if ($this->db->delete('kits', array('id' => $id))) {
					redirect('gerente/kits');
				}
				else {
					redirect('gerente/error');
				}
			}
			else {
				redirect('gerente/error');
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