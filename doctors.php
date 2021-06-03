<!-- HSOPITAL MS FRONT WEBSITE-->
<?php
	require('connection.inc.php');
	require('functions.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Doctors H.M.S. Hospital</title>
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

      <a href="index.html" class="logo mr-auto"><!--<img src="assets/img/logo.png" alt="">--><h3 style="margin-bottom: 0px;color: #4a4747;"><span class="hide-when-narrow">H.M.S. Hospital</span> <span class="hide-when-wide">H.M.S.</span></h3></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="departments.php">Departments</a></li> 
          <li class="active"><a href="doctors.php">Doctors</a></li>
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
    
	<!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>Here is a list of our trained and experienced doctors.</p>
        </div>

        <div class="row">
		<?php
			$resdoctor=mysqli_query($con,"select * from doctor_info where leaving_date='0000-00-00' order by id asc limit 4");
			while($rowdoctor=mysqli_fetch_assoc($resdoctor))
			{
		?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$rowdoctor['image']?>" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo $rowdoctor['name']?></h4>
                <span><?php echo $rowdoctor['speciality']?></span>
              </div>
            </div>
          </div>
		<?php
			}
		?>
        </div>
		
		<div class="row">
		<?php
			$resdoctor=mysqli_query($con,"select * from doctor_info where leaving_date='0000-00-00' order by id asc limit 4 OFFSET 4");
			while($rowdoctor=mysqli_fetch_assoc($resdoctor))
			{
		?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$rowdoctor['image']?>" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo $rowdoctor['name']?></h4>
                <span><?php echo $rowdoctor['speciality']?></span>
              </div>
            </div>
          </div>
		<?php
			}
		?>

        </div>

      </div>
    </section><!-- End Doctors Section -->


  </main><!-- End #main -->



<?php 
   require('footer.php'); 
?>