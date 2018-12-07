<?php
  require_once 'C:\xampp\htdocs\PHP\dao\ListarProduto.php';

  $pesquisa = $_POST['palavra'];

  $lista = new ListarProduto();
  $pesquisa = $lista->pesquisarProduto($pesquisa);
  

?>
