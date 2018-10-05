<?php

require_once "iModeloCrudDao.php";
require_once "ConexaoPdo.php";

class ContatoDao implements iModeloCrudDao {
    private $instanciaConexaoPdo;
    private $tabela;

    public function __construct() {
        $this->instanciaConexaoPdo = ConexaoPdo::getInstancia();
        $this->tabela = "contato";
    }

    public function create($objeto) {
        $id = $this->getNovoIdContato();
        $nome = $objeto->getNome();
        $email = $objeto->getEmail();
        $telefone = $objeto->getTelefone();
        $sqlStmt = "INSERT INTO {$this->tabela} (id, nome, email, telefone) VALUES (:id, :nome, :email, :telefone)";
        try {
            $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
            $operacao->bindValue(":id", $id, PDO::PARAM_INT);
            $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
            $operacao->bindValue(":email", $email, PDO::PARAM_STR);
            $operacao->bindValue(":telefone", $telefone, PDO::PARAM_STR);
            if($operacao->execute()){
                if($operacao->rowCount() > 0) {
                    $objeto->setID($id);
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch(PDOException $excecao) {
            echo $excecao->getMessage();
        }
    }

    public function read($id) {
       $sqlStmt = "SELECT * FROM {$this->tabela} WHERE id=:id";
       try {
          $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
          $operacao->bindValue(":id", $id, PDO::PARAM_INT);
          $operacao->execute();
          $getRow = $operacao->fetch(PDO::FETCH_OBJ);
          $nome = $getRow->nome;
          $email = $getRow->email;
          $telefone = $getRow->telefone;
          $objeto = new Contato($nome, $email, $telefone);
          $objeto->setId($id);
          return $objeto;
       } catch(PDOException $excecao){
          echo $excecao->getMessage();
       }
    }
   
    public function update($objeto) {
       $id = $objeto->getId();
       $nome = $objeto->getNome();
       $email = $objeto->getEmail();
       $telefone = $objeto->getTelefone();
       $sqlStmt = "UPDATE {$this->tabela} SET nome=:nome, email=:email, telefone=:telefone WHERE id=:id";
       try {
          $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
          $operacao->bindValue(":id", $id, PDO::PARAM_INT);
          $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
          $operacao->bindValue(":email", $email, PDO::PARAM_STR);
          $operacao->bindValue(":telefone", $telefone, PDO::PARAM_STR);
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
       }
    }

    public function delete( $id ) {
        $sqlStmt = "DELETE FROM {$this->tabela} WHERE id=:id";
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
   
    private function getNovoIdContato(){
          $sqlStmt = "SELECT MAX(id) AS id FROM {$this->tabela}";
          try {
             $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
             if($operacao->execute()) {
                if($operacao->rowCount() > 0){
                   $getRow = $operacao->fetch(PDO::FETCH_OBJ);
                   $idReturn = (int) $getRow->id + 1;
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