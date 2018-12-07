<?php
  include_once '../dao/ClienteDao.php';
  include_once '../Cliente.php';
  include_once '../dao/CidadeDao.php';

  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];
  $cidade = $_POST["cidade"];
  $dataNascimento = $_POST["data_nasc"];
  $senha = $_POST["senha"];

  //echo $cidade;
  $cidadeDao = new CidadeDao();
  $cidadeObjeto = $cidadeDao->read($cidade);
  $cliente = new Cliente($nome, $cpf, $telefone, $email, $senha, $dataNascimento, $cidadeObjeto);
  $clienteDao = new ClienteDao();

  if($clienteDao->create($cliente)){
    echo "Cliente inserido com sucesso!  <a href='../../HTML/index.php'>Clique aqui</a> para fazer login";
  } else{
    echo "Falha!";
  }

 ?>
