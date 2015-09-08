<div class="c-2-2">

	<h2 class="title">Obrigado!</h2>

	<div class="block">
		<p>Sua compra foi registrada e o número de identificação é</p>
		<p><span class="simple-link"><?php echo $id ?></span></p>
		<p>Salve este número para futuras consultas.</p>
		<p>Método do pagamento: <span class="simple-link"><?php echo $payment ?></span></p>
		<p>Status da transação: <span class="simple-link"><?php echo $message ?></span></p>
		<p>Valor bruto da transação: <span class="simple-link"><?php echo 'R$ ' . $amount ?></span></p>
	</div>

	<a class="simple-link" href="<?php echo base_url() . 'kit/1' ?>">Voltar ao site</a>

</div>
</div>
</div>