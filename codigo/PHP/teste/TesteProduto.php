<?php
	require_once "../Produto.php";
	require_once "../dao/ProdutoDao.php";
	require_once "../dao/BaseCrudDao.php";
  require_once "../Categoria.php";
  require_once "../dao/CategoriaDao.php";
  require_once "../Marca.php";
  require_once "../dao/MarcaDao.php";

  //Cria Marcas
  //$marca1 = new Marca("Havainas", "Marca de calcados (chinelas principalmente)");
  //$marca2 = new Marca("Marca", "Descricao da Marca");
  //$marcaDao = new MarcaDao();
  //$marcaDao->create($marca1);
  //$marcaDao->create($marca2);

  //Cria Categorias
  //$categoria1 = new Categoria("Calcados","asdffq");
  //$categoria2 = new Categoria("Categoria","Descricao categoria");
  //$categoriaDao = new CategoriaDao();
  //$categoriaDao->create($categoria1);
  //$categoriaDao->create($categoria2);

  $produtoDao = new ProdutoDao();

  //-----Create-----
  //$produto1 = new Produto("Havainas", "Tamanho 44",  $marca1, $categoria1);
  //$produto2 = new Produto("Produto", "Descricao do Produto",  $marca2, $categoria2);

  //$produtoDao->create($produto1);
  //$produtoDao->create($produto2);

  //-----Read-----
  //$ler = $produtoDao->read(10);
	//echo $ler->getNome();
	//echo $ler->getDescricao();
	//echo $ler->getId();
  //echo $ler->getFoto(); //não testado(BLOB)
  //echo $ler->getMarca();
  //echo $ler->getCategoria();



  //-----Update-----
  $produto2 = $produtoDao->read(10);
  $produto2->setNome("Um outro nome de Produto");
  $produtoDao->update($produto2);

  //-----Delete-----
  //$produtoDao->delete(9);
?>
