<?php 
session_start();
include('../../../../assets/banco/conection.php');
// Recebe a variável da session
$id_usuario        = $_SESSION['id'];

// Declara as variáveis
$senha = $_POST['new_senha'];

// Faz o update da senha
$sql_update = "UPDATE usuarios SET senha = MD5('$senha') WHERE id_usuario = '$id_usuario'";
$result_up  = mysqli_query($conect, $sql_update);

if ($result_up) {
  // Faz o delelte das informações
  $sql_del    = "DELETE FROM codigos WHERE id_usuario = '$id_usuario'";
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