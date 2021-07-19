<?php session_start();  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barbearia Cavalheiros | Solicitar nova Senha</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../aseets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../assets/images/logo.jpg" alt="Logo" 
    height="145" width="145">
  </div>
<div class="login-box">
  <div class="login-logo">
      <a href=""> <strong> Sistema de Agendamento</strong> <br>Barbearia Cavalheiros</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <?php

      if (isset($_SESSION['emailnot'])) 
      {
        ?>
        <div class='alert alert-danger text-center' role='alert'>
          <p> <strong>Email não cadastrado </strong> <br> no banco de dados. </p>
        </div>
      <?php
        unset($_SESSION['emailnot']);
        session_destroy();
      }
      ?>
      <p class="login-box-msg">Você esqueceu sua senha? Aqui você pode facilmente criar uma nova senha.</p>

      <form action="email/email.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name= "email-cliente" placeholder="E-mail">
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
      <p class="mb-0">
        <a href="register-page.php" class="text-center">Criar um nova conta</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/js/adminlte.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 2000);
 
});
</script>
</body>
</html>
