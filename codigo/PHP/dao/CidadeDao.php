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
		}
	}

?>