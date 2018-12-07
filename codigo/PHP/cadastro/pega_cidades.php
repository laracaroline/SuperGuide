 <?php
  
  require_once '../conexao/Conexao.php';

  require_once "../Cidade.php";
  require_once "../dao/CidadeDao.php";



  $cidadeDao = new CidadeDao();
  $cidades = $cidadeDao->listarCidadeId($_POST['id']);

  foreach ( $cidades as $k => $v ) {
    echo "<option value=\"" . $v->getId() . "\">" . utf8_encode($v->getNome()) . "</option>";
  }


?>
