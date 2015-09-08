<div class="c-2-2">

	<h2 class="title">Adicionar Lista de Preço</h2>

	<div>
		<form class="form-add c" action="<?php echo base_url() . "gerente/listas/add" ?>" method="post">

			<div class="addkit_block">
				<label class="sub-title r">Nome:</label>
				<input type="text" name="nome"/>
			</div>

			<?php foreach($products as $product):?>
			<div class="addkit_block">
				<label class="sub-title r"><?php echo $product['codigo'] ?>:</label>
				<input type="text" name="codigo[<?php echo $product['codigo'] ?>]"/>
			</div>
			<?php endforeach; ?>

			<div class="clear"></div>
			<div class="add_kit_buttonspacer c">
				<input type="submit" class="btn-pay" value="Adicionar Lista"/>
				<a class="link-cancel" href="<?php echo base_url() . 'gerente/listas' ?>">Cancelar</a>
			</div>
		</form>
	</div>

</div>
</div>
</div>