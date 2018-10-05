<?php
class PrecoProduto(){
	private $id_produto;
	private $id_supermercado;
	private $preco;
	
	public function __construct($id, $id_supermercado, $preco){
		$this->id = $id;
		$this->id_supermercado = $id_supermercado;
		$this->preco = $preco;
	}
	public function getIdProduto(){
		return $this->id;
	}
	public function getIdSupermercado(){
		return $this->id_supermercado;
	}
	public function getPrecoProduto(){
		return $this->preco;
	}
	public function setIdProduto($id){
		$this->id_produto = $id_produto;
	}
	public function setIdSupermercado($id_supermercado){
		$this->id_supermercado = $id_supermercado;
	}
	public function setPreco($preco){
		$this->preco = $preco;
	}
}
?>