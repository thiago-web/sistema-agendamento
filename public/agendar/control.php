<?php 
    session_start();
    include('../../assets/banco/control-login.php');
    include('../../assets/banco/conection.php');

    // $nome       = $_POST['nome'];
    $id_usuario = $_SESSION['id'];
    $id_empresa = $_SESSION['id_empresa'];
    $data_dis   = $_SESSION['data_dis'];
    $horario    = $_POST['horario'];
    

    // 1 - 08:00:00
    if($horario == 1){
        $horario = '08:00';
        $_SESSION['horario'] = $horario;
    }
    // 2 - 10:00:00
    if($horario == 2){
        $horario = '10:00';
        $_SESSION['horario'] = $horario;
    }
    // 3 - 12:00:00
    if($horario == 3){
        $horario = '12:00';
        $_SESSION['horario'] = $horario;
    }
    // 4 - 14:00:00
    if($horario == 4){
        $horario = '14:00';
        $_SESSION['horario'] = $horario;
    }
    // 5 - 16:00:00
    if($horario == 5){
        $horario = '16:00';
        $_SESSION['horario'] = $horario;
    }
    // 6 - 18:00:00
    if($horario == 6){
        $horario = '18:00';
        $_SESSION['horario'] = $horario;
    }


    // INSERE OS DADOS DE AGENDAMENTO NO BANCO DE DADOS
    $sql_insert = " INSERT INTO horarios_cadastrados (  id_usuario, id_empresa, data_cad, horario) 
    VALUES ('$id_usuario','$id_empresa','$data_dis','$horario') ";
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
        ?>

    
       <script>
        window.location.assign('../avisos/aviso-nao-agendado.php');
       </script>
       <?php
    }


?>