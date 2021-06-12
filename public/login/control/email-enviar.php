<?php
session_start();
include('../../../assets/banco/conection.php');
$id_user     = '1';//$_SESSION['id'] = '1';
$nome_sql    = "SELECT nome FROM informacoes_usuarios WHERE id = '$id_user'";
$result_nome = mysqli_query($conect, $nome_sql);
$nome        = mysqli_fetch_assoc($result_nome);
$nome        = $nome['nome'];
$numeros = range(0, 9);
shuffle($numeros);
$id = array_slice($numeros, 1, 9);
$mult = "";
for ($i = 0; $i < 9; $i++) {
    $mult .= $id[$i];
}
echo($mult);
// Emails para quem será enviado o formulário

$emailenviar  = 'thiagop291@gmail.com'; //= $_POST['email-cliente']
$destino = $emailenviar;
$assunto = "REDEFINIR A SENHA";

// É necessário indicar que o formato do e-mail é html
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: $nome <$email>';
//$headers .= "Bcc: $EmailPadrao\r\n";

$enviaremail = mail($destino, $assunto, $arquivo, $headers);
if($enviaremail){
$mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
} else {
$mgm = "ERRO AO ENVIAR E-MAIL!";
echo "";
}

?>