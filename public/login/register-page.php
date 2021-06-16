<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barbearia Cavabar - Registrar-se</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>Barbearia</b> Cavalheiros</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Criar uma nova conta</p>

      <form action="control/register-control.php" method="post">
      <div class="form-group mb-3">
          <div class="form-group-text">
            <span class="fa fa-map-marker" aria-hidden="true"> Selecione o estabelecimento</span>
          </div>
        </div>
        <div class="input-group mb-3">
          <select name="empresa_id" id="" class = form-control>
            <option value="1" class = "form-control">Barberia Cavalheiros</option>
          </select>
          <!-- <input type="text" class="form-control" placeholder="Nome completo" name ="nome-cliente" required> -->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-map-marker" aria-hidden="true"></span>
            </div>
          </div>
        </div>
        <div class="form-group mb-3">
          <div class="form-group-text">
            <span class="fas fa-info-circle"> Informações Pessoais</span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nome completo" name ="nome-cliente" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3"> 
          <input type="text" name="data-nas-cliente" class="form-control" placeholder="Data de Nascimento" required onkeypress="mascaraData( this, event)" maxlength="10">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-week"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="cpf-cliente" class="form-control" placeholder="CPF (Somente os números)" required onkeydown="javascript: fMasc(this, mCPF);" maxlength="14">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="tel-cliente" class="form-control" placeholder="Telefone (Somente os números)" required onkeydown="javascript: fMasc(this, mTel)" maxlength="14" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="cep-cliente" class="form-control" placeholder="CEP (Somente os números)" required onkeydown="javascript:fMasc(this, mCEP);" maxlength="10">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="cidade-cliente" class="form-control" placeholder="Cidade" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="bairro-cliente" class="form-control" placeholder="Bairro" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="rua-cliente" class="form-control" placeholder="Logradouro" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="numero-cliente" class="form-control" placeholder="Número" required onkeydown="javascript: fMasc(this, mNum)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 mb-3">
            <div class="form-group-text">
              <span class="fas fa-sign-in-alt"> Acesso</span>
            </div>
          </div>
          <div class="input-group col-md-12 mb-3">
            <input type="email" class="form-control" name="user-email" placeholder="E-mail" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group col-md-12 mb-3">
            <input type="password" class="form-control" placeholder="Senha" id="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group col-md-12 mb-3">
            <input type="password" class="form-control" placeholder="Digite a senha novamente" id="confirm_password" required name="pass-cliente">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required >
                <label for="agreeTerms">
                 Eu concordo com a <a href="#">Politica de Privacidade</a>
                </label>
              </div>
            </div>
          </div>
          <div class="input-group col-md-12 mb-0">
            <!-- /.col -->
            <div class="form-group col-md-12 ">
              <button type="submit" class="btn btn-primary btn-block " >Registrar</button>
            </div>
            <!-- /.col -->
          </div>
        </div>
        
      </form>

      <!-- <div class="social-auth-links text-center">
        <p>- OU -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Registar usando Facebook <br> (desabilitado)
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Registar usando Google+ <br> (desabilitado)
        </a>
      </div> -->

      <a href="login-page.php" class="text-center">Eu tenho uma conta</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<!-- Função de Confirmar senha -->
<script type="text/javascript">
var password = document.getElementById("password")
, confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("As senhas não confere !");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

function mascaraData( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;
	
	if( kC!=8 && kC!=46 )
	{
		if( data.length==2 )
		{
			campo.value = data += '/';
		}
		else if( data.length==5 )
		{
			campo.value = data += '/';
		}
		else
			campo.value = data;
	}
}
</script>
<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/js/adminlte.min.js"></script>
<!-- Scrip das Mascaras -->
<script type="text/javascript" src="js/mascaras.js"></script>
</body>
</html>
