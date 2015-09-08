<div class="c-2-2">

	<h2 class="title">Produtos</h2>

	<h4 class="sub-title">Confirma a exclusão do seguinte produto ?</h4>

	<div>
		<table class="final-table">

			<tr>
				<th>Código</th>
				<th>Nome</th>
			</tr>

			<tr>
				<td class="main"><?php echo $product['codigo'] ?></td>
				<td class="main"><?php echo $product['desc'] ?></td>
			</tr>

		</table>

		<form action="<?php echo base_url() . "gerente/product/delete/" . $product['id'] ?>">
			<input type="submit" class="btn-pay" value="Confirmar e Excluir"/>
			<a class="link-cancel" href="<?php echo base_url() . 'gerente/produtos' ?>">Cancelar</a>
		</form>
	</div>


</div>
</div>
</div>