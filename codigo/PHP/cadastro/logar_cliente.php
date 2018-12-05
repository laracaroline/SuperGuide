<?php
  include_once '../dao/ClienteDao.php';
  include_once '../Cliente.php';
  include_once '../dao/CidadeDao.php';

  $cpf = $_POST["cpf"];
  $senha = $_POST["senha"];

  //echo $cidade;
  $clienteDao = new ClienteDao();
  $clienteObjeto = $clienteDao->read($cliente);
  $cliente = new Cliente( $cpf, $senha);

  if($clienteDao->logar($cliente)){
    if(isset($_POST['cpf'])){
      $cpf = addslashes($_POST['$cpf']);
      $senha = addslashes($_POST['$senha']);

      if($clienteDao->msgErro == ""){

        if(!empty($cpf) && !empty($senha)){
          if ($clienteDao->logar($cpf, $senha)){
            header("location: privada.php");
          }else{
            echo "Email e/ou senha invalidos";
          }
        }else{
          echo "Erro: ".$$clienteDao->msgErro;
        }
      }else{
        echo "preencha os campos";
      }
    }

  } else{
    echo "Falha!";
  }

 ?>
