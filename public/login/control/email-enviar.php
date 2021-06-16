<?php
session_start();
include('../../../assets/banco/conection.php');

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





// Dados do usuário
$emailenviar                = $_POST['email-cliente'];
$_SESSION['email_cliente']  = $emailenviar;
$dados_user                 = "SELECT nome, id, id_empresa FROM informacoes_usuarios WHERE email = '$emailenviar'";
$result_user                = mysqli_query($conect, $dados_user);
$user                       = mysqli_fetch_assoc($result_user);
$nome                       = $user['nome'];
$id_user                    = $user['id'];
$_SESSION['id']             = $id_user;
$id_empresa                 = $user['id_empresa'];


// Informações da empresa
$sql_info_empresa = "SELECT id, nome_estabelecimento, telefone, email
                     FROM   empresas WHERE id = '$id_empresa'";
$resul_empresa    = mysqli_query($conect, $sql_info_empresa);
$info_empresa     = mysqli_fetch_assoc($resul_empresa);
// Variáveis da Empresa
$id_empresa       = $info_empresa['id'];
$nome_empresa     = $info_empresa['nome_estabelecimento'];
$telefone_empresa = $info_empresa['telefone'];
$telefone_empresa = to_numero($telefone_empresa);
$telefone_empresa = telefone($telefone_empresa);
$email_empresa    = $info_empresa['email'];

// Emails para quem será enviado o formulário

$destino     = $emailenviar;
$assunto     = " $nome_empresa | Redefinição de senha";
$data_envio  = date('d/m/Y');
$hora_envio  = date('H:i');


$numeros = range(0, 9);
shuffle($numeros);
$id = array_slice($numeros, 1, 6);
$codigo = "";
for ($i = 0; $i < 6; $i++) {
    $codigo .= $id[$i];
}
$codigo = cod($codigo);


// É necessário indicar que o formato do e-mail é html
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From:  ".$nome." <".$emailenviar.">";
//$headers .= "Bcc: $EmailPadrao\r\n";

// Estilização do Campo do Email
// Compo E-mail
$arquivo = "
<style type='text/css'>
body {
margin:0px;
font-family:Verdane;
font-size:12px;
color: #666666;
}
a{
color: #666666;
text-decoration: none;
}
a:hover {
color: #FF0000;
text-decoration: none;
}
</style>
  <html>
      <table class= 'table' width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
        <tr>
            <tr>
               <td width='500'>Nome:$nome</td>
            </tr>
            <tr>
                <td width='320'>E-mail:<b>$emailenviar</b></td>
            </tr>
            <tr>
                <td width='320'>Opções: [escolha] </td>
            </tr>
            <tr>
                <td width='320'>
                
                Mensagem: Olá $nome,

                Recebemos uma solicitação para restaurar sua senha de acesso em nosso site.
                
                Digite este código de verificação: $codigo .
                
                Se você não reconhece está ação, favor ignorar este email.


                Atenciosamente,
                $nome_empresa
                $email_empresa
                $telefone_empresa

                </td>
            </tr>
          </td>
        </tr>
        <tr>
          <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
        </tr>
      </table>
  </html>";

$enviaremail = mail($destino, $assunto, $arquivo, $headers);
if($enviaremail)
{
    $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
    // FAZ O INSERT NA TABELA
    $sql_cod = "INSERT INTO codigos( id_usuario, codigo ) VALUES ('$id_user', '$codigo')";

    $result_cod = mysqli_query($conect, $sql_cod);

    if($result_cod){
        
    }
    else{
        echo("ERRO: Código não inserido <br>");
        echo('ERRO'. mysqli_error($conect));
    }
    header('location:../forgot-password/codigo-senha.php');
} 
else {}
?>