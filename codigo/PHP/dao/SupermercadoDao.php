<?php

    require_once 'C:\xampp\htdocs\PHP\Supermercado.php';
    require_once "BaseCrudDao.php";
    require_once "ProdutoDao.php";
    require_once 'conexao\Conexao.php';

    class SupermercadoDao implements BaseCrudDao {
        private $instanciaConexaoPdo;
        private $tabela;

        public function __construct() {
            $this->instanciaConexaoPdo = Conexao::getInstancia();
            $this->tabela = "supermercados";
        }

        public function create($objeto) {
            $id = $this->getNovoIdSupermercado();
            $nome = $objeto->getNome();
            $cnpj = $objeto->getCnpj();
            $endereco = $objeto->getEndereco();
            $telefone = $objeto->getTelefone();
            $email = $objeto->getEmail();
            $senha = $objeto->getSenha();
            //$foto = $objeto->getFoto();//nao testado(BLOB)
            $cidade = $objeto->getCidade();
            $idCidade = $cidade->getId();//getId();

            $sql = "INSERT INTO {$this->tabela} (id_supermercado, nome_supermercado, cnpj_supermercado, endereco_supermercado, telefone_supermercado, email_supermercado, senha_supermercado, id_cidade) VALUES (:id, :nome, :cnpj, :endereco, :telefone, :email, :senha, :id_cidade)";
            //$sql = "INSERT INTO {$this->tabela} (id_supermercado, nome_supermercado, cnpj_supermercado, endereco_supermercado, telefone_supermercado, email_supermercado, senha_supermercado, foto_supermercado, id_cidade) VALUES (:id, :nome, :cnpj, :endereco, :telefone, :email, :senha, :foto, :id_cidade)";//Nao testado(BLOB)

            try {
                $operacao = $this->instanciaConexaoPdo->prepare($sql);
                $operacao->bindValue(":id", $id, PDO::PARAM_INT);
                $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
                $operacao->bindValue(":cnpj", $cnpj, PDO::PARAM_STR);
                $operacao->bindValue(":endereco", $endereco, PDO::PARAM_STR);
                $operacao->bindValue(":telefone", $telefone, PDO::PARAM_STR);
                $operacao->bindValue(":email", $email, PDO::PARAM_STR);
                $operacao->bindValue(":senha", $senha, PDO::PARAM_STR);
                //$operacao->bindValue(":foto", $foto, PDO::PARAM_STR);//Nao testado(BLOB)
                $operacao->bindValue(":id_cidade", $idCidade, PDO::PARAM_INT);

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
      			$sqlStmt = "SELECT * FROM {$this->tabela} WHERE id_supermercado=:id";
      			try{
        				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
        				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
        				$operacao->execute();
        				$getRow = $operacao->fetch(PDO::FETCH_OBJ);
        				$nome = $getRow->nome_supermercado;
                $cnpj = $getRow->cnpj_supermercado;
                $endereco = $getRow->endereco_supermercado;
                $telefone = $getRow->telefone_supermercado;
                $email = $getRow->email_supermercado;
                $senha = $getRow->senha_supermercado;
                //$foto = $getRow->foto_supermercado;//Nao testado(BLOB)
                $id_cidade = $getRow->id_cidade;

                $objeto = new Supermercado($nome, $cnpj, $endereco, $telefone, $email, $senha, $id_cidade);
                //$objeto = new Supermercado($nome, $cnpj, $endereco, $telefone, $email, $senha, $foto, $id_cidade);;//Nao testado(BLOB)
        				$objeto->setId($id);
        				return $objeto;
        			}catch(PDOException $excecao){
        				echo $excecao->getMessage();
        			}
          }

      		public function update($supermercado){
      			$id = $supermercado->getId();
      			$nome = $supermercado->getNome();
            $cnpj = $supermercado->getCnpj();
            $endereco = $supermercado->getEndereco();
            $telefone = $supermercado->getTelefone();
            $email = $supermercado->getEmail();
            $senha = $supermercado->getSenha();
            //$foto = $supermercado->getFoto(); //nao testado(BLOB)
            $cidade = $supermercado->getCidade();
            $idCidade = $cidade->getId();
      		  //$sqlStmt = "UPDATE {$this->tabela} SET nome_supermercado = :nome, cnpj_supermercado = :cnpj, endereco_supermercado = :endereco, telefone_supermercado = :telefone, email_supermercado = :email_supermercado, senha_supermercado = :senha, foto_supermercado = :foto, id_cidade = :id_cidade WHERE id_supermercado=:id"; //nao testado(BLOB)
            $sqlStmt = "UPDATE {$this->tabela} SET nome_supermercado = :nome, cnpj_supermercado = :cnpj, endereco_supermercado = :endereco, telefone_supermercado = :telefone, email_supermercado = :email, senha_supermercado = :senha, id_cidade = :id_cidade WHERE id_supermercado=:id";

      			try {
      				$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
      				$operacao->bindValue(":id", $id, PDO::PARAM_INT);
      				$operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
              $operacao->bindValue(":cnpj", $cnpj, PDO::PARAM_STR);
              $operacao->bindValue(":endereco", $endereco, PDO::PARAM_STR);
              $operacao->bindValue(":telefone", $telefone, PDO::PARAM_STR);
              $operacao->bindValue(":email", $email, PDO::PARAM_STR);
              $operacao->bindValue(":senha", $senha, PDO::PARAM_STR);
              //$operacao->bindValue(":foto", $foto, PDO::PARAM_STR); //nao testado(BLOB)
              $operacao->bindValue(":id_cidade", $idCidade, PDO::PARAM_INT);

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

          public function delete($id_supermercado) {
          $sqlStmt = "DELETE FROM {$this->tabela} WHERE id_supermercado=:id";

           try {
            $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
            $operacao->bindValue(":id", $id_supermercado, PDO::PARAM_INT);
            if($operacao->execute()){
               if($operacao->rowCount() > 0) {
                return true;
               }else{
                return false;
               }
            }else{
              return false;
            }
          } catch (PDOException $excecao) {
            echo $excecao->getMessage();
    		    echo "erro";
          }
      }

    private function getNovoIdSupermercado() {
        $sql = "SELECT MAX(id_supermercado) AS id_supermercado FROM {$this->tabela}";
        try {
            $operacao = $this->instanciaConexaoPdo->prepare($sql);
            if ($operacao->execute()) {
                if ($operacao->rowCount() > 0) {
                    $getRow = $operacao->fetch(PDO::FETCH_OBJ);
                    $idReturn = (int) $getRow->id_supermercado + 1;
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

    public function listarSupermercados(){
			try{
			$sqlStmt = "SELECT * FROM {$this->tabela}";
			$operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
			$operacao->execute();

			$supermercados = new ArrayObject();

			while($getRow = $operacao->fetch(PDO::FETCH_OBJ)){
				$id = $getRow->id_supermercado;
				$nome = $getRow->nome_supermercado;
        $cnpj = $getRow->cnpj_supermercado;
        $endereco = $getRow->endereco_supermercado;
        $telefone = $getRow->telefone_supermercado;
        $email = $getRow->email_supermercado;
        $senha = $getRow->senha_supermercado;
				$id_cidade = $getRow->id_cidade;
				$objeto = new Supermercado($nome, $cnpj, $endereco, $telefone, $email, $senha, $id_cidade);
				$objeto->setId($id);
				$supermercados->append($objeto);
			}
			return $supermercados;

			}catch(PDOException $excecao){
				echo $excecao->getMessage();
			}
		}

    public function inserirPreco($objetoProduto, $objetoSupermercado, $preco_produto){

      $id_produto = $objetoProduto->getId();
      $id_supermercado = $objetoSupermercado->getId();

        $sql = "INSERT INTO preco_produtos (id_produto, preco_produto, id_supermercado) values (:id_produto, :preco_produto, :id_supermercado)";

        try{
          $operacao = $this->instanciaConexaoPdo->prepare($sql);
          $operacao->bindValue(":id_produto", $id_produto, PDO::PARAM_INT);
          $operacao->bindValue(":preco_produto", $preco_produto, PDO::PARAM_STR);
          $operacao->bindValue(":id_supermercado", $id_supermercado, PDO::PARAM_INT);
          $operacao->execute();
        } catch (PDOException $excecao) {
            echo $excecao->getMessage();
            echo "Erro";
        }
    }

    public function atualizarPreco($objetoProduto, $objetoSupermercado, $preco_produto){

      $id_produto = $objetoProduto->getId();
      $id_supermercado = $objetoSupermercado->getId();

        $sql = "UPDATE preco_produtos SET id_produto = :id_produto, id_supermercado = :id_supermercado, preco_produto = :preco_produto WHERE id_supermercado = :id_supermercado AND id_produto = :id_produto";

        try{
          $operacao = $this->instanciaConexaoPdo->prepare($sql);
          $operacao->bindValue(":id_produto", $id_produto, PDO::PARAM_INT);
          $operacao->bindValue(":id_supermercado", $id_supermercado, PDO::PARAM_INT);
          $operacao->bindValue(":preco_produto", $preco_produto, PDO::PARAM_STR);

          $operacao->execute();

        } catch (PDOException $excecao) {
            echo $excecao->getMessage();
            echo "Erro";
        }
    }

    public function excluirPreco($id_produto, $id_supermercado){
        $sql = "DELETE FROM preco_produtos WHERE id_produto=:id_produto AND id_supermercado = :id_supermercado";

        try{
          $operacao = $this->instanciaConexaoPdo->prepare($sql);
          $operacao->bindValue(":id_produto", $id_produto, PDO::PARAM_INT);
          $operacao->bindValue(":id_supermercado", $id_supermercado, PDO::PARAM_INT);

          $operacao->execute();

        } catch (PDOException $excecao) {
            echo $excecao->getMessage();
            echo "Erro";
        }
    }

    public function ObjetoLogar($cnpj, $senha){
  		$sqlStmt = "SELECT * FROM {$this->tabela} WHERE cnpj_supermercado = :cnpj AND senha_supermercado = :senha";
  	  try{
  	    $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
  	    $operacao->bindValue(":cnpj", $cnpj, PDO::PARAM_STR);
  	    $operacao->bindValue(":senha", $senha, PDO::PARAM_STR);
  	    $operacao->execute();
  	    $getRow = $operacao->fetch(PDO::FETCH_OBJ);
        $id = $getRow->id_supermercado;
				$nome = $getRow->nome_supermercado;
        $cnpj = $getRow->cnpj_supermercado;
        $endereco = $getRow->endereco_supermercado;
        $telefone = $getRow->telefone_supermercado;
        $email = $getRow->email_supermercado;
        $senha = $getRow->senha_supermercado;
				$id_cidade = $getRow->id_cidade;
				$objeto = new Supermercado($nome, $cnpj, $endereco, $telefone, $email, $senha, $id_cidade);
				$objeto->setId($id);

  			//exemplo de criar sessão
  			//$_SESSION['logado'] = true;
  			//$_SESSION['id_cliente'] = $dados['id_cliente'];

  			return $objeto;
  	  }catch(PDOException $excecao){
  	    echo $excecao->getMessage();
  	  }
  	}

  }
?>
