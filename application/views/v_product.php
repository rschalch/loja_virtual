<?php
	$titulo = $product['desc'];
	$preco = 'R$ ' . $product_value;
	$peso = $product['peso'] . ' Kg';
	$medida = $product['medida'];
	$descricao = $product['text'];
	$imagem = base_url("/img/products/" . $product['codigo'] . ".jpg");
?>

<div class="c-2-2 c" xmlns="http://www.w3.org/1999/html">

	<h2 class="product-title"><?php echo $product['desc'] ?></h2>

	<ul>
		<li><img src="<?php echo $imagem ?>" alt="<?php echo $descricao ?>"/></li>
		<li>Valor : <?php echo $preco ?></li>
		<li>Peso : <?php echo $peso ?></li>
		<li>Medida : <?php echo $medida ?></li>
		<li>Descrição : <?php echo $descricao ?></li>
		<li>Para baixar o manual, visite o nosso site.</li>
	</ul>

</div>
</div>
</div>