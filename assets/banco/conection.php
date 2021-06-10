<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$banco = "bd_cavabar";

$conect = mysqli_connect($host, $user, $pass, $banco);

return $conect;
