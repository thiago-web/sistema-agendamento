<?php
session_start();
include('conexao.php');
//VERIFICA SE A VARIAVEL EXISTE
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
//RESGATA O USUÁRIO E SENHA COM O MÉODO POST E GUARDA NAS VARIÁVEIS
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//SELECIENO OS USUARIOS QUE POSSUEM A MESMA SENHA  E USUARIO IGUAIS NO BANCO
$query = "SELECT usuario FROM usuarios WHERE usuario = '{$usuario}' AND senha = md5('{$senha}')";
//RESGATA O RESULTADO DA QUERY NA VARIAVEL
$result = mysqli_query($conexao, $query);
//CRIAMOS UMA VARIAVEL LINHA QUE RECEBE VALOR BOOLEAN
$row = mysqli_num_rows($result);
//SE FOR UM VALOR TRUE(1) VAI PARA PÁGINA PAINEL
if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	header('Location: painel.php');
	exit();
}
// SE FOR FALSE(0)RETORNA PARA O INDEX
else 
{
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}