 <?php
  require_once "../Cidade.php";
  require_once "../dao/CidadeDao.php";
  require_once "../Estado.php";
  require_once "../dao/EstadoDao.php";
  require_once '../conexao/Conexao.php';

  $estadoDao = new EstadoDao();
  $estados = $estadoDao->listarEstado();
  $cidadeDao = new CidadeDao();
  $cidades = $cidadeDao->listarCidade();

  function __construct(){
    $this->instanciaConexaoPdo = Conexao::getInstancia();
    $this->tabela = "clientes";
  }

  $operacao = $this->instanciaConexaoPdo->prepare($sqlStmt);
  $operacao->bindValue(":id", $id, PDO::PARAM_INT);
  $operacao->execute();

  //$sql = ("SELECT * FROM cidades WHERE id_estado='".$_POST['id']."'");

    foreach ( $cidades as $k => $v ) {
      echo "<option value=\"" . $v->getId() . "\">" . utf8_encode($v->getNome()) . "</option>";
    }


?>
