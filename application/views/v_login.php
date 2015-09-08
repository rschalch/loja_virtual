<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8"/>
		<title>CrisMetal - Loja Virtual</title>

		<link href="css/login.css" rel="stylesheet">
		<link href="css/reject.css" rel="stylesheet">
	</head>

	<body>
		<div id="login-wrapper">
			<div id="login-top">
				<img src="img/layout/logo.png" alt="CrisMetal Móveis para Banheiros"/>
			</div>

			<div id="login-content">
				<form method="post" action="<?php echo base_url(). 'verify' ?>">
					<p>
						<label>Usuário:</label>
						<input value="" name="email" class="text-input" type="text"/>
					</p>
					<br/>

					<p>
						<label>Senha:</label>
						<input name="password" class="text-input" type="password"/>
					</p>
					<br/>

					<p>
						<input class="button" type="submit" value="Login"/>
					</p>
					<br/>
				</form>
				<?php if ($flashdata): ?>
					<div class="message">
						<?php echo $flashdata ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div id="dummy"></div>
		<div id="dummy2"></div>

		<script src="js/$/jquery.min.js"></script>
		<script src="js/$/reject.js"></script>
		<script src="js/app.js"></script>

	</body>
</html>
