<?php
    require_once "BaseCrudDao.php";
    require_once "../conexao/Conexao.php";

    class EstadoDao implements BaseCrudDao {
        private $instanciaConexaoPdo;
        private $tabela;

        public function __construct() {
            $this->instanciaConexaoPdo = Conexao::getInstancia();
            $this->tabela = "estados";
        }

        public function create($objeto) {
            $id = $this->getNovoIdEstado();
            $nome = $objeto->getNome();
            $pais = $objeto->getPais();
            $idPais = $pais->getId();

            $sql = "INSERT INTO {$this->tabela} (id_estado, nome_estado, id_pais) VALUES (:id, :nome, :id_pais)";

            try {
                $operacao = $this->instanciaConexaoPdo->prepare($sql);
                $operacao->bindValue(":id", $id, PDO::PARAM_INT);
                $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
                $operacao->bindValue(":id_pais", $idPais, PDO::PARAM_INT);

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
			$sqlStmt = "SELECT * FROM {$this->tabela} WHERE id_estado=:id";
			try{
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->execute();
				$getRow = $operacao->fetch(PDO::FETCH_OBJ);
				$nome = $getRow->nome_estado;
				$id_pais = $getRow->id_pais;
				$objeto = new Estado($nome, $id_pais);
				$objeto->setId($id);
				return $objeto;
			}catch(PDOException $excecao){
				echo $excecao->getMessage;
			}
        }

		public function update($estado){
			$id = $estado->getId();
			$nome = $estado->getNome();

			$sqlStmt = "UPDATE {$this->tabela} SET nome_estado=:nome WHERE id_pais=:id";
			try {
				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);

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


        public function delete($id_estado) {
        $sqlStmt = "DELETE FROM {$this->tabela} WHERE id_estado=:id";
       try {
          $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
          $operacao->bindValue(":id", $id_estado, PDO::PARAM_INT);
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

        private function getNovoIdEstado() {
            $sql = "SELECT MAX(id_estado) AS id_estado FROM {$this->tabela}";
            try {
                $operacao = $this->instanciaConexaoPdo->prepare($sql);
                if ($operacao->execute()) {
                    if ($operacao->rowCount() > 0) {
                        $getRow = $operacao->fetch(PDO::FETCH_OBJ);
                        $idReturn = (int) $getRow->id_estado + 1;
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
