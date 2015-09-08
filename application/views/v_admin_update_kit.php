<div class="c-2-2">

	<h2 class="title">Atualizar Informações do Kit <?php echo $kit['cod'] ?></h2>

	<div>
		<form class="form-add c" action="<?php echo base_url() . "gerente/kits/update/" . $kit['cod'] ?>" method="post">

			<div class="form-admin">
				<label>Codigo:</label>
				<input type="text" name="codigo" id="" value="<?php echo $kit['cod'] ?>"/>
			</div>
			<div class="form-admin">
				<label>Descrição:</label>
				<input type="text" name="nome" id="" value="<?php echo $kit['nome'] ?>"/>
			</div>
			<div class="form-admin">
				<label>Embalagem:</label>
				<input type="text" name="embalagem" id="" value="<?php echo $kit['embalagem'] ?>"/>
			</div>

			<div class="clear"></div>

			<div class="update_kit_buttonspacer c">
			<input type="submit" class="btn-pay" value="Atualizar"/>
			<a class="link-cancel" href="<?php echo base_url() . 'gerente/kits' ?>">Cancelar</a>
			</div>
		</form>
	</div>

</div>
</div>
</div>