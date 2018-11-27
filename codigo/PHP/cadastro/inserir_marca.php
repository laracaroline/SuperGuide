<?php
  include_once '../dao/MarcaDao.php';
  include_once '../Marca.php';

  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];

  $marca = new Marca($nome, $descricao);
  $marcaDao = new MarcaDao();

  if($marcaDao->create($marca)){
    echo "Marca cadastrada com sucesso!";
  } else {
    echo "Falha de cadastro de marca!";
  }
?>
