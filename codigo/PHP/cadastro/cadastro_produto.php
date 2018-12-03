<?php
  require_once "../Marca.php";
  require_once "../dao/MarcaDao.php";
  $marcaDao = new MarcaDao();
  $marcas = $marcaDao->listarMarca();

  require_once "../Categoria.php";
  require_once "../dao/CategoriaDao.php";
  $categoriaDao = new CategoriaDao();
  $categorias = $categoriaDao->listarCategoria();

  /**require_once "../PHP/dao/ProdutoDao.php";

	$objFn = new ProdutoDao();

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
    <title>Cadastro de Produto</title>

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
    <script type="text/javascript" src="../../HTML/src/js/script_produtos.js"></script>
    <script type="text/javascript" src="../../HTML/src/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../../HTML/src/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="../../HTML/src/js/localization/messages_pt_BR.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="container">
        <div class="form_cadastro">
          <form id="login_form" method="POST" action="inserir_produto.php">
            <h2>Cadastro de Produtos</h2></br></br>
            <center><div class="form-message"></div></center>

            Nome do Produto:</br>
            <input class="campo" type="text" name="nome" id="nome" placeholder="Informe o nome do produto" required /></br></br>

            Descri&ccedil;&atilde;o do Produto:</br>
            <input class="campo" type="text" name="descricao" id="descricao" placeholder="Informe o descri&ccedil;&atilde;o do produto" required /></br></br>

            Categoria: </br>
            <select id="categoria" name="categoria" class="ui dropdown" required>
              <?php
                foreach ($categorias as $k => $v) {
                    echo "<option value=\"" . $v->getId() . "\">" . utf8_encode($v->getNome()) . "</option>";
                }
              ?>
            </select>
            <br/><br/>

            Marca: </br>
            <select id="marca" name="marca" class="ui dropdown" required>
              <?php
                foreach ($marcas as $k => $v) {
                  echo "<option value=\"" . $v->getId() . "\">" . utf8_encode($v->getNome()) . "</option>";
                }
              ?>
            </select>
            <br/><br/>

            <center><input class="ui inverted primary button" type="submit" name="btCadastrar" value="Cadastrar"></center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
