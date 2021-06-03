<!-- HSOPITAL MS FRONT WEBSITE-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Page Hospital</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
   <style>
	@media (max-width: 600px) {
	  .hide-when-narrow {
		display: none;
	  }
	}
	@media (min-width: 601px) {
	  .hide-when-wide {
		display: none;
	  }
	}
  </style>
  
</head>

<body>

	<!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="top:0px">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo mr-auto"><!--<img src="assets/img/logo.png" alt="">--><h3 style="margin-bottom: 0px;color: #4a4747;"><span class="hide-when-narrow">H.M.S. Hospital</span> <span class="hide-when-wide">H.M.S.</span></h3></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="departments.php">Departments</a></li> 
          <li><a href="doctors.php">Doctors</a></li>
          <!-- <li class="drop-down"><a href="">Drop Down</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Deep Drop Down</a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
          <li><a href="contactus.php">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="selectlogin.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Login/Register</a>

    </div>
  </header><!-- End Header -->
  
  

  <main id="main" class="mt-5">
    
	<!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Login </h2>
          <!--<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">

          <div class="col-lg-6 col-md-6">
            <div class="box featured" data-aos="fade-up" data-aos-delay="100">
              <h3>Login As</h3>
              <h4>DOCTOR</h4>
			  <form action="#" method="post" id="login-form" class="php-email-form">
				  <div class="form-row">
					<div class="col-sm-6 form-group">
					  <i class="ri-user-fill" style="float: left;margin-left: 20px;"></i>
					  <label style="float: left;margin-left: 2px;"> Enter Email </label>
					</div>
					<div class="col-sm-6 form-group">
					  <input type="text" name="doctor_email" class="form-control" id="doctor_email" placeholder="Your Email / Registration No."/>
					  <span style="color:red;" id="doctor_email_error"></span>
					  <div class="validate"></div>
					</div>
				  </div>
				  <div class="form-row">
					<div class="col-sm-6 form-group">
					  <i class="ri-lock-fill" style="float: left;margin-left: 20px;"></i>
					  <label style="float: left;margin-left: 2px;"> Enter Password </label>
					</div>
					<div class="col-sm-6 form-group">
					  <input type="password" class="form-control" name="doctor_password" id="doctor_password" placeholder="Your Password"/>
					  <span style="color:red;" id="doctor_password_error"></span>
					  <div class="validate"></div>
					</div>
				  </div>
				  <div class="btn-wrap">
					<button type="button" onclick="doctor_login()" class="btn-buy">Login Now</button>
				  </div>
				  <br>
				  <div class="form-output login_msg" style="color:red;">
					<p class="form-messege" style="color:red;"></p>
				  </div>
			  </form>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="200">
              <h3>Login As</h3>
              <h4>PATIENT</h4>
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
				  <div class="form-row">
					<div class="col-sm-6 form-group">
					  <i class="ri-user-fill" style="float: left;margin-left: 20px;"></i>
					  <label style="float: left;margin-left: 2px;"> Enter Email </label>
					</div>
					<div class="col-sm-6 form-group">
					  <input type="text" name="patient_email" class="form-control" id="patient_email" placeholder="Your Email / Registration No."/>
					  <span style="color:red;" id="patient_email_error"></span>
					  <div class="validate"></div>
					</div>
				  </div>
				  <div class="form-row">
					<div class="col-sm-6 form-group">
					  <i class="ri-lock-fill" style="float: left;margin-left: 20px;"></i>
					  <label style="float: left;margin-left: 2px;"> Enter Password </label>
					</div>
					<div class="col-sm-6 form-group">
					  <input type="password" class="form-control" name="patient_password" id="patient_password" placeholder="Your Password"/>
					  <span style="color:red;" id="patient_password_error"></span>
					  <div class="validate"></div>
					</div>
				  </div>
				  <div class="btn-wrap">
					<button type="button" onclick="patient_login()" class="btn-buy">Login Now</button>
				  </div>
				  <br>
				  <div class="form-output login_msg_patient" style="color:red;">
					<p class="form-messege" style="color:red;"></p>
				  </div>
			  </form>
            </div>
          </div>

        <!--  <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="300">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="400">
              <span class="advanced">Advanced</span>
              <h3>Ultimate</h3>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Pricing Section -->
	
  </main><!-- End #main -->



<?php 
   require('footer.php'); 
?>