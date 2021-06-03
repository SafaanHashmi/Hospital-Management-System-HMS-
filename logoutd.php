<?php
	require('connection.inc.php');
	require('functions.inc.php');
	
	unset($_SESSION['DOCTOR_LOGIN']);
	unset($_SESSION['DOCTOR_ID']);

	header('location:selectlogin.php');
	die();
?>