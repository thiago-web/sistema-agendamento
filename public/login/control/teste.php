<?php
session_start();
// ID SESSION
$id_session = $_SESSION['id'] = '1';

$conect = include("../../../assets/banco/conection.php");
// QUERY QUE RESGATA O ID DO LUSUÁRIO
// CADASTRANDO O USUÁRIO E SENHA DO CLIENTE
// $sql_ver = "SELECT id_usuario FROM usuarios WHERE IN (SELECT id_usuario FROM )"

// $sql_ver = "SELECT id_usuario FROM usuarios WHERE EXISTS(SELECT id_usuario FROM informacoes_usuarios)";
// $result_sql_ver = mysqli_query($conect, $sql_ver);
// $row = mysqli_num_rows($result_sql_ver);

// if($row > 0){


// }
// else{
$sql="  SELECT id_usuario, usuario FROM usuarios 
                    WHERE id_usuario IN (SELECT id_usuario FROM informacoes_usuarios)
                    AND   usuario IN (SELECT usuario FROM informacoes_usuarios);
        ";

$result = mysqli_query($conect, $sql);

$mostra = mysqli_fetch_assoc($result);

echo $mostra['id_usuario']. " | " . $mostra['usuario']. "<br>";
if($result){
    echo "deu bom";
}
else{
    echo "Erro:". mysqli_error($conect);
}
// $dado = mysqli_fetch_assoc($result_id_user);
// echo $dado['id'];

// }
?>

<!-- 
SELECT id_usuario, usuario FROM usuarios 
                    WHERE id_usuario IN (
                    SELECT id_usuario FROM informacoes_usuarios)

 -->