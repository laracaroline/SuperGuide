<?php
	require_once "../Cliente.php";
	require_once "../dao/ClienteDao.php";
	require_once "../dao/BaseCrudDao.php";
	require_once "../Cidade.php";
	require_once "../dao/CidadeDao.php";
		
	require_once "../Estado.php";
	require_once "../dao/EstadoDao.php";
		
	require_once "../Pais.php";
	require_once "../dao/PaisDao.php";
		
	$pais1 = new Pais("Brasil");
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
	
	$cliente = new Cliente("nome", "cpf", "(--)--------", "email", "senha", "1998/02/17", $cidade1);
	
	$clienteDao = new ClienteDao();
	
	$clienteDao->create($cliente);
	
	$lerCliente = $clienteDao->read(3);
	
	//echo $lerCliente->getNome();
	//echo $lerCliente->getCpf();
	//echo $lerCliente->getTelefone();
	
	/*$lerCliente->setNome("Willian");
	$lerCliente->setcpf("000-000-000.00");
	$lerCliente->setTelefone("(62)000000000");
	$lerCliente->setEmail("wwms_rtb@hotmail.com");
	$lerCliente->setSenha("123456789");
	$lerCliente->setDataNasc("1998/02/17");
	$lerCliente->setIdCidade("1");
	echo $lerCliente->getNome();
	echo $lerCliente->getCpf();
	echo $lerCliente->getTelefone();*/
	
	//$clienteDao->update($lerCliente);
	
	$clienteDao->delete(18);
?>