<?php
class Categoria(){
	private $id = null;
	private $nome;
	private $descricao;
	//Campo BLOB verificar como fazer
	
	public function __construct($nome, $descricao){
		$this->nome = $nome;
		$this->descricao = $descricao;
	}

	public function getId(){
		return $this->id;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function setNome($nome){
		$this-> = $nome;
	}
	
	public function setDescricao($descricao){
		$this-> = $descricao;
	}
}
?>