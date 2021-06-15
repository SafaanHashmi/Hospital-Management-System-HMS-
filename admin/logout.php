<?php 
	session_start();
	unset($_SESSION['ADMIN_LOGIN']);
	unset($_SESSION['ADMIN_NAME']);
	session_destroy();
	header('location:login.php');
?>