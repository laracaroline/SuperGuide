<!DOCTYPE html>
<html>
  <head>
    <title>Cadastro de Marca</title>

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
  	<script type="text/javascript" src="../../HTML/src/js/mascaras.js"></script>
  </head>

  <body>
    <div class="container">
      <div class="container">
        <div class="form_cadastro">
          <form method="POST" action="inserir_marca.php">
          <h2>Cadastro de Marcas</h2></br></br>

          Nome: </br>
          <input class="campo" type="text" name="nome" id="nome" placeholder="Informe o nome"></br></br>

          Descri&ccedil;&atilde;o: </br>
          <input class="campo" type="text" name="descricao" id="descricao" placeholder="Informe a descrição"></br></br>

          <center><input class="ui inverted primary button" type="submit" name="btCadastrar" value="Cadastrar"></center>
        </div>
      </form>
      </div>
    </div>
  </body>
</html>
