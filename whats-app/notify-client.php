<?php 
session_start();
$user_id_session = $_SESSION['id'];

// Função que limpa o texto
function limpar_texto($str){ 
	return preg_replace("/[^0-9]/", "", $str); 
  }
// Estabele a conexão com o banco
include('../assets/banco/conection.php');
// Recebe os dados do cliente 
$sql_dados_cliente        = "SELECT id, nome, email, telefone FROM informacoes_usuarios WHERE id = '$user_id_session' " ;
$result_sql_dados_cliente = mysqli_query($conect, $sql_dados_cliente);
$dados_cliente = mysqli_fetch_assoc($result_sql_dados_cliente);

// Recebe os dados de agendamento
$sql_horarios_age = "SELECT nome, data_cad, horario 
					FROM horarios_cadastrados 
					WHERE id_usuario = '$user_id_session' ";
$result_sql_horarios_age = mysqli_query($conect, $sql_horarios_age);
$dados_horarios = mysqli_fetch_assoc($result_sql_horarios_age);

// Cria as variáveis
$nome_usuario  = $dados_cliente['nome'];
$email         = $dados_cliente['email'];
$whats_num     = $dados_cliente['telefone'];
$whats_num     = limpar_texto($whats_num);
$nome_cliente  = $dados_horarios['nome'];
$data_agendada = $dados_horarios['data_cad'];
$data_agendada = implode("/",array_reverse(explode("-",$data_agendada)));
$hora_agendada = $dados_horarios['horario'];
$hora_agendada = date("H:i", strtotime($hora_agendada));
$data       = date('d/m/Y');

$a0 = "<a href='";
$a1 = 'https://api.whatsapp.com/send/?phone=';
$a2 = "'>";
$a3 = "Chamar no WhatsApp</a>";

// Variáveis de Saudação e Despedida
$saudacao  = ("Olá ". $nome_usuario.", tudo bem ?");

$mensagem = ("Somos da Barbearia Cavalheiros , no [endereço do estabelecimento],
e é um prazer confirmar o seu horário agendado para dia: ".$data_agendada ." às ". $hora_agendada.".


*INFORMAÇÕES DO AGENDAMENTO*


Nome do cliente: ".$nome_cliente. ",
Data Agendada: ".$data_agendada.", 
Horário Agendado: ".$hora_agendada.", 


Se precisar *reagendar* sua visita, ligue para o telefone [TELEFONE].");

$despedida = ("Nossa Equipe agradece sua a preferêcia!");

//Sorteia a mensagem de Saudação
// $apimsgsaudacao = $saudacao[array_rand($saudacao)];
// //Sorteia a mensagem de Despedida
// $apimsgdespedida = $despedida[array_rand($despedida)];

//Faz a mensagem
$apimsg = $saudacao ."

". $mensagem ."

". $despedida  ;
//Dispara a mensagem da API
$url = 'https://whats-apping.herokuapp.com/send-message';
$data1 = array('number' => '55' . $whats_num, 'message' => $apimsg);
// Use a chave 'http' mesmo sem enviar a solicitação para https: // ...
$options = array('http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data),
			'timeout' => 10 //10 segundos mata o processo se a API estiver offline
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { /* Handle error */ }
	var_dump($result);

	header('location: ../public/avisos/aviso-agendado.php');
?>