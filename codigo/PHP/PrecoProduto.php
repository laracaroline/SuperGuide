<?php
class Preco_produto{
	private $id_produto;
	private $id_supermercado;
	private $preco_produto;
	
	public function __construct($id_produto, $id_supermercado, $preco_produto){
		$this->id_produto = $id_produto;
		$this->id_supermercado = $id_supermercado;
		$this->preco_produto = $preco_produto;
	}
	public function getIdProduto(){
		return $this->id_produto;
	}
	public function getIdSupermercado(){
		return $this->id_supermercado;
	}
	public function getPrecoProduto(){
		return $this->preco_produto;
	}
	public function setIdProduto($id_produto){
		$this->id_produto = $id_produto;
	}
	public function setIdSupermercado($id_supermercado){
		$this->id_supermercado = $id_supermercado;
	}
	public function setPrecoProduto($preco_produto){
		$this->preco_produto = $preco_produto;
	}
}

//id_produto id_supermercado preco_produto
?>