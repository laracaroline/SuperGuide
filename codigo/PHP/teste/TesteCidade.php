<?php
	require_once "../Pais.php";
	require_once "../dao/PaisDao.php";
	require_once "../dao/BaseCrudDao.php";

	require_once "../Estado.php";
	require_once "../dao/EstadoDao.php";


	require_once "../Cidade.php";
	require_once "../dao/CidadeDao.php";

	$cidades = new ArrayObject();
	$cidadeDao = new CidadeDao();
	$cidades = $cidadeDao->listarCidade();

	echo "<select>";
    foreach ( $cidades as $k => $v ) {
        echo "<option value=\"" . $k . "\">" . $v . "</option>";
    }
	echo "</select>";
	/*while($cidades = $cidadeDao->listarCidade()){
		print_r($cidades);
	}*/
	//print_r($cidadeDao->listarCidade());
	//$lerCidade = $cidadeDao->read(3);
	/*$pais1 = new Pais("Brasil");
	$pais2 = new Pais("Canada");

	$paisDao = new PaisDao();

	$paisDao->create($pais1);
	$paisDao->create($pais2);

	$estado1 = new Estado("Goias", $pais1);
	$estado2 = new Estado("Quebec", $pais2);

	$estadoDao = new EstadoDao();

	$estadoDao->create($estado1);
	$estadoDao->create($estado2);

	$cidade1 = new Cidade("Rubiataba", $estado1);
	$cidade2 = new Cidade("Ceres", $estado2);

	$cidadeDao = new CidadeDao();

	$cidadeDao->create($cidade1);
	$cidadeDao->create($cidade2);

	$lerContato = $cidadeDao->read(3);
	//echo $lerContato->getNome();
	//echo $lerContato->getId();
	//echo $lerContato->getIdEstado();

	$lerContato->setNome("Uruana");
	//echo $cidade1->getNome();

	$cidadeDao->update($lerContato);

	//$cidadeDao->delete(2); */

?>
