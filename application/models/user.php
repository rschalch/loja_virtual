<?php

	class User extends CI_Model
	{

		public function checkadmin($data) {

			$res = $this->db->get_where('users', $data, 1);

			if ($res->num_rows() == 1) {

				$row = $res->row();

				if($row->tipo == 'admin') {
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
			else {
				return FALSE;
			}
		}

		public function checkuser($data) {

			$res = $this->db->get_where('users', $data, 1);

			if ($res->num_rows() == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		public function get_session_data($email) {

			$this->db->select('codigo, email, nome, sobrenome, ddd, telefone, tipo, endereco, numero, complemento, bairro, cidade, estado, cep, nm_lista_preco');
			$this->db->where('email', $email);
			$res = $this->db->get('users');

			return $res->row();
		}

		public function getAllClients()
		{
			$res = $this->db->get_where('users', array('tipo' => 'lojista'));

			return $res->result_array();
		}

		public function getClient($id) {

			$res = $this->db->get_where('users', array('id' => $id));

			return $res->row();
		}
	}