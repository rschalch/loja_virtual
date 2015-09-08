<?php
	$id = $product['id'];
	$codigo = $product['codigo'];
	$desc = $product['desc'];
	$peso = number_format($product['peso'], 3, ',', '.');
	$medida = $product['medida'];
	$text = $product['text'];
?>

<div class="c-2-2">

	<h2 class="title">Atualizar Informações do Produto <?php echo $codigo ?></h2>

	<div>
		<form class="form-add c" action="<?php echo base_url() . "gerente/product/update/" . $id ?>" method="post">

			<div class="img-holder">
				<img src="<?php echo $image_path . $codigo . '.jpg' ?>" alt="<?php echo $desc ?>"/>
			</div>
			<div class="form-admin">
				<label>Codigo:</label>
				<input type="text" name="codigo" id="" value="<?php echo $codigo ?>"/>
			</div>
			<div class="form-admin">
				<label>Descrição:</label>
				<input type="text" name="desc" id="" value="<?php echo $desc ?>"/>
			</div>
			<div class="form-admin">
				<label>Peso (Kg):</label>
				<input type="text" name="peso" id="" value="<?php echo $peso ?>"/>
			</div>
			<div class="form-admin">
				<label>Medida:</label>
				<input type="text" name="medida" id="" value="<?php echo $medida ?>"/>
			</div>
			<div class="form-admin">
				<label for="texto">Texto:</label>
				<textarea name="text" id="texto"><?php echo $text ?></textarea>
			</div>
			<div class="clearfix">
				<h4 class="sec-title">Atualize as quantidades do produto nos seguintes kits:</h4>

				<?php foreach ($product_kits as $index => $kit): ?>
					<label class="kit-numbers">
						Kit <?php echo $kit['kitcod'] ?>
						<input type="number" min="0" max="30" name="kitqtd[<?php echo $kit['kitid'] ?>]" value="<?php echo $kit['kitqtd'] ?>">
					</label>
					<input type="hidden" name="p2kid[<?php echo $kit['kitid'] ?>]" value="<?php echo $kit['p2kid'] ?>"/>
				<?php endforeach; ?>

			</div>
			<div class="clear"></div>
			<div class="update_product_buttonspacer c">
				<input type="submit" class="btn-pay" value="Atualizar"/>
				<a class="link-cancel" href="<?php echo base_url() . 'gerente/produtos' ?>">Cancelar</a>
			</div>
		</form>
	</div>

</div>
</div>
</div>