<div class="c-2-2">

	<h2 class="title"><?php echo $listname ?></h2>
	<p class="warning">Formato de valores : Usar ponto (Ex.: 126.4567)</p>

	<div>
		<form id="form-update-client" class="form-add c" action="<?php echo base_url() . 'gerente/listas/update/' . $listid ?>" method="post">

			<div class="addkit_block">
				<label class="sub-title r">Nome da lista:</label>
				<input type="text" name="nome" value="<?php echo $listname ?>"/>
			</div>

			<?php foreach($listproducts as $product):?>
			<div>
				<label><?php echo $product['cd_produto'] ?> :</label>
				<input type="text" name="price[<?php echo $product['cd_produto'] ?>]" value="<?php echo $product['vl_unitario'] ?>"/>
			</div>
			<?php endforeach; ?>

			<div class="clear"></div>
			<div class="update_client_buttonspacer c">
			<input type="submit" class="btn-pay" value="Atualizar"/>
			<a class="link-cancel" href="<?php echo base_url() . 'gerente/listas' ?>">Cancelar</a>
			</div>
		</form>
	</div>

</div>
</div>
</div>