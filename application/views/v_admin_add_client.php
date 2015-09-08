<div class="c-2-2">

	<h2 class="title">Adicionar Clientes</h2>

	<div>
		<form id="form-add-client" class="form-add c" action="<?php echo base_url() . "gerente/clientes/add" ?>" method="post">

			<label>Codigo:</label>
			<input type="text" name="codigo" id=""/>
			<br>

			<label>Nome:</label>
			<input type="text" name="nome" id=""/>
			<br>

			<label>Sobrenome:</label>
			<input type="text" name="sobrenome" id=""/>
			<br>

			<label>Email:</label>
			<input type="text" name="email" id=""/>
			<br>

			<label>Senha:</label>
			<input type="text" name="senha" id="senha"/>
			<br>

			<label>Confirme a senha:</label>
			<input type="text" name="senha2" id=""/>
			<br>

			<label>DDD:</label>
			<input type="text" name="ddd" id=""/>
			<br>

			<label>Telefone:</label>
			<input type="text" name="telefone" id=""/>
			<br>

			<label>Endereço:</label>
			<input type="text" name="endereco" id=""/>
			<br>

			<label>Numero:</label>
			<input type="text" name="numero" id=""/>
			<br>

			<label>Complemento:</label>
			<input type="text" name="complemento" id=""/>
			<br>

			<label>Bairro:</label>
			<input type="text" name="bairro" id=""/>
			<br>

			<label>Cidade:</label>
			<input type="text" name="cidade" id=""/>
			<br>

			<label>Estado:</label>
			<select name="estado">
				<?php foreach($estados as $estado): ?>
					<option value="<?php echo $estado['sigla'] ?>"><?php echo $estado['sigla'] ?></option>
				<?php endforeach; ?>
			</select>
			<br>

			<label>CEP:</label>
			<input type="text" name="cep" id=""/>
			<br>

			<label>Lista de Preço:</label>
			<select name="nm_lista_preco">
				<?php foreach($listas as $lista): ?>
					<option value="<?php echo $lista['nm_lista_preco'] ?>"><?php echo $lista['nm_lista_preco'] ?></option>
				<?php endforeach; ?>
			</select>

			<div class="clear"></div>
			<div class="add_cliente_buttonspacer c">
			<input type="submit" class="btn-pay" value="Adicionar cliente"/>
			<a class="link-cancel" href="<?php echo base_url() . 'gerente/clientes' ?>">Cancelar</a>
			</div>
		</form>
	</div>
</div>
</div>
</div>