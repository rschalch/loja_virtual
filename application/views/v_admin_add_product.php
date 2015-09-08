<div class="c-2-2">

	<h2 class="title">Adicionar Produto</h2>
	<p class="warning">Importante : Apos adicionar o produto, defina seu preço nas listas existentes.</p>

	<div>
		<form id="product" class="form-add c" action="<?php echo base_url() . "gerente/product/add" ?>" method="post">

			<div>
				<label>Codigo:</label>
				<input type="text" name="codigo" id="codigo"/>
			</div>
			<div>
				<label>Descrição:</label>
				<input type="text" name="desc" id="desc"/>
			</div>
			<div>
				<label>Peso (Kg):</label>
				<input type="text" name="peso" id="peso"/>
			</div>
			<div>
				<label>Medida:</label>
				<input type="text" name="medida" id="medida"/>
			</div>
			<div>
				<label>Texto:</label>
				<textarea id="texto" name="texto"></textarea>
			</div>

			<div class="clear"></div>
			<div class="clearfix">
				<h4 class="sec-title">Selecione as quantidades do produto nos seguintes kits:</h4>
				<?php foreach ($kits as $kit): ?>
					<label class="kit-numbers">
						Kit <?php echo $kit['cod']?><input id="<?php echo $kit['cod']?>" type="number" min="0" max="30" name="kitqtd[<?php echo $kit['id']?>]" value="0">
					</label>
				<?php endforeach; ?>
			</div>
			<div class="clear"></div>
			<div class="add_product_buttonspacer c">
				<input type="submit" class="btn-pay" value="Adicionar produto"/>
				<a class="link-cancel" href="<?php echo base_url() . 'gerente/produtos' ?>">Cancelar</a>
			</div>
		</form>
	</div>

</div>
</div>
</div>