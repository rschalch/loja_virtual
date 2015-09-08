<?php
	$pedido_total = "R$ " . number_format($this->cart->total(), 2, ',', '.')
?>

<div class="c-2-2">

	<h2 class="title">Pedidos</h2>

	<?php if ($this->cart->total_items() > 0): ?>

		<form method="post" action="<?php echo base_url() . 'pedidos/atualizar' ?>" class="form-carrinho c">

			<table class="order-table">

				<tr>
					<th>Quantidade</th>
					<th>Produto</th>
					<th>Preço</th>
					<th>Total</th>
					<th></th>
				</tr>

				<?php $i = 1 ?>

				<!--rotina executada para cada kit inserido-->
				<?php foreach ($this->cart->contents() as $item): ?>
					<tr>
						<td class="pedidos-kit"><input type="number" name="<?php echo 'quantity_' . $i ?>" value="<?php echo $item['qty'] ?>" min="0"/></td>
						<td class="pedidos-kit"><?php echo $item['name'] ?></td>
						<td class="pedidos-kit"><?php echo "R$ " . number_format($item['price'], 2, ',', '.') ?></td>
						<td class="pedidos-kit"><?php echo "R$ " . number_format($item['qty'] * $item['price'], 2, ',', '.') ?></td>
						<td class="pedidos-kit"><a href="<?php echo base_url() . 'pedidos/excluir/' . $item['id'] ?>"><img src="<?php echo base_url() . 'img/layout/trash.gif' ?>" title="Excluir"/></a></td>
					</tr>

				<?php

					$current = $products[$item['id']];

					/*sub-rotina onde colocamos os produtos de cada kit listados*/
					for ($j = 0; $j < count($current); $j++)
					{
						echo '<tr>';
						echo '<td class="pedidos-pro">' . $current[$j]['qtde'] * $item['qty'] . '</td>';
						echo '<td class="pedidos-pro">' . $current[$j]['desc'] . '</td>';
						echo '<td class="pedidos-pro">' . 'R$ ' . number_format($current[$j]['valor'], 2, ',', '.') . '</td>';
						echo '<td class="pedidos-pro">' . 'R$ ' . number_format($current[$j]['valor'] * $item['qty'] * $current[$j]['qtde'], 2, ',', '.') . '</td>';
						echo '</tr>';
					}
				?>

				<?php $i++ ?>

				<?php endforeach; ?>

			</table>

			<div class="pedidos-bottom c">
				<ul class="r c">
					<li><p>Valor total do pedido: <strong><?php echo $pedido_total ?></strong></p></li>
					<li><input type="submit" class="pedidos-update" value="Atualizar Carrinho"/></li>
					<li><a class="shopmore" href="#">Continuar comprando</a></li>
				</ul>
			</div>

		</form>

		<form class="pedidos-finalizar c" action="<?php echo base_url(). 'pedidos/finalizar' ?>" method="post">
			<input type="submit" value="Finalizar Pedido" />
		</form>

	<?php else: ?>

		<p class="empty-cart">O carrinho está vazio.</p>

	<?php endif; ?>

</div>
</div>
</div>