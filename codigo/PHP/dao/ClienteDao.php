<?php
	require_once "BaseCrudDao.php";
	require_once "../conexao/Conexao.php";
	
	class ClienteDao implements BaseCrudDao{
		private $instanciaConexaoPdo;
		private $tabela;
		
		function __construct(){
			$this->instanciaConexaoPdo = Conexao::getInstancia();
			$this->tabela = "clientes";
		}
		
		public function create($cliente){
			$id = $this->getNovoIdCliente();
			$nome = $cliente->getNome();
			$cpf = $cliente->getCpf();
			$telefone = $cliente->getTelefone();
			$email = $cliente->getEmail();
			$senha = $cliente->getSenha();
			$data_nasc = $cliente->getDataNasc();
			$cidade = $cliente->getIdCidade();
			$id_cidade = $cidade->getId();
			
			$sqlStmt = "INSERT INTO {$this->tabela} (id_cliente, nome_cliente, cpf_cliente, telefone_cliente, email_cliente, senha_cliente, data_nasc_cliente, id_cidade) VALUES (:id, :nome, :cpf, :telefone, :email, :senha, :data_nasc, :id_cidade)";
			
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
				$operacao->bindValue(":cpf", $cpf, PDO::PARAM_STR);
				$operacao->bindValue(":telefone", $telefone, PDO::PARAM_STR);
				$operacao->bindValue(":email", $email, PDO::PARAM_STR);
				$operacao->bindValue(":senha", $senha, PDO::PARAM_STR);
				$operacao->bindValue(":data_nasc", $data_nasc, PDO::PARAM_STR);
				$operacao->bindValue(":id_cidade", $id_cidade, PDO::PARAM_INT);
				
				if($operacao->execute()){
					if($operacao->rowCount() > 0){
						$cliente->setId($id);
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}catch(PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		
		public function read($id){
			$sqlStmt = "SELECT * FROM {$this->tabela} WHERE id_cliente=:id";
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->execute();
				$getRow = $operacao->fetch(PDO::FETCH_OBJ);
				$nome = $getRow->nome_cliente;
				$cpf = $getRow->cpf_cliente;
				$telefone = $getRow->telefone_cliente;
				$email = $getRow->email_cliente;
				$senha = $getRow->senha_cliente;
				$data_nasc = $getRow->data_nasc_cliente;
				$id_cidade = $getRow->id_cidade;
				$objeto = new Cliente($nome, $cpf, $telefone, $email, $senha, $data_nasc, $id_cidade);
				$objeto->setId($id);
				return $objeto;
			}catch(PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		
		public function update($cliente){
			$id = $cliente->getId();
			$nome = $cliente->getNome();
			$cpf = $cliente->getCpf();
			$telefone = $cliente->getTelefone();
			$email = $cliente->getEmail();
			$senha = $cliente->getSenha();
			$data_nasc = $cliente->getDataNasc();
			$cidade = $cliente->getIdCidade();
			$sqlStmt = "UPDATE {$this->tabela} SET nome_cliente=:nome, cpf_cliente=:cpf, telefone_cliente=:telefone, email_cliente=:email, senha_cliente=:senha, data_nasc_cliente=:data_nasc, id_cidade=:id_cidade WHERE id_cliente=:id";
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
				$operacao->bindValue(":cpf", $cpf, PDO::PARAM_STR);
				$operacao->bindValue(":telefone", $telefone, PDO::PARAM_STR);
				$operacao->bindValue(":email", $email, PDO::PARAM_STR);
				$operacao->bindValue(":senha", $senha, PDO::PARAM_STR);
				$operacao->bindValue(":data_nasc", $data_nasc, PDO::PARAM_STR);//Como faz quando o paramentro e DATE
				$operacao->bindValue(":id_cidade", $cidade, PDO::PARAM_INT);
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
				echo $excecao->getMessage();
				echo "erro";
			}
		}
		
		public function delete($id){
			$sqlStmt = "DELETE FROM {$this->tabela} WHERE id_cliente=:id";
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
			}catch(PDOException $excecao){
				echo $excecao->getMessage();
				echo "erro";
			}
		}
		
		public function getNovoIdCliente(){
			$sql = "SELECT MAX(id_cliente) AS id_cliente FROM {$this->tabela}";
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sql);
				if($operacao->execute()){
					if($operacao->rowCount() > 0){
						$getRow = $operacao->fetch(PDO::FETCH_OBJ);
						$idReturn = (int) $getRow->id_cliente + 1;
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
	}
?>