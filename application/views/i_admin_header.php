<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cris Metal - 2013</title>
		<meta name="description" content="">
		<meta name="author" content="Ricardo Bürger Schalch">

		<link href="<?php echo base_url("/css/app.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("/css/default.css"); ?>" rel="stylesheet">

    <script src="<?php echo base_url("/js/$/jquery.min.js"); ?>"></script>
		<script src="<?php echo base_url("/js/$/jquery-migrate.min.js"); ?>"></script>
		<script src="<?php echo base_url("/js/$/jquery.validate.min.js"); ?>"></script>
    <script src="<?php echo base_url("/js/zebra_datepicker.js"); ?>"></script>
    <script src="<?php echo base_url("/js/admin.js"); ?>"></script>
	</head>
	<body class="r">
		<div class="full">
			<div class="topo c r container">
				<h1><a href="<?php echo base_url("/gerente/clientes"); ?>" class="imgreplace logo" title="Cris Metal Banheiros">Cris Metal Banheiros</a></h1>
				<ul class="c">
					<li><strong>Área Administrativa</strong></li>
					<li>Olá, <strong><?php echo $name ?></strong></li>
				</ul>
				<img class="selo60 abs" src="<?php echo base_url("img/layout/selo-60.png") ?>" alt="60 Anos"/>
				<span class="abs fone"><a href="<?php echo base_url(). "logout" ?>"><strong>Sair</strong></a></span>
			</div>
		</div>

		<div class="full">
			<div class="container r c conteudo-home">

				<div class="c-1-2">
					<h2 class="cat-title">Categorias</h2>
					<ul class="prod-categs">
						<li><a href="<?php echo base_url('/gerente/clientes') ?>">Gerenciar Clientes</a></li>
						<li><a href="<?php echo base_url('/gerente/produtos') ?>">Gerenciar Produtos</a></li>
						<li><a href="<?php echo base_url('/gerente/kits') ?>">Gerenciar Kits</a></li>
						<li><a href="<?php echo base_url('/gerente/listas') ?>">Gerenciar Listas de Preço</a></li>
						<li><a href="<?php echo base_url('/gerente/pedidos') ?>">Pesquisar Pedidos</a></li>
					</ul>
				</div>