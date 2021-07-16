<?php
session_start();
$conect = include("../../../assets/banco/conection.php");

//RESGATA O USUÁRIO E SENHA COM O MÉODO POST E GUARDA NAS VARIÁVEIS
$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];

// QUERY DO LOGIN
$query_login = "SELECT usuario, senha FROM usuarios WHERE usuario = '{$usuario}' AND senha = md5('{$senha}')";
//RESGATA O RESULTADO DA QUERY NA VARIAVEL
$result_login = mysqli_query($conect, $query_login);
//CRIAMOS UMA VARIAVEL LINHA QUE RECEBE VALOR BOOLEAN
$row_login = mysqli_num_rows($result_login);

// QUERY QUE RESGATA O ID DO LUSUÁRIO
$query_id_user = "SELECT id_usuario, id_empresa FROM usuarios 
                  WHERE usuario = '$usuario'";
// WHERE usuario = '{$usuario}' AND senha = md5('{$senha}') ";
// RESULTADO DA QUERY
$result_id_user = mysqli_query($conect, $query_id_user);
// RESGATA A INFORMAÇÃO DA QUERY
$dado = mysqli_fetch_assoc($result_id_user);
// LINHA DO RESULTADO
$row_id_user = mysqli_num_rows($result_id_user);

// REDIRECIONAMENTO DO USUÁRIO
if ($row_login == 1) {

	if ($usuario == 'adm@cavabar.com') {
		header('location:../sws-admin/index.php');
		exit();
	} else {
		$_SESSION['usuario']     = $usuario;
		$_SESSION['id']	         = $dado['id_usuario'];
		$_SESSION['id_empresa']	 = $dado['id_empresa'];
		$_SESSION['logado']      = true;
		header('location: ../../agendar');
		exit();
	}
}
// SE FOR FALSE(0)RETORNA PARA O INDEX
else {
	unset($_SESSION['erro_values']);
	$_SESSION['nao_autenticado'] = true;
	header('location: ../login-page.php');
	exit();
}
?>