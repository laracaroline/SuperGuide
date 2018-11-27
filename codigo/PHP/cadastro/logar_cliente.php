<?php
  include_once '../dao/ClienteDao.php';
  include_once '../Cliente.php';
  include_once '../dao/CidadeDao.php';

  $cpf = $_POST["cpf"];
  $senha = $_POST["senha"];

  //echo $cidade;
  $clienteDao = new CidadeDao();
  $clienteObjeto = $cidadeDao->read($cidade);
  $cliente = new Cliente( $cpf, $senha, $cidadeObjeto);
  $clienteDao = new ClienteDao();

  if($clienteDao->logarCliente($cliente)){
    echo "Cliente inserido com sucesso!";
  } else{
    echo "Falha!";
  }

 ?>
