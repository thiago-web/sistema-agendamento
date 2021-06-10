<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Barbearia Cavalheiro's</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/bulma.min.css" />
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="shortcut icon" href="../public/images/ico.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
    </head>
    <body>
        <section class="hero is-success is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <h3 class="title has-text-grey">Agendamentos</h3>
                        <h3 class="title has-text-grey"><a href="https://www.facebook.com/cavabarbearia"   target="_blank">Barbearia Cavalheiro´s </a></h3>
                        <?php
                        if(isset($_SESSION['nao_autenticado'])):
                        ?>
                        <div class="notification is-danger">
                            <p>Erro: Usuário ou Senha inválidos.</p>
                            </div>
                            <?php
                            endif;
                            unset($_SESSION['nao_autenticado']);
                            ?>
                            <div class="box">
                                <form action="login.php" method="POST">
                                    <div class="field">
                                        <div class="control">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="usuario" class="form-control" placeholder="Usuário" aria-label="Usuário" aria-describedby="basic-addon1">
                                            </div>
                                    
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2">$ </span>
                                                </div>
                                                <input type="password" name="senha" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby= "basic-addon2">
                                                
                                            </div>
                                        <button type="submit" class="btn btn-primary btn-block is-solid is-link is-defaut  ">Entrar</button>
                                    </div>         
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
    </body>
</html>