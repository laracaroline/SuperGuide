<?php
	class Cidade{
		private $id = null;
		private $nome;
		private $id_estado;

		public function __construct($nome, $id_estado){
			$this->nome = $nome;
			$this->id_estado = $id_estado;
		}
		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getIdEstado(){
			return $this->id_estado;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setIdEstado($id_estado){
			$this->id_estado = $id_estado;
		}
	}
?>
