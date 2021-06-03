<?php
	session_start();
	$con=mysqli_connect("localhost","root","","hms");
	
	define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/HMS/');
	define('SITE_PATH','http://localhost/HMS/');
	
	define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/uploads/doctors_image/');
	define('PATIENT_IMAGE_SERVER_PATH',SERVER_PATH.'/uploads/patients_image/');
	define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'uploads/doctors_image/');
	define('PATIENT_IMAGE_SITE_PATH',SITE_PATH.'uploads/patients_image/');
?>