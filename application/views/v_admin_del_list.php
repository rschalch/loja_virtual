<div class="c-2-2">

	<h2 class="title">Kits</h2>

	<h4 class="sub-title">Confirma a exclusão da seguinte lista ?</h4>

	<div>
		<table class="final-table">

			<tr>
				<th>Nome</th>
			</tr>

			<tr>
				<td class="main"><?php echo $list ?></td>
			</tr>

		</table>

		<form action="<?php echo base_url() . "gerente/listas/delete/" . $list_id ?>" method="post">
			<input type="submit" class="btn-pay" value="Confirmar e Excluir"/>
			<a class="link-cancel" href="<?php echo base_url() . 'gerente/listas' ?>">Cancelar</a>
		</form>
	</div>

</div>
</div>
</div>