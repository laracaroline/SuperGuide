<?php
class Estado{
	private $id_estado;
	private $nome_estado;
	private $id_pais;
	
	public function __construct($id_estado,$nome_estado,$id_pais){
		$this->id_estado = $id_estado;
		$this->nome_estado = $nome_estado;
		$this->id_pais = $id_pais;
	}
	public function getIdEstado(){
		return $this->id_estado;
	}
	public function getNomeEstado(){
		return $this->nome_estado;
	}
	public function getIdPais(){
		return $this->id_pais;
	}
	public function setIdEstado($id_estado){
		$this->id_estado = $id_estado;
	}
	public function setNomeEstado($nome_estado){
		$this->nome_estado = $nome_estado;
	}
	public function setIdPais($id_pais){
		$this->id_pais = $id_pais;
	}
}
?>