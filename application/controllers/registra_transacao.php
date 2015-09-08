<?php if (!defined('BASEPATH'))
{
	exit('No direct script access allowed');
}

	class Registra_Transacao extends CI_Controller {
		public function __construct() {
			parent::__construct();
		}

		public function index() {

			/////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// REGISTRA NO BANCO ////////////////////////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////

			$this->load->model('Product');
			$this->load->model('Kit');
			$this->load->model('Order');
			$this->load->helper('date');

			$total_kits = $this->cart->contents();

			if ($this->Order->getLastId() != NULL)
			{
				$nr_pedido = str_pad($this->Order->getLastId() + 1, 6, '0', STR_PAD_LEFT); // adding leading zeros
			}
			else
			{
				$nr_pedido = str_pad(1, 6, '0', STR_PAD_LEFT);
			}

			$datestring = "%Y-%m-%d";
			$time       = time();

			$date = mdate($datestring, $time);

			$kit_string = '';

			foreach ($this->cart->contents() as $kit)
			{
				if ($kit_string == '')
				{
					$kit_string .= 'Kit ' . $kit['id'];
				}
				else
				{
					$kit_string .= ' / Kit ' . $kit['id'];
				}
			}

			$data_pedido = array(
				'nr_pedido_net' => $nr_pedido,
				'cd_cliente'    => $this->session->userdata('codigo'),
				'cd_cond_pagto' => '',
				'observacao'    => $kit_string,
				'cd_status'     => '1',
				'dt_emissao'    => $date,
				'vl_pago_juros' => 0.00,
				'importado'     => 'N'
			);

			$this->Order->addOrder($data_pedido);




			// ROTINA PARA INSERÇAO DOS PRODUTOS NA TABELA pedido_venda_item

			$items = array(); // array que conterá os items individuais de cada kit e populara a tabela pedido_venda_items

			foreach ($this->cart->contents() as $kit)
			{
				$kit_qty      = $kit['qty'];
				$kit_products = $this->Product->getKit($kit['id']);

				for ($i = 0; $i < count($kit_products); $i++)
				{
					$codigo_produto      = $kit_products[$i]['codigo'];
					$qtd_produto         = $kit_products[$i]['qtde'] * $kit_qty;
					$vl_unitario_produto = $kit_products[$i]['valor'];

					$items[$codigo_produto]['nr_pedido_net'] = $nr_pedido;
					$items[$codigo_produto]['cd_produto']    = $codigo_produto;

					if (isset($items[$codigo_produto]['qtd']))
					{
						$items[$codigo_produto]['qtd'] += $qtd_produto;
					}
					else
					{
						$items[$codigo_produto]['qtd'] = $qtd_produto;
					}

					$items[$codigo_produto]['vl_unitario'] = $vl_unitario_produto;
				}
			}

			foreach ($items as $item)
			{
				$this->Order->addOrderItem($item);
				// var_dump($item);
			}




			/////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// PAGSEGURO ////////////////////////////////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////



						$this->load->library('PagSeguroLibrary');

						$data = $this->input->post('formulario');

						$total       = $data['total'];
						$nome        = $data['nome'];
						$sobrenome   = $data['sobrenome'];
						$ddd         = $data['ddd'];
						$telefone    = $data['telefone'];
						$email       = $data['email'];
						$endereco    = $data['endereco'];
						$numero      = $data['numero'];
						$complemento = $data['complemento'];
						$bairro      = $data['bairro'];
						$cidade      = $data['cidade'];
						$estado      = $data['estado'];
						$cep         = $data['cep'];

						//criar um objeto do tipo PagSeguroPaymentRequest:
						$paymentRequest = new PagSeguroPaymentRequest();


						//Agora você deve adicionar os produtos ao objeto criado:

						$i = 0;

						foreach ($this->cart->contents() as $item) {
							$paymentRequest->addItem($nr_pedido, $item['name'], $item['qty'], number_format($item['price'], 2, '.', ','));
							$i++;
						}

						// $paymentRequest->addItem('000001', 'teste', 1, 2.00);

						//Você também pode adicionar produtos e outros parâmetros indexados utilizando o método addIndexedParameter:
						//$paymentRequest->addIndexedParameter('itemId', '0003', 3);

						/*Você também pode informar os dados fornecidos pelo comprador em sua loja, assim, o comprador
						não precisará informar esses dados novamente no site do PagSeguro:*/
						$paymentRequest->setSender(
							$nome . ' ' . $sobrenome, // PEGADINHA !!! Precisa ser nome e sobrenome separados cada um por um espaço
							$email,
							$ddd,
							$telefone
						);

						// Informando o código de referência no objeto PagSeguroPaymentRequest
						$paymentRequest->setReference($nr_pedido);

						//Informe o endereço de envio fornecido pelo comprador, assim, o comprador não precisará informa-lo novamente no site do PagSeguro:
						$paymentRequest->setShippingAddress(
							$cep,
							$endereco,
							$numero,
							$complemento,
							$bairro,
							$cidade,
							$estado,
							'BRA'
						);

						//É necessário que você informe a moeda em que o comprador irá realizar o pagamento
						$paymentRequest->setCurrency("BRL");

						//É necessário informar também o tipo de frete da compra, veja mais detalhes na classe PagSeguroShipping
						$paymentRequest->setShippingType(3);

						//Você pode adicionar outros parâmetros ao objeto utilizando o método addParameter
						//$paymentRequest->addParameter('notificationURL', 'http://www.meusite.com.br/notificacao');

						$paymentRequest->setRedirectUrl("http://www.crismetal.com.br/loja_virtual/retorno");

						// Informando as credenciais
						$credentials = PagSeguroConfig::getAccountCredentials();

						// fazendo a requisição a API do PagSeguro pra obter a URL de pagamento
						$url = $paymentRequest->register($credentials);

						redirect($url, 'location');
		}
	}