<?php
  require_once "../Pais.php";
  require_once "../dao/PaisDao.php";
  require_once "../dao/BaseCrudDao.php";

  $pais = new Pais("BRASIL");

  $paisDao = new PaisDao();

  $paisDao->create($pais);

  //$lerContato = $paisDao->read(2);
  //echo $lerContato->getNome();
  //echo $lerContato->getId();
  
  //$lerContato->setNome("Canada");

  //$lerContato->setNome("Canada");
  //echo $pais->getNome();

  //$paisDao->update($lerContato);

  //$paisDao->delete(5);
?>
