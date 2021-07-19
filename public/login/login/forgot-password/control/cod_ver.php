<?php 
session_start();
include('../../../../assets/banco/conection.php');
$email = $_SESSION['email_cliente'];

// Recebe a variável da session



// Declara as variáveis
$codigo_user       = $_POST['codigo'];


// Verifica o código enviado
$sql_codigo = "SELECT email, codigo FROM codigos WHERE email = '$email' AND codigo = '$codigo_user'";
$result_cod = mysqli_query($conect, $sql_codigo);


$linha = mysqli_num_rows($result_cod);

$dado  = mysqli_fetch_assoc($result_cod);
// Echos

// echo "<br>ID Session: " . $id_user;
// echo "<br>Código Post: " . $codigo_user . "<br>";
// echo "<br>ID Sql: ". $dado['id_usuario'];
// echo "<br>Código Sql: ". $dado['codigo'];
// echo "<br>Linha: Sql: " . $linha;


if($linha > 0){
  header('location:../new-senha.php');
  
  // echo "<br>Vai para a tela de mudar a senha";
}
else{
  // echo "<br> Volta para a tela do código";
  header('location:../codigo-senha.php');
  $_SESSION['codigo_error'] = false;
}
?>