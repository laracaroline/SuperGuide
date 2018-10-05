<?php
class Pais{
	private $id_pais;
	private $nome_pais;
	
	public function __construct($id_pais,$nome_pais){
		$this->id_pais = $id_pais;
		$this->nome_pais = $nome_pais;
	}
	public function getIdPais(){
		return $this->id_pais;
	}
	public function getNomePais(){
		return $this->nome_pais;
	}
	public function setIdPais($id_pais){
		$this->id_pais = $id_pais;
	}
	public function setNomePais($nome_pais){
		$this->nome_pais = $nome_pais;
	}
}
?>