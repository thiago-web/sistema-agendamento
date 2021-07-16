<?php 
    session_start();
    include('../../assets/banco/control-login.php');
    include('../../assets/banco/conection.php');

    // ID Usuário - SESSION
    $id_usuario = $_SESSION['id'];

    // ID empresa - SESSION
    $id_empresa = $_SESSION['id_empresa'];

    // ID Barbeiro - SESSION
    $id_barbeiro  = $_SESSION['barber'];

    // ID Serviço - SESSION
    $id_servico = $_SESSION['servico'];

    // Data escolhida - SESSION
    $data_dis   = $_SESSION['data_dis'];

    // Horário escolhido - POST
    $horario    = $_POST['horario'];

    // Cria  a variável horário na SESSION
    $_SESSION['hh'] = $horario;

    // Diferença em Horas
    function Diff_Hours($inicio, $fim)
    {   
        // Entrada
        $entrada = $inicio;
        // Saída
        $saida = $fim;

        $hora1 = explode(":",$entrada);
        $hora2 = explode(":",$saida);
        $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
        $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
        $resultado = $acumulador2 - $acumulador1;
        // Horas
        $hora_ponto = floor($resultado / 3600);
        $resultado = $resultado - ($hora_ponto * 3600);
        // Minutos
        $min_ponto = floor($resultado / 60);
        $resultado = $resultado - ($min_ponto * 60);
        // Segundos
        $secs_ponto = $resultado;
        //Grava na variável resultado final
        $tempo = $hora_ponto."h:".$min_ponto."min:".$secs_ponto."seg";

        return $hora_ponto;
    }

    // Diferença em minutos
    function Diff_Mins($inicio, $fim)
    {   
        // Entrada
        $entrada = $inicio;
        // Saída
        $saida = $fim;

        $hora1 = explode(":",$entrada);
        $hora2 = explode(":",$saida);
        $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
        $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
        $resultado = $acumulador2 - $acumulador1;
        // Horas
        $hora_ponto = floor($resultado / 3600);
        $resultado = $resultado - ($hora_ponto * 3600);
        // Minutos
        $min_ponto = floor($resultado / 60);
        $resultado = $resultado - ($min_ponto * 60);
        // Segundos
        $secs_ponto = $resultado;
        //Grava na variável resultado final
        $tempo = $hora_ponto."h:".$min_ponto."min:".$secs_ponto."seg";

        return $min_ponto;
    }

    // Diferença em segundos
    function Diff_Seg($inicio, $fim)
    {   
        // Entrada
        $entrada = $inicio;
        // Saída
        $saida = $fim;

        $hora1 = explode(":",$entrada);
        $hora2 = explode(":",$saida);
        $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
        $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
        $resultado = $acumulador2 - $acumulador1;
        // Horas
        $hora_ponto = floor($resultado / 3600);
        $resultado = $resultado - ($hora_ponto * 3600);
        // Minutos
        $min_ponto = floor($resultado / 60);
        $resultado = $resultado - ($min_ponto * 60);
        // Segundos
        $secs_ponto = $resultado;
        //Grava na variável resultado final
        $tempo = $hora_ponto."h:".$min_ponto."min:".$secs_ponto."seg";

        return $secs_ponto;
    }

    // echo('Horário:'. $horario);

    $dia_agend = date('d', strtotime($data_dis));
    $dia_atual = date('d');
    $hora_atual = date('H:i:s');
    $dif_horas = Diff_Hours($hora_atual, $horario);
    
            
    if($dia_atual == $dia_agend)
    {
        if($dif_horas < 1)
        {
            $_SESSION['hora_possivel'] = true;
            ?>
           <script>
            history.go(-2);
           </script>
           <?php
        }
        else
        {
            // Insere na agenda do técnico
            $agenda_insert  = " INSERT INTO agenda (id_usuario, id_servico, id_barbeiro, id_empresa, data_agendada, hora_agendada) VALUES ('$id_usuario', '$id_servico', '$id_barbeiro', '$id_empresa', '$data_dis', '$horario')";

            $agenda_result  = mysqli_query($conect, $agenda_insert);

            // Insere os dados no banco de dados
            $sql_insert = " 
            INSERT INTO horarios_cadastrados 
            (id, nome, id_usuario, id_empresa, data_cad, horario, id_barbeiro) 
            VALUES 
            ('NULL','NULL','$id_usuario','$id_empresa','$data_dis','$horario', '$id_barbeiro')
            ";
            // RESGATA O RESULTADO DA QUERY ACIMA
            $result = mysqli_query($conect, $sql_insert);
            
            if($result)
            {
               ?>
               <script>
                window.location.assign('../../whats-app/notify.php');
               </script>
               <?php
            }
            else
            {
                echo("Erro: ". mysqli_error($conect));
                $_SESSION['age_not'] = true;
                ?>
               <script>
                window.location.assign('horarios.php');
               </script>
               <?php
            }
        }
    }
    else
    {
        // Insere na agenda do técnico
        $agenda_insert  = " INSERT INTO agenda (id_usuario, id_servico, id_barbeiro, id_empresa, data_agendada, hora_agendada) VALUES ('$id_usuario', '$id_servico', '$id_barbeiro', '$id_empresa', '$data_dis', '$horario')";

        $agenda_result  = mysqli_query($conect, $agenda_insert);

        // Insere os dados no banco de dados
        $sql_insert = " 
        INSERT INTO horarios_cadastrados 
        (id, nome, id_usuario, id_empresa, data_cad, horario, id_barbeiro) 
        VALUES 
        ('NULL','NULL','$id_usuario','$id_empresa','$data_dis','$horario', '$id_barbeiro')
        ";
        // RESGATA O RESULTADO DA QUERY ACIMA
        $result = mysqli_query($conect, $sql_insert);
        
        if($result)
        {
           ?>
           <script>
            // window.location.assign('../../whats-app/notify.php');
           </script>
           <?php
        }
        else
        {
            echo("Erro: ". mysqli_error($conect));
            $_SESSION['age_not'] = true;
            ?>
           <script>
            window.location.assign('horarios.php');
           </script>
           <?php
        }
    }   
?>