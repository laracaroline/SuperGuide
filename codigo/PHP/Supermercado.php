<?php
class Supermercado(){
	private $id = null;
	private $nome;
	private $cnpj;
	private $endereco;
	private $telefone;
	private $email;
	private $senha;
	private $id_cidade;
		
	public function __construct($nome, $cnpj, $endereco, $telefone, $email, $senha, $id_cidade){
		$this->nome = $nome;
		$this->cnpj = $cnpj;
		$this->endereco = $endereco;
		$this->telefone = $telefone;
		$this->email = $email;
		$this->senha = $senha;
		$this->cidade = $id_cidade;
	}
		
	public function getId(){
		return $this->id;
	}
		
	public function getNome(){
		return $this->nome;
	}
		
	public function getCnpj(){
		return $this->cnpj;
	}
		
	public function getEndereco(){
		return $this->endereco;
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
		
	public function getIdCidade(){
		return $this->id_cidade;
	}
		
	public function setId($id){
		$this->id = $id;
	}
		
	public function setNome($nome){
		$this->nome = $nome;
	}
		
	public function setCnpj($cnpj){
		$this->cnpj = $cnpj;
	}
		
	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}
		
	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}
		
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function setSenha($senha){
		$this->senha = $senha
	}
		
	public function setIdCidade($id_cidade){
		$this->id_cidade = $id_cidade;
	}
}
?>