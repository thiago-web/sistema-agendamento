<?php 
include('control-login.php');	
session_start();
session_destroy();
$_SESSION['notific'] = true;
exit();
?>