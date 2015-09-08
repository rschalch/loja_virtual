<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cris Metal - 2013</title>
		<meta name="author" content="Ricardo Bürger Schalch">

		<link href="<?php echo base_url("/css/app.css"); ?>" rel="stylesheet">
		<link href="<?php echo base_url("/css/default.css"); ?>" rel="stylesheet">

		<script src="<?php echo base_url("/js/$/jquery.min.js"); ?>"></script>
		<script src="<?php echo base_url("/js/$/jquery-migrate.min.js"); ?>"></script>
		<script src="<?php echo base_url("/js/$/jquery.maskedinput-1.3.min.js"); ?>"></script>
		<script src="<?php echo base_url("/js/zebra_datepicker.js"); ?>"></script>
		<script src="<?php echo base_url("/js/$/reject.js"); ?>"></script>
		<script src="<?php echo base_url("/js/app.js"); ?>"></script>
	</head>
	<body class="r">
		<div class="full">
			<div class="topo c r container">
				<h1>
					<a href="<?php echo base_url("/kit/1"); ?>" class="imgreplace logo" title="Cris Metal Banheiros">CrisMetal Banheiros</a>
				</h1>
				<ul class="c">
					<li>Olá, <strong><?php echo $name ?></strong></li>
					<?php if ($this->cart->total() != 0): ?>
						<li>Seu carrinho : <strong><a href="<?php echo base_url() . "pedidos"; ?>"><?php echo $this->cart->total_items(); ?> item(s)</a></strong></li>
						<li><strong><a href="<?php echo base_url() . "pedidos/limpar"; ?>">Limpar carrinho</a></strong></li>
					<?php endif; ?>
					<?php if ($hasOrders): ?>
						<li><strong><a href="<?php echo base_url() . "pedidos/pesquisa"; ?>">Acompanhe seus pedidos</a></strong></li>
					<?php endif; ?>
				</ul>
				<img class="selo60 abs" src="<?php echo base_url("img/layout/selo-60.png") ?>" alt="60 Anos"/>
				<span class="abs fone"><strong>Atendimento</strong> (11) 4158-8300 <a class="pedidos-topo" href="<?php echo base_url() . 'pedidos' ?>">Pedidos</a> | <a href="<?php echo base_url() . "logout" ?>">Sair</a></span>
			</div>
		</div>

		<div class="full">
			<div class="container r c conteudo-home">
				<div class="c-1-2">
					<h2 class="cat-title">Categorias</h2>
					<ul class="prod-categs">
						<?php foreach ($kits as $kit):
							if ($kit['nome']) {
								$cod = $kit['nome'];
							}
							else {
								$cod = $kit['cod'];
							}
							?>
							<li><a href="<?php echo base_url() . 'kit/' . $kit['cod'] ?>">Kit <?php echo $cod ?></a></li>

						<?php endforeach ?>
					</ul>
				</div>