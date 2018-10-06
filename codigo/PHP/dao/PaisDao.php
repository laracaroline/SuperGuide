<?php

  require_once "BaseCrudDao.php";
  require_once "../conexao/Conexao.php";

  class PaisDao implements BaseCrudDao {

      private $instanciaConexaoPdo;
      private $tabela;

      function __construct(){
        $this->instanciaConexaoPdo = Conexao::getInstancia();
        $this->tabela = "paises";
      }

      public function create($pais){
          $nome = $pais->getNome();

          $sqlStmt = "INSERT INTO {$this->tabela} (nome_pais) VALUES (:nome)";

          try{
              $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
              $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);

          }catch(PDOException $excecao){
            echo $excecao->getMessage();
          }
      }
  }

?>
