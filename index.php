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

  <title>Welcome to H.M.S. Hospital</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
	  <link href="assets/img/admin_icon.jpg" rel="icon">
	  <link href="assets/img/admin_icon.jpg" rel="apple-touch-icon">

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
          <li class="active"><a href="index.php">Home</a></li>
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

      <a href="selectlogin.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Login /Register</a>

    </div>
  </header><!-- End Header -->
  
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="container">
            <h2>Welcome to <span>H.M.S. Hospital</span></h2>
            <p>Health is a state of complete harmony of the body, mind and spirit. When one is free from physical disabilities and mental distractions, the gates of the soul open.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>Welcome to <span>H.M.S. Hospital</span></h2>
            <p>Beauty is a gift, just like good health or intelligence. The only thing is not to be proud of being beautiful. Because you didn't do anything - it was given to you.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="container">
            <h2>Welcome to <span>H.M.S. Hospital</span></h2>
            <p>The doctor of the future will give no medicine, but will instruct his patients in care of the human frame, in diet, and in the cause and prevention of disease.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->


  <main id="main">
  
	 <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><!--<i class="icofont-heart-beat"></i>--><i class="ri-trophy-fill"></i></div>
              <h4 class="title"><a href="">ZEE BUSINESS AWARD</a></h4>
              <p class="description">We have been conferred with “DARE to DREAM - ZEE BUSINESS AWARD - COMPANY OF THE YEAR”</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><!--<i class="icofont-drug"></i>--><i class="ri-trophy-line"></i></div>
              <h4 class="title"><a href="">Gujarat Healthcare Leadership Awards</a></h4>
              <p class="description">We have been bestowed with the “Gujarat Healthcare Leadership Awards” in the year 2019.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><!--<i class="icofont-thermometer-alt"></i>--><i class="ri-trophy-fill"></i></div>
              <h4 class="title"><a href="">BEST IT ENABLED HOSPITALS Award</a></h4>
              <p class="description">We have been conferred with the” BEST IT ENABLED HOSPITALS IN GUJARAT AWARD 2019”</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><!--<i class="icofont-dna-alt-1"></i>--><i class="ri-trophy-line"></i></div>
              <h4 class="title"><a href="">Rajiv Gandhi National Quality Award</a></h4>
              <p class="description">HMS has added another feather in its cap by winning the Rajiv Gandhi National Quality Award</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

	<!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>In an emergency? Need help now?</h3>
          <p> If in any kind of health emergency than don't hesitate and contact us now. Just click on the below button and on the next page provide valide details and we will reach you out shortly.</p>
          <a class="cta-btn scrollto" href="#appointment">Make an Appointment</a>
        </div>
      </div>
    </section><!-- End Cta Section -->


  </main><!-- End #main -->


<?php 
   require('footer.php'); 
?>