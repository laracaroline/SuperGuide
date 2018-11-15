<!DOCTYPE html>
<html>
	<head>
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="src/semantic.min.css">
	<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
	<script src="src/semantic.min.js"></script>

	<link rel="stylesheet" type="text/css" href="src/css/style_login.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	</head>

	<body>
		<div class="container">
			<div class="container">
				<div class="menu1">

					<form method="POST" action="verefica.php">
						<h2>Login</br>
						Supermercado</h2></br></br>

						CNPJ:</br>
						<input class="campo" type="text" name="cnpj" placeholder="Informe o CNPJ"></br></br>
						Senha:</br>
						<input class="campo" type="password" name="senha" placeholder="Informe a Senha"></br></br>
						<center><input class="ui inverted primary button" type="submit" value="Fazer Login"></center>

					</form>
				</div>

				<div class="menu2">
					<form method="POST" action="verefica.php">
					<h2>Login</br>
					Usu&aacute;rio</h2></br></br>

					CPF:</br>
					<input class="campo" type="text" name="cpf" placeholder="Informe o CPF"></br></br>
					Senha:</br>
					<input class="campo" type="password" name="senha" placeholder="Informe a Senha"></br></br>
					<center><input class="ui inverted primary button" type="submit" value="Fazer Login"></center>
			</div>
			</form>
				</div>
			</div>
			<div class="ir_cadastro">
				<div class="ir_cadastro">
					<a href="identificar_cadastro.php" class="ui inverted primary button" target="_blank">CADASTRE-SE AQUI</a>
				</div>
			</div>
		</div>
	</body>


</html>
