<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barbearia Cavalheiros | Entrar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Barbearia</b> Cavalheiros</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Entre com seu Usuário e Senha</p>
      <?php
            if (!empty($_SESSION['erro_values']) && $_SESSION['erro_values'] == true) {
            ?>
              <div class='alert alert-danger' role='alert'>
                <p> <strong>Usuário</strong> ou <strong>Senha</strong> não está preenchido. </p>
              </div>
            <?php
            }
            if (isset($_SESSION['nao_autenticado'])) {
            ?>
              <div class='alert alert-danger' role='alert'>
                <p> <strong>Usuário</strong> ou <strong>Senha</strong> está invalido. </p>
              </div>
            <?php
            }

            unset($_SESSION['nao_autenticado']);
            session_destroy();
            ?>
      <form action="control/login-control.php" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-mail" name="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" name="senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php
            
            if (isset($_SESSION['senha_auterada']) == true) {
            ?>
              <div class='alert alert-success text-center' role='alert'>
                <p> Sua <strong>Senha</strong> foi alterada ! </p>
              </div>
            <?php
            }

            unset($_SESSION['senha_auterada']);
            session_destroy();
            ?>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OU -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>Entrar usando Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Entrar usando Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password-page.php">Esqueci a minha senha</a>
      </p>
      <p class="mb-0">
        <a href="register-page.php" class="text-center">Cadastrar-me</a>
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
</body>
</html>
