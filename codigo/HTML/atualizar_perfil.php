<?php
	require_once "../PHP/Supermercado.php";
	require_once "../PHP/dao/SupermercadoDao.php";

	$supermercadoDao = new SupermercadoDao();
	$supermercados = $supermercadoDao->listarSupermercados();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Atualizar Perfil</title>
	<link rel="short cut icon" type="image/png" href="src/img/icon.png">

	<link rel="stylesheet" type="text/css" href="src/semantic.min.css">
	<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
	<script src="src/semantic.min.js"></script>

	<link rel="stylesheet" type="text/css" href="src/css/style_atualizar_cliente.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
		<header>
			<nav class="cabecalho" >
				<div>
					<a href="home.php"><img src="src/img/logo.png" id="tamlogo"></a>
				</div>

				<form method="POST" action="pesquisa.phhp">
					<div class="ui category search">
						<div class="ui icon input">
							<input name="palavra" class="prompt" type="text" placeholder="Buscar Produtos">
							<input name="pesquisa" class="ui button" type="submit" placeholder="Pesquisar">
							<i class="search icon"></i>
						</div>
					</div>
				</form>

					<div class="ui compact menu" id="menu">
					  <div class="ui simple dropdown item">
					    Menu
					    <i class="dropdown icon"></i>
					    <div class="menu">
					      <div class="item"><a href="atualizar_perfil.php" id="atualizar_perfil">Atualizar perfil</a></div>
					      <div class="item"><a href="logout.php" id="sair">Sair</a></div>
					    </div>
					  </div>
					</div>

			</nav>
		</header>

		<div class="conteiner">

      <div class="container">
				<div class="form_atualizar">
					<form id="atualizar_form" method="POST" action="atualizar_cliente.php">
					<h2>Atualizar Usu&aacute;rios</h2></br></br>
					<center><div class="form-message"></div></center>

					Nome:</br>
					<input class="campo" type="text" name="nome" id="nome" placeholder="Informe o nome" required /></br></br>

					CPF:</br>
					<input class="campo" type="text" name="cpf" id="cpf" placeholder="Informe O CPF"required /></br></br>

					Telefone:</br>
					<input class="campo" type="text" name="telefone" id="telefone" placeholder="Informe o telefone" required></br></br>

					Email:</br>
					<input class="campo" type="email" name="email" id="email" placeholder="Informe o email" required></br></br>

					Senha:</br>
					<input class="campo" type="password" name="senha" id="senha" placeholder="Informe a Senha" required></br></br>

					Estado:</br>
					<select id="estado" name="estado" class="ui dropdown" required>
				    <?php
							foreach ( $estados as $k => $v ) {
				        echo "<option value=\"" . $v->getId() . "\">" . utf8_encode($v->getNome()) . "</option>";
				    	}
						?>
					</select>
					<br/> <br/>

          Cidade:</br>
					<select id="cidade" name="cidade" class="ui dropdown" required > <!-- style="display:none"-->
						<?php
						foreach ( $cidades as $k => $v ) {
							echo "<option value=\"" . $v->getId() . "\">" . utf8_encode($v->getNome()) . "</option>";
						}
						?>
					</select>
					<br/> <br/>

					Data de Nascimento:</br>
					<input class="campo" type="text" name="data_nasc" id="data_nasc" placeholder="Informe a data de "></br></br>
					<center><input class="ui inverted primary button" type="submit" name="btCadastrar" value="Atualizar"></center>
			</div>
			</form>
				</div>

	  </div>

  </body>
</html>
