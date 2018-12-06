<?php
//Verificação de sessao para acessar a pagina
if(!isset($_SESSION['logado'])):
	header('Location: index.php');
endif;

$idAdm =  $_SESSION['id_adm'];
$sqlName = "SELECT * FROM adm WHERE idAdm = '$idAdm'";
$resultName = mysqli_query($connect, $sqlName);
$dadosName = mysqli_fetch_array($resultName);
mysqli_close($connect);
?>
