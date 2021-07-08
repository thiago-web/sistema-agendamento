<?php 
// Estabele a conexão com o banco
$conect = include('../assets/banco/conection.php');

$sql_clientes = "SELECT id_agendamento, mensagem, numero, enviado FROM notificacao_empresas WHERE enviado = 0";
$result_cli     = mysqli_query($conect, $sql_clientes);

if(!$result_cli){
 echo "Algo errado:" . mysqli_error($conect);
}
$info = mysqli_fetch_assoc($result_cli);



do {

	$msg_cliente  = $info['mensagem'];
	$whats_num    = $info['numero'];
	//Dispara a mensagem da API
	$url = 'https://whats-apping.herokuapp.com/send-message';

	$data_cliente = array('number' => '55' . $whats_num, 'message' => $msg_cliente);
	// Use a chave 'http' mesmo sem enviar a solicitação para https: // ...
	$options_cliente = array('http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data_cliente),
			'timeout' => 5 //10 segundos mata o processo se a API estiver offline
		)
	);
	$context_cliente  = stream_context_create($options_cliente);
	$result_cliente = file_get_contents($url, false, $context_cliente);

	if($result_cliente === FALSE){
		header('Refresh:10');
	}
	else{
		$sql_up = "UPDATE notificacao_empresas SET enviado = 1";
		$res_up = mysqli_query($conect, $sql_up);
	}

	
}
while($info = mysqli_fetch_array($result_cli));


?>