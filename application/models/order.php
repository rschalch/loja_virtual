<?php

  class Order extends CI_Model {

    public function getAllOrders() {

      $usercode = $this->session->userdata('codigo');

      $this->db->select('*');
      $this->db->from('pedido_venda');
      $this->db->where('cd_cliente', $usercode);
      $this->db->order_by('dt_emissao', 'asc');

      $result = $this->db->get();

      return $result->result_array();
    }

    public function getLast3Months() {

      $usercode = $this->session->userdata('codigo');

      // calcula datas
      $today       = date("Y-m-d", strtotime('now'));
      $last3months = date("Y-m-d", strtotime("-3 months"));

      // monta query
      $this->db->select('observacao, dt_emissao, nr_pedido_net, vl_pago_juros, desc_status, rastreio');
      $this->db->where("dt_emissao BETWEEN '$last3months' AND '$today'");
      $this->db->where('cd_cliente', $usercode);
      $this->db->order_by('dt_emissao', 'asc');
      $result = $this->db->get('pedido_venda');

      return $result->result_array();
    }

    public function getBetweenDates($date1, $date2, $client = NULL) {

      // monta query
      $this->db->select('observacao, dt_emissao, nr_pedido_net, vl_pago_juros, desc_status, rastreio');
      $this->db->where("dt_emissao BETWEEN '$date1' AND '$date2'");

      if ($client && $client != "all") {
        $this->db->where('cd_cliente', $client);
      }
      elseif ($client == "all") {

      }
      else {
        $this->db->where('cd_cliente', $this->session->userdata('codigo'));
      }

      $this->db->order_by('dt_emissao', 'asc');
      $result = $this->db->get('pedido_venda');

      return $result->result_array();
    }

    public function getOrder() {

      $this->db->select('*');
      $this->db->where('cd_cliente', $this->session->userdata('codigo'));
      $this->db->order_by('dt_emissao', 'asc');
      $result = $this->db->get('pedido_venda');

      if ($result->num_rows() == 0) {
        return FALSE;
      }
      else {
        return TRUE;
      }
    }

    public function cancelOrder($id) {
      $this->db->where('id', $id);
      $this->db->delete('products');

      $this->db->where('product_id', $id);
      $this->db->delete('products2kits');
    }

    public function addOrder($data) {
      $this->db->insert('pedido_venda', $data);
    }

    public function addOrderItem($data) {
      $this->db->insert('pedido_venda_item', $data);
    }

    public function updateOrder($num, $data) {
      $this->db->where('nr_pedido_net', $num);
      $this->db->update('pedido_venda', $data);
    }

    public function getLastId() {
      $maxid = $this->db->query('SELECT MAX(id) AS `maxid` FROM `pedido_venda`')->row()->maxid;

      return $maxid;
    }
  }