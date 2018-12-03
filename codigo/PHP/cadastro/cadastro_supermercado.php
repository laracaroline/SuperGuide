<?php
require_once "../Cidade.php";
require_once "../dao/CidadeDao.php";
$cidadeDao = new CidadeDao();
$cidades = $cidadeDao->listarCidade();
	/**require_once "../dao/SupermercadoDao.php";

	$supermercado = new SupermercadoDao();

	if(isset($_POST['btCadastrar'])){
		if($supermercado->create($_POST)){
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

	<link rel="stylesheet" type="text/css" href="../../HTML/src/css/style_cadastro.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="../../HTML/src/js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="../../HTML/src/js/mascaras.js"></script>
	<script type="text/javascript" src="../../HTML/src/js/script_supermercado.js"></script>
	<script type="text/javascript" src="../../HTML/src/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../../HTML/src/js/additional-methods.min.js"></script>
	<script type="text/javascript" src="../../HTML/src/js/localization/messages_pt_BR.min.js"></script>

	</head>

	<body>
		<div class="container">
			<div class="container">
				<div class="form_cadastro">
					<form id="login_form" method="POST" action="inserir_supermercado.php">
					<h2>Cadastro de Supermercado</h2></br></br>
					<center><div class="form-message"></div></center>

					Nome:</br>
					<input class="campo" type="text" name="nome" id="nome" placeholder="Informe o nome"></br></br>

					CNPJ:</br>
					<input class="campo" type="text" name="cnpj" id="cnpj" placeholder="Informe o CNPJ" /></br></br>

					Endere&ccedil;o</br>
					<input class="campo" type="text" name="endereco" id="endereco" placeholder="Informe o endere&ccedil;o"></br></br>

					Telefone:</br>
					<input class="campo" type="text" name="telefone" id="telefone" placeholder="Informe o telefone"></br></br>

					Email:</br>
					<input class="campo" type="email" name="email" id="email" placeholder="Informe o e-mail"></br></br>

					Cidade:</br>
					<select id="cidade" name="cidade" class="ui dropdown" required>
				    <?php
							foreach ( $cidades as $k => $v ) {
				        echo "<option value=\"" . $v->getId() . "\">" . $v->getNome() . "</option>";
				    	}
						?>
					</select>
					<br/> <br/>

					Senha:</br>
					<input class="campo" type="password" name="senha" id="senha" placeholder="Informe a Senha"></br></br>

					<center><input class="ui inverted primary button" type="submit" name="btCadastrar" value="Cadastrar"></center>
			</div>
			</form>
				</div>
			</div>

		</div>
	</body>


</html>
