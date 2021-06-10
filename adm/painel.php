    <?php
    session_start();
    //include('verifica_login.php');
    include('conexao.php');
    require('verifica_login.php');
    $usuario = $_SESSION['usuario'];
    $SQL     = "SELECT acesso FROM usuarios WHERE usuario = '$usuario'";
    $result  = mysqli_query($conexao, $SQL);
    $dado    = mysqli_fetch_assoc($result);
    if($dado['acesso'] == '1')
    {
      ?>
      <script>
       
      </script>
    <?php
    }
    // if($dado['acesso'] == '12')
    // {
    //   echo "<br>". "Voce tem acesso ao Curso 01 e Curso 02 ";
    //   ?><!--<script> alert('Você tem acesso ao Curso 01 e Curso 02') ;</script>--><?php
    // }
    ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<meta charset="gb18030">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Barbaria Cavalheiros's</title>
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
         <!-- <link rel="stylesheet" type="text/css" href="script/bootstrap.min.css"> -->
        <link rel="shortcut icon" href="../public/images/ico.ico" type="image/x-icon">
        
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
    <body >
    
        <!-- <div id="nav" class = "box"> -->
            <!--<h1> Olá,  <?php echo $_SESSION['usuario'];?></h2><br>-->
           
                <nav class="navbar navbar-expand-lg navbar-light bg-light"><!-- navbar  navbar-light bg-light -->
                  
                  <!-- <a class="navbar-brand" href="index.php" target="blank">lPágina Inicia</a> -->
                  
                    <a class="navbar-brand-light " href="www.homecarehigienzacao.com.br" target="blank">
                      <img src="images/logo.jpg" width="50" height="50" class="d-inline-block " alt="">
                          Barbearia Cavalheiro's
                      </a>
                 
                  
                  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button> -->
                  
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <!-- <li class="nav-item active">
                            <a class="nav-link" href="../cpf/info_ordens.php" target="vai" >Consultas  <span class="sr-only">(current)</span></a>
                        </li> -->
                          <li class="nav-item">
                              <a class="nav-link " target = "_blank" href="agenda.php">Agenda</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link " target = "_blank" href="../public/index.php">Novo Agendamento</a>
                          </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" style = "display:;"  id="c1" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                                Nome do Curso 01
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    <a class="dropdown-item" style = "font-size: 14px;" href="videos/sosick-ne-yo.mp4" target="vai">Aula 01</a>
                                    <a class="dropdown-item" style = "font-size: 14px;" href="videos/.php" target="vai">Aula 02</a>
                                    <!-- <a class="dropdown-item" href="videos/.php" target="vai">Aula 03</a>
                                    <a class="dropdown-item" href="videos/.php" target="vai">Aula 04</a>
                                    <a class="dropdown-item" href="videos/.php" target="vai">Aula 05</a>
                                <div class="dropdown-divider">                                
                                </div>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                   
                          
                        
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" style = "display:;" href="" id="curso2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                              Nome do Curso 02
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                  <a class="dropdown-item" style = "font-size: 14px;" href="videos/.mp4" target="vai">Aula 01</a>
                                  <a class="dropdown-item" style = "font-size: 14px;" href="videos/.mp4" target="vai">Aula 02</a>
                                  <!-- <a class="dropdown-item" href="videos/.php" target="vai">Aula 03</a>
                                  <a class="dropdown-item" href="videos/.php" target="vai">Aula 04</a>
                                  <a class="dropdown-item" href="videos/.php" target="vai">Aula 05</a> 
                              <div class="dropdown-divider">                                
                              <!-- </div>
                                <a class="dropdown-item" href="#">Something else here</a>
                              </div> 
                          </li> -->
                          
                          <li class="nav-item">
                              <a class="nav-link " href="logout.php">Sair</a>
                          </li>

                        
                    </ul>
                   <!--  <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Procurar">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
                    </form> -->
                  </div>
                </nav>
            <!-- </div> -->
            

            

            <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
            <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
            <script>
              $(function () {
                $('.dropdown-toggle').dropdown();
              }); 
            </script>

            <div class = "embed-responsive embed-responsive-16by9  " > <!-- col-xs-12 col-sm-6 col-md-8 -->

                <iframe class="embed-responsive-item" name="vai" src="" frameborder="0"  style="border: 0; width: 100%; height: 100%" allowfullscreen></iframe>
            </div>
    </body>
</html>