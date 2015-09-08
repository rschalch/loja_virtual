<div class="c-2-2">

	<h2 class="title">Clientes</h2>

	<h4 class="sub-title">Confirma a exclusão do seguinte cliente ?</h4>

	<div>
		<table class="final-table">

			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Sobrenome</th>
			</tr>

			<tr>
				<td class="main"><?php echo $user->codigo ?></td>
				<td class="main"><?php echo $user->nome ?></td>
				<td class="main"><?php echo $user->sobrenome ?></td>
			</tr>

		</table>

		<form action="<?php echo base_url() . "gerente/clientes/delete/" . $user->id ?>">
			<input type="submit" class="btn-pay" value="Confirmar e Excluir"/>
			<a class="link-cancel" href="<?php echo base_url() . 'gerente/clientes' ?>">Cancelar</a>
		</form>
	</div>

</div>
</div>
</div>