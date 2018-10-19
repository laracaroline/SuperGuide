<?php
class Estado {
	private $id = null;
	private $nome;
	private $pais;

	public function __construct($nome, $pais){
		$this->nome = $nome;
		$this->pais = $pais;
	}
	public function getId(){
		return $this->id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getPais(){
		return $this->pais;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function setPais($pais){
		$this->id_pais = $pais;
	}
}
?>
