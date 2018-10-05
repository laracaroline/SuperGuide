<?php
class Cliente{
	private $id_cliente;
	private $nome_cliente;
	private $cpf_cliente;
	private $telefone_cliente;
	private $email_cliente;
	private $senha_cliente;
	private $data_nasc_cliente;
	private $id_cidade;
	
	public function __construct($id_cliente, $nome_cliente, $cpf_cliente, $telefone_cliente, $email_cliente, $senha_cliente, $data_nasc_cliente, $id_cidade	){
		$this->id_cliente = $id_cliente;
		$this->nome_cliente = $nome_cliente;
		$this->cpf_cliente = $cpf_cliente;
		$this->telefone_cliente = $telefone_cliente;
		$this->email_cliente = $email_cliente;
		$this->senha_cliente = $senha_cliente;
		$this->data_nasc_cliente = $data_nasc_cliente;
		$this->id_cidade = $id_cidade;
	}
	public function getIdCliente(){
		return $this->id_cliente;
	}
	
	public function getNomeCliente(){
		return $this->nome_cliente;
	}
	public function getCpfCliente(){
		return $this->cpf_cliente;
	}
	public function getTelefoneCliente(){
		return $this->telefone_cliente;
	}
	public function getEmailCliente(){
		return $this->email_cliente;
	}
	public function getSenhaCliente(){
		return $this->senha_cliente;
	}
	public function getDataNascCliente(){
		return $this->data_nasc_cliente;
	}
	public function getCidade(){
		return $this->id_cidade;
	}
	public function setIdCliente($id_cliente){
		$this->id_cliente = $id_cliente;
	}
	public function setNomeCliente($nome_cliente){
		$this->nome_cliente = $nome_cliente;
	}
	public function setCpfCliente($cpf_cliente){
		$this->cpf_cliente = $cpf_cliente;
	}
	public function setTelefoneCliente($telefone_cliente){
		$this->telefone_cliente = $telefone_cliente;
	}
	public function setEmailCliente($email_cliente){
		$this->email_cliente = $email_cliente;
	}
	public function setSenhaCliente($senha_cliente){
		$this->senha_cliente = $senha_cliente;
	}
	public function setDataNascCliente($data_nasc_cliente){
		$this->data_nasc_cliente = $data_nasc_cliente;
	}
	public function setIdCidade($id_cidade){
		$this->id_cidade = $id_cidade;
	}
	//$id_cliente, $nome_cliente, $cpf_cliente, $telefone_cliente, $email_cliente, $senha_cliente, $data_nasc_cliente, $id_cidade	
}
?>