<?php
class Preco_Produto {
	private $produto;
	private $preco_produto;
	private $supermercado;

	public function __construct($produto, $preco_produto, $supermercado){
		$this->produto = $produto;
		$this->preco_produto = $preco_produto;
    $this->supermercado = $supermercado;
	}

	public function getProduto(){
		return $this->produto;
	}
	public function getPreco_Produto(){
		return $this->preco_produto;
	}
	public function getSupermercado(){
		return $this->supermercado;
	}
	public function setProduto($produto){
		$this->produto = $produto;
	}
	public function setPreco_Produto($preco_produto){
		$this->preco_produto = $preco_produto;
	}
	public function setSupermercado($supermercado){
		$this->supermercado = $supermercado;
	}
}
?>
