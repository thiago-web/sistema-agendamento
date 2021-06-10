<?php 
if(!$_SESSION['usuario']) {
	header('location:../../public/login/login-page.php');
	exit();
}
?>