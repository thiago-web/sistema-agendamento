<?php 
session_start();
include('../../../../assets/banco/conection.php');

// Recebe a variável da session
$id_usuario        = $_SESSION['id'];
if(isset($codigo_user)){

// Declara as variáveis
$codigo_user       = $_POST['codigo'];

// Verifica o código enviado
$sql_codigo = "SELECT id_usuario, codigo FROM codigos WHERE id_usuario = '$id_usuario' AND codigo = '$codigo_user'";
$result_cod  = mysqli_query($conect, $sql_codigo);

  if ($result_cod) {
    
    header('location:../new-senha.php');
  }
  else{
    
    echo "Erro: ". mysqli_error();
  }
}


sessiopn_destroy();
?>