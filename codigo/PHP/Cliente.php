<?php
	class Cliente{
		private $id = null;
		private $nome;
		private $cpf;
		private $telefone;
		private $email;
		private $senha;
		private $data_nasc;
		private $id_cidade;
		
		// public function __construct($nome, $cpf, $telefone, $email, $senha, $data_nasc, $id_cidade){
		// 	$this->nome = $nome;
		// 	$this->cpf = $cpf;
		// 	$this->telefone = $telefone;
		// 	$this->email = $email;
		// 	$this->senha = $senha;
		// 	$this->data_nasc = $data_nasc;
		// 	$this->id_cidade = $id_cidade;
		// }
		public function getId(){
			return $this->id;
		}
		
		public function getNome(){
			return $this->nome;
		}
		public function getCpf(){
			return $this->cpf;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function getDataNasc(){
			return $this->data_nasc;
		}
		public function getIdCidade(){
			return $this->id_cidade;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setCpf($cpf){
			$this->cpf = $cpf;
		}
		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function setDataNasc($data_nasc){
			$this->data_nasc = $data_nasc;
		}
		public function setIdCidade($id_cidade){
			$this->id_cidade = $id_cidade;
		}
		//$id, $nome, $cpf, $telefone, $email, $senha, $data_nasc, $id_cidade	
	}
?>