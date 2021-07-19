<?php
    session_start();
    include('../../assets/banco/control-login.php');
    $conect = include("../../assets/banco/conection.php");

    $sql_barber    = "SELECT id, nome FROM barbeiros";
    $result_barber = mysqli_query($conect, $sql_barber);
    $linhas = mysqli_num_rows($result_barber);    
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
    	<meta charset="gb18030">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Barbearia Cavalheiros</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="css/bulma.min.css"/>
        <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/data_esconde.css">
        <link rel="shortcut icon" href="../../assets/images/ico.ico" type="image/x-icon">

        <script src="script/mascaras.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- <link rel="stylesheet" type="text/css" href="script/str.css.bootstrap.min.css"> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">

        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../../aseets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
        <!--  -->
        
        <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'/>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
         <!-- <link rel="stylesheet" type="text/css" href="script/bootstrap.min.css"> -->
        <link rel="shortcut icon" href="../../assets/images/ico.ico" type="image/x-icon">
        <script src="script/mascaras.js"></script>

        <script>
        function d(){
        var semana = ["Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado"];
        var d = document.getElementById("date").value;
        var dd = semana[d.getDay()];
        alert(dd);}
        </script>
  
    </head>
<style>
      #no-spin::-webkit-inner-spin-button {-webkit-appearance: none;}

      input[type="date"] {
      position: relative;
      padding: 4px;
      }
          
      input[type="date"]::-webkit-calendar-picker-indicator {
      color: transparent;
      background: none;
      z-index: 1;
      }

      input[type="date"]:before {
      color: transparent;
      background: none;
      display: block;
      font-family: 'FontAwesome';
      content: '\f073';
      width: 15px;
      height: 20px;
      position: absolute;
      top: 0px;
      right: 6px;
      color: #999;
      }
      body{
        background-color:;
      }

    </style>
    <body >
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../../assets/images/logo.jpg" alt="Logo" 
        height="145" width="145">
      </div>
      <div>
        <nav  class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;"><!-- navbar  navbar-light bg-light -->
            <!-- <a class="navbar-brand" href="index.php" target="blank">lPágina Inicia</a> -->
            <a class="navbar-brand-light " href="http://teleson.net.br/" target="blank">
              <img src="../../assets/images/logo.jpg" width="50" height="50" class="d-inline-block " alt="">
                  Barbearia Cavalheiros
              </a>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button> -->
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>
            </div>
            <button class = "btn btn-success" onclick = "window.location.href = '../../assets/banco/logout.php'" > Sair
            </button>
          </nav>
        </div>

      <div class = "container text-center">
          <h1 class = "display-3">
           Informações de Agendamento
          </h1>
        </div>
        <div class = "container">
          <?php
              
              if($_SESSION['hora_possivel'] == true)
              {
                ?>
                <div class='alert alert-danger text-center' role='alert'>
                  <p> <strong> Agendamento não concluído:</strong> <br> Muito cedo para agendar este horário, escolha outro. </p>
                </div>
              <?php
              unset($_SESSION['hora_possivel']);
              }
              ?>
          <?php
          if ($_SESSION['domingo'] == true)
          {
            ?>
            <div class='alert alert-danger text-center' role='alert'>
              <p> <strong> Agendamento não concluído: </strong> Não trabalhamos aos domingos!</p>
            </div>
          <?php
            unset($_SESSION['domingo']);
          }
          ?>
          <?php 
          if($_SESSION['notific_not'] == TRUE){
            ?>
              <div class='alert alert-primary text-center' role='alert'>
                <p> <strong>Agendamento Concluído</strong> </p>
              </div>
              <div class='alert alert-warning text-center' role='alert'>
                <p> <strong>Observação: </strong> Logo enviaremos uma noticação no seu 
                  <strong style="font-color:green;">WhatsApp ! </strong></p>
              </div>
            <?php

            unset($_SESSION['notific_not']);
          }
        ?>
        <div class = "form" id = "here" >
          <form method = "POST" action = "horarios.php" id = "form" name = "form" onchange="mySubmit(this.form)">
            <div class = "form-row">
             <!--  <div class = "form-group col-md-6">
                <label for="InputNome"> Nome Completo </label>
                <input class = "form-control" type="text" name = "nome_cliente" placeholder = "Digite o seu Nome " required = "required" id = "texto">
              </div> -->
              <div class="form-group col-md-12 mb-3">
            
                <div class="form-group-text">
                  <label class="" aria-hidden="true"> Selecione o Barbeiro</label>

                </div>

                <select name="barber" id="" class = form-control required="">
                  <option selected="selected" value="">Escolha...</option>
                  <?php

                  while ($barbeiro = mysqli_fetch_assoc($result_barber)){
  
                  ?>
                  <option class = "form-control" value="<?php echo ($barbeiro['id']);?>">
                    <?php echo $barbeiro['nome']; ?>
                  </option>
                  <?php }?>
                </select>
                <!-- <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-user" aria-hidden="true"></span>
                  </div>
                </div> -->
              </div>
              <div class="form-group col-md-12 mb-3">
            
                <div class="form-group-text">
                  <label class="" aria-hidden="true"> Selecione o Serviço</label>

                </div>

                <select name="servico" id="" class = form-control required="">
                  <option selected="selected" value="">Escolha...</option>
                  <?php

                  $sql_service    = "SELECT id, nome_servico, valor_servico, tempo_servico FROM servicos";
                  $result_service = mysqli_query($conect, $sql_service);
                  $rows = mysqli_num_rows($result_service);
                  if ($rows > 0) {

                  while ($servico = mysqli_fetch_assoc($result_service))
                  {
                    
                  ?>
                  <option class = "form-control" value="<?php echo ($servico['id']);?>">
                    <?php echo $servico['nome_servico'] . " - R$". $servico['valor_servico']. " - ".$servico['tempo_servico']." minutos"; ?>
                      
                    </option>
                  <?php
                  }
                  ?>
                </select>
                <!-- <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-user" aria-hidden="true"></span>
                  </div>
                </div> -->
              </div>
              <div class = "form-group col-md-12 mb-3">
                <label for="InputData"> Estou disponível no dia: </label>
                <input class = "form-control" type="date" id = "no-spin" onchange = "" 
                name = "data_cliente"  required = "required">
                
            </div>
          </div>
            

            
          <div class = "form-row">
            <div class="form-group col-md-12 mb-3">
              <button type="submit" href = "text" class="btn btn-success btn-block is-solid is-link is-defaut  ">Verificar Disponibilidade</button>
            </div>
          </div>      
      </div>
          
          </form>
        </div>
      </div>
      <script type="text/javascript">
      $(document).ready(function () {

        window.setTimeout(function() {
          $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
              $(this).remove(); 
          });
        }, 5000);

        });
      </script>  
      <script>
        $(function () {
          $('.dropdown-toggle').dropdown();
        }); 
      </script>

      <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("data_cliente")[0].setAttribute('min', today);
      </script>

      <script>
      $(document).ready(function() {
      $('#texto').bind('cut copy paste', function(event) {
              event.preventDefault();
          }); 
      });

    </script>
    
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
      }, 5000);
       
      });
    </script>
    </body>
</html>
<?php
}

?>


