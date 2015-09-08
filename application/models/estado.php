<?php

	class Estado extends CI_Model {

		public function getStateList() {

			$this->db->select('sigla');

			$result = $this->db->get('estados');

			return $result->result_array();
		}
	}