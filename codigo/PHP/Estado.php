<?php
class Estado(){
	private $id = null;
	private $nome;
	private $id_pais;
	
	public function __construct($id,$nome,$id_pais){
		$this->id = $id;
		$this->nome = $nome;
		$this->id_pais = $id_pais;
	}
	public function getId(){
		return $this->id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getIdPais(){
		return $this->id_pais;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function setIdPais($id_pais){
		$this->id_pais = $id_pais;
	}
}
?>