<?php
	require('connection.inc.php');
	require('functions.inc.php');
	
	unset($_SESSION['PATIENT_LOGIN']);
	unset($_SESSION['PATIENT_ID']);

	header('location:selectlogin.php');
	die();
?>