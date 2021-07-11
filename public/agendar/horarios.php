<?php 
    session_start();
    include('../../assets/banco/conection.php');
    include('../../assets/banco/control-login.php');

    $data_dis   = $_POST['data_cliente'];
    $barber     = $_POST['barber'];
    $servico    = $_POST['service'];


    $dom = date('w', strtotime($data_dis));
    $hora_atual = date('H:i:s');

    /**
   * @param $dateStart - Data inicial
   * @param $dateEnd - Data final
   * @param $format  - Formato esperado de saida
   * %Y Anos, %m Meses, %d Dias, %H Horas, %i Minutos, %s Segundos - Tipos de Saídas

   */
  function dateDiff( $dateStart, $dateEnd, $format = '%a' ) {
      $d1     =   new DateTime( $dateStart );
      $d2     =   new DateTime( $dateEnd );
      //Calcula a diferença entre as datas
      $diff   =   $d1->diff($d2, true);   
      //Formata no padrão esperado e retorna
      return $diff->format( $format );
    }
    $date =  '2021-07-10 21:00:00';
    $dif = dateDiff($date, $hora_atual, '%H:%i:%s');
    
    echo "Data escolhida: " .$date ."<br>";
    echo "Data Atual: " . $hora_atual ."<br>";
    echo "Diferença: ". $dif;
      
    if($dom == 0){
      ?>
    <script>
      alert('NÃO POSSUÍMOS MAIS HORÁRIOS PARA ESTE DIA !');
      history.go(-1);
    </script>
      
    <?php  

    }else{


    
    $_SESSION['data_dis']  = $data_dis;
    $_SESSION['barber']    = $barber;
    $_SESSION['servico']   = $servico;

    // Informações dos horários disponiveis pela data escolhida
    $sql = "SELECT p.* FROM (SELECT '$data_dis' data_cad, horario,id FROM horarios_possiveis) p LEFT JOIN horarios_cadastrados c on p.horario=c.horario AND p.data_cad=c.data_cad WHERE c.data_cad is null";
    $result_query = mysqli_query($conect, $sql);
    $linha = mysqli_fetch_assoc($result_query);
    $total = mysqli_num_rows($result_query);
    
    // Informações do Barbeiro
    $sql_barber  =  "SELECT id, nome FROM barbeiros WHERE id = '$barber'";
    $result_barb =  mysqli_query($conect, $sql_barber);
    // Informações do serviço
    // $sql_servico = "SELECT id, nome_servico,"

    if($total != 0){
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
          
          <link rel="stylesheet" href="css/bulma.min.css"/>
          <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'/>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="css/data_esconde.css">
          
          <link rel="shortcut icon" href="../../assets/images/ico.ico" type="image/x-icon">

          <script src="script/mascaras.js"></script>
        </head>
        <body>
          <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light"><!-- navbar  navbar-light bg-light -->
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
          <div class = "container text-center ">
            <div class = " text-center mb-5">
                  <h1 class = "display-2">
                    Horários Disponíveis
                  </h1>
                </div>
              <?php

              if (isset($_SESSION['age_not'])) 
              {
                ?>
                <div class='alert alert-danger text-center' role='alert'>
                  <p> <strong> Agendamento não concluído</strong> <br> tente novamente. </p>
                </div>
              <?php
                unset($_SESSION['age_not']);
              }
              ?>
              <div class = "form">
              <form action="control.php" method="post">
                <!-- <div class = "form-row">
                  <div class = "form-group col-md-4">
                    <label for=""> Data Selecionada </label>
                    <input readonly class = "form-control text-center" min=""   id = "date" type="text" value = "<?php echo  date('d/m/Y',strtotime($linha['data_cad'])); ?>" 
                    onclick = "alert('PARA ALTERAR, CLIQUE NO BOLTÃO ( VOLTAR )');" >
                  </div>
                  <div class = "form-group col-md-4">
                    <?php while($barbeiro = mysqli_fetch_assoc($result_barb)){?>
                    <label for=""> Com o: </label>
                    <input readonly class = "form-control text-center" min=""   id = "date" type="text" value = "<?php echo  $barbeiro['nome'] ; ?>" 
                    onclick = "alert('PARA ALTERAR, CLIQUE NO BOLTÃO ( VOLTAR )');" >
                  <?php }?>
                  </div>
                  <div class = "form-group col-md-4">
                    <label for=""> Valor : </label>
                    <input readonly class = "form-control text-center" min=""   id = "date" type="text" value = "<?php echo  $servico ; ?>"
                    onclick = "alert('PARA ALTERAR,  CLIQUE NO BOLTÃO ( VOLTAR )');" >
                  </div>
                </div> -->
                <div class="form-row">
                  <div class = "form-group col-md-12">
                    <!-- <label for=""> Horários Disponíveis</label> -->
                    <select class = "form-control text-center" name="horario" id="">
                      <?php
                       do{ ?>
                      <option class = "" value="<?php echo date('H:i:s', $linha['horario']); ?>">
                      <?php  echo date('s:i', $linha['horario']); ?></option>
                      <?php }while($linha = $conexao = mysqli_fetch_assoc($result_query)); ?>
                    </select>
                  </div>
                </div>
                <div class = "form-row">
                  <div class = "form-group col-md-6 mb-5">
                      <button type="button" href = "" onClick="history.go(-1)" class="btn btn-danger btn-block is-solid is-link is-defaut  ">Voltar</button>
                  </div>
                  <div class = "form-group col-md-6" >
                      <button type="submit" href = "text" class="btn btn-success btn-block is-solid is-link is-defaut  ">Agendar</button>
                  </div>
                    
                  </div>
                </form>
              </div>
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
        </body>
      </html>
    <?php
    }
else{
  
  ?>
    <script>
    alert('NÃO POSSUÍMOS MAIS HORÁRIOS PARA ESTE DIA !');
    history.go(-1);
    </script>
      
    <?php  
    // if($total > 0){
    //   echo "HORÁRIOS DISPONÍVEIS". "<br>";
    // // echo $dado['horario']. ", ";
    //   do{
    //     echo $linha['horario']. ", ";
    //   }while($linha =  mysqli_fetch_assoc($result_query));
    // }  
}
}
?>
      

