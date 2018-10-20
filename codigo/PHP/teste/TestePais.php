<?php
  require_once "../Pais.php";
  require_once "../dao/PaisDao.php";
  require_once "../dao/BaseCrudDao.php";

  $pais = new Pais("BRASIL");

  $paisDao = new PaisDao();

  //$paisDao->create($pais);

  //$lerContato = $paisDao->read(1);
  //echo $lerContato->getNome();

  $pais->setNome("Canada");
  //echo $pais->getNome();

  $paisDao->update($pais);

  //$paisDao->delete(5);
?>
