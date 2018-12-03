<?php
  include_once '../dao/ProdutoDao.php';
  include_once '../Produto.php';
  include_once '../dao/SupermercadoDao.php';
  include_once '../Supermercado.php';

  $supermercado = $_POST["supermercado"];
  $produto = $_POST["produto"];
  $preco = $_POST["preco"];

  $supermercadoDao = new SupermercadoDao();
  $supObjeto = $supermercadoDao->read($supermercado);
  $produtoDao = new ProdutoDao();
  $prodObjeto = $produtoDao->read($produto);
  try {
    $supermercadoDao->inserirPreco($prodObjeto, $supObjeto, $preco);
  } catch (Exception $e) {
    echo $e->getMessage();
    echo "Erro";
  }
?>
