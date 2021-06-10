<?php 
    session_start();
    include('conexao.php');
    require('verifica_login.php');
    $DIA = $_POST['date_select'];
    $sql = "SELECT * FROM horarios_cadastrados WHERE data_cad = '$DIA' ORDER BY horario ASC  ";
    $result_query = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_assoc($result_query);
    // $total = mysqli_num_rows($result_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
          <!-- <link rel="stylesheet" type="text/css" href="script/str.css.bootstrap.min.css"> -->
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>        
          <link rel="stylesheet" href="css/bulma.min.css"/>
          <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'/>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="css/data_esconde.css">
            <!-- <link rel="stylesheet" type="text/css" href="script/bootstrap.min.css"> -->
          <link rel="shortcut icon" href="images/ico.ico" type="image/x-icon">
          <script src="script/mascaras.js"></script>
</head>
<body>
    <div class = "table">
    <table class="table table-striped">
  <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data </th>
      <th scope="col">Horário</th>
    </tr>
  </thead>
  <tbody>
  <?php // if($total > 0){?>
    <tr>
    <?php do{ ?>
      <!-- <th scope="row"><?php// echo $linha['id']; ?></th> -->
      <td><?php echo  $linha['nome']; ?></td>
      <td><?php echo  $linha['email']; ?></td>
      <td><?php echo  $linha['telefone']; ?></td>
      <td><?php echo  date('d/m/Y', strtotime($linha['data_cad'])); ?></td>
      <td><?php echo  $linha['horario']; ?></td>

      
    </tr>
    <?php }while($linha =  mysqli_fetch_assoc($result_query)); ?>
    <?php// } ?>
  </tbody>
</table>
<button type="button" href = "" onClick="history.go(-1)" class="btn btn-danger btn-block is-solid is-link is-defaut  ">Voltar</button>

    </div>
</body>
</html>

<?php  
    // if($total > 0){
    //   echo "HORÁRIOS DISPONÍVEIS". "<br>";
    // echo $dado['horario']. ", ";
    //   do{
    //     echo $linha['horario']. ", ";
    //   }while($linha =  mysqli_fetch_assoc($result_query));
    // }  

?>