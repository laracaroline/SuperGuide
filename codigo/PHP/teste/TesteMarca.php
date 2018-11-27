<?php
	require_once "../Marca.php";
	require_once "../dao/MarcaDao.php";
	require_once "../dao/BaseCrudDao.php";

	$marca = new Marca("Mabel", "Marca de Bixxcoito");

	$marcaDao = new MarcaDao();

	$marcaDao->create($marca);

	//$lerContato = $marcaDao->read(30);
	//echo $lerContato->getNome();
	//echo $lerContato->getDescricao();
	//echo $lerContato->getId();

	//$lerContato->setNome("Mabel Premium");

	//$lerContato->setNome("Mabel Premium");
	//echo $marca->getNome();

	//$marcaDao->update($lerContato);
	//$marcaDao->delete(30);
?>
