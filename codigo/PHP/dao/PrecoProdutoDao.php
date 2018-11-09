<?php
  require_once "BaseCrudDao.php";
  require_once "../conexao/Conexao.php";

  class PrecoProdutoDao implements BaseCrudDao{
    private $instanciaConexaoPdo;
    private $trabela;

    function __construct(){
      $this->instanciaConexaoPdo = Conexao::getInstancia();
      $this->tabela = "preco_produtos";
    }

    public function create($objeto){
      $produto = $objeto->getProduto();
      $id_produto = $produto->getId();
    	$supermercado = $objeto->getSupermercado();
      $id_supermercado = $supermercado->getId();
    	$preco_produto = $objeto->getPrecoProduto();

      $sql = "INSERT INTO {$this->tabela} (id_produto, id_supermercado, preco_produto) values (:id_produto, :id_supermercado, :preco_produto)";

      try{
        $operacao = $this->instanciaConexaoPdo->prepare($sql);
        $operacao->bindValue(":id_produto", $id_produto, PDO::PARAM_INT);
        $operacao->bindValue(":id_supermercado", $id_supermercado, PDO::PARAM_INT);
        $operacao->bindValue(":preco_produto", $preco_produto, PDO::PARAM_STR);

        $operacao->execute();
      } catch (PDOException $excecao) {
          echo $excecao->getMessage();
          echo "Erro";
      }
    }

    public function read($id) {
      //implementar
    }

    public function update($objetoProduto, $objetoSupermercado){
      $produto = $objetoProduto->getProduto();
      $id_produto = $produto->getId();
    	$supermercado = $objetoSupermercado->getSupermercado();
      $id_supermercado = $supermercado->getId();
    	$preco_produto = $objeto->getPrecoProduto();

      $sqlStmt = "UPDATE {$this->tabela} SET id_produto = :id_produto, id_supermercado = :id_supermercado, preco_produto = :precoProduto WHERE id_supermercado = :id_supermercado AND preco_produto = :preco_produto";

      try{
        $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
        $operacao->bindValue(":id_supermercado", $id_supermercado, PDO::PARAM_INT);
        $operacao->bindValue(":id_produto", $id_produto, PDO::PARAM_INT);
        $operacao->bindValue(":preco_produto", $preco_produto, PDO::PARAM_STR);

        if($operacao->execute()){
					if($operacao->rowCount() > 0){
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}

      }catch (PDOException $excecao)  {
				echo $excecao->getMessage();
				echo "erro";
			}
    }

    public function delete($id) {
      //implementar
    }
}
?>
