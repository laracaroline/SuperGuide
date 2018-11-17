<?php
	require_once "BaseCrudDao.php";
	require_once "../conexao/Conexao.php";
	require_once "../Cidade.php";

	class CidadeDao implements BaseCrudDao{
		private $instanciaConexaoPdo;
		private $tabela;

		function __construct(){
			$this->instanciaConexaoPdo = Conexao::getInstancia();
			$this->tabela = "cidades";
		}

		public function create($cidade){
			$id = $this->getNovoIdCidade();
			$nome = $cidade->getNome();
			$estado = $cidade->getIdEstado();
			$id_estado = $estado->getId();

			$sqlStmt = "INSERT INTO {$this->tabela} (id_cidade, nome_cidade, id_estado) VALUES (:id, :nome, :id_estado)";

			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
				$operacao->bindValue(":id_estado", $id_estado, PDO::PARAM_INT);

				if($operacao->execute()){
					if($operacao->rowCount() > 0){
						$cidade->setId($id);
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
				$id_estado = $getRow->id_estado;
				$objeto = new Cidade($nome, $id_estado);
				$objeto->setId($id);
				return $objeto;
			}catch(PDOException $excecao){
				echo $excecao->getMessage();
			}
		}

		public function update($cidade){
			$id = $cidade->getId();
			$nome = $cidade->getNome();
			$estado = $cidade->getIdEstado();
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
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				if($operacao->execute()){
					if($operacao->rowCount() > 0){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}catch (PDOException $excecao){
				echo $excecao->getMessage();
				echo "erro";
			}
		}

		private function getNovoIdCidade(){
			$sql = "SELECT MAX(id_cidade) AS id_cidade FROM {$this->tabela}";
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sql);
				if($operacao->execute()){
					if($operacao->rowCount() > 0){
						$getRow = $operacao->fetch(PDO::FETCH_OBJ);
						$idReturn = (int) $getRow->id_cidade + 1;
						return $idReturn;
					}else{
						throw new Exception("Ocorreu um problema com o banco de dados");
						exit();
					}
				}else{
					throw new Exception("Ocorreu um problema com o banco de dados");
					exit();
				}
			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}

		public function listarCidade(){
			try{
			$sqlStmt = "SELECT nome_cidade, id_estado FROM {$this->tabela}";
			$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
			$operacao->execute();

			$cidades = new ArrayObject();

			while($getRow = $operacao->fetch(PDO::FETCH_OBJ)){
				$nome = $getRow->nome_cidade;
				$id_estado = $getRow->id_estado;
				$objeto = new Cidade($nome, $id_estado);

				$nomeCidade = $objeto->getNome();
				$cidades->append($nomeCidade);
			}
			return $cidades;

			}catch(PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
	}
?>
