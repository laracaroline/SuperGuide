<?php

  $conexao = new PDO("mysql:host=localhost;dbname=mydb","root","");


  $pegaCidades = $conexao->prepare("SELECT * FROM cidades WHERE id_estado = '".$_POST['id']."'");
  $pegaCidades->execute();
    $fetchAll = $pegaCidades->fetchAll();

      foreach ( $fetchAll as $cidades ) {
        echo '<option>' . $cidades['nome_cidade'] . '</option>';
      }

?>
