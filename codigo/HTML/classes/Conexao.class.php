<?php
  //classe de conexao com o banco de dados
  class Conexao{
    private $usuario;
    private $senha;
    private $banco;
    private $servidor;
    private static $pdo;

    //construtor
    public function __construct(){
      $this->servidor = "localhost";
      $this->banco = "mydb";
      $this->usuario = "andrey";
      $this->senha = "Margot12!";
    }

    //se o pdo ainda não existe ele cria, caso exista ele pula e retorna o pdo
    public function conectar(){
      try{
        if(is_null(self::$pdo)){
          self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
        }
        return self::$pdo;
      }catch(PDOExeption $ex){

      }
    }
  }

?>
