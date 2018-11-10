<?php
	require_once "../dao/BaseCrudDao.php";

	require_once "../Supermercado.php";
	require_once "../dao/SupermercadoDao.php";
	require_once "../Cidade.php";
	require_once "../dao/CidadeDao.php";
	require_once "../Estado.php";
	require_once "../dao/EstadoDao.php";
	require_once "../Pais.php";
	require_once "../dao/PaisDao.php";
	require_once "../Produto.php";
	require_once "../dao/ProdutoDao.php";
	require_once "../Categoria.php";
	require_once "../dao/CategoriaDao.php";
	require_once "../Marca.php";
	require_once "../dao/MarcaDao.php";

	$pais = new Pais("Brasil");
	$paisDao = new PaisDao();
	$paisDao->create($pais);

	$estado = new Estado("Goias", $pais);
	$estadoDao = new EstadoDao();
	$estadoDao->create($estado);

	$cidade = new Cidade("Rubiataba", $estado);
	$cidadeDao = new CidadeDao();
	$cidadeDao->create($cidade);

	$supermercadoDao = new SupermercadoDao();
	$supermercado = new Supermercado("O Popular", "CNPJ do Supermercado ", "Endereco do Supermercado", "(--)--------","Email do Supermercado", "Senha do Supermercado", $cidade);
	$supermercadoDao->create($supermercado);
	$marca = new Marca("Havainas", "Marca de calcados (chinelas principalmente)");
	$marcaDao = new MarcaDao();
	$marcaDao->create($marca);

	$categoria = new Categoria("Calcados","asdffq");
	$categoriaDao = new CategoriaDao();
	$categoriaDao->create($categoria);

	$produtoDao = new ProdutoDao();
  	$produto = new Produto("Havainas", "Tamanho 44",  $marca, $categoria);
  	$produtoDao->create($produto);

  	$id_produto = $produto->getId();
  	$id_supermercado = $supermercado->getId();
  	$supermercadoDao->inserirPreco($produto, $supermercado, "19.2");
  	$supermercadoDao->atualizarPreco($produto, $supermercado, "1.2");
  	$supermercadoDao->excluirPreco($id_produto, $id_supermercado);
  ?>
