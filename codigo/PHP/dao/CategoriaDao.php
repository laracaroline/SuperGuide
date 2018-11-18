<?php
	require_once "BaseCrudDao.php";
	require_once "../conexao/Conexao.php";

	class CategoriaDao implements BaseCrudDao {
		private $instanciaConexaoPdo;
		private $tabela;

		function __construct(){
			$this->instanciaConexaoPdo = Conexao::getInstancia();
			$this->tabela = "categorias"; //nome da tabela do banco de dados
		}

		public function create($categoria){
			$id = $this->getNovoIdCategoria(); //classe que gera um id
			$nome = $categoria->getNome(); // classe do Categoria.php que pega o nome
			$descricao = $categoria->getDescricao(); // classe do Categoria.php que pega a descricao
      //$foto = $categoria->getFoto(); //nao testado(BLOB) //classe do Categoria.php que pega a foto

			$sqlStmt = "INSERT INTO {$this->tabela} (id_categoria, nome_categoria, descricao_categoria) VALUES (:id, :nome, :descricao) ";
      //$sqlStmt = "INSERT INTO {$this->tabela} (id_categoria, nome_categoria, descricao_categoria, foto_categoria) VALUES (:id, :nome, :descricao, :foto) ";

			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
					$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
				$operacao->bindValue(":descricao", $descricao, PDO::PARAM_STR);
        //$operacao->bindValue(":foto", $descricao, PDO::PARAM_STR); //Não testado (BLOB)
				if($operacao->execute()){
					if($operacao->rowCount() > 0){
						$categoria->setId($id); // setId() classe do Categoria.php que seta um id novo
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
			$sqlStmt = "SELECT * FROM {$this->tabela} WHERE id_categoria=:id";
			try {
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->execute();
				$getRow = $operacao->fetch(PDO::FETCH_OBJ);
				$nome = $getRow->nome_categoria;
				$descricao = $getRow->descricao_categoria;
        //$foto = $getRow->foto_categoria; //Nao testado (BLOB)
				$objeto = new Categoria ($nome, $descricao);
        //$objeto = new Categoria ($nome, $descricao, $foto); //Nao testado (BLOB)
				$objeto->setId($id);
				return $objeto;
			} catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}

		public function update($categoria) {
			$id = $categoria->getId();
			$nome = $categoria->getNome();
			$descricao  = $categoria->getDescricao();
      //$foto = $categoria->getFoto(); //Nao testado (BLOB)
			$sqlStmt = "UPDATE {$this->tabela} SET nome_categoria = :nome, descricao_categoria = :descricao WHERE id_categoria = :id";
      //$sqlStmt = "UPDATE {$this->tabela} SET nome_categoria = :nome, descricao_categoria = :descricao, foto_categoria = :foto WHERE id_categoria = :id"; //Nao testado (BLOB)
			try {
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
				$operacao->bindValue(":descricao", $descricao, PDO::PARAM_STR);
        //$operacao->bindValue(":foto", $foto, PDO::PARAM_STR); //Nao testado (BLOB)
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
			$sqlStmt = "DELETE FROM {$this->tabela} WHERE id_categoria = :id";
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

		private function getNovoIdCategoria(){
			$sql = "SELECT MAX(id_categoria) AS id_categoria FROM {$this->tabela}";
			try {
				$operacao = $this->instanciaConexaoPdo->prepare($sql);
				if ($operacao->execute()) {
					if ($operacao->rowCount() > 0) {
						$getRow = $operacao->fetch(PDO::FETCH_OBJ);
						$idReturn = (int) $getRow->id_categoria + 1;
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
		public function listarCategoria(){
			try {
				$sqlStmt = "SELECT nome_categoria,descricao_categoria FROM {$this->tabela}";
				//$sqlStmt = "SELECT nome_categoria FROM {$this->tabela}";
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->execute();

				$categorias = new ArrayObject();

				while ($getRow = $operacao->fetch(PDO::FETCH_OBJ)) {
					$nome = $getRow->nome_categoria;
					//$objeto = new Categoria($nome);

					$descricao = $getRow->descricao_categoria;
					$objeto = new Categoria($nome,$descricao);

					$nomeCategoria = $objeto->getNome();
					$categorias->append($nomeCategoria);
				}
				return $categorias;
			} catch (PDOException $excecao) {
				echo $excecao->getMessage();
			}
		}
	}
?>
