<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barbearia Cavalheiros | Solicitar nova Senha</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../../aseets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Barbearia</b> Cavalheiros</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Você esqueceu sua senha? Aqui você pode facilmente recuperar uma nova senha.</p>

      <form action="new-senha.php" method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" name= "new-password" placeholder="Nova senha" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name= "new-password-confirm" placeholder="Confirmar nova senha" id = "confirm_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Solicitar Nova Senha</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login-page.php">Entrar</a>
      </p>
      <!-- <p class="mb-0">
        <a href="register-page.php" class="text-center">Criar um nova conta</a>
      </p>
    </div> -->
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script type="text/javascript">
  var password = document.getElementById("password")
, confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("As senhas não são iguais !");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
<!-- jQuery -->
<script src="../../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../assets/js/adminlte.min.js"></script>
</body>
</html>
<?php 
session_start();
// Recebe a variável da session
$id_usuario = $_SESSION['id'];
echo ($id_usuario);
if(isset($confirm_new_senha)){
// Declara as variáveis
$new_senha = $_POST['password'];
$confirm_new_senha = $_POST['confirm_password'];
$confirm_new_senha = md5($confirm_new_senha);

// Faz o update da senha
$sql_update = "UPDATE usuarios SET senha = '$confirm_new_senha' WHERE id_usuario = '$id_usuario'";
$result_up  = mysqli_query($conect, $sql_update);

if (!$result_up) {
  echo "Erro: ". mysqli_error();
}
}

?>