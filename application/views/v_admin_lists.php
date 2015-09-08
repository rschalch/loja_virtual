<div class="c-2-2">

	<h2 class="title">Listas de Preço</h2>

	<a class="btn-add" href="<?php echo base_url() ?>gerente/listas/adicionar">+ Adicionar Lista</a>

	<table class="table-admin">
		<tr>
			<th>Nome</th>
			<th>Editar</th>
			<th>Excluir</th>
		</tr>

		<?php foreach ($lists as $list): ?>
			<tr>
				<td><?php echo $list['nm_lista_preco'] ?></td>
				<td class="short">
					<a href="<?php echo base_url().'gerente/listas/editar/'.$list['id'] ?>">
						<img src="<?php echo base_url() . 'img/layout/edit.png' ?>" title="Editar"/>
					</a>
				</td>
				<td class="short">
					<a href="<?php echo base_url().'gerente/listas/excluir/'.$list['id'] ?>">
						<img src="<?php echo base_url() . 'img/layout/trash-admin.png' ?>" title="Excluir"/>
					</a>
				</td>
			</tr>

		<?php endforeach; ?>
	</table>



</div>
</div>
</div>