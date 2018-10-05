<?php
class Categoria(){
	private $id = null;
	private $nome;
	private $descricao;
	private $foto;
	
	public function __construct($nome, $descricao, $foto){
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->foto = $foto;
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
	
	public function getFoto(){
		return $this->foto;
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
	
	public function setFoto($foto){
		$this->foto = $foto;
	}
}
?>