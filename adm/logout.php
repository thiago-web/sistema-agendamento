<?php
//ESTABABELECEMOS A SESSÃO
session_start();
//DESTRUIMOS A SESSÃO
session_destroy();
//ENCAMINHAMOS PARA O INDEX
header('Location: index.php');
exit();