<?php
  require_once "../Pais.php";
  require_once "../dao/PaisDao.php";
  require_once "../dao/BaseCrudDao.php";

  $pais = new Pais("BRASIL");

  $paisDao = new PaisDao();

  //$paisDao->create($pais);

  //$lerContato = $paisDao->read(1); -- NAO FUNCIONOU

  //$pais->setNome("Canada");

  //$paisDao->update($pais);

  $paisDao->delete(1);
?>
