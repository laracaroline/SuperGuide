<?php
	require_once '../PHP/conexao/Conexao.php';

	/*require_once "../PHP/Cliente.php";
	require_once "../PHP/dao/ClienteDao.php";
	$clientes = new ArrayObject();
	$clienteDao = new ClienteDao();
	$clientes = $clienteDao->listarCliente();

	if(isset($_POST['btnLogar'])){
		$clientes->logarCliente($_POST);
	}*/

?>

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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="src/js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="src/js/mascaras.js"></script>
	<script type="text/javascript" src="src/js/script_index.js"></script>
	<script type="text/javascript" src="src/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="src/js/additional-methods.min.js"></script>
	<script type="text/javascript" src="src/js/localization/messages_pt_BR.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="container">
				<div class="menu1">

					<form id="login_form2" method="POST" action="logar_supermercado.php">
						<h2>Login</br>
						Supermercado</h2></br></br>
						<center><div class="form-message"></div></center>

						CNPJ:</br>
						<input class="campo" type="text" name="cnpj" id="cnpj" placeholder="Informe o CNPJ"></br></br>
						Senha:</br>
						<input class="campo" type="password" name="senha" id="senha_supermercado" placeholder="Informe a Senha"></br></br>
						<center><input name="btnLogar" id="btnLogar" class="ui inverted primary button" type="submit" value="Fazer Login"></center>

					</form>
				</div>

				<div class="menu2">
					<form id="login_form" method="POST" action="../PHP/cadastro/logar_cliente.php">
					<h2>Login</br>
					Usu&aacute;rio</h2></br></br>
					<center><div class="form-message"></div></center>

					CPF:</br>
					<input class="campo" type="text" name="cpf" id="cpf" placeholder="Informe o CPF"></br></br>
					Senha:</br>
					<input class="campo" type="password" name="senha" id="senha_cliente" placeholder="Informe a Senha"></br></br>
					<center><input name="btnLogar" id="btnLogar" class="ui inverted primary button" type="submit" value="Fazer Login"></center>
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
