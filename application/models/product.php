<?php

class Product extends CI_Model {

	public function getAllProducts()
	{
		$this->db->select('*');
		$this->db->from('products');

		$result = $this->db->get();

		return $result->result_array();
	}

	public function getKit($cod)
	{
		$this->db->select('kits.cod');
		$this->db->select('products.codigo');
		$this->db->select('products.desc');
		$this->db->select('products.peso');
		$this->db->select('products.medida');
		$this->db->select('products2kits.qtde');

		$this->db->from('products2kits');

		$this->db->join('products', 'products2kits.product_id = products.id', 'inner');
		$this->db->join('kits', 'products2kits.kit_id = kits.id', 'inner');

		$this->db->where('kits.cod', $cod);

		$result = $this->db->get();

		$final_result = $result->result_array();

		foreach ($final_result as $key=>$product) {
			$final_result[$key]['valor'] = $this->getProductValue($product['codigo']);
		}

		return $final_result;
	}

	public function getProductValue($product_code) {

		$user_lista = $this->session->userdata('nm_lista_preco');

		$this->db->select('vl_unitario');
		$this->db->from('lista_preco');
		$this->db->where('lista_preco.nm_lista_preco', $user_lista);
		$this->db->where('lista_preco.cd_produto', $product_code);

		$result = $this->db->get();
		$final = $result->result_array();

		return $final[0]['vl_unitario'];
	}

	public function getProduct($cod)
	{
		$this->db->select('products.id');
		$this->db->select('products.codigo');
		$this->db->select('products.desc');
		$this->db->select('products.peso');
		$this->db->select('products.medida');
		$this->db->select('products.text');

		$this->db->from('products');

		$this->db->where('products.codigo', $cod);

		$result = $this->db->get();

		$final = $result->result_array();

		return $final[0];
	}

	public function getProductById($id)
	{
		$this->db->select('products.id');
		$this->db->select('products.codigo');
		$this->db->select('products.desc');
		$this->db->select('products.peso');
		$this->db->select('products.medida');
		$this->db->select('products.text');

		$this->db->from('products');

		$this->db->where('products.id', $id);

		$result = $this->db->get();

		$final = $result->result_array();

		return $final[0];
	}

	public function getProductCode($id)
	{
		$this->db->select('products.codigo');
		$this->db->from('products');
		$this->db->where('products.id', $id);
		$result = $this->db->get();
		$final = $result->result_array();

		return $final[0]['codigo'];
	}
}