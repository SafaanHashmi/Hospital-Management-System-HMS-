<?php
	require('connection.inc.php'); 
	require('functions.inc.php'); 
	$msg='';
	if(isset($_POST['submit']))
	{
		$user=get_safe_value($con,$_POST['username']);
		$pass=get_safe_value($con,$_POST['password']);
		$sql="SELECT * FROM admin_login WHERE username='$user' AND password='$pass'";
		$res=mysqli_query($con,$sql);
		$count=mysqli_num_rows($res);
		
		if($count>0)
		{
			$_SESSION['ADMIN_LOGIN']='yes';
			$_SESSION['ADMIN_NAME']=$user;
			header('location:index.php');
			die();
		}
		else
		{
			$msg="Please enter valid username and password";
		}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Hospital Admin Login</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  
    <!-- Favicons -->
  <link href="img/title-logo.png" rel="icon">
  <link href="img/title-logo.png" rel="apple-touch-icon">
  
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
    <!--    <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label> -->
        <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Login"></input>
    <!--    <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
      </div>
    </form>
	<div style="color:red;margin-top:15px; text-align:center"> <?php echo $msg ?> </div>
	  <!--
    <div class="text-right">
      <div class="credits">
        
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div> -->
  </div>

</body>
</html>
