<?php 
    session_start();
    include('conexao.php');
    require('verifica_login.php');

    
      ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="css/data_esconde.css">
            <!-- <link rel="stylesheet" type="text/css" href="script/bootstrap.min.css"> -->
          <link rel="shortcut icon" href="images/ico.ico" type="image/x-icon">
          <script src="script/mascaras.js"></script>
        </head>
        <body>
          <div class = "container text-center">
            <div class = "container text-center">
                  <h1 class = "display-2">
                    Agenda
                  </h1>
                </div>

              <div class = "form">
              <form action="tabela.php" method="post">
                <div class = "form-row">
                  <div class = "form-group col-md-12">
                    <label for=""> Escolher dia </label>
                    <input  class = "form-control text-center" min="" name = "date_select" id = "date" type="date" value = "" onclick = "" >
                  </div>
                </div>
                <div class = "form-row">
                  
                  <div class = "form-group col-md-12" >
                      <button type="submit" href = "text" class="btn btn-success btn-block is-solid is-link is-defaut  ">Buscar</button>
                  </div>
                    
                  </div>
                </form>
              </div>
              </div>
            </div>

        </body>
      </html>
    
    <script>
    // alert('NÃO POSSUÍMOS MAIS HORÁRIOS PARA ESTE DIA !');
    // history.go(-1);
    </script>
      
    <?php  
    // if($total > 0){
    //   echo "HORÁRIOS DISPONÍVEIS". "<br>";
    // // echo $dado['horario']. ", ";
    //   do{
    //     echo $linha['horario']. ", ";
    //   }while($linha =  mysqli_fetch_assoc($result_query));
    // }  

?>
      

