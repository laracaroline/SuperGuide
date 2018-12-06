<?php
	require_once "../PHP/Supermercado.php";
	require_once "../PHP/dao/SupermercadoDao.php";

	$supermercadoDao = new SupermercadoDao();
	$supermercados = $supermercadoDao->listarSupermercados();
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

			</nav>
		</header>

		<div class="conteiner">
			<table class="ui grey table">
				<thead>
					<?php
						foreach ( $cidades as $k => $v ) {
							echo "<tr> <th\"" . $v->getId() . "\">"
							. utf8_encode($v->getNome()) .
							"</th>

							<th\"" . $v->getId() . "\">"
							. utf8_encode($v->getCnpj()) .
							"</th>

							<th\"" . $v->getId() . "\">"
							. utf8_encode($v->getSenha()) .
							"</th>

							</tr>";
						}
					?>
					<tr>
						<th>Nome do Supermercado</th>
						<th>Nome do Produto</th>
						<th>Preço</th>
					</tr>

				</thead>
				<tbody>

					<tr>
			      <td>Mercadfrutas</td>
			      <td>Arroz</td>
			      <td>55</td>
    			</tr>

				</tbody>
			</table>

		</div>

  </body>
</html>
