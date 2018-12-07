<?php
	require_once "../PHP/dao/ListarProduto.php";
	require_once "../PHP/dao/SupermercadoDao.php";
	require_once "../PHP/dao/ProdutoDao.php";

	$listarProduto = new ListarProduto();
	$precos = $listarProduto->listarPrecoProduto();


?>

<!DOCTYPE html>
<html>
	<head>
	<title>Pagina inicial</title>
	<link rel="short cut icon" type="image/png" href="src/img/icon.png">

	<link rel="stylesheet" type="text/css" href="src/semantic.min.css">
	<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
	<script src="src/semantic.min.js"></script>

	<link rel="stylesheet" type="text/css" href="src/css/style_home.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="src/js/script_pesquisa.js"></script>

  </head>
  <body>
		<header>
			<nav class="cabecalho">
				<div class="logo">
					<a href="home.php"><img src="src/img/logo.png" id="tamlogo"></a>
				</div>

				<form method="POST" action="pesquisa.php">
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
			<table class="ui grey table">
				<thead>

					<tr>
						<th>Nome do Supermercado</th>
						<th>Nome do Produto</th>
						<th>Preço</th>
					</tr>

				</thead>
				<tbody>

					<?php
					$supDao = new SupermercadoDao();
					$prodDao = new ProdutoDao();
						foreach ( $precos as $k => $v ) {
							$idp = $v->getProduto();
							$ids = $v->getSupermercado();
							$objS = $supDao->read($ids);
							$objP = $prodDao->read($idp);

							echo "<tr> <td>" 	. utf8_encode($objS->getNome()) . "</td>".
							"<td>" 	. utf8_encode($objP->getNome())  . "</td>".
							"<td>" 	.  utf8_encode($v->getPreco_Produto()) . "</td>";
						}
					?>
				</tbody>
			</table>

		</div>

  </body>
</html>
