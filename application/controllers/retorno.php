<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}


	class Retorno extends CI_Controller {

		public function index() {

			$this->load->model('Order');
			$this->load->library('PagSeguroLibrary');

			$credentials = PagSeguroConfig::getAccountCredentials();

			if ($this->input->get('transaction_id')) {
				$id = $this->input->get('transaction_id');

				$transaction = PagSeguroTransactionSearchService::searchByCode($credentials, $id);

				$taxas_cobradas       = $transaction->getFeeAmount();
				$vl_liquido_transacao = $transaction->getNetAmount();
				$vl_bruto_transacao   = $transaction->getGrossAmount();
				$nr_parcelas          = $transaction->getInstallmentCount();
				$nr_pedido_net        = $transaction->getReference();
				$ultimo_evento        = $transaction->getLastEventDate();
				$status               = $transaction->getStatus()->getValue();
				$paymentMethod        = $transaction->getPaymentMethod();
				$gross_amount         = $transaction->getGrossAmount();
				$code                 = $paymentMethod->getCode()->getValue();

				$message          = '';
				$payment          = '';
				$status_crismetal = '';

				switch ($status) {
					case 1:
						// crismetal : 1 - pendente
						$message          = "Aguardando pagamento.";
						$status_crismetal = '1';
						break;
					case 2:
						// crismetal : 1 - pendente
						$message          = "Em análise.";
						$status_crismetal = '1';
						break;
					case 3:
						// crismetal : 2 - aprovado
						$message          = "Pagamento aprovado.";
						$status_crismetal = '2';
						break;
					case 4:
						// crismetal : 2 - aprovado
						$message          = "Disponível (Paga).";
						$status_crismetal = '2';
						break;
					case 5:
						// crismetal : 9 - em disputa
						$message          = "Em disputa.";
						$status_crismetal = '9';
						break;
					case 6:
						// crismetal : 6 - devolvida
						$message          = "Devolvida.";
						$status_crismetal = '6';
						break;
					case 7:
						// crismetal : 7 - cancelada
						$message          = "Cancelada.";
						$status_crismetal = '7';
						break;
				}

				switch ($code) {
					case 101:
						$payment = "Cartão de crédito Visa.";
						break;
					case 102:
						$payment = "Cartão de crédito MasterCard.";
						break;
					case 103:
						$payment = "Cartão de crédito American Express.";
						break;
					case 104:
						$payment = "Cartão de crédito Diners.";
						break;
					case 105:
						$payment = "Cartão de crédito Hipercard.";
						break;
					case 106:
						$payment = "Cartão de crédito Aura.";
						break;
					case 107:
						$payment = "Cartão de crédito Elo.";
						break;
					case 108:
						$payment = "Cartão de crédito PLENOCard.";
						break;
					case 109:
						$payment = "Cartão de crédito PersonalCard.";
						break;
					case 110:
						$payment = "Cartão de crédito JCB.";
						break;
					case 111:
						$payment = "Cartão de crédito Discover.";
						break;
					case 112:
						$payment = "Cartão de crédito BrasilCard.";
						break;
					case 113:
						$payment = "Cartão de crédito FORTBRASIL.";
						break;
					case 114:
						$payment = "Cartão de crédito CARDBAN.";
						break;
					case 115:
						$payment = "Cartão de crédito VALECARD.";
						break;
					case 116:
						$payment = "Cartão de crédito Cabal.";
						break;
					case 117:
						$payment = "Cartão de crédito Mais!.";
						break;
					case 118:
						$payment = "Cartão de crédito Avista.";
						break;
					case 119:
						$payment = "Cartão de crédito GRANDCARD.";
						break;
					case 201:
						$payment = "Boleto Bradesco.";
						$vl_bruto_transacao += 1;
						break;
					case 202:
						$payment = "Boleto Santander.";
						$vl_bruto_transacao += 1;
						break;
					case 301:
						$payment = "Débito online Bradesco.";
						break;
					case 302:
						$payment = "Débito online Itaú.";
						break;
					case 303:
						$payment = "Débito online Unibanco.";
						break;
					case 304:
						$payment = "Débito online Banco do Brasil.";
						break;
					case 305:
						$payment = "Débito online Banco Real.";
						break;
					case 306:
						$payment = "Débito online Banrisul.";
						break;
					case 401:
						$payment = "Saldo PagSeguro.";
						break;
					case 501:
						$payment = "Oi Paggo.";
						break;
					case 701:
						$payment = "Depósito em conta - Banco do Brasil.";
						break;
				}

				// rotina para atualizar tabela pedido_venda no banco
				$data_db = array(
					'tipo_pagto'        => $payment,
					'cond_pagto'        => $nr_parcelas,
					'cd_status'         => $status_crismetal,
					'desc_status'       => $message,
					'vl_liquido'        => $vl_liquido_transacao,
					'vl_pago_juros'     => $vl_bruto_transacao,
					'vl_taxas_cobradas' => $taxas_cobradas
				);

				$this->Order->updateOrder($nr_pedido_net, $data_db);


				// carrega view com os dados
				$data = array(
					'id'      => $id,
					'message' => $message,
					'payment' => $payment,
					'amount'  => $gross_amount
				);

				$this->load->view('open_header');
				$this->load->view('v_retorno', $data);
				$this->load->view('i_footer');

        $this->cart->destroy();
			}
			else {
				redirect('default_controller', 'location');
			}
		}
	}