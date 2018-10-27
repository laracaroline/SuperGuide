<?php
	require_once "BaseCrudDao.php";
	require_once "../conexao/Conexao.php";
  
	class CidadeDao implements BaseCrudDao{
		
		private $instanciaConexaoPdo;
		private $tabela;
		
		function __construct(){
			$this->instanciaConexaoPdo = Conexao::getInstancia();
			$this->tabela = "cidades";
		}
		
		public function create($cidade){
			$id = $this->getNovoIdCidade();
			$nome = $this->getNome();
			
			$sqlStmt = "INSERT INTO {$this->tabela} (id_cidade, nome_cidade) VALUES (:id, :nome)";
			
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
				
				if($operacao->execute()){
					if($operacao->rowCount() > 0){
						$pais->setId($id);
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}catch(PDOException $exececao){
				echo $exececao->getMessage();
			}
		}
		
		public function read($id){
			$sqlStmt = "SELECT * FROM {$this->tabela} WHERE id_cidade=:id";
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->execute();
				$getRow = $operacao->fetch(PDO::FETCH_OBJ);
				$nome = $getRow->nome_cidade;
				$objeto = new Cidade($nome);
				$objeto->setId($id);
				return $objeto;
			}catch(PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		
		public function update($id){
			$id = $cidade->getId();
			$nome = $cidade->getNome();
			$sqlStmt = "UPDATE {$this->tabela} SET nome_cidade=:nome WHERE id_cidade=:id";
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
				if($operacao->execute()){
					if($operacao->rowCount() > 0){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}catch(PDOException $excecao){
				echo $exececao->getMessage();
				echo "erro";
			}
		}
		
		public function delete($id){
			$sqlStmt = "DELETE FROM {$this->tabela} WHERE id_cidade=:id";
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue
			}
		}
		
		
		
		
	}
?>