<?php
    require_once "BaseCrudDao.php";
    //require_once "../conexao/Conexao.php";

    class ProdutoDao implements BaseCrudDao {
        private $instanciaConexaoPdo;
        private $tabela;

        public function __construct() {
            $this->instanciaConexaoPdo = Conexao::getInstancia();
            $this->tabela = "produtos";
        }

        public function create($objeto) {
            $id = $this->getNovoIdProduto();
            $nome = $objeto->getNome();
            $descricao = $objeto->getDescricao();
            //$foto = $objeto->getFoto(); //nao testado(BLOB)
            $marca = $objeto->getMarca();
            $idMarca = $marca->getId();
            $categoria = $objeto->getCategoria();
            $idCategoria = $categoria->getId();

            $sql = "INSERT INTO {$this->tabela} (id_produto, nome_produto, descricao_produto, id_marca, id_categoria) VALUES (:id, :nome, :descricao, :id_marca, :id_categoria)";
            //$sql = "INSERT INTO {$this->tabela} (id_produto, nome_produto, descricao_produto,foto_produto, id_marca, id_categoria) VALUES (:id, :nome, :descricao_produto, :foto_produto, :id_marca, :id_categoria)"; //nao testado(BLOB)

            try {
                $operacao = $this->instanciaConexaoPdo->prepare($sql);
                $operacao->bindValue(":id", $id, PDO::PARAM_INT);
                $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
                $operacao->bindValue(":descricao", $descricao, PDO::PARAM_STR);
                //$operacao->bindValue(":foto", $foto, PDO::PARAM_STR);
                $operacao->bindValue(":id_marca", $idMarca, PDO::PARAM_INT);
                $operacao->bindValue(":id_categoria", $idCategoria, PDO::PARAM_INT);

                if ($operacao->execute()) {
                    if ($operacao->rowCount() > 0) {
                        $objeto->setId($id);
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } catch (PDOException $excecao) {
                echo $excecao->getMessage();
				        echo "Erro";
            }
        }

        public function read($id) {
			$sqlStmt = "SELECT * FROM {$this->tabela} WHERE id_produto=:id";
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->execute();
				$getRow = $operacao->fetch(PDO::FETCH_OBJ);
				$nome = $getRow->nome_produto;
        $descricao = $getRow->descricao_produto;
        //$foto = $getRow->foto_produto;
				$id_marca = $getRow->id_marca;
        $id_categoria = $getRow->id_categoria;
        $objeto = new Produto($nome, $descricao, $id_marca, $id_categoria);
        //$objeto = new Produto($nome, $descricao, $foto_produto, $id_marca, $id_categoria);//Nao testado()
				$objeto->setId($id);
				return $objeto;
			}catch(PDOException $excecao){
				echo $excecao->getMessage;
			}
        }

		public function update($produto){
			$id = $produto->getId();
			$nome = $produto->getNome();
      $descricao = $produto->getDescricao();
      //$foto = $foto->getFoto();//nao testado(BLOB)
      //$marca = $produto->getMarca();
      //$idMarca = $marca->getId();
      //$categoria = $produto->getCategoria();
      //$idCategoria = $categoria->getId();

		  //$sqlStmt = "UPDATE {$this->tabela} SET nome_produto = :nome, descricao_produto = :descricao, id_marca = :id_marca, id_categoria = :id_categoria WHERE id_produto=:id";
      $sqlStmt = "UPDATE {$this->tabela} SET nome_produto = :nome, descricao_produto = :descricao WHERE id_produto=:id";

      //$sqlStmt = "UPDATE {$this->tabela} SET nome_produto = :nome, descricao_produto = :descricao, foto_produto = :foto, id_marca = :id_marca, id_categoria = :id_categoria WHERE id_produto=:id"; //nao testado(BLOB)
			try {
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
        $operacao->bindValue(":descricao", $descricao, PDO::PARAM_STR);
        //$operacao->bindValue(":foto", $foto, PDO::PARAM_STR); //nao testado(BLOB)
        //$$operacao->bindValue(":id_marca", $idMarca, PDO::PARAM_INT);
        //$$operacao->bindValue(":id_categoria", $idCategoria, PDO::PARAM_INT);

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


        public function delete($id_produto) {
        $sqlStmt = "DELETE FROM {$this->tabela} WHERE id_produto=:id";
       try {
          $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
          $operacao->bindValue(":id", $id_produto, PDO::PARAM_INT);
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
		  echo "erro";
       }
    }

        private function getNovoIdProduto() {
            $sql = "SELECT MAX(id_produto) AS id_produto FROM {$this->tabela}";
            try {
                $operacao = $this->instanciaConexaoPdo->prepare($sql);
                if ($operacao->execute()) {
                    if ($operacao->rowCount() > 0) {
                        $getRow = $operacao->fetch(PDO::FETCH_OBJ);
                        $idReturn = (int) $getRow->id_produto + 1;
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

        public function listarProdutos(){
    			try{
    			$sqlStmt = "SELECT * FROM {$this->tabela} ORDER BY nome_produto";
    			$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
    			$operacao->execute();

    			$produtos = new ArrayObject();

    			while($getRow = $operacao->fetch(PDO::FETCH_OBJ)){
    				$id = $getRow->id_produto;
    				$nome = $getRow->nome_produto;
            $descricao = $getRow->descricao_produto;
    				$id_marca = $getRow->id_marca;
            $id_categoria = $getRow->id_categoria;
    				$objeto = new Produto($nome, $descricao, $id_marca, $id_categoria);
    				$objeto->setId($id);
    				$produtos->append($objeto);
    			}
    			return $produtos;

    			}catch(PDOException $excecao){
    				echo $excecao->getMessage();
    			}
    		}
    }
?>
