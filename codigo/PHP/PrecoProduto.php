<?php
class PrecoProduto{
	private $produto;
	private $supermercado;
	private $preco_produto;

	public function __construct($produto, $supermercado, $preco_produto){
		$this->produto = $produto;
		$this->supermercado = $supermercado;
		$this->preco_produto = $preco_produto;
	}
	public function getProduto(){
		return $this->produto;
	}
	public function getSupermercado(){
		return $this->supermercado;
	}
	public function getPrecoProduto(){
		return $this->preco_produto;
	}
	public function setProduto($produto){
		$this->id_produto = $produto;
	}
	public function setIdSupermercado($supermercado){
		$this->id_supermercado = $supermercado;
	}
	public function setPrecoProduto($preco_produto){
		$this->preco_produto = $preco_produto;
	}
}
?>
