<?php
class Produto(){
	private $id = null;
	private $nome;
	private $descricao;
	private $marca;
	private $categoria;
	
	public function __construct($nome, $descricao, $marca, $categoria){
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->marca = $marca;
		$this->categoria = $categoria;
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
	
	public function getMarca(){
		return $this->marca;
	}
	
	public function getCategoria(){
		return $this->categoria;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	
	public function setMarca($marca){
		$this->marca = $marca;
	}
	
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}
}
?>