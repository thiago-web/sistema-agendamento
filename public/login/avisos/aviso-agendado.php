<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Barbearia Cavalhers - Agendado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="css/bulma.min.css"/>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/ico.ico" type="image/x-icon">
    
    
</head>
<style>
    body{
        font-color: white;
        backgroup-color: black;
    }
    .configdiv 
    {
        padding: 200px;
    }
</style>
<body>
    <div class = "container text-center ">  
        <div class="alert alert-success" role="alert">
            <h1 class = "alert-heading"> AGENDAMENTO CONCLUÍDO </h1>
            <hr>
            <p> Não se esqueça da máscara !</p>    
        </div>   
    </div>
    <script>
        setTimeout(function() {
        window.location.href = "https://www.facebook.com/cavabarbearia";
        }, 3000);
    </script>
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
</body>
</html>
<?php session_destroy();?>