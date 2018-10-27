<?php
	require_once "../Categoria.php";
	require_once "../dao/CategoriaDao.php";
	require_once "../dao/BaseCrudDao.php";

	$categoriaDao = new CategoriaDao();

  //-----Create-----
  //$categoria = new Categoria("Calcados", "Chinelos, meias...");
	//$categoriaDao->create($categoria);

  //-----Read-----
	//$lerContato = $categoriaDao->read(10);
	//echo $lerContato->getNome();
	//echo $lerContato->getDescricao();
	//echo $lerContato->getId();
  //echo $lerContato->getFoto(); //não testado(BLOB)

  //-----Update-----
  //$lerContato = $categoriaDao->read(27);//Busca o Id a ser alterado
	//$lerContato->setNome("Para os pés");//Seta o novos dados
	//$categoriaDao->update($lerContato);//Executa o update

  //-----Delete-----
	//$categoriaDao->delete(26);
?>
