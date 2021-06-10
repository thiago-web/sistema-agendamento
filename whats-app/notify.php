<?php 
// Estabele a conexão com o banco
include('conexao.php');

// Cria as variáveis
$nome       = $_POST['nome'];
$email      = $_POST['email'];
$whats_num = $_POST['num_whats'];
$whats_web  = $_POST['num_whats'];
$data       = date('d/m/Y');
$a0 = "<a href='";
$a1 = 'https://api.whatsapp.com/send/?phone=';
$a2 = "'>";
$a3 = "Chamar no WhatsApp</a>";

//Variáveis de Saudação e Despedida
$saudacao  = array("Olá, tudo bem ?", "Olá, como vai você ?", "Olá, tudo certo por ai ?");
$despedida = array("Nossa Equipe agradece a preferêcia!", "A gente se vê, abraços !", "Estamos à disposição, abraços !");

//Sorteia a mensagem de Saudação
$apimsgsaudacao = $saudacao[array_rand($saudacao)];
//Sorteia a mensagem de Despedida
$apimsgdespedida = $despedida[array_rand($despedida)];

//Faz a mensagem
$apimsg = $apimsgsaudacao . $nome . ', sua incrição foi confirmada!!'. $apimsgdespedida;

//Dispara a mensagem da API
$url = 'https://whats-apping.herokuapp.com/send-message';
$data = array('number' => '55' . $whats_num, 'message' => $apimsg);

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
	//var_dump($result);
?>