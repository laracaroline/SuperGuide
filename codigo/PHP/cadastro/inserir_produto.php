<?php
  include_once '../dao/ProdutoDao.php';
  include_once '../Produto.php';
  include_once '../dao/MarcaDao.php';
  include_once '../dao/CategoriaDao.php';
  include_once '../Marca.php';//teste pra corrigir o erro
  include_once '../Categoria.php';//teste pra corrigir o erro

  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  //$foto = $_POST["foto"];//blob
  $marca = $_POST["marca"];
  $categoria = $_POST["categoria"];

  //echo $marca
  //echo $categoria;
  $marcaDao = new MarcaDao();
  $marcaObjeto = $marcaDao->read(++$marca);
  $categoriaDao = new CategoriaDao();
  $categoriaObjeto = $categoriaDao->read(++$categoria);
  $produto = new Produto($nome, $descricao, $marcaObjeto, $categoriaObjeto);
  $produtoDao = new ProdutoDao();

  if($produtoDao->create($produto)){
    echo "Produto cadastrado com sucesso";
  } else {
    echo "Falha de cadastro!";
  }
?>
