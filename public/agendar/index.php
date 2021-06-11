<?php
    session_start();
    include('../../assets/banco/control-login.php');
      ?>
      <!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<meta charset="gb18030">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Barbearia Cavalheiros</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- <link rel="stylesheet" type="text/css" href="script/str.css.bootstrap.min.css"> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
        <!-- <script type="text/javascript" src="script/v.bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
        <!-- <link rel="stylesheet" type="text/css" href="script/bootstrap.min.css">
        <script type="text/javascript" src="script/js.bootstrap.min.js"></script>
        <script type="text/javascript" src="script/stackpath.bootstrap.min.js" 
        integrity = "sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
        crossorigin = "anonymous"></script> -->
        <!-- <link rel="stylesheet" type="text/css" href="script/netdna.bootstrap.min.css" > -->
        <link rel="stylesheet" href="css/bulma.min.css"/>
        <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'/>
        <link rel="stylesheet" href="../../assets/css/data_esconde.css">
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
     <script language="JavaScript">
      function protegercodigo()
        {
            if (event.button==2||event.button==3)
            {
              alert('CÓDIGO PROTEGIDO !');
            }
        }
        document.onmousedown=protegercodigo
    </script>
    

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
    </style>
    <body >
      <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light"><!-- navbar  navbar-light bg-light -->
          <!-- <a class="navbar-brand" href="index.php" target="blank">lPágina Inicia</a> -->
          <a class="navbar-brand-light " href="http://teleson.net.br/" target="blank">
            <img src="img/download.ico" width="50" height="50" class="d-inline-block " alt="">
                Barbearia Cavalheiros
            </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              </div>
                  <button class = "btn btn-success" onclick = "window.location.href = '../../assets/banco/logout.php'" > Sair
                  </button>
              </div>
            </ul>
          </div>
        </nav>
      </div>

      <div class = "container text-center">
          <h1 class = "display-2">
           Informações de Contato
          </h1>
        </div>
        <br><br>
        <div class = "container">
        <div class = "form" id = "here" >
          <form method = "POST" action = "horarios.php" id = "form" name = "form" onchange="mySubmit(this.form)">
          <div class = "form-row">

            <div class = "form-group col-md-6">
              <label for="InputNome"> Nome Completo </label>
              <input class = "form-control" type="text" name = "nome_cliente" placeholder = "Digite o seu Nome " required = "required" id = "texto">
            </div>

            <div class = "form-group col-md-6">
            <label for="InputData"> Disponível no dia: </label>
              <input class = "form-control" type="date" id = "no-spin" onchange = "d()" name = "data_cliente"  required = "required">
            </div>
           
        </div>      
          </div>
          <div class = "form-row">
            <button type="submit" href = "text" class="btn btn-success btn-block is-solid is-link is-defaut  ">Verificar Disponibilidade</button>
          </div>
          </form>
        </div>
      </div>
      
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
    
    
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
    </body>
</html>

