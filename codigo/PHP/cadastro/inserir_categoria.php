<?php
  include_once '../dao/CategoriaDao.php';
  include_once '../Categoria.php';

  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];

  $categoria = new Categoria($nome, $descricao);
  $categoriaDao = new CategoriaDao();

  if($categoriaDao->create($categoria)){
    echo "Categoria cadastrada com sucesso!";
  } else {
    echo "Falha de cadastro de categoria!";
  }
?>
