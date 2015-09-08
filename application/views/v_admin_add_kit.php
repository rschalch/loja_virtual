<div class="c-2-2">

	<h2 class="title">Adicionar Kit</h2>

	<!--	<h5 class="infopop">O Kit inserido receberá o codigo: <strong>--><?php //echo $newcod ?><!--</strong></h5>-->

	<div>
		<form class="form-add c" action="<?php echo base_url() . "gerente/kits/add" ?>" method="post">
			<div class="addkit_block">
				<label class="sub-title r">Código:</label>
				<input type="text" name="codigo"/>
			</div>
			<div class="addkit_block">
				<label class="sub-title r">Nome:<span>(opcional)</span>:</label>
				<input type="text" name="nome"/>
			</div>
			<div class="addkit_block">
				<label class="sub-title">Embalagem:</label>
				<input type="text" name="embalagem"/>
			</div>
			<div class="clear"></div>
			<div class="add_kit_buttonspacer c">
				<input type="submit" class="btn-pay" value="Adicionar Kit"/>
				<a class="link-cancel" href="<?php echo base_url() . 'gerente/kits' ?>">Cancelar</a>
			</div>
		</form>
	</div>

</div>
</div>
</div>