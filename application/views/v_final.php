<?php
	$pedido_total = "R$ " . number_format($this->cart->total(), 2, ',', '.')
?>

<div class="c-2-2">

	<h2 class="title">Detalhes do pedido:</h2>

	<div>
		<table class="final-table">

			<tr>
				<th>Quantidade</th>
				<th>Produto</th>
				<th>Preço</th>
				<th>Total</th>
			</tr>

			<?php $i = 1 ?>

			<!--rotina executada para cada kit inserido-->
			<?php foreach ($this->cart->contents() as $item): ?>
				<tr>
					<td class="main"><?php echo $item['qty'] ?></td>
					<td class="main"><?php echo $item['name'] ?></td>
					<td class="main"><?php echo "R$ " . number_format($item['price'], 2, ',', '.') ?></td>
					<td class="main"><?php echo "R$ " . number_format($item['qty'] * $item['price'], 2, ',', '.') ?></td>
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

		<p class="infopop">Valor final do pedido: <strong><?php echo $pedido_total ?></strong></p>

		<form action="<?php echo base_url() . 'registra' ?>" method="post" class="pedidos-bottom-finalizar c">

			<input type="hidden" name="formulario[pedido]" value="000001"/>
			<input type="hidden" name="formulario[total]" value="<?php echo $this->cart->total() ?>"/>
			<input type="hidden" name="formulario[nome]" value="<?php echo $name ?>"/>
			<input type="hidden" name="formulario[sobrenome]" value="<?php echo $lastname ?>"/>
			<input type="hidden" name="formulario[ddd]" value="<?php echo $ddd ?>"/>
			<input type="hidden" name="formulario[telefone]" value="<?php echo $phone ?>"/>
			<input type="hidden" name="formulario[email]" value="<?php echo $email ?>"/>
			<input type="hidden" name="formulario[endereco]" value="<?php echo $address ?>"/>
			<input type="hidden" name="formulario[numero]" value="<?php echo $number ?>"/>
			<input type="hidden" name="formulario[complemento]" value="<?php echo $complement ?>"/>
			<input type="hidden" name="formulario[bairro]" value="<?php echo $neighborhood ?>"/>
			<input type="hidden" name="formulario[cidade]" value="<?php echo $city ?>"/>
			<input type="hidden" name="formulario[estado]" value="<?php echo $state ?>"/>
			<input type="hidden" name="formulario[cep]" value="<?php echo $cep ?>"/>
			<input type="submit" class="btn-pay" value="Realizar Pagamento"/>
			<div class="simple-link-finalizar">Os termos e as condições estão no Acordo Comercial</div>

		</form>
	</div>

</div>
</div>
</div>