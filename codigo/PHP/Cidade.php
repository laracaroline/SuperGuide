<?php
class Cidade{
	private $id_cidade;
	private $nome_cidade;
	private $id_estado;
	
	public function __construct($id_cidade,$nome_cidade,$id_estado){
		$this->id_cidade = $id_cidade;
		$this->nome_cidade = $nome_cidade;
		$this->id_estado = $id_estado;
	}
	public function getIdCidade(){
		return $this->id_cidade;
	}
	public function getNomeCidade(){
		return $this->nome_cidade;
	}
	public function getIdEstado(){
		return $this->id_estado;
	}
	public function setIdCidade($id_cidade){
		$this->id_cidade = $id_cidade;
	}
	public function setNomeCidade($nome_cidade){
		$this->nome_cidade = $nome_cidade;
	}
	public function setIdEstado($id_estado){
		$this->id_estado = $id_estado;
	}
}
?>