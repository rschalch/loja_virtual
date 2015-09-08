<div class="c-2-2">

	<h2 class="title">Kits</h2>

	<h4 class="sub-title">Confirma a exclusão do seguinte kit ?</h4>
	<p>(Os produtos referentes ao kit não serão excluídos do banco de dados.)</p>

	<div>
		<table class="final-table">

			<tr>
				<th>Código</th>
				<th>Nome</th>
			</tr>

			<tr>
				<td class="main"><?php echo $kit['cod'] ?></td>
				<td class="main"><?php echo $kit['nome'] ?></td>
			</tr>

		</table>

		<form action="<?php echo base_url() . "gerente/kits/delete/" . $kit['id'] ?>">
			<input type="submit" class="btn-pay" value="Confirmar e Excluir"/>
			<a class="link-cancel" href="<?php echo base_url() . 'gerente/kits' ?>">Cancelar</a>
		</form>
	</div>


</div>
</div>
</div>