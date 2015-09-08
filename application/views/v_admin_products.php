<div class="c-2-2">

	<h2 class="title">Produtos</h2>

	<a class="btn-add" href="<?php echo base_url() ?>gerente/produtos/adicionar">+ Adicionar Produto</a>

	<table class="table-admin">
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Editar</th>
			<th>Excluir</th>
		</tr>

		<?php foreach ($products as $item): ?>
			<tr>
				<td class="short"><?php echo $item['codigo'] ?></td>
				<td><?php echo $item['desc'] ?></td>
				<td class="short">
					<a href="<?php echo base_url().'gerente/produtos/editar/'.$item['id'] ?>">
						<img src="<?php echo base_url() . 'img/layout/edit.png' ?>" title="Editar"/>
					</a>
				</td>
				<td class="short">
					<a href="<?php echo base_url().'gerente/produtos/excluir/'.$item['id'] ?>">
						<img src="<?php echo base_url() . 'img/layout/trash-admin.png' ?>" title="Excluir"/>
					</a>
				</td>
			</tr>

		<?php endforeach; ?>
	</table>

</div>
</div>
</div>