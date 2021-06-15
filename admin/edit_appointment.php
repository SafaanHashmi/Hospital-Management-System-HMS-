<?php 
	require('connection.inc.php'); 
	require('functions.inc.php');
	if(!isset($_SESSION['ADMIN_NAME']))
	{
		header('location:login.php');
	}
	$msg='';

	if(isset($_GET['id']) && $_GET['id']!='')
	{
		$id=get_safe_value($con,$_GET['id']);
		$sql="select * from appointment_info where id='$id'";
		$res1=mysqli_query($con,$sql);	
		$check=mysqli_num_rows($res1);	
		if($check>0)							//This if condition is used so that no one can do any changes to the URL manually
		{
			$rowfor =mysqli_fetch_assoc($res1);
			$doctor_id=$rowfor['doctor_id'];
			$appointment_date=$rowfor['appointment_date'];
			$patient_name=$rowfor['patient_name'];
			$patient_id=$rowfor['patient_id'];
			$patient_mobile=$rowfor['patient_mobile'];
			$patient_email=$rowfor['patient_email'];
			$patient_gender=$rowfor['patient_gender'];
			$message=$rowfor['message'];
			$today_date=$rowfor['today_date'];
		}
		else   									// if someone try to manipulate URL it will redirect it to -:		
		{
			header('location:index.php');
			die();
		}
	}
	
	if(isset($_POST['submit']))
	{
		$message_inp=get_safe_value($con,$_POST['message_inp']);
		$appdate_inp=get_safe_value($con,$_POST['appdate_inp']);
		$res=mysqli_query($con,"update appointment_info set appointment_date='$appdate_inp',message='$message_inp' where id='$id'");
		header('location:index.php'); 
		die();
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

  <title>HMS Index Page</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  
  <!--Modal
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  
  <!-- Favicons -->
  <link href="img/title-logo.png" rel="icon">
  <link href="img/title-logo.png" rel="apple-touch-icon">
  
  <!-- Boxicons Remixicons -->
  <link href="assets/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/remixicon/remixicon.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">H.M.S. <span class="lite">Hospital</span></a>
      <!--logo end-->
	  <!--  search form start -->
    <!--  <div class="nav search-row" id="top_menu">
       
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form" method="post">
              <input class="form-control" placeholder="Search by patient name" type="text" name="search">
			  <button type="submit" name="submit1" style="display: inline-block;height: 30px;padding: 6px 12px;    padding-left: 12px;padding-left: 12px;font-size: 14px;line-height: 1.428571429;color: #8e8e93;vertical-align: middle;background-color: #ffffff;border: 1px solid #c7c7cc;border-radius: 4px;"><i class="fa fa-search"></i></button>
            </form>
          </li>
        </ul>
        
      </div> -->
	 <!--  search form end -->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">7</span>
                        </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 4 new notifications</p>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span>
                                    Friend Request
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>
                                    John location.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                    Project 3 Completed.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span>
                                    Mick appreciated your work.
                                    <span class="small italic pull-right"> Today</span>
                                </a>
              </li>
              <li>
                <a href="#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/admin_icon12.jpg">
                            </span>
                            <span class="username">Hello Admin</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
            <!--  <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>
                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
              </li>
              <li>
                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
              </li> -->
              <li>
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            <!--  <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li>
              <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li> -->
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!------------------------------------------------------------------------------Header End--------------------------------------------------------------------------->
	
	<!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
		  <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="ri-ancient-gate-fill"></i>
                          <span>Front Office</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li class="active"><a href="index.php">Add Appointment</a></li>
              <li><a class="" href="visitor_info.php">Visitors Book</a></li>
            </ul>
          </li>
        <!--  <li class="active">
            <a class="" href="index.html">
                          <i class="ri-ancient-gate-fill"></i>
                          <span>Front Office</span>
                      </a>
          </li> -->
		   <li>
            <a class="" href="doctors.php">
                          <i class="ri-nurse-line"></i>
                          <span>Doctor Details</span>
                      </a>
          </li>
		  <li>
            <a class="" href="patients.php">
                          <i class="ri-file-user-line"></i>
                          <span>Registered Patients</span>
                      </a>
          </li>
		  <li>
            <a class="" href="ipd.php">
                          <i class="ri-hotel-bed-fill"></i> 
                          <span>IPD- In Print</span>
                      </a>
          </li>
          <li>
            <a class="" href="opd.php">
                          <i class="ri-stethoscope-line"></i>
                          <span>OPD - Out Patient</span>
                      </a>
          </li>
		  <li>
            <a class="" href="rooms.php">
                          <i class="ri-home-4-line"></i>
                          <span>Room Managment</span>
                      </a>
          </li>
		  <li>
            <a class="" href="404.php">
                          <i class="ri-test-tube-line"></i>
                          <span>Pharmacy</span>
                      </a>
          </li>
		  <li>
            <a class="" href="404.php">
                          <i class="ri-flask-fill"></i>
                          <span>Phathology</span>
                      </a>
          </li>
		  <li>
            <a class="" href="404.php">
                          <i class="icon_piechart"></i>
                          <span>Radiology</span>
                      </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
	
	<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Edit Appointment</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="ri-pencil-line"></i>Edit Appointment</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Appointment Details 
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">Applied On <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <h5><?php echo $today_date?></h5>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Patient Name <span class="required">*</span></label>
                      <div class="col-lg-10">
						<?php if($patient_id==0){?>
                        <h5><?php echo $patient_name?></h5>
						<?php }?>
						<?php if($patient_id!=0){?>
						<h5><?php echo "<a href=patient_details.php?id=".$patient_id." target='_blank'>".$patient_name."</a>"?></h5>
						<?php } ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <h5><?php echo $patient_email?></h5>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Mobile</label>
                      <div class="col-lg-10">
                        <h5><?php echo $patient_mobile?></h5>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Doctor Name <span class="required">*</span></label>
                      <div class="col-lg-10">
						<?php $xyz=$doctor_id;
								$queryxyz="select * from doctor_info where id='$xyz'";
								$sqlnew=mysqli_query($con,$queryxyz); 
								$rowdoctor=mysqli_fetch_assoc($sqlnew);
								
						?>
                        <h5><?php echo "<a href=doctor_details.php?id=".$doctor_id." target='_blank'>".$rowdoctor['name']."</a>";?></h5>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Doctor Timing <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <h5><?php echo $rowdoctor['time_in']." - ".$rowdoctor['time_out'];?></h5>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Doctor Shift <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <h5><?php echo $rowdoctor['shift'];?></h5>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Lock Appointment Date<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="subject" name="appdate_inp" minlength="5" type="datetime-local" value="<?php echo $appointment_date;?>" required />
						</br><p>Currently :  <?php echo $appointment_date;?></p>
					  </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2">Feedback</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="ccomment" name="message_inp" value="<?php echo $message;?>" required></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
                        <a href="index.php" class="btn btn-default" type="button">Cancel</a>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>
	  </section>
	</section>

</section>
  <!-- container section start -->


  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
