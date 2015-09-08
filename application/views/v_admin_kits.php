<div class="c-2-2">

	<h2 class="title">Kits</h2>

	<a class="btn-add" href="<?php echo base_url() ?>gerente/kits/adicionar">+ Adicionar Kit</a>

	<table class="table-admin">
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Editar</th>
			<th>Excluir</th>
		</tr>

		<?php foreach ($kits as $kit): ?>
			<tr>
				<td class="short"><?php echo $kit['cod'] ?></td>
				<td><?php echo $kit['nome'] ?></td>
				<td class="short">
					<a href="<?php echo base_url().'gerente/kits/editar/'.$kit['cod'] ?>">
						<img src="<?php echo base_url() . 'img/layout/edit.png' ?>" title="Editar"/>
					</a>
				</td>
				<td class="short">
					<a href="<?php echo base_url().'gerente/kits/excluir/'.$kit['cod'] ?>">
						<img src="<?php echo base_url() . 'img/layout/trash-admin.png' ?>" title="Excluir"/>
					</a>
				</td>
			</tr>

		<?php endforeach; ?>
	</table>



</div>
</div>
</div>