<?php
// Conexão
include_once 'db_connect.php';

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM pessoas WHERE nome LIKE '%$usuarios%' ORDER BY nome asc LIMIT 50";
$resultado_user = mysqli_query($connect, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($row_user = mysqli_fetch_assoc($resultado_user)){
		echo"<tr><td>".$row_user['nome']."</td><td>"
		.$row_user['endereco']."</td></td>"."</td><td>"
		.$row_user['telefone']."</td></td>"."</td><td>"
		.$row_user['email']."</td></td>"."</td><td>"
		.$row_user['nomeEmpresa']."</td></td>"."</td><td><a href='edit_usuario.php?id=" . $row_user['idPessoas'] . "'>Edit</a>"
		."</td></td>"."</td><td><a href='delete_usuario.php?id=" . $row_user['idPessoas'] . "'>Delete</a>"
		."</td></tr>";
	}
}else{
	echo "No client";
}
mysqli_close($connect);
?>
