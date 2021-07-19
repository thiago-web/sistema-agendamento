<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SwS | Barbearia Cavalheiros</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../../assets/images/logo.jpg" alt="Logo" 
    height="145" width="145">
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Suporte</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       <li class="nav-item d-none d-sm-inline-block">
        <a href="../../../assets/banco/logout.php" class="nav-link">Sair</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cavalheiros</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->
      <hr>
      <!-- SidebarSearch Form -->

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Procurar" aria-label="Procurar">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Agendamentos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todos os Agendamentos</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Análise de Vendas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../../assets/pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Análise Semanal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../../assets/pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Análise Mensal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../../assets/pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Análise Anual</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Agendamentos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Agendamentos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Todos os agendamentos</h3> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form">
                  <form>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Filtrar dia:</label>
                        <input class="form-control" type="date" name="filter_day" onchange="form.submit();">
                      </div>
                    </div>
                  </form>
                </div>
                <!-- Para mostrar os filtros avançados, coloque 'exemplo1' no id da tabela -->
                <table id="example1" class="table table-bordered table-striped">
                    
                        <thead>

                        <tr>

                          <th>Nome </th>
                          <th>Serviço</th>
                          <th>Data agendada</th>
                          <th>Horário Agendado</th>
                          <th>Barbeiro</th>
                          <th>-</th>
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

                            ?>
                            <tr>

                              <td><?php echo  $nomes['nome'];?>  </td>
                              <td><?php echo $nome_servicos['nome_servico'];?></td>
                              
                              <td><?php echo date('d/m/Y', strtotime($dados_age ['data_agendada']));?></td>
                              <td><?php echo date('H:i', strtotime($dados_age['hora_agendada']));?></td>
                              <td><?php echo $nomes_barbeiros['nome'];?></td>
                              <td><button class="btn btn-sm btn-danger" onclick="<?php 
                              $del_age = 
                               ?>" >Excluir</button> </td>
                          </tr>
                          <?php
                          }while($dados_age = mysqli_fetch_assoc($all_result));
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Nome </th>
                          <th>Serviço</th>
                          <th>Data agendada</th>
                          <th>Horário Agendado</th>
                          <th>Barbeiro</th>
                        </tr>
                        </tfoot>

                     
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versão</b> 1.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> </strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../assets/plugins/jszip/jszip.min.js"></script>
<script src="../../../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
