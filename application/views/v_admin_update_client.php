<?php

	$codigo = $user->codigo;
	$nome = $user->nome;
	$sobrenome = $user->sobrenome;
	$email = $user->email;
	$senha = sha1($user->senha);
	$ddd = $user->ddd;
	$telefone = $user->telefone;
	$endereco = $user->endereco;
	$numero = $user->numero;
	$complemento = $user->complemento;
	$bairro = $user->bairro;
	$cidade = $user->cidade;
	$estado = strtoupper($user->estado);
	$cep = $user->cep;
	$nm_lista_preco = $user->nm_lista_preco;
?>

<div class="c-2-2">

	<h2 class="title">Atualizar Informações do Cliente <?php echo $codigo ?></h2>
	<p class="warning">Importante : Por questões de segurança a senha DEVE ser alterada</p>

	<div>
		<form id="form-update-client" class="form-add c" action="<?php echo base_url() . 'gerente/clientes/update/' . $user->id ?>" method="post">

			<div class="form-admin">
				<label>Codigo:</label>
				<input type="text" name="codigo" id="" value="<?php echo $codigo ?>"/>
			</div>
			<div class="form-admin">
				<label>Nome:</label>
				<input type="text" name="nome" id="" value="<?php echo $nome ?>"/>
			</div>
			<div class="form-admin">
				<label>Sobrenome:</label>
				<input type="text" name="sobrenome" id="" value="<?php echo $sobrenome ?>"/>
			</div>
			<div class="form-admin">
				<label>Email:</label>
				<input type="text" name="email" id="" value="<?php echo $email ?>"/>
			</div>
			<div class="form-admin">
				<label>Senha:</label>
				<input type="text" name="senha" id="" value=""/>
			</div>
			<div class="form-admin">
				<label>DDD:</label>
				<input type="text" name="ddd" id="" value="<?php echo $ddd ?>"/>
			</div>
			<div class="form-admin">
				<label>Telefone:</label>
				<input type="text" name="telefone" id="" value="<?php echo $telefone ?>"/>
			</div>
			<div class="form-admin">
				<label>Endereço:</label>
				<input type="text" name="endereco" id="" value="<?php echo $endereco ?>"/>
			</div>
			<div class="form-admin">
				<label>Número:</label>
				<input type="text" name="numero" id="" value="<?php echo $numero ?>"/>
			</div>
			<div class="form-admin">
				<label>Complemento:</label>
				<input type="text" name="complemento" id="" value="<?php echo $complemento ?>"/>
			</div>
			<div class="form-admin">
				<label>Bairro:</label>
				<input type="text" name="bairro" id="" value="<?php echo $bairro ?>"/>
			</div>
			<div class="form-admin">
				<label>Cidade:</label>
				<input type="text" name="cidade" id="" value="<?php echo $cidade ?>"/>
			</div>
			<div class="form-admin">
				<label>Estado:</label>
				<select name="estado">
					<?php foreach($estados as $item): ?>
						<?php if ($item['sigla'] == $estado): ?>
							<option value="<?php echo $item['sigla'] ?>" selected="selected"><?php echo $item['sigla'] ?></option>
						<?php else: ?>
							<option value="<?php echo $item['sigla'] ?>"><?php echo $item['sigla'] ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-admin">
				<label>CEP:</label>
				<input type="text" name="cep" id="" value="<?php echo $cep ?>"/>
			</div>
			<div class="form-admin">
				<label>Lista de Preço:</label>
				<select name="nm_lista_preco">
					<?php foreach($listas as $lista): ?>
						<?php if ($lista['nm_lista_preco'] == $nm_lista_preco): ?>
							<option value="<?php echo $lista['nm_lista_preco'] ?>" selected="selected"><?php echo $lista['nm_lista_preco'] ?></option>
						<?php else: ?>
							<option value="<?php echo $lista['nm_lista_preco'] ?>"><?php echo $lista['nm_lista_preco'] ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="clear"></div>
			<div class="update_client_buttonspacer c">
			<input type="submit" class="btn-pay" value="Atualizar"/>
			<a class="link-cancel" href="<?php echo base_url() . 'gerente/clientes' ?>">Cancelar</a>
			</div>
		</form>
	</div>

</div>
</div>
</div>