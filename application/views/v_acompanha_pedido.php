<div class="c-2-2">

	<h2 class="title">Pedidos</h2>

	<form id="pesquisa-pedidos" action="<?php echo base_url() . 'pedidos/resultado' ?>" method="POST">
		<div class="radio-toolbar">

			<p>Selecione o tipo de consulta:</p>

			<input id="r1" type="radio" name="option" value="1" checked>
			<label for="r1">Pedidos efetuados nos ultimos 3 meses</label>
			<br/>

			<input id="r2" type="radio" name="option" value="2">
			<label for="r2">Pedidos efetuados entre <input id="date1" class="datepicker" type="text" name="date1"> e <input id="date2" class="datepicker" type="text" name="date2"></label>
			<br/>

			<input id="r3" type="radio" name="option" value="3">
			<label for="r3">Todos os pedidos</label>
			<br/>

			<div class="clear"></div>
			<div class="buttonspacer c">
				<input type="submit" class="btn-pay" value="Pesquisar Pedidos"/>
			</div>

		</div>
	</form>

</div>
</div>
</div>