<?php 
	require('connection.inc.php'); 
	require('functions.inc.php');
	if(!isset($_SESSION['ADMIN_NAME']))
	{
		header('location:login.php');
	}
	if(isset($_GET['id']) && $_GET['id']!='')
	{
		$id= $_GET['id'];
		$sqlid="select * from patient_info where id='$id'";
		$results = mysqli_query($con,$sqlid);	
		$check=mysqli_num_rows($results);	
		if($check>0)							//This if condition is used so that no one can do any changes to the URL manually
		{
			$row=mysqli_fetch_assoc($results);
			$registeration_no=$row['registeration_no']; 		//Now this is shown in the input field in below HTML code 
			$date_of_reg=$row['date_of_reg']; 		//Now this is shown in the input field in below HTML code 
			$patient_name=$row['fullname']; 						//Now this is shown in the input field in below HTML code 
			$patient_password=$row['password']; 						//Now this is shown in the input field in below HTML code 
			$patient_occupation=$row['occupation']; 							//Now this is shown in the input field in below HTML code 
			$patient_mobile=$row['mobile']; 						//Now this is shown in the input field in below HTML code 
			$patient_email=$row['email']; 							//Now this is shown in the input field in below HTML code 
			$patient_gender=$row['gender']; 			//Now this is shown in the input field in below HTML code 
			$dob=$row['dob']; 			//Now this is shown in the input field in below HTML code 
			$marital_status=$row['marital_status'];
			$address=$row['address']; 			//Now this is shown in the input field in below HTML code 
			$city=$row['city']; 				//Now this is shown in the input field in below HTML code 
			$country=$row['country']; 				//Now this is shown in the input field in below HTML code 
			//$leaving_date=$row['leaving_date']; 		Now this is shown in the input field in below HTML code 
			$family_mobile=$row['family_mobile'];
			$height=$row['height'];
			$weight=$row['weight'];
			$age=$row['age'];
			$aadhar_no=$row['aadhar_no'];
			$pancard_no=$row['pancard_no'];
			$image_required='required';
		}
		else
		{
			header('location:patients.php');
		}
	}
	
	if(isset($_POST['submit']))
	{
		$patient_name=get_safe_value($con,$_POST['patient_name']);
		$patient_password=get_safe_value($con,$_POST['patient_password']);
		$patient_occupation=get_safe_value($con,$_POST['occupation']);
		$patient_mobile=get_safe_value($con,$_POST['patient_mobile']);
		$patient_email=get_safe_value($con,$_POST['patient_email']);
		$patient_gender=get_safe_value($con,$_POST['patient_gender']);
		$dob=get_safe_value($con,$_POST['dob']);
		$marital_status=get_safe_value($con,$_POST['marital_status']);
		$address=get_safe_value($con,$_POST['address']);
		$city=get_safe_value($con,$_POST['city']);
		$country=get_safe_value($con,$_POST['country']);
		$family_mobile=get_safe_value($con,$_POST['family_mobile']);
		$height=get_safe_value($con,$_POST['height']);
		$weight=get_safe_value($con,$_POST['weight']);
		$age=get_safe_value($con,$_POST['age']);
		$aadhar_no=get_safe_value($con,$_POST['aadhar_no']);
		$pancard_no=get_safe_value($con,$_POST['pancard_no']);

		if($_FILES['image']['name']!='')
		{
			$image=$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/patients_image/'.$image);
			mysqli_query($con,"update patient_info set fullname='$patient_name',password='$patient_password',occupation='$patient_occupation'
			,mobile='$patient_mobile',email='$patient_email',gender='$patient_gender',dob='$dob',image='$image',marital_status='$marital_status'
			,address='$address',city='$city',country='$country',family_mobile='$family_mobile',height='$height',weight='$weight',age='$age'
			,aadhar_no='$aadhar_no',pancard_no='$pancard_no' where id='$id'");
			mysqli_query($con,"update appointment_info set patient_name='$patient_name',patient_mobile='$patient_mobile',email='$patient_email',
			gender='$patient_gender' where patient_id='$id'");
		}
		else{
			mysqli_query($con,"update patient_info set fullname='$patient_name',password='$patient_password',occupation='$patient_occupation'
			,mobile='$patient_mobile',email='$patient_email',gender='$patient_gender',dob='$dob',marital_status='$marital_status'
			,address='$address',city='$city',country='$country',family_mobile='$family_mobile',height='$height',weight='$weight',age='$age'
			,aadhar_no='$aadhar_no',pancard_no='$pancard_no' where id='$id'");	
			mysqli_query($con,"update appointment_info set patient_name='$patient_name',patient_mobile='$patient_mobile',patient_email='$patient_email',
			patient_gender='$patient_gender' where patient_id='$id'");
			/* echo("Error description: " . mysqli_error($con)); */
		}
		
		header('location:patient_details.php?id='.$id.''); 
		die();
	}
	$msg='';
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

  <title>HMS Patients Profile</title>

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

      <div class="nav search-row" id="top_menu">
        <!--  search form start 
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
         search form end -->
      </div>

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
              <li class=""><a href="index.php">Add Appointment</a></li>
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
		  <li class="active">
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
            <a class="404.php" href="pharmacy.php">
                          <i class="ri-test-tube-line"></i>
                          <span>Pharmacy</span>
                      </a>
          </li>
		  <li>
            <a class="404.php" href="pathology.php">
                          <i class="ri-flask-fill"></i>
                          <span>Phathology</span>
                      </a>
          </li>
		  <li>
            <a class="404.php" href="radiology.php">
                          <i class="icon_piechart"></i>
                          <span>Radiology</span>
                      </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
	
	<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Patient's Profile</h3>
            <ol class="breadcrumb" style="height: 36px;">
              <li><i class="fa fa-home"></i><a href="patients.php">Patient</a></li>
            <!--  <li><i class="icon_documents_alt"></i>Pages</li> -->
              <li><i class="fa fa-user-md"></i>Profile</li>
			  <div class="btn-group" style="float: right; padding-top: 10px;">
			<!--  <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> -->
				<button class="btn" href="#" style="width: 160px;height: 28px; background: #1a2732; margin-top: -13px;" data-toggle="modal" data-target="#exampleModal">
					<p style="margin-top: -5.5px; color: #fff; font-weight:bolder"><i class="ri-pencil-line"></i> Edit Patient Details</p>
					<!--	<i class="icon_check_alt2"></i>-->
				</button>
				
				<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document" style="width:800px; margin-top:50px"> 
						<div class="modal-content"style="background-color:white">
							<div class="modal-header"  style="background-color:#313e4a">
								<h5 class="modal-title" id="exampleModalLabel" style="color: white;">Add Doctor Details</h5>
								<!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>-->
							  </div>
							<!--  <div class="modal-body">
								...
							  </div> -->
							<form method="post" enctype="multipart/form-data">
									<div class="container">
										<div class="row">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Patient Name </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="patient_name" value="<?php echo $patient_name; ?>"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Password </label>
												<div class="col-xl-10"><input class="form-control" type="password" name="patient_password" value="<?php echo $patient_password; ?>"> </input> </div>
											</div>	
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Marital Status </label>
												<div class="col-xl-10">
													<!--<input class="form-control" type="text"> </input> -->
													<select class="form-control" name="marital_status"> 
													<option> <?php echo $marital_status; ?></option>
													<option> Married </option>
													<option> Unmarried </option>
													</select>
												</div>
											</div>
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Patient Email </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="patient_email" value="<?php echo $patient_email; ?>"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Patient Mobile </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="patient_mobile" value="<?php echo $patient_mobile; ?>"> </input> </div>
											</div>	
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Patient Gender </label>
												<div class="col-xl-10">
													<!--<input class="form-control" type="text"> </input> -->
													<select class="form-control" name="patient_gender"> 
													<option> <?php echo $patient_gender; ?></option>
													<option> Male </option>
													<option> Female </option>
													<option> Other </option>
													</select>
												</div>
											</div>
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black">  Date of Birth </label>
												<div class="col-xl-10"><input class="form-control" type="date" name="dob" placeholder="Eg. 2021-02-28 13:45:00"  value="<?php echo $dob; ?>"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Age </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="age" value="<?php echo $age; ?>"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Occupation </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="occupation" value="<?php echo $patient_occupation; ?>"> </input> </div>
											</div>
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Address </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="address"   value="<?php echo $address; ?>"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> City </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="city" value="<?php echo $city; ?>"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Country </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="country" value="<?php echo $country; ?>"> </input> </div>
											</div>
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Family Member Mobile </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="family_mobile" value="<?php echo $family_mobile; ?>"> </input> </div>
											</div>
											
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Height in Centimeter </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="height" value="<?php echo $height; ?>"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Weight in Kg </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="weight" value="<?php echo $weight; ?>"> </input> </div>
											</div>
											
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Doctor Image </label>
												<div class="col-xl-10"><input class="form-control" type="file" name="image"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Aadhar No. </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="aadhar_no" value="<?php echo $aadhar_no; ?>"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> PAN No. </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="pancard_no" value="<?php echo $pancard_no; ?>"> </input> </div>
											</div>
										</div>
									</div>
									<div class="modal-footer" style="margin-top:30px">	
										<p style="color:red;margin-top:-33px; margin-bottom:0px; float:left;"> <?php echo $msg ?> </p>
										<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:red; color:white;">Close</button>
										<button type="submit" name="submit" class="btn btn-primary">Submit Details</button>
									</div>
								</form>
						</div>
					  </div>
					</div>
				
			   </div>
            </ol>
          </div>
        </div>
		<?php 
		 $id1= $_GET['id'];
		 $sqlid1="select * from patient_info where id='$id1'";
		 $results1 = mysqli_query($con,$sqlid1);
		 while($row1=mysqli_fetch_assoc($results1))
		 { 									
		?>
		<div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4>
					<?php if($row1['gender']=='Male'){echo "Mr. ".$row1['fullname'];} 
					elseif($row1['gender']=='Female'){ echo "Miss. ".$row1['fullname'];}
					else{ echo $row1['fullname'];}?>
				  </h4>
                  <div class="follow-ava">
                    <img src="<?php echo PATIENT_IMAGE_SITE_PATH.$row1['image']?>" alt="">
                  </div>
                  <h5><?php echo $row1['occupation'];?></h5>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <p>Hello I’m <?php echo $row1['fullname'];?>, a <?php echo $row1['occupation'];?> by profession.</p>
                  <p><?php echo $row1['email'];?></p>
                  <p><i class="fa fa-mobile">&nbsp<?php echo $row1['mobile'];?></i></p>
                  <h6>
					<span><i class="icon_calendar"></i><?php echo $row1['date_of_reg'];?></span>
					<!--<span><i class="icon_clock_alt"></i><?php echo $row1['time_in'];?></span>
					<span><i class="icon_clock_alt"></i><?php echo $row1['time_out'];?></span> -->
                  </h6>
				  <h6 style="margin-top:15px;">
					<span><i class="icon_pin_alt"></i><?php echo $row1['country'];?></span>
					<!--<?php 
						if($row1['leaving_date']!='0000-00-00')
						{
					?>
					<span style="text-decoration:underline;"><i class="icon_calendar"></i> Left on -  <?php echo $row1['leaving_date'];?></span>
					<?php
						}
					?>-->
                  </h6>
                </div>
                <!--<div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-star"> </i><i class="fa fa-star"> </i><i class="fa fa-star"> </i><br> Won Noble Prize for Cardiologist in 2014.
                    </li>

                  </ul>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-star"> </i><i class="fa fa-star"> </i><i class="fa fa-star"> </i><i class="fa fa-star"> </i><br> Won National Prize for Medicine in 2016.
                    </li>

                  </ul>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-star"> </i><i class="fa fa-star"> </i><br> Won Doctor's Choice award in 2018.
                    </li>

                  </ul>
                </div> -->
              </div>
            </div>
          </div>
        </div>
		<?php
		 }
		?>
        <!-- page start-->
		<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Identity Proofs
                                      </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Details
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Appointments 
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
					<!--1 Recent-->
					<div id="recent-activity" class="tab-pane active">
                    <div class="profile-activity">
					  <h3> Identity Proofs and Verification </h3>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/idverify1.png" alt=""></a>
                            <p class="attribution"><a href="#">HMS Registeration No.</a> </p>
                            <p><?php echo $registeration_no;?></p>
                          </div>
                        </div>
                      </div>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/idverify1.png" alt=""></a>
                            <p class="attribution"><a href="#"> Aadhaar Number</a></p>
                            <p><?php echo $aadhar_no;?></p>
                          </div>
                        </div>
                      </div>
					  <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/idverify1.png" alt=""></a>
                            <p class="attribution"><a href="#">Pancard Number</a></p>
                            <p><?php echo $pancard_no;?></p>
                          </div>
                        </div>
                      </div>
					</div>
					</div>
					<!-- 2 Details -->
				    <div id="profile" class="tab-pane">
						<section class="panel">
						<div class="panel-body bio-graph-info">
							<h1>Doctor Details</h1>
							<?php 
							 $idfordetail= $_GET['id'];
						   	 $sqlfordetail="select * from patient_info where id='$id'";
							 $resfordetail = mysqli_query($con,$sqlid);
							 while($rowfordetail=mysqli_fetch_assoc($resfordetail))
							 { 									
							?>
							<div class="row">
							  <div class="bio-row">
								<p><span>Full Name </span>: &nbsp  <?php echo $rowfordetail['fullname'];?> </p>
							  </div>
							  <div class="bio-row">
								<p><span>Registered Date </span>: &nbsp  <?php echo $rowfordetail['date_of_reg'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Date of Birth</span>: &nbsp  <?php echo $rowfordetail['dob'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Occupation </span>: &nbsp  <?php echo $rowfordetail['occupation'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Country </span>: &nbsp  <?php echo $rowfordetail['country'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>City </span>: &nbsp  <?php echo $rowfordetail['city'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Email </span>: &nbsp  <?php echo $rowfordetail['email'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Mobile </span>: &nbsp  <?php echo $rowfordetail['mobile'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Address </span>: &nbsp  <?php echo $rowfordetail['address'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Gender </span>: &nbsp  <?php echo $rowfordetail['gender'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Marital Status </span>: &nbsp  <?php echo $rowfordetail['marital_status'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Family Contact </span>: &nbsp  <?php echo $rowfordetail['family_mobile'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Height </span>: &nbsp  <?php echo $rowfordetail['height'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Weight </span>: &nbsp  <?php echo $rowfordetail['weight'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Age </span>: &nbsp  <?php echo $rowfordetail['age'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Aadhar No. </span>: &nbsp  <?php echo $rowfordetail['aadhar_no'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>Pancard No. </span>: &nbsp  <?php echo $rowfordetail['pancard_no'];?></p>
							  </div>
							  <div class="bio-row">
								<p><span>HMS Reg No. </span>: &nbsp  <?php echo $rowfordetail['registeration_no'];?></p>
							  </div>
							</div>
							<?php
							 }
							?>
						  </div>
						</section>
						<section>
						  <div class="row">
						  </div>
						</section>
					</div>
					<!-- 3 edit-profile -->
				    <div id="edit-profile" class="tab-pane">
						<section class="panel">
							<table class="table table-striped table-advance table-hover">
							<tbody>
							  <tr>
								<th><i class="ri-information-line"></i> Appoint. ID</th>
								<th><i class="icon_calendar"></i> Appointment Date</th>
								<th><i class="icon_profile"></i> Patient Name</th>	
								<th><i class="icon_mobile"></i> Doctor Name</th>
								<th><i class="icon_mail_alt"></i> Dr Time in</th>					
								<th><i class="ri-women-line"></i> Dr Time out</th>					
								<!--<th><i class="ri-nurse-line"></i> Doctor Name</th> -->
								<th><i class="icon_calendar"></i> Applied Date</th>
								<th><i class="ri-message-2-line"></i> Message</th>
								<th><i class="icon_cogs"></i> Status</th>
								<!--<th><i class="ri-delete-bin-7-line"></i> Delete</th>-->
							  </tr>
							  <?php 
								$idforappoin= $_GET['id'];
								$sqlforappoin="select * from appointment_info where patient_id='$idforappoin'";
								$resforappoin = mysqli_query($con,$sqlforappoin);
								if(mysqli_num_rows($resforappoin)!=0)
								{
								while($rowforappoin=mysqli_fetch_assoc($resforappoin))
								{ 									
							  ?>
							  
							  <tr>
								<td><?php echo $rowforappoin['id'] ?></td>
								<td><?php echo $rowforappoin['appointment_date'] ?></td>
								<td><?php echo $rowforappoin['patient_name'] ?></td>
								<?php 
									$doctoridfordetail=$rowforappoin['doctor_id'];
									$resfordoctordetails = mysqli_query($con,"select * from doctor_info where id='$doctoridfordetail'"); 
									$rowfordoctordetails = mysqli_fetch_assoc($resfordoctordetails);?>
								<td><?php echo $rowfordoctordetails['name'] ?></td>
								<td><?php echo $rowfordoctordetails['time_in'] ?></td>
								<td><?php echo $rowfordoctordetails['time_out'] ?></td>
								<td><?php echo $rowforappoin['today_date'] ?></td>
								<td><?php echo $rowforappoin['message'] ?></td>
								<td>
									<?php
										if($rowforappoin['status']==1)
										{
											echo"<p> <Font Color='green'> Approved </p>";
										}
										else
										{
											echo"<p> <Font Color='red'> Disapproved </p>";
										}
									?>
								</td>
							  </tr>
							  <?php 
								}				
								}
							  ?> 
							</tbody>
							</table>
						</section>
					</div>
				</div>
              </div>
            </section>
          </div>
        </div>
		
		<!-- page end-->
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