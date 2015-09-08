<div class="c-2-2" xmlns="http://www.w3.org/1999/html">

	<?php if($option == '1'): ?>
		<h2 class="title">Pedidos feitos nos ultimos 3 meses:</h2>
	<?php endif; ?>

	<?php if($option == '2'): ?>
		<h2 class="title">Pedidos feitos entre <?php echo $date1 ?> e <?php echo $date2 ?>:</h2>
	<?php endif; ?>

	<?php if($option == '3'): ?>
		<h2 class="title">Total de pedidos:</h2>
	<?php endif; ?>

	<?php if(count($pedidos) == 0 ):?>

		<p class="sub-title">Nao há pedidos nesse período.</p>

	<?php else: ?>

		<table class="table-admin">
			<tr>
				<th>Data</th>
				<th>Pedido</th>
        <th>Observação</th>
				<th>Valor Pago</th>
				<th>Status</th>
				<th>Rastreio</th>
			</tr>
			<?php foreach ($pedidos as $pedido): ?>
				<tr>
					<td><?php echo implode("/",array_reverse(explode("-", $pedido['dt_emissao']))); ?></td>
					<td><?php echo $pedido['nr_pedido_net'] ?></td>
          <td><?php echo $pedido['observacao'] ?></td>
					<td><?php echo $pedido['vl_pago_juros'] ?></td>
					<td><?php echo $pedido['desc_status'] ?></td>
					<td><?php echo $pedido['rastreio'] ?></td>
				</tr>
			<?php endforeach; ?>
		</table>

	<?php endif; ?>

	<a class="btn-novaconsulta" href="<?php echo base_url() . 'pedidos/pesquisa' ?>">Nova Consulta</a>

</div>
</div>
</div>