<?php

	class Lista_Preco extends CI_Model {

		public function getLists() {

			$this->db->select('*');
			$this->db->group_by('nm_lista_preco');

			$result = $this->db->get('lista_preco');

			return $result->result_array();
		}

		public function getListPrices($id) {

			$listname = $this->getListName($id);

			$query  = $this->db->get_where('lista_preco', array('nm_lista_preco' => $listname));
			$result = $query->result_array();

			return $result;
		}

		public function getListName($id) {
			$this->db->select('nm_lista_preco');
			$this->db->from('lista_preco');
			$this->db->where('id', $id);

			$data = $this->db->get();
			$result = $data->row();

			return $result->nm_lista_preco;
		}
	}