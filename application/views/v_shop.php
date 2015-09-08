<?php
	$qtd_total = 0;
	$valor_un = 0;
	$valor_total = 0;
?>

<div class="c-2-2 c" xmlns="http://www.w3.org/1999/html">

	<?php if (!empty($results)): $kit_cod = $results[0]['cod'] ?>

		<h2 class="title">Kit <?php echo $kit_name ?></h2>
		<h4 class="sub-title">* Imagens meramente ilustrativas</h4>

		<ul class="lista-produtos r c">

			<?php foreach ($results as $row):
				$img  = base_url("/img/products/" . $row['codigo'] . ".jpg");
				$desc = $row['desc'];
				$qtd  = $row['qtde'];
				$qtd_total += $row['qtde'];
				$valor_un = 'R$ ' . number_format($row['valor'], 2, ',', '.');
				for ($i = 1; $i <= $qtd; $i++) {
					$valor_total += $row['valor'];
				}
				?>
				<li>
					<a title="<?php echo $desc ?>" href="#">
						<img src="<?php echo $img ?>" alt="<?php echo $desc ?>"/>
					</a>

					<p>
						<?php echo $desc ?><br/>
						Quantidade : <?php echo $qtd ?><br/>
						Valor unitário : <?php echo $valor_un ?>
					</p>
					<br/>
					<a class="detalhes" href="<?php echo base_url() . "produto/" . $row['codigo'] ?>">Ver Detalhes</a>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php $vt = 'R$ ' . number_format($valor_total, 2, ',', '.') ?>

		<div class="box-control">

			<p class="c"><strong>Total de produtos:</strong><span><?php echo $qtd_total ?></span></p>

			<p class="c"><strong>Valor do kit:</strong><span><?php echo $vt ?></span</p>

			<form class="add-carrinho c" method="post" action="<?php echo base_url() . 'pedidos/adicionar/' . $kit_cod ?>">

				<input type="hidden" name="id" value="<?php echo $kit_cod ?>"/>

				<label for="qtd">Quantidade:</label>
				<input id="qtd" type="number" name="quantity" min="1" value="1"/>

				<input type="hidden" name="price" value="<?php echo $valor_total ?>"/>
				<input type="hidden" name="name" value="<?php echo "Kit " . $kit_name ?>"/>

				<input type="submit" value="Comprar">
			</form>
		</div>
	<?php else: ?>
		<h3 class="title">Kit <?php echo $kit_name ?></h3>
		<p class="empty-cart">Este kit ainda não contém produtos.</p>
	<?php endif ?>
</div>
</div>
</div>