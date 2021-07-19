<!-- <script>
  setTimeout(function(){
  window.location.reload(1);
}, 30000);
</script> -->
<!-- Para mostrar os filtros avançados, coloque 'exemplo1' no id da tabela -->
<table id="example1" class="table table-bordered table-striped">
  <thead>

  <tr>
    <th># </th>
    <th>Nome </th>
    <th>Serviço</th>
    <th>Data agendada</th>
    <th>Horário Agendado</th>
    <th>Barbeiro</th>
    <th></th>
  </tr>
  </thead>
  <tbody>

    <?php
    
      if(isset($_POST['filter_day'])){

      // // Recebe a variável do
      // $date_filter = $_POST['filter_day'];

      // $_SESSION['filter_day'] = $date_filter;
      // $date_fil = $_SESSION['filter_day'];
      // echo ("DATA: ". $date_fil);
      // // faz a busca no banco de dados

      }
      else
      {
      
      $conect = include('../../../assets/banco/conection.php');

      // Busca todos os agendamnetos
      $all_age    = "SELECT * FROM agenda";
      $all_result = mysqli_query($conect, $all_age);
      $dados_age  = mysqli_fetch_assoc($all_result);
      
      // Busca o nome do Serviço
      do{
      
      $id_agenda   = $dados_age['id'];  
      
      
      $id_usuario  = $dados_age['id_usuario'];
      $id_barbeiro = $dados_age['id_barbeiro'];
      $id_servico  = $dados_age['id_servico'];

      // Busca o nome do usuário - Inicio
      $nome_cliente = "SELECT id, nome FROM informacoes_usuarios 
      WHERE id = '$id_usuario'";
      $result_nome_cli = mysqli_query($conect, $nome_cliente);
      $nomes = mysqli_fetch_assoc($result_nome_cli);
      // Busca o nome do usuário - Fim

      // Busca o nome do barbeiro - Inicio
      $nome_barbeiro    = "SELECT id, nome FROM barbeiros 
      WHERE id = '$id_barbeiro'";
      $result_nome_barb = mysqli_query($conect, $nome_barbeiro);
      $nomes_barbeiros  = mysqli_fetch_assoc($result_nome_barb);
      // Busca o nome do barbeiro - Fim

      // Busca as informações do agendamentos - Inicio
      $nome_servicos   = " SELECT id, nome_servico FROM servicos 
      WHERE id = '$id_servico'";
      $result_servicos = mysqli_query($conect, $nome_servicos);
      $nome_servicos   = mysqli_fetch_assoc($result_servicos);
      // Busca as informações do agendamentos - Fim
      if(isset($_GET['id'])){

        $id = $_GET['id'];
        $del_age = "DELETE FROM agenda WHERE id = '$id'" ;
        $del_hor = "DELETE FROM horarios_cadastrados WHERE id = '$id'" ;
        $result_hor = mysqli_query($conect, $del_hor);
        $result_del = mysqli_query($conect, $del_age);
        if(!$result_del){
        echo 'Erro:'. mysqli_error($conect);
        }
        else{
          $_GET['id'] = '';

          ?>
          <script type="text/javascript">
            window.location.assign('index.php');
          </script>
          <?php

        }
      }
      
      
      ?>
      <tr>
        <td><?php
        if($dados_age['id'] != NULL)
        {
          echo $dados_age['id'];
        }else{echo('Sem Registros');}?>
          
        </td>
        <td><?php
        if($nomes['nome'] != NULL)
        {
          echo  $nomes['nome'];
        }else{echo('Sem Registros');}?>
          
        </td>
        <td><?php
        if($nome_servicos['nome_servico'] != NULL)
        {
          echo $nome_servicos['nome_servico'];
        }else{echo('Sem Registros');}?>
         </td>
  
        
        <td>
        <?php
        if($dados_age['data_agendada'] != NULL)
        {
          echo date('d/m/Y', strtotime($dados_age ['data_agendada']));
        }else{echo('Sem Registros');}?>
        </td>
        <td>
        <?php
        if($dados_age['hora_agendada'] != NULL)
        {
          echo date('H:i', strtotime($dados_age['hora_agendada']));
        }else{echo('Sem Registros');}?>
          
        </td>
        <td><?php
        if($nomes_barbeiros['nome'] != NULL)
        {
         echo $nomes_barbeiros['nome']; 
        }else{echo('Sem Registros');}?>
        </td>
        <td>
          <?php if($dados_age['id'] != NUll){ ?>
        <a class="btn btn-sm btn-danger" href="index.php?id=<?php echo $id_agenda ?>">Excluir</a> 
        <?php }?></td>
    </tr>
    <?php
    }while($dados_age = mysqli_fetch_assoc($all_result));
  }
  ?>
  </tbody>
  <tfoot>
  <tr>
    <th>#</th>
    <th>Nome </th>
    <th>Serviço</th>
    <th>Data agendada</th>
    <th>Horário Agendado</th>
    <th>Barbeiro</th>
    <th></th>
  </tr>
  </tfoot>
</table>