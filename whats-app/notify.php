<?php 
session_start();
$user_id_session = $_SESSION['id'];
$user_id_empresa = $_SESSION['id_empresa'];


// Função que limpa o texto
function limpar_texto($str){ 
	return preg_replace("/[^0-9]/", "", $str); 
  }
// Estabele a conexão com o banco
include('../assets/banco/conection.php');

// Recebe os dados da empresa
$sql_dados_empresa   = "SELECT id, nome_estabelecimento, telefone, cep, cidade, rua, num  
						FROM empresas WHERE id = '$user_id_empresa'";
$result_sql_dados_empresa = mysqli_query($conect, $sql_dados_empresa);
$dados_empresa = mysqli_fetch_assoc($result_sql_dados_empresa);


// Recebe os dados do cliente 
$sql_dados_cliente        = "SELECT id, nome, email, telefone, cep, cidade, bairro, rua, num  FROM informacoes_usuarios WHERE id = '$user_id_session' " ;
$result_sql_dados_cliente = mysqli_query($conect, $sql_dados_cliente);
$dados_cliente = mysqli_fetch_assoc($result_sql_dados_cliente);

// Recebe os dados de agendamento
$sql_horarios_age = "SELECT nome, data_cad, horario 
					FROM horarios_cadastrados 
					WHERE id_usuario = '$user_id_session' ";
$result_sql_horarios_age = mysqli_query($conect, $sql_horarios_age);
$dados_horarios = mysqli_fetch_assoc($result_sql_horarios_age);

// Cria as variáveis do cliente
$nome_usuario   = $dados_cliente['nome'];
$email          = $dados_cliente['email'];
$whats_num      = $dados_cliente['telefone'];
$whats_num      = limpar_texto($whats_num);
$nome_cliente   = $dados_horarios['nome'];
$data_agendada  = $dados_horarios['data_cad'];
$data_agendada  = implode("/",array_reverse(explode("-",$data_agendada)));
$hora_agendada  = $dados_horarios['horario'];
$hora_agendada  = date("H:i", strtotime($hora_agendada));
$data_hoje      = date('d/m/Y');
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


// Não sei o que é isso
$a0 = "<a href='";
$a1 = 'https://api.whatsapp.com/send/?phone=';
$a2 = "'>";
$a3 = "Chamar no WhatsApp</a>";

// Variáveis de Saudação, Mensaem e Despedida para o Cliente
$saudacao_cliente  = ("Olá ". $nome_usuario.", tudo bem ?");
$mensagem_cliente = ("Somos da Barbearia Cavalheiros , no [endereço do estabelecimento],
e é um prazer confirmar o seu horário agendado para dia: ".$data_agendada ." às ". $hora_agendada.".


*INFORMAÇÕES DO AGENDAMENTO*


Nome do cliente: ".$nome_cliente. ",
Data Agendada: ".$data_agendada.", 
Horário Agendado: ".$hora_agendada.", 


Se precisar *reagendar* sua visita, ligue para o telefone ".$tel_empresa.".");
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
$saudacao_empresa  = ("*NOVO AGENDAMENTO* \n". $nome_empresa.".");
$mensagem_empresa  = ("Você possui um novo agendamento do usuario: ".$nome_usuario.".


*INFORMAÇÕES DO AGENDAMENTO*


NOME DO CLIENTE: \n".$nome_cliente. ".\n\n
DATA AGENDADA: \n".$data_agendada.".\n\n 
HORÁRIO AGENDADO: \n".$hora_agendada.".");

//Sorteia a mensagem de Saudação
// $apimsgsaudacao = $saudacao[array_rand($saudacao)];
// //Sorteia a mensagem de Despedida
// $apimsgdespedida = $despedida[array_rand($despedida)];

//Faz a mensagem
$msg_empresa = $saudacao_empresa ."

". $mensagem_empresa ;



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

	if ($result_cliente === FALSE) { /* Handle error */ }
	if ($result_empresa === FALSE) { /* Handle error */ }

	// var_dump($result_cliente);
	// var_dump($result_empresa);

	header('location: ../public/avisos/aviso-agendado.php');	
	
?>