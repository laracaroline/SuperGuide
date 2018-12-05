<?php
  require_once "../Cidade.php";
  require_once "../dao/CidadeDao.php";
  require_once "../Estado.php";
  require_once "../dao/EstadoDao.php";

  $estadoDao = new EstadoDao();
  $estados = $estadoDao->listarEstado();
  $cidadeDao = new CidadeDao();
  $cidades = $cidadeDao->listarCidade();

  $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
  $operacao->bindValue(":id", $id, PDO::PARAM_INT);
  $operacao->execute();


    foreach ( $cidades as $k => $v ) {
      echo "<option value=\"" . $v->getId() . "\">" . utf8_encode($v->getNome()) . "</option>";
    }


?>
