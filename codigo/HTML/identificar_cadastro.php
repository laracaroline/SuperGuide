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
    <div class="identificar">
      Identifique o seu tipo de cadastro!
    </div>
		<div class="container">
			<div class="container">
				<div class="menu1">
					<form method="POST" action="..\PHP\cadastro\cadastro_supermercado.php">
						<center><input class="ui inverted primary button" type="submit" value="Supermercado"></center>
					</form>
				</div>

				<div class="menu2">
					<form method="POST" action="cadastro_cliente.php">
					  <center><input class="ui inverted primary button" type="submit" value="Cliente"></center>
          </form>
			  </div>
				</div>
			</div>
		</div>
	</body>


</html>
