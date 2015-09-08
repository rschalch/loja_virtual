<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

	class Gerente_Clientes extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Product');
			$this->load->model('Kit');
			$this->load->model('User');
			$this->load->model('Lista_Preco');
			$this->load->model('Estado');
		}

		public function clientes() {
			$data = array(
				'name'     => $this->session->userdata('nome'),
				'clientes' => $this->User->getAllClients()
			);

			$this->auth->manage('v_admin_clients', $data);
		}


		public function add_cliente() {
			$data = array(
				'ctn'     => $this->security->get_csrf_token_name(),
				'ch'      => $this->security->get_csrf_hash(),
				'name'    => $this->session->userdata('nome'),
				'listas'  => $this->Lista_Preco->getLists(),
				'estados' => $this->Estado->getStateList()
			);

			$this->auth->manage('v_admin_add_client', $data);
		}

		public function add_client_db() {

			$email          = strtoupper($this->input->post('email'));
			$nome           = strtoupper($this->input->post('nome'));
			$sobrenome      = strtoupper($this->input->post('sobrenome'));
			$endereco       = strtoupper($this->input->post('endereco'));
			$complemento    = strtoupper($this->input->post('complemento'));
			$bairro         = strtoupper($this->input->post('bairro'));
			$cidade         = strtoupper($this->input->post('cidade'));
			$estado         = strtoupper($this->input->post('estado'));
			$nm_lista_preco = strtoupper($this->input->post('nm_lista_preco'));

			$data = array(
				'codigo'         => $this->input->post('codigo'),
				'email'          => $email,
				'senha'          => sha1($this->input->post('senha')),
				'nome'           => $nome,
				'sobrenome'      => $sobrenome,
				'ddd'            => $this->input->post('ddd'),
				'telefone'       => $this->input->post('telefone'),
				'tipo'           => 'lojista',
				'endereco'       => $endereco,
				'numero'         => $this->input->post('numero'),
				'complemento'    => $complemento,
				'bairro'         => $bairro,
				'cidade'         => $cidade,
				'estado'         => $estado,
				'cep'            => $this->input->post('cep'),
				'nm_lista_preco' => $nm_lista_preco
			);

			if ($this->exists('users', 'email', $this->input->post('email'))) {
				redirect('gerente/exists');
			}

			if ($this->db->insert('users', $data)) {
				redirect('gerente/clientes');
			}
			else {
				redirect('gerente/error');
			}
		}

		public function update_cliente($id) {
			$data = array(
				'ctn'     => $this->security->get_csrf_token_name(),
				'ch'      => $this->security->get_csrf_hash(),
				'name'    => $this->session->userdata('nome'),
				'user'    => $this->User->getClient($id),
				'listas'  => $this->Lista_Preco->getLists(),
				'estados' => $this->Estado->getStateList()
			);

			$this->auth->manage('v_admin_update_client', $data);
		}

		public function update_client_db($id) {

			$email          = strtoupper($this->input->post('email'));
			$nome           = strtoupper($this->input->post('nome'));
			$sobrenome      = strtoupper($this->input->post('sobrenome'));
			$endereco       = strtoupper($this->input->post('endereco'));
			$complemento    = strtoupper($this->input->post('complemento'));
			$bairro         = strtoupper($this->input->post('bairro'));
			$cidade         = strtoupper($this->input->post('cidade'));
			$estado         = strtoupper($this->input->post('estado'));
			$nm_lista_preco = strtoupper($this->input->post('nm_lista_preco'));

			$data = array(
				'codigo'         => $this->input->post('codigo'),
				'email'          => $email,
				'senha'          => sha1($this->input->post('senha')),
				'nome'           => $nome,
				'sobrenome'      => $sobrenome,
				'ddd'            => $this->input->post('ddd'),
				'telefone'       => $this->input->post('telefone'),
				'tipo'           => 'lojista',
				'endereco'       => $endereco,
				'numero'         => $this->input->post('numero'),
				'complemento'    => $complemento,
				'bairro'         => $bairro,
				'cidade'         => $cidade,
				'estado'         => $estado,
				'cep'            => $this->input->post('cep'),
				'nm_lista_preco' => $nm_lista_preco
			);

			$this->db->where('id', $id);

			if ($this->db->update('users', $data)) {
				redirect('gerente/clientes');
			}
			else {
				redirect('gerente/error');
			}
		}

		public function delete_cliente($id) {
			$data = array(
				'ctn'  => $this->security->get_csrf_token_name(),
				'ch'   => $this->security->get_csrf_hash(),
				'name' => $this->session->userdata('nome'),
				'user' => $this->User->getClient($id)
			);

			$this->auth->manage('v_admin_del_client', $data);
		}

		public function delete_client_db($id) {
			if ($this->db->delete('users', array('id' => $id))) {
				redirect('gerente/clientes');
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