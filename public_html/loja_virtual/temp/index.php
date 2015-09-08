<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cris Metal - 2013</title>
		<meta name="description" content="">
		<meta name="author" content="Ricardo Bürger Schalch">
		<link href="<?php echo base_url("/css/app.css"); ?>" rel="stylesheet">
	</head>
	<body class="r">
		<div class="full">
			<div class="topo c r container">
				<h1><a href="./1" class="imgreplace logo" title="Cris Metal Banheiros">Cris Metal Banheiros</a></h1>
				<ul class="c">
					<li>Olá, <strong><?php echo $name ?></strong></li>
					<li>Seu carrinho: <strong><a href="#">5 itens</a></strong> <a class="btn-carrinho" href="#">Finalizar</a>
					</li>
					<li class="last"><a href="<?php echo base_url() . 'pedidos' ?>">Pedidos</a> | <a href="./logout">Logout</a>
					</li>
				</ul>
				<img class="selo60 abs" src="<?php echo base_url("img/layout/selo-60.png") ?>" alt="60 Anos"/>
				<span class="abs fone"><strong>Atendimento</strong> (11) 4158-8300</span>
			</div>
		</div>

		<div class="full">
			<div class="container r c conteudo-home">

				<div class="c-1-2">
					<h2 class="cat-title">Categorias</h2>
					<ul class="prod-categs">
						<?php foreach ($kits as $item): $cod = $item['cod'] ?>
							<li><a href="<?php echo base_url() . 'kit/' . $cod ?>">Kit <?php echo $cod ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php

					$qtd_total = 0;
					$valor_un = 0;
					$valor_total = 0;

					$pedido = array(
						'id'      => '',
						'qty'     => '',
						'price'   => '',
						'name'    => '',
						'options' => array('Size' => 'L', 'Color' => 'Red')
					);
				?>

				<div class="c-2-2" xmlns="http://www.w3.org/1999/html">

					<h2 class="title">Kit <?php echo $results[0]['cod'] ?></h2>

					<ul class="lista-produtos r c">

						<?php foreach ($results as $row):
							$img  = base_url("/img/products/" . $row['codigo'] . ".jpg");
							$desc = $row['desc'];
							$qtd  = $row['qtde'];
							$qtd_total += $row['qtde'];
							$valor_un = 'R$ ' . number_format($row['valor'], 2, ',', '.');
							for ($i = 1; $i <= $qtd; $i++)
							{
								$valor_total += $row['valor'];
							}
							?>
							<li>
								<a title="<?php echo $desc ?>" href="#">
									<img src="<?php echo $img ?>" alt="<?php echo $desc ?>"/>
								</a>

								<p><?php echo $desc ?></p>

								<p>Quantidade : <?php echo $qtd ?></p>

								<p>Valor unitário : <?php echo $valor_un ?></p>
								<br>
								<a class="detalhes" href="#">Ver Detalhes</a>
							</li>

						<?php endforeach; ?>
					</ul>

					<p>Quantidade total de produtos: <?php echo $qtd_total ?></p>

					<p>Valor total do kit: <?php echo 'R$ ' . number_format($valor_total, 2, ',', '.') ?></p>

					<form class="add-carrinho" method="post"
					      action="<?php echo base_url() . 'add-item/' . $qtd_total ?>">

						<label for="qtd">Quantidade:</label>
						<input id="qtd" type="number" name="quantity" min="1" max="5" value="1"/>
						<input type="submit" value="Adicionar ao carrinho">
					</form>
				</div>
			</div>
		</div>
		<div class="full rodape">
			<div class="container r c">
				<ul class="c-1-4">
					<li><h4>Apoio ao Revendedor</h4></li>
					<li><a href="#">Site Institucional Cris Metal</a></li>
					<li><a href="#">Central de Atendimento</a></li>
				</ul>
				<ul class="c-2-4">
					<li><h4>Compras e Entregas</h4></li>
					<li><a href="#">Formas de Pagamento</a></li>
					<li><a href="#">Procedimentos de Entrega</a></li>
					<li><a href="#">&Aacute;reas de Atendimento</a></li>
					<li><a href="#">Pol&iacute;tica da Empresa</a></li>
				</ul>
				<div class="c-3-4">
					<h3>Cris Metal M&oacute;veis<br/> para Banheiro Ltda.</h3><br/>
					<address>Rua Tavares, 320 - S&atilde;o Judas Tadeu<br/>
						Vargem Grande Paulista / SP<br/><br/>
						CEP: 06730-000<br/>
						Fone: (11) 4158-8300<br/>
						Fax: (11) 4148-3870
					</address>
				</div>
				<div class="c-4-4">
					<h4 class="imgreplace" title="Cris Metal Banheiros">Cris Metal Banheiros</h4>
					<a href="http://www.crismetal.com.br" target="_blank">Visite nosso site</a>
				</div>
			</div>
		</div>

		<div class="full allrights">&copy; 2013 - Copyright - Cris Metal do Brasil - Todos os direitos reservados</div>
	</body>
</html>