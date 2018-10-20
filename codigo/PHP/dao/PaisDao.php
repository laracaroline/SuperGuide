<?php
  require_once "BaseCrudDao.php";
  require_once "../conexao/Conexao.php";

  class PaisDao implements BaseCrudDao {

      private $instanciaConexaoPdo;
      private $tabela;

      function __construct(){
        $this->instanciaConexaoPdo = Conexao::getInstancia();
        $this->tabela = "paises"; //nome da tabela do banco de dados
      }

      public function create($pais){
		  $id = $this->getNovoIdPais(); //classe que gera um id
          $nome = $pais->getNome(); // classe do Pais.php que pega o nome

          $sqlStmt = "INSERT INTO {$this->tabela} (id_pais, nome_pais) VALUES (:id, :nome)";

          try{
              $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
			        $operacao->bindValue(":id", $id, PDO::PARAM_INT);
              $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);

      			  if ($operacao->execute()) {
                      if ($operacao->rowCount() > 0) {
                          $pais->setId($id); // setId() classe do Pais.php que seta um id novo
                          return true;
                      } else {
                          return false;
                      }
                  } else {
                      return false;
                  }

                }catch(PDOException $excecao){
                  echo $excecao->getMessage();
                }
      }

      public function read($id) {
         $sqlStmt = "SELECT * FROM {$this->tabela} WHERE id_pais=:id";
         try {
            $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
            $operacao->bindValue(":id", $id, PDO::PARAM_INT);
            $operacao->execute();
            $getRow = $operacao->fetch(PDO::FETCH_OBJ);
            $nome = $getRow->nome_pais;
            $objeto = new Pais($nome);
            $objeto->setId($id);
            return $objeto;
         } catch(PDOException $excecao){
            echo $excecao->getMessage();
			//echo "erro";
         }
      }

      public function update($pais) {
       $id = $pais->getId();
       $nome = $pais->getNome();
       $sqlStmt = "UPDATE {$this->tabela} SET nome_pais=:nome WHERE id_pais=:id";
       try {
          $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
          $operacao->bindValue(":id", $id, PDO::PARAM_INT);
          $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
          if($operacao->execute()){
             if($operacao->rowCount() > 0){
                return true;
             } else {
                return false;
             }
          } else {
             return false;
          }
       } catch (PDOException $excecao)  {
          echo $excecao->getMessage();
		  echo "erro";
       }
    }

    public function delete($id) {
        $sqlStmt = "DELETE FROM {$this->tabela} WHERE id_pais=:id";
       try {
          $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
          $operacao->bindValue(":id", $id, PDO::PARAM_INT);
          if($operacao->execute()){
             if($operacao->rowCount() > 0) {
                   return true;
             } else {
                   return false;
             }
          } else {
             return false;
          }
       } catch (PDOException $excecao) {
          echo $excecao->getMessage();
       }
    }

	  private function getNovoIdPais() {
        $sql = "SELECT MAX(id_pais) AS id_pais FROM {$this->tabela}";
        try {
            $operacao = $this->instanciaConexaoPdo->prepare($sql);
            if ($operacao->execute()) {
                if ($operacao->rowCount() > 0) {
                    $getRow = $operacao->fetch(PDO::FETCH_OBJ);
                    $idReturn = (int) $getRow->id_pais + 1;
                    return $idReturn;
                } else {
                    throw new Exception("Ocorreu um problema com o banco de dados");
                    exit();
                }
            } else {
                throw new Exception("Ocorreu um problema com o banco de dados");
                exit();
            }
        } catch (PDOException $excecao) {
            echo $excecao->getMessage();
        }
    }
  }

?>
