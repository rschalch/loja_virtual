<?php

	class Kit extends CI_Model {

		public function kits() {
			$this->db->distinct('cod');
			$result = $this->db->get('kits');

			return $result->result_array();
		}

		public function getKit($cod) {
			$query = $this->db->get_where('kits', array('cod' => $cod));
			$row   = $query->result_array();

			return $row[0];
		}

		public function getAllKits() {
			$result = $this->db->get('kits');

			return $result->result_array();
		}

		public function kit_name($cod) {
			$this->db->select('nome');
			$this->db->where('cod', $cod);
			$result = $this->db->get('kits');

			$row = $result->result_array();

			return $row[0]['nome'];
		}

		public function getProductKits($id) {

			$this->db->select('products2kits.id as p2kid');
			$this->db->select('products2kits.kit_id as kitid');
			$this->db->select('kits.cod as kitcod');
			$this->db->select('products2kits.qtde as kitqtd');

			$this->db->from('products2kits');

			$this->db->join('products', 'products2kits.product_id = products.id', 'inner');
			$this->db->join('kits', 'products2kits.kit_id = kits.id', 'inner');

			$this->db->where('products.id', $id);

			$result = $this->db->get()->result_array();

			$total_results = count($result);

			$final_result = array();

			$kits = $this->kits();

			foreach ($kits as $index => $kit) {
				$final_result[$index]['kitid']  = $kit['id'];
				$final_result[$index]['kitcod']  = $kit['cod'];
			}

			foreach ($final_result as $index => $kit) {
				for ($i=0; $i < $total_results; $i++) {
					if ($result[$i]['kitid'] == $kit['kitid']) {
						$final_result[$index]['p2kid'] = $result[$i]['p2kid'];
						$final_result[$index]['kitqtd'] = $result[$i]['kitqtd'];
						break;
					} else {
						$final_result[$index]['p2kid'] = NULL;
						$final_result[$index]['kitqtd'] = 0;
					}
				}
			}

			return $final_result;
		}
	}