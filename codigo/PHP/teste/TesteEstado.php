<?php

require_once "../Pais.php";
require_once "../dao/PaisDao.php";
require_once "../dao/BaseCrudDao.php";

require_once "../Estado.php";
require_once "../dao/EstadoDao.php";


//$pais1 = new Pais("Brasil");
//$pais2 = new Pais("Canada");

//$paisDao = new PaisDao();

//$paisDao->create($pais1);
//$paisDao->create($pais2);


//$estado1 = new Estado("Goias", $pais1);
//$estado2 = new Estado("Quebec", $pais2);

$estadoDao = new EstadoDao();

//$estadoDao->create($estado1);
//$estadoDao->create($estado2);

//$estado2->setNome("Acre");
//$estadoDao->update($estado2);

$estadoDao->delete(2);

?>
