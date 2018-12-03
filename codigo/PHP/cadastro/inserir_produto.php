<?php
  include_once '../dao/ProdutoDao.php';
  include_once '../Produto.php';
  include_once '../dao/MarcaDao.php';
  include_once '../dao/CategoriaDao.php';
  include_once '../Marca.php';
  include_once '../Categoria.php';

  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $marca = $_POST["marca"];
  $categoria = $_POST["categoria"];

  $marcaDao = new MarcaDao();
  $marcaObjeto = $marcaDao->read($marca);
  $categoriaDao = new CategoriaDao();
  $categoriaObjeto = $categoriaDao->read($categoria);
  $produto = new Produto($nome, $descricao, $marcaObjeto, $categoriaObjeto);
  $produtoDao = new ProdutoDao();

  if($produtoDao->create($produto)){
    echo "Produto cadastrado com sucesso";
  } else {
    echo "Falha de cadastro!";
  }
?>
