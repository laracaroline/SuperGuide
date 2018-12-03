<?php
  require_once "../Produto.php";
  require_once "../dao/ProdutoDao.php";
  $produtoDao = new ProdutoDao();
  $produtos = $produtoDao->listarProdutos();

  require_once "../Supermercado.php";
  require_once "../dao/SupermercadoDao.php";
  $supermercadoDao = new SupermercadoDao();
  $supermercados = $supermercadoDao->listarSupermercados();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cadastro de Preços</title>

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
    <!-- <script type="text/javascript" src="../../HTML/src/js/script_produtos.js"></script> -->
    <script type="text/javascript" src="../../HTML/src/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../../HTML/src/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="../../HTML/src/js/localization/messages_pt_BR.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="container">
        <div class="form_cadastro">
          <form id="login_form" method="POST" action="inserir_preco.php">
            <h2>Cadastro de Preços</h2></br></br>
            <center><div class="form-message"></div></center>

            Supermercado: </br>
            <select id="supermercado" name="supermercado" class="ui dropdown" required>
              <?php
              foreach ($supermercados as $k => $v) {
                echo "<option value=\"" . $v->getId() . "\">" . utf8_encode($v->getNome()) . "</option>";
              }
              ?>
            </select>
            <br/><br/>

            Selecione o Produto: </br>
            <select id="produto" name="produto" class="ui dropdown" required>
              <?php
                foreach ($produtos as $k => $v) {
                    echo "<option value=\"" . $v->getId() . "\">" . utf8_encode($v->getNome()) . "</option>";
                }
              ?>
            </select>
            <br/><br/>

            Pre&ccedil;o do Produto:<br/>
            <div class="ui right labeled input">
              <label for="amount" class="ui label">R$</label>
              <input type="text" name="preco" placeholder="Preço" id="preco">
            </div>
            <br/><br/>

            <center><input class="ui inverted primary button" type="submit" name="btCadastrar" value="Cadastrar"></center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

?>
