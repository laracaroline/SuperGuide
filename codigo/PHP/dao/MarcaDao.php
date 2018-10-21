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
					if($operacao->rowCount() > 0){
						$marca->setId($id); // setId() classe do Marca.php que seta um id novo
						return true;
					}else {
						return false;
					}
				}else {
					return false;
				}
			}catch(PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		
		public function read($id) {
			$sqlStmt = "SELECT * FROM {$this->tabela} WHERE id_marca=:id";
			try {
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->execute();
				$getRow = $operacao->fetch(PDO::FETCH_OBJ);
				$nome = $getRow->nome_marca;
				$objeto = new Marca ($nome);
				$objeto->setId($id);
				return $objeto;
			} catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		
		public function update($marca) {
			$id = $marca->getId();
			$nome = $marca->getNome();
			$descricao  = $marca->getDescricao();
			$sqlStmt = "UPDADE {$this->tabela} SET nome_marca = :nome WHERE id_marca = :id";
			try {
				$operacao = $this->instanciaConexaoPdo-prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
				if($operacao->execute()){
					if($operacao->rowCount() > 0){
						return true;
					} else {
						return false;
					}
				}
			} catch (PDOException $excecao) {
				echo $excecao->getMessage();
				echo "Erro";
			}
		}
		
		public function delete($id) {
			$sqlStmt = "DELETE FROM {$this->tabela} WHERE id_marca = :id";
			try {
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				if ($operacao->execute()) {
					if($operacao->rowCount() > 0 ){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}	
		}
		
		private function getNovoIdMarca(){
			$sql = "SELECT MAX(id_marca) AS id_marca FROM {$this->tabela}";
			try {
				$operacao = $this->instanciaConexaoPdo->prepare($sql);
				if ($operacao->execute()) {
					if ($operacao-.rowCount() > 0) {
						$getRow = $operacao->fetch(PDO::FETCH_OBJ);
						$idReturn = (int) $getRow->id_marca + 1;
						return $idReturn;
					} else {
						throw new Exception("Ocorreu um problema com o banco de dados");
						exit();
					}
				}else {
					throw new Exception ("Ocorreu um problema com o banco de dados");
					exit();
				}
			}catch (PDOException $excecao) {
				echo $excecao->getMessage();
			}
		}
	}
?>