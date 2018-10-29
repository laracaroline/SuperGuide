<?php
	require_once "../Supermercado.php";
	require_once "../dao/SupermercadoDao.php";
	require_once "../dao/BaseCrudDao.php";
	require_once "../Cidade.php";
	require_once "../dao/CidadeDao.php";
	require_once "../Estado.php";
	require_once "../dao/EstadoDao.php";
	require_once "../Pais.php";
	require_once "../dao/PaisDao.php";

  //Cria CEP
  $pais1 = new Pais("Pais");
  $paisDao = new PaisDao();
  $paisDao->create($pais1);

  $estado1 = new Estado("Estado", $pais1);
  $estadoDao = new EstadoDao();
  $estadoDao->create($estado1);

  $cidade1 = new Cidade("Cidade", $estado1);
  $cidadeDao = new CidadeDao();
  $cidadeDao->create($cidade1);

  $supermercadoDao = new SupermercadoDao();

  //-----Create-----Nao funciona
  //$supermercado1 = new Supermercado("Nome Supermercado", "CNPJ do Supermercado ", "Endereco do Supermercado", "(--)--------","Email do Supermercado", "Senha do Supermercado", "Como colocar esse Blob...", $cidade1);

  //$supermercadoDao->create($supermercado1);

  //-----Read-----FUNCIONA
  //$ler = $supermercadoDao->read(1);
	//echo $ler->getNome();
	//echo $ler->getCnpj();
	//echo $ler->getEndereco();
  ////echo $ler->getFoto(); //não testado(BLOB)
  //echo $ler->getTelefone();
  //echo $ler->getEmail();
  //echo $ler->getSenha();
  //echo $ler->getIdCidade();

  //-----Update-----Nao funciona
  //$supermercado2 = $supermercadoDao->read(2);
  //$supermercado2->setNome("Um outro nome de Produto");
  //$supermercadoDao->update($supermercado2);

  //-----Delete-----FUNCIONA
  //$supermercadoDao->delete(3);
?>
