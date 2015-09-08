<div class="c-2-2" xmlns="http://www.w3.org/1999/html">

	<h2 class="title">Clientes</h2>

	<a class="btn-add" href="<?php echo base_url() ?>gerente/clientes/adicionar">+ Adicionar Cliente</a>

	<table class="table-admin">
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>Editar</th>
			<th>Excluir</th>
		</tr>

		<?php foreach ($clientes as $cliente): ?>
			<tr>
				<td class="short"><?php echo $cliente['codigo'] ?></td>
				<td><?php echo $cliente['nome'] ?></td>
				<td><?php echo $cliente['sobrenome'] ?></td>
				<td class="short">
					<a href="<?php echo base_url().'gerente/clientes/editar/'.$cliente['id'] ?>">
						<img src="<?php echo base_url() . 'img/layout/edit.png' ?>" title="Editar"/>
					</a>
				</td>
				<td class="short">
					<a href="<?php echo base_url().'gerente/clientes/excluir/'.$cliente['id'] ?>">
						<img src="<?php echo base_url() . 'img/layout/trash-admin.png' ?>" title="Excluir"/>
					</a>
				</td>
			</tr>

		<?php endforeach; ?>
	</table>

</div>
</div>
</div>