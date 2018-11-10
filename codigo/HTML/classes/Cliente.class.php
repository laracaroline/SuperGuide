<?php
  //requere a conexao e class de funções
  require_once 'Conexao.class.php';
  require_once 'Funcoes.class.php';

  //class de clientes
  class Cliente{
    private $con;
    private $objfunc;
    private $idCliente;
    private $nome;
    private $cpf_cliente;
    private $telefone_cliente;
    private $email_cliente;__construct
    private $senha_cliente;
    private $data_nasc_cliente;

    //construtor
    public function __construct(){
      $this->con = new Conexao();
      $this->objfunc = new Funcoes();
    }

    //meteodos 'magicos' do PHP, set e get
    public function __set($atributo, $valor){
      $this->$atributo = $valor;
    }
    public function __get($atributo){
      return $this->$atributo;
    }

    //recebe o id para fazer seleção dos dados para alteração
    public function querySeleciona($dados){
      try{

      }catch(PDOExeption $ex){

      }
    }

    //lista os registros para edição
    public function querySelect($dados){
      try{

      }catch(PDOExeption $ex){

      }
    }

    //recebe os dados via post
    public function queryInsert($dados){
      try{

      }catch(PDOExeption $ex){

      }
    }

    //recebe os dados via post para atualização dos dados do campo seleciona
    public function queryUpdate($dados){
      try{

      }catch(PDOExeption $ex){

      }
    }

    //recebe o id do registro e o apaga
    public function queryDelete()$dados){
      try{

      }catch(PDOExeption $ex){

      }
    }



  }


?>
