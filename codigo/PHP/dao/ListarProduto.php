<?php
require_once '..\PHP\Produto.php';
require_once "BaseCrudDao.php";
require_once "conexao/Conexao.php";
require_once "preco_produto.php";
require_once "ProdutoDao.php";



class ListarProduto{
  private $instanciaConexaoPdo;

  function __construct(){
    $this->instanciaConexaoPdo = Conexao::getInstancia();
  }

  public function listarPrecoProduto(){
    try{
    $sqlStmt = "SELECT * FROM preco_produtos";
    $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
    $operacao->execute();

    $precos = new ArrayObject();

    while($getRow = $operacao->fetch(PDO::FETCH_OBJ)){
      $id_supermercado = $getRow->id_supermercado;
      $preco = $getRow->preco_produto;
      $id_produto = $getRow->id_produto;
      $objeto = new preco_produto($id_produto, $preco, $id_supermercado);
      $precos->append($objeto);
    }
    return $precos;

    }catch(PDOException $excecao){
      echo $excecao->getMessage();
    }
  }

  public function pesquisarProduto($palavra){

    try{
    $sqlStmt = "SELECT * FROM produtos WHERE nome_produto =:nome_produto";
    $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
    $operacao->bindValue(":nome_produto", $palavra, PDO::PARAM_STR);
    $operacao->execute();

    $produtos = new ArrayObject();

    while($getRow = $operacao->fetch(PDO::FETCH_OBJ)){
      $id = $getRow->id_produto;
      $nome = $getRow->nome_produto;
      $descricao = $getRow->descricao_produto;
      $id_marca = $getRow->id_marca;
      $id_categoria = $getRow->id_categoria;
      $objeto = new Produto($nome, $descricao, $id_marca, $id_categoria);
      $objeto->setId($id);
      $produtos->append($objeto);
    }
    return $produtos;


    }catch(PDOException $excecao){
      echo $excecao->getMessage();
    }
  }
}
?>
