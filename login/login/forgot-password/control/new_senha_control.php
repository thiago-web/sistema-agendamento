<?php 
session_start();
include('../../../../assets/banco/conection.php');
// Recebe a variável da session
$email        = $_SESSION['email_cliente'];

// Declara as variáveis
$senha = $_POST['new_senha'];

// Faz o update da senha
$sql_update = "UPDATE usuarios SET senha = MD5('$senha') WHERE usuario = '$email'";
$result_up  = mysqli_query($conect, $sql_update);

if ($result_up) {
  // Faz o delelte das informações
  $sql_del    = "DELETE FROM codigos WHERE email = '$email'";
  $result_del = mysqli_query($conect, $sql_del);
  if($result_del){
  }
  else{
    echo "<br> DELETE NÃO - ERRO: ".  mysqli_error();
  }
  $_SESSION['senha_auterada'] =  true;
  header('location:../../login-page.php');
  
}
else{
  echo "<br> Erro: ". mysqli_error();
}
?>