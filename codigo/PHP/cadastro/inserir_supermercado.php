<?php
  include_once '../dao/SupermercadoDao.php';
  include_once '../Supermercado.php';
  include_once '../dao/CidadeDao.php';

  $nome = $_POST["nome"];
  $cnpj = $_POST["cnpj"];
  $endereco = $_POST["endereco"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];
  $cidade = $_POST["cidade"];
  $senha = $_POST["senha"];

  //echo $cidade;
  $cidadeDao = new CidadeDao();
  $cidadeObjeto = $cidadeDao->read($cidade);
  $supermercado = new Supermercado($nome, $cnpj, $endereco, $telefone, $email, $senha, $cidadeObjeto);
  $supermercadoDao = new SupermercadoDao();

  if($supermercadoDao->create($supermercado)){
    echo "Supermercado inserido com sucesso!";
  } else{
    echo "Falha!";
  }

 ?>
