<?php 
session_start();

$email   = $_SESSION['email_cliente'];

?>
<!DOCTYPE html>
<html lang="pt-br">
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
      <p class="login-box-msg"> Enviamos um código de verificação no seu e-mail: <?php echo ($email) ?></p>
      
      <form action="control/cod_ver.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control text-center" name= "codigo" minlength = "6" maxlength = "8" placeholder="Código" id="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php
            if (isset($_SESSION['codigo_error'])) {
            ?>
              <div class='alert alert-danger text-center' role='alert'>
                <p> <strong>Código</strong> invalido. </p>
              </div>
            <?php
            }

            unset($_SESSION['codigo_error']);
            ?>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Verificar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="../login-page.php">Entrar</a>
      </p> 
      <p class="mb-0">
        <a href="../register-page.php" class="text-center">Criar um nova conta</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- Formata o campo do código -->
<script>
function campo_cod( campo, e )
			{
				var kC = (document.all) ? event.keyCode : e.keyCode;
				var data = campo.value;
				
				if( kC!=8 && kC!=46 )
				{
					if( data.length==3 )
					{
						campo.value = data += '-';
					}
					
				}
			}
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

?>
