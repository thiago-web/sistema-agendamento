<?php 
    session_start();
    include('../../assets/banco/control-login.php');
    include('../../assets/banco/conection.php');

    // $nome       = $_POST['nome'];
    $id_usuario = $_SESSION['id'];
    $id_empresa = $_SESSION['id_empresa'];
    $data_dis   = $_SESSION['data_dis'];
    $id_barber  = $_SESSION['barber'];
    $horario    = $_POST['horario'];

    // $hora1 =  date('H:i');

    // $entrada = $hora1;
    // $saida = $horario;
    // $hora1 = explode(":",$entrada);
    // $hora2 = explode(":",$saida);
    // $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
    // $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
    // $resultado = $acumulador2 - $acumulador1;
    // $hora_ponto = floor($resultado / 3600);
    // $resultado = $resultado - ($hora_ponto * 3600);
    // $min_ponto = floor($resultado / 60);
    // $resultado = $resultado - ($min_ponto * 60);
    // $secs_ponto = $resultado;
    // //Grava na variável resultado final
    // $tempo = $hora_ponto.":".$min_ponto.":".$secs_ponto;
    // echo $tempo;


    $_SESSION['hh'] = $horario;

    // INSERE OS DADOS DE AGENDAMENTO NO BANCO DE DADOS
    $sql_insert = " INSERT INTO horarios_cadastrados (id_usuario, id_empresa, data_cad, horario, id_barbeiro) 
    VALUES ('$id_usuario','$id_empresa','$data_dis','$horario', '$id_barber')";
    // RESGATA O RESULTADA DA QUERY ACIMA
    $result = mysqli_query($conect, $sql_insert);
    


    if($result){

       ?>
       
       <script>
        window.location.assign('../../whats-app/notify.php');
       </script>
       <?php
    }
    else{
        echo("Erro: ". mysqli_error($conect));
        $_SESSION['age_not'] = true;
        ?>
       <script>
        window.location.assign('horarios.php');
       </script>
       <?php
    }


?>