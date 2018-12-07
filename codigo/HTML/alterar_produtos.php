<?php
  require_once "../PHP/Marca.php";
  require_once "../PHP/Categoria.php";
  require_once "../PHP/Produto.php";
  require_once "../PHP/dao/MarcaDao.php";
  require_once "../PHP/dao/CategoriaDao.php";
  require_once "../PHP/dao/ProdutoDao.php";

  //require_once "../conexao/Conexao.php"

  /*
  require_once "../PHP/Supermercado.php";
	require_once "../PHP/dao/SupermercadoDao.php";
  */


	$produtoDao = new ProdutoDao();
	$produtos = $produtoDao->listarProdutos();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Alterar Produtos</title>
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
  </head>
  <body>
		<header>
			<nav class="cabecalho">>
				<div>
					<img src="src/img/logo.png" id="tamlogo">
				</div>

					<div id="divBusca">
						<img src="src/img/buscar.png" alt="Buscar..."/>
					  <input type="text" id="txtBusca" placeholder="Buscar..."/>
					  <button id="btnBusca">Buscar</button>
					</div>

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
						<th>Nome do Produto</th>
						<th>Descri&ccedil;&atilde;o do Produto</th>
						<th>Marca</th>
            <th>Categoria</th>
            <th>Alterar</th>
            <th>Excluir</th>
					</tr>

				</thead>
				<tbody>
          <!--apenas teste-->
          <!--passar por GET-->
          <tr>
						<td>Nome do Produto</td>
						<td>Descri&ccedil;&atilde;o do Produto</td>
						<td>Marca</td>
            <td>Categoria</td>
            <td>
              <button class="ui animated fade button" id=alterar name=alterar tabindex="0" type="submit">
                <div class="visible content"><i class="right arrow icon"></i></div>
                <div class="hidden content">Alterar</div>
              </button>
            </td>
            <td><button class="ui red button">X</button></td>

					</tr>

					<?php
          //Tem que resolver o problema de conexao pra arrumar/testar esse

						foreach ( $produtos as $k => $v ) {
							echo "<tr> <td>" 	. utf8_encode($v->getNome()) . "</td>".
							"<td>" 	. utf8_encode($v->getDescricao()) . "</td>".
							//"<td>" 	. utf8_encode($v->getMarca()->getNome()) . "</td>".
              //"<td>" 	. utf8_encode($v->getCategoria()->getNome()) . "</td>".
              "<td>" 	. utf8_encode($v->getMarca()) . "</td>".
              "<td>" 	. utf8_encode($v->getCategoria()) . "</td>".
              "<td>" 	. utf8_encode($v->getId()) . "</td>".
              "<td>" 	. utf8_encode($v->getId()) . "</td>";
						}

					?>
				</tbody>
			</table>

		</div>

  </body>
</html>
