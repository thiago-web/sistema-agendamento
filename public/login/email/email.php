<?php 
// Inicia a sessão
session_start();

// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
include "../../../assets/PHPMailer-master/PHPMailerAutoload.php"; 
$conect = include('../../../assets/banco/conection.php');


// Função para formatar o código
function form_cod($mascara, $value){
    return vsprintf($mascara, str_split($value));  
}
// Mascara do Cógigo
function cod($value){
    $cod = "%s%s%s-%s%s%s";
    $cod_form = form_cod($cod, $value);
    return $cod_form;
}
function to_numero($value){
    $num = "%/%d%d%/%d%d%d%d%d%/%d%d%d%d";
    $num_form = form_cod($num, $value);
    return $num_form;
}
function telefone($value){
    $tel = "(%d%d)%d%d%d%d%d-%d%d%d%d" ;
    $tel_form = form_cod($tel, $value);
    return $tel_form;
}

// Variáveis do usuário 
$id_user    = "";
$nome       = "";
$telefone   = "";
$id_empresa = "";

    
// Dados do usuário
$emailenviar                = $_POST['email-cliente'];
$_SESSION['email_cliente']  = $emailenviar;


$dados_user                 = "SELECT nome, id, id_empresa, telefone 
                               FROM informacoes_usuarios 
                               WHERE email = '$emailenviar'";
// Resultado da Query
$result_user                = mysqli_query($conect, $dados_user);

$linha = mysqli_num_rows($result_user);
if ($linha > 0) {
    // Dado da Query
$user                       = mysqli_fetch_assoc($result_user);

// Variáveis da Query
$id_user                    = $user['id'];
$_SESSION['id']             = $id_user;
$nome                       = $user['nome'];
$telefone                   = $user['telefone'];
$id_empresa                 = $user['id_empresa'];

// Informações da empresa
$sql_info_empresa = "SELECT id, nome_estabelecimento, telefone, email
                     FROM   empresas WHERE id = '$id_empresa'";
$result_empresa    = mysqli_query($conect, $sql_info_empresa);
$info_empresa     = mysqli_fetch_assoc($result_empresa);
// Variáveis da Empresa
$id_empresa       = $info_empresa['id'];
$nome_empresa     = $info_empresa['nome_estabelecimento'];
$telefone_empresa = $info_empresa['telefone'];
// $telefone_empresa = to_numero($telefone_empresa);
// $telefone_empresa = telefone($telefone_empresa);
$email_empresa    = $info_empresa['email'];


// Faz a criação do código
$numeros = range(0, 9);
shuffle($numeros);
$id = array_slice($numeros, 1, 6);
$codigo = "";
for ($i = 0; $i < 6; $i++) {
    $codigo .= $id[$i];
}
$codigo = cod($codigo);
// echo ($codigo);

// Inicia a classe PHPMailer 
$mail = new PHPMailer(); 

// Método de envio 
$mail->IsSMTP(); 

// Enviar por SMTP 
$mail->Host = "mail.dueeme.com.br"; 

// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
$mail->Port = 587; 


// Usar autenticação SMTP (obrigatório) 
$mail->SMTPAuth = true; 

// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
$mail->Username = 'estetica@dueeme.com.br'; 
$mail->Password = 'Olecran1.'; 

// Configurações de compatibilidade para autenticação em TLS 
$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 

// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
// $mail->SMTPDebug = 2; 

// Define o remetente 
// Seu e-mail 
$mail->From = "estetica@dueeme.com.br"; 

// Seu nome 
$mail->FromName = "[NOME DA EMPRESA]"; 

// Define o(s) destinatário(s) 
$mail->AddAddress($emailenviar, $nome); 

// Opcional: mais de um destinatário
// $mail->AddAddress('fernando@email.com'); 

// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana'); 
// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 

// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
$mail->IsHTML(true); 

// Charset (opcional) 
$mail->CharSet = 'UTF-8'; 

// Assunto da mensagem 
$mail->Subject = "Redefiniçaõ de Senha"; 

// Corpo do email 
$mail->Body = 'Olá '.$nome.', Tudo bem ? <br><br>

Recebemos uma solicitação para restaurar sua senha de acesso em nosso site.
<br><br>
Digite este código de verificação: '.$codigo.' .
<br><br>
Se você não reconhece está ação, favor ignorar este email.


'; 

// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

$sql_cod = "INSERT INTO codigos( email, codigo ) VALUES ('$emailenviar', '$codigo')";

$result_cod = mysqli_query($conect, $sql_cod);

if($result_cod){
    // Envia o e-mail 
$enviado = $mail->Send(); 




// Exibe uma mensagem de resultado 
if ($enviado) 
{ 
    ?>
    <script type="text/javascript">
        // alert('Ops, solicitação não enviada, tente novamente mais tarde !');
        window.location.assign('../forgot-password/codigo-senha.php');
    </script>
    <?php
    // header('location:'.$link.'');
}
else { 

    ?>
    <script type="text/javascript">
        alert('Ops, solicitação não enviada, tente novamente mais tarde !');
    </script>
    <?php


    // Erro:
    // echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
}

}
else{
    $_SESSION['emailnot'] = true;
    ?>

    <script type="text/javascript">
        window.location.assign('../forgot-password-page.php');
    </script>
    <?php
    // header('../forgot-password-page.php');
    // echo "Erro: ". mysqli_error($conect);
}
}
else{
    echo("ERRO: Código não inserido <br>");
    echo('ERRO'. mysqli_error($conect));
    $_SESSION['emailnot'] = true;
    ?>

    <script type="text/javascript">
        window.location.assign('../forgot-password-page.php');
    </script>
    <?php 
}




?>