<?php
	/**require_once "../PHP/dao/ClienteDao.php";

	$objFn = new ClienteDao();

	if(isset($_POST['btCadastrar'])){
		if($objFn->create($_POST)){
			header("location: /cadastro");
		}else{
			echo'<scrpit type="text/javascript">alert("Erro em cadastrar")</script>';
		}
	}**/
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Cadastro</title>

	<link rel="stylesheet" type="text/css" href="src/semantic.min.css">
	<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
	<script src="src/semantic.min.js"></script>

	<link rel="stylesheet" type="text/css" href="src/css/style_cadastro.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="src/js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="src/js/mascaras.js"></script>

	</head>

	<body>
		<div class="container">
			<div class="container">
				<div class="form_cadastro">
					<form method="POST" action="verefica.php">
					<h2>Cadastro de Usu&aacute;rios</h2></br></br>

					Nome:</br>
					<input class="campo" type="text" name="nome" id="nome" placeholder="Informe o nome"></br></br>

					CPF:</br>
					<input class="campo" type="text" name="cpf" id="cpf" placeholder="Informe O CPF" /></br></br>

					Telefone:</br>
					<input class="campo" type="text" name="telefone" id="telefone" placeholder="Informe o telefone"></br></br>

					Email:</br>
					<input class="campo" type="email" name="email" id="email" placeholder="Informe o email"></br></br>

					Senha:</br>
					<input class="campo" type="password" name="senha" id="senha" placeholder="Informe a Senha"></br></br>

					Data de Nascimento:</br>
					<input class="campo" type="text" name="nasc" id="nasc" placeholder="Informe a data de "></br></br>
					<center><input class="ui inverted primary button" type="submit" name="btCadastrar" value="Cadastrar"></center>
			</div>
			</form>
				</div>
			</div>

		</div>
	</body>


</html>
