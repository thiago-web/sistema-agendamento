<?php 
session_start();
include('../../../assets/banco/conection.php');

// VARIÁVEIS DA EMPRESA
$id_empresa = $_POST['empresa_id'];
// VARIÁVEIS DO CLIENTE
$nome       = $_POST['nome-cliente'];
$data_nas   = $_POST['data-nas-cliente'];
$cpf        = $_POST['cpf-cliente'];
$telefone   = $_POST['tel-cliente'];
$cep        = $_POST['cep-cliente'];
$cidade     = $_POST['cidade-cliente'];
$bairro     = $_POST['bairro-cliente'];
$rua        = $_POST['rua-cliente'];
$num        = $_POST['numero-cliente'];
// VARIÁVEIS DE ACESSO
$email 		= $_POST['user-email'];
$senha      = $_POST['pass-cliente'];
$senha      = md5($senha);
// VERIFICA SE O CPF JÁ ESTÁ CADASTRADO
$consulta = "SELECT cpf FROM informacoes_usuarios WHERE cpf = '$cpf' ";
$resultado_consulta = mysqli_query($conect, $consulta);

$linha = mysqli_num_rows($resultado_consulta);

if ($linha > 0) {
	?>
	<script type="text/javascript">
		alert('CPF já possui cadastro, faça login ou solicite uma nova senha !');
		window.location.href = "../login-page.php";
	</script>
	<?php
}
else {
	// VERIICA SE O EMAIL JÁ ESTÁ CADASTRADO
	$email_sql = "SELECT email FROM informacoes_usuarios WHERE email = '$email' ";
	$result_email = mysqli_query($conect, $email_sql);

	$email_dado = mysqli_num_rows($result_email);
	if($email_dado > 0)
	{
		?>
		<script type="text/javascript">
			alert('Este E-mail já está sendo utilizado.');
			window.history.back();
		</script>
		<?php 
	}
	else
	{
		// CADASTRANDO INFORMAÇÕES DO CLIENTE
		$cadastra_info = "INSERT INTO informacoes_usuarios( nome, cpf, data_nascimento, telefone, cep, cidade, bairro, rua, num, email, senha, id_empresa)
		VALUES ('$nome','$cpf','$data_nas', '$telefone','$cep', '$cidade', '$bairro', '$rua', '$num', '$email', '$senha', '$id_empresa')";
		// RESULTADO DA QUERY
		$resultado_cadastra = mysqli_query($conect, $cadastra_info);

		// VERIFICA SE JÁ EXISTE O USUÁRIO CADASTRADO
		$verifica_id = "SELECT id_usuario, usuario FROM usuarios 
						WHERE id_usuario IN (SELECT id_usuario FROM informacoes_usuarios)
						AND usuario = '$email'";
		$result_verifica_id = mysqli_query($conect, $verifica_id );

		if($result_verifica_id){

		}
		else
		{
			echo "Erro:". mysqli_error($conect);
		}
		$row_verifica_id = mysqli_num_rows($result_verifica_id);
		// SE JÁ POSSUI UM USUÁRIO IGUAL SOMENTE ATUALIZA
		if($row_verifica_id > 0){
			// // 	SE O USUÁRIO POSSUI CADASTRO ATUALIZA OS USUÁRIOS
			// $sql_atualiza = "UPDATE usuarios 
			// SET
			//  usuarios.id_usuario = informacoes_usuarios.id_usuario,
			//  usuarios.usuario    = informacoes_usuarios.email,
			//  usuarios.senha      = informacoes_usuarios.senha
			// FROM usuarios
			// INNER JOIN informacoes_usuarios
			// ON usuarios.id_usuario = informacoes_usuarios.id_usuario
			
			// "		
		}
		else{
			
			$cadastra_usuario=" 
			INSERT INTO usuarios (id_usuario, id_empresa, usuario, senha) 
			SELECT id, id_empresa, email, senha 
			FROM   informacoes_usuarios WHERE email = '$email'
			";	
			$result_cadastra_usuario = mysqli_query($conect, $cadastra_usuario);

			if ($result_cadastra_usuario ) {
				
			}
			else
			{
				echo("Erro:: " . mysqli_error($conect));
			}	
		}

		if ($resultado_cadastra ) {
			?>
			<script type="text/javascript">
				alert('Informações cadastradas!');
				window.location.href = "../login-page.php";
			</script>
			<?php
		}
		else
		{
			echo("Error description: " . mysqli_error($conect));
		}

	}
}
?>