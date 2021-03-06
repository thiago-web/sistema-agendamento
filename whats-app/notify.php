<?php 
session_start();
// Variáveis da sessão 
$user_id_session 	= $_SESSION['id'];
$user_id_empresa    = $_SESSION['id_empresa'];
$data_ag_session    = $_SESSION['data_dis'];
$horario_ag_session = $_SESSION['hh'];

// Função que limpa o texto
function limpar_texto($str){ 
	return preg_replace("/[^0-9]/", "", $str); 
  }
// Estabele a conexão com o banco
include('../assets/banco/conection.php');

// Recebe os dados da empresa
$sql_dados_empresa   = "SELECT id, nome_estabelecimento, telefone, cep, cidade, bairro,  rua, num  
						FROM empresas WHERE id = '$user_id_empresa'";
$result_sql_dados_empresa = mysqli_query($conect, $sql_dados_empresa);
$dados_empresa = mysqli_fetch_assoc($result_sql_dados_empresa);


// Recebe os dados do cliente 
$sql_dados_cliente     = "SELECT id, nome, email, telefone, cep, cidade, bairro, rua, num  
FROM informacoes_usuarios WHERE id = '$user_id_session'" ;
$result_sql_dados_cliente = mysqli_query($conect, $sql_dados_cliente);
$dados_cliente = mysqli_fetch_assoc($result_sql_dados_cliente);



// Recebe os dados do agendamento do cliente
$sql_horarios_age = "
SELECT id, nome, data_cad, horario, id_usuario, id_barbeiro 
FROM horarios_cadastrados 
WHERE id_usuario = '$user_id_session' 
AND data_cad = '$data_ag_session' 
AND horario = '$horario_ag_session'";

$result_sql_horarios_age = mysqli_query($conect, $sql_horarios_age);
$dados_horarios = mysqli_fetch_assoc($result_sql_horarios_age);


// Informações do agendamento
$codigo_cliente = $dados_horarios['id'];
$data_agendada  = $dados_horarios['data_cad'];
$data_agendada  = implode("/",array_reverse(explode("-",$data_agendada)));
$hora_agendada  = $dados_horarios['horario'];
$hora_agendada  = date("H:i", strtotime($hora_agendada));
$data_hoje      = date('d/m/Y');



// Informações do cliente
$nome_usuario   = $dados_cliente['nome'];
$email_cliente  = $dados_cliente['email'];
$whats_num      = $dados_cliente['telefone'];
$whats_num      = limpar_texto($whats_num);
$cep_cliente    = $dados_cliente['cep'];
$cidade_cliente = $dados_cliente['cidade'];
$bairro_cliente = $dados_cliente['bairro'];
$rua_cliente    = $dados_cliente['rua'];
$num_cliente    = $dados_cliente['num'];

// Váriáveis da empresa 
$nome_empresa   = $dados_empresa['nome_estabelecimento'];
$tel_empresa    = $dados_empresa['telefone'];
$tel_empresa    = limpar_texto($tel_empresa);
$cep_empresa    = $dados_empresa['cep'];
$cidade_empresa = $dados_empresa['cidade'];
$bairro_empresa = $dados_empresa['bairro'];
$rua_empresa    = $dados_empresa['rua'];
$num_empresa    = $dados_empresa['num'];


// Link do WhatsApp
$a0 = "<a href='";
$a1 = 'https://api.whatsapp.com/send/?phone=';
$a2 = "'>";
$a3 = "Chamar no WhatsApp </a>";

// Variáveis de Saudação, Mensagem e Despedida para o Cliente
$saudacao_cliente  = ("Olá ". $nome_usuario.", tudo bem ?");
$mensagem_cliente = ("Somos da ".$nome_empresa." , na ".$rua_empresa.",".$num_empresa."- ".
$bairro_empresa." na cidade de ".$cidade_empresa.".
E é um prazer confirmar o seu horário agendado para dia: ".$data_agendada ." às ". $hora_agendada." horas.


*INFORMAÇÕES DO AGENDAMENTO*

CÓDIGO DE AGENDAMENTO: ".$codigo_cliente."
NOME: ".$nome_usuario. ",
DATA AGENDADA: ".$data_agendada."
HORÁRIO: ".$hora_agendada."
LOCAL: ".$rua_empresa.", ".$num_empresa.", ".
$bairro_empresa.", ".$cidade_empresa."


Se precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: ".$tel_empresa.".

Ou pelo WhatsApp : 
https://api.whatsapp.com/send?phone=55".$tel_empresa."&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%20".$data_agendada."%20às%20".$hora_agendada."%20horas.%20");
$despedida_cliente = ("Nossa equipe agradece sua a preferêcia!");

//Sorteia a mensagem de Saudação
// $apimsgsaudacao = $saudacao[array_rand($saudacao)];
// //Sorteia a mensagem de Despedida
// $apimsgdespedida = $despedida[array_rand($despedida)];

//Faz a mensagem
$msg_cliente = $saudacao_cliente ."

". $mensagem_cliente ."

". $despedida_cliente;


// Variáveis de Saudação, Mensaem e Despedida para a empresa
$saudacao_empresa  = ("*NOVO AGENDAMENTO*");
$mensagem_empresa  = ("

".$nome_empresa.", meu nome é ".$nome_usuario." e acabei de realizar um agendamento para o dia: 
".$data_agendada ." às ". $hora_agendada." horas.


*INFORMAÇÕES DO AGENDAMENTO*

CÓDIGO DE AGENDAMENTO: ".$codigo_cliente."
NOME: ".$nome_usuario. "
DATA AGENDADA: ".$data_agendada."
HORÁRIO: ".$hora_agendada." horas
LOCAL: ".$rua_empresa.", ".$num_empresa.", 
".$bairro_empresa.", ".$cidade_empresa."


Se precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: ".$whats_num.".


Ou pelo WhatsApp : 
https://api.whatsapp.com/send?phone=55".$whats_num."&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%20".$data_agendada."%20às%20".$hora_agendada."%20horas.%20");


//Sorteia a mensagem de Saudação
// $apimsgsaudacao = $saudacao[array_rand($saudacao)];
// //Sorteia a mensagem de Despedida
// $apimsgdespedida = $despedida[array_rand($despedida)];

//Faz a mensagem
$msg_empresa = $saudacao_empresa ." ". $mensagem_empresa ;

//Dispara a mensagem da API
$url = 'https://whats-apping.herokuapp.com/send-message';

$data_cliente = array('number' => '55' . $whats_num, 'message' => $msg_cliente);
// Use a chave 'http' mesmo sem enviar a solicitação para https: // ...
$options_cliente = array('http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data_cliente),
			'timeout' => 10 //10 segundos mata o processo se a API estiver offline
		)
	);
	$context_cliente  = stream_context_create($options_cliente);
	$result_cliente = file_get_contents($url, false, $context_cliente);

// Envia para a empresa
$data_empresa = array('number' => '55' . $tel_empresa, 'message' => $msg_empresa);
// Use a chave 'http' mesmo sem enviar a solicitação para https: // ...
$options_empresa = array('http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data_empresa),
			'timeout' => 10 //10 segundos mata o processo se a API estiver offline
		)
	);
$context_empresa  = stream_context_create($options_empresa);
$result_empresa = file_get_contents($url, false, $context_empresa);

if ($result_cliente === FALSE || $result_empresa === FALSE ) 
{
	$send = 0;
	$slq_verifica1 = "
	SELECT id_agendamento FROM notificacao_clientes
	WHERE id_agendamento = '$codigo_cliente'
	";
	$result_1 = mysqli_query($conect, $slq_verifica1);
	$row1 = mysqli_num_rows($result_1);
	if($row1 < 1){
		$insert_not_cli = "
		INSERT INTO notificacao_clientes (id_agendamento, mensagem, numero, enviado, tipo)
		VALUES ('$codigo_cliente','$msg_cliente','$whats_num', '$send', 'cliente') ;
		";	
		$result_insert_cli = mysqli_query($conect, $insert_not_cli);
		$_SESSION['notific_not'] = TRUE;
		?>

		<script>
		// window.location.assign('../public/agendar/index.php');
		</script>
		<?php
	}

	$slq_verifica2 = "
	SELECT id_agendamento FROM notificacao_empresas
	WHERE id_agendamento = '$codigo_cliente'
	";
	$result_2 = mysqli_query($conect, $slq_verifica2);
	$row2 = mysqli_num_rows($result_2);
	if($row2 < 1)
	{
		$insert_not_emp = "
		INSERT INTO notificacao_empresas (id_agendamento, mensagem, numero, enviado, tipo)
		VALUES ('$codigo_cliente','$msg_empresa','$tel_empresa', '$send', 'empresa') ;
		";	
		$insert_not_emp = mysqli_query($conect, $insert_not_emp);
		$_SESSION['notific_not'] = TRUE;
		?>

		<script>
		// window.location.assign('../public/agendar/index.php');
		</script>
		<?php
	}

$_SESSION['notific_not'] = TRUE;
?>
<script>
window.location.assign('../public/agendar/index.php');
</script>
<?php
}
	$send = 1;
	$slq_verifica1 = "
	SELECT id_agendamento FROM notificacao_clientes
	WHERE id_agendamento = '$codigo_cliente'
	";
	$result_1 = mysqli_query($conect, $slq_verifica1);
	$row1 = mysqli_num_rows($result_1);
	if($row1 < 1){
		$insert_not_cli = "
		INSERT INTO notificacao_clientes (id_agendamento, mensagem, numero, enviado, tipo)
		VALUES ('$codigo_cliente','$msg_cliente','$whats_num', '$send', 'cliente') ;
		";	
		$result_insert_cli = mysqli_query($conect, $insert_not_cli);
		$_SESSION['notific_not'] = TRUE;
		?>

		<script>
		// window.location.assign('../public/agendar/index.php');
		</script>
		<?php
	}

	$slq_verifica2 = "
	SELECT id_agendamento FROM notificacao_empresas
	WHERE id_agendamento = '$codigo_cliente'
	";
	$result_2 = mysqli_query($conect, $slq_verifica2);
	$row2 = mysqli_num_rows($result_2);
	if($row2 < 1)
	{
		$insert_not_emp = "
		INSERT INTO notificacao_empresas (id_agendamento, mensagem, numero, enviado, tipo)
		VALUES ('$codigo_cliente','$msg_empresa','$tel_empresa', '$send', 'empresa') ;
		";	
		$insert_not_emp = mysqli_query($conect, $insert_not_emp);
		$_SESSION['notific_not'] = TRUE;
		?>

		<script>
		// window.location.assign('../public/agendar/index.php');
		</script>
		<?php
	}

$_SESSION['notific_not'] = TRUE;
?>
<script>
window.location.assign('../public/agendar/index.php');
</script>
<?php	



// var_dump($result_cliente);
// var_dump($result_empresa);



?>
