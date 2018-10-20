<?php
	require_once "BaseCrud.php";
	require_once "../conexao/Conexao.php"
	
	class MarcaDao implements BaseCrudDao {
		private $instanciaConexaoPdo;
		private $tabela;
		
		function __construct(){
			$this->instanciaConexaoPdo = Conexao::getIntancia();
			$this->tabela = "paises"; //nome da tabela do banco de dados
		}
		
		public function create($marca){
			$id = $this->getNovoIdMarca(); //classe que gera um id
			$nome = $marca->getNome(); // classe do Marca.php que pega o nome
			$descricao = $marca->getDescricao(); // classe do Marca.php que pega a descricao
			
			$sqlStmt = "INSERT INTO {$this->tabela} (id_marca, nome_marca, descricao_marca) VALUES (:id, :nome, :descricao) ";
			
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_INT);
				$operacao->bindValue(":descricao", $descricao, PDO::PARAM_INT);
				if($operacao->execute()){
					if(
	}
?>