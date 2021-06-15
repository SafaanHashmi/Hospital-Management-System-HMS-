<?php 
	require('connection.inc.php'); 
	require('functions.inc.php');
	if(!isset($_SESSION['ADMIN_NAME']))
	{
		header('location:login.php');
	}
	$msg='';
	$seachvariable='';
	
	if(isset($_POST['submit']))
	{
		$registeration_no=get_safe_value($con,$_POST['registeration_no']);
		$patient_name=get_safe_value($con,$_POST['patient_name']);
		$patient_password=get_safe_value($con,$_POST['patient_password']);
		$patient_email=get_safe_value($con,$_POST['patient_email']);
		$patient_mobile=get_safe_value($con,$_POST['patient_mobile']);
		$patient_gender=get_safe_value($con,$_POST['patient_gender']);
		$dob=get_safe_value($con,$_POST['dob']);
		$marital_status=get_safe_value($con,$_POST['marital_status']);
		$date_of_reg=get_safe_value($con,$_POST['date_of_reg']);
		$address=get_safe_value($con,$_POST['address']);
		$city=get_safe_value($con,$_POST['city']);
		$country=get_safe_value($con,$_POST['country']);
		$family_mobile=get_safe_value($con,$_POST['family_mobile']);
		$occupation=get_safe_value($con,$_POST['occupation']);
		$height=get_safe_value($con,$_POST['height']);
		$weight=get_safe_value($con,$_POST['weight']);
		$age=get_safe_value($con,$_POST['age']);
		$aadhar_no=get_safe_value($con,$_POST['aadhar_no']);
		$pancard_no=get_safe_value($con,$_POST['pancard_no']);

		
		if($msg=='')
		{	
			if(isset($_GET['id']) && $_GET['id']!='')		//FOR EDIT
			{
				header('location:xyz.php'); 
			}
			else
			{
				$image=$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/patients_image/'.$image);
				mysqli_query($con,"insert into patient_info(`registeration_no`, `fullname`, `password`, `email`, `mobile`, `gender`, `dob`, `marital_status`, `date_of_reg`, `family_mobile`, `address`, `city`, `country`, `occupation`, `height`, `weight`, `age`, `aadhar_no`, `pancard_no`, `image`) 
				values('$registeration_no','$patient_name','$patient_password','$patient_email','$patient_mobile','$patient_gender','$dob','$marital_status','$date_of_reg','$family_mobile','$address','$city','$country','$occupation','$height','$weight','$age','$aadhar_no','$pancard_no','$image')");	
				/* echo("Error description: " . mysqli_error($con)); */
				header('location:patients.php'); 
				die();
			}
		}
	}
	
	//SEARCH FIELD
	if(isset($_POST['submit1']))
	{
		$searchinput=get_safe_value($con,$_POST['search']);
		$searchsql="Select * from patient_info where fullname like '%$searchinput%'";
		$searchres=mysqli_query($con,$searchsql);
		$seachvariable='xyz';
	}
	
	if(isset($_GET['type']) && $_GET['type']!='')
	{
		$Type=get_safe_value($con,$_GET['type']);
		if($Type=='status')
		{
			$ID=get_safe_value($con,$_GET['id']);
			$operation=get_safe_value($con,$_GET['operation']);
			if($operation=='active')
			{
				$leaving_variable = date("Y-m-d");
			}
			else
			{
				$leaving_variable='0000-00-00';
			}
			$update_status="update doctor_info set leaving_date='$leaving_variable' where id='$ID'";
			mysqli_query($con,$update_status);
		}	
			
		if($Type=='delete')
		{
			$ID=get_safe_value($con,$_GET['id']);
			$zero=0;
			$delete_sql="delete from patient_info where id='$ID'";
			mysqli_query($con,$delete_sql);
			mysqli_query($con,"update appointment_info set `patient_id`='$zero' where patient_id='$ID'");
			header('location:patients.php');
		}	
	}
	
	
	$sql="SELECT * FROM patient_info ORDER BY id asc";
	$res=mysqli_query($con,$sql);
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

  <title>HMS Registered Patients </title>

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
      <!--<div class="nav search-row" id="top_menu">
        
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form" method="post">
              <input class="form-control" placeholder="Search by doctor name" type="text" name="search">
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
            <a class="" href="pharmacy.php">
                          <i class="ri-test-tube-line"></i>
                          <span>Pharmacy</span>
                      </a>
          </li>
		  <li>
            <a class="" href="pathology.php">
                          <i class="ri-flask-fill"></i>
                          <span>Phathology</span>
                      </a>
          </li>
		  <li>
            <a class="" href="radiology.php">
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
            <section class="panel">
              <header class="panel-heading">
				<div style="float:left;"><p style="padding-top: 6px;font-weight: bold;">Details of Registered Patients</p> </div>
				<div class="nav search-row" style="margin-left:30px;margin-top:14px;" id="top_menu">
					<!--  search form start -->
					<ul class="nav top-menu">
					  <li style="border:0px;">
						<form class="navbar-form" method="post">
						  <input class="form-control" placeholder="Search by patient name" type="text" name="search">
						  <button type="submit" name="submit1" style="display: inline-block;height: 30px;padding: 6px 12px; padding-left: 12px;padding-left: 12px;font-size: 14px;line-height: 1.428571429;color: #8e8e93;vertical-align: middle;background-color: #ffffff;border: 1px solid #c7c7cc;border-radius: 4px;"><i class="fa fa-search" style="border:0px"></i></button>
						</form>
					  </li>
					</ul>
					<!--  search form end -->
				</div>
				<div class="btn-group" style="float: right; padding-top: 10px;">
                    <!--    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> -->
                        <button class="btn" href="#" style="width: 160px;height: 28px; background: #1a2732;" data-toggle="modal" data-target="#exampleModal">
							<p style="margin-top: -3.5px; color: #fff; font-weight:bolder"> + Add New Patient </p>
							<!--	<i class="icon_check_alt2"></i>-->
						</button>
						
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document" style="width:800px; margin-top:50px"> 
							<div class="modal-content"style="background-color:white">
								<div class="modal-header"  style="background-color:#313e4a">
									<h5 class="modal-title" id="exampleModalLabel" style="color: white;">Register a Patient</h5>
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
												<?php 
													$sqlforregisterno=mysqli_query($con,"Select registeration_no from patient_info where id=(Select max(id) from patient_info)");
													$rowregisterno=mysqli_fetch_assoc($sqlforregisterno);
												?>
												<label class="col-xl-2" style="color:black"> Registeration Number </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="registeration_no" placeholder="<?php echo 'Last Reg no  '.$rowregisterno['registeration_no'];?>"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Patient Name </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="patient_name"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Password </label>
												<div class="col-xl-10"><input class="form-control" type="password" name="patient_password"> </input> </div>
											</div>	
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Patient Email </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="patient_email"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Patient Mobile </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="patient_mobile"> </input> </div>
											</div>	
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Patient Gender </label>
												<div class="col-xl-10">
													<!--<input class="form-control" type="text"> </input> -->
													<select class="form-control" name="patient_gender"> 
													<option> Select Gender </option>
													<option> Male </option>
													<option> Female </option>
													<option> Other </option>
													</select>
												</div>
											</div>
										</div>
										<!--<div class="row" style="margin-top: 8px;">
											<div class="col-sm-12" style="background-color:;">
												<label class="col-xl-2" style="color:black">  Shift Days </label>
												<div class="col-xl-10">
													<label>Monday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Monday"> </input>  
													<label>&nbsp &nbsp &nbsp Tuesday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Tuesday"> </input>  
													<label>&nbsp &nbsp &nbsp Wednesday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Wednesday"> </input>  
													<label>&nbsp &nbsp &nbsp Thursday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Thursday"> </input>  
													<label>&nbsp &nbsp &nbsp Friday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Friday"> </input>  
													<label>&nbsp &nbsp &nbsp Saturday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Saturday"> </input>  
													<label>&nbsp &nbsp &nbsp Sunday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Sunday"> </input>  
												
												</div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Message/Note </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="message"> </input> </div>
											</div> 
										</div>-->
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black">  Date of Birth </label>
												<div class="col-xl-10"><input class="form-control" type="date" name="dob" placeholder="Eg. 2021-02-28 13:45:00"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Marital Status </label>
												<div class="col-xl-10">
													<!--<input class="form-control" type="text"> </input> -->
													<select class="form-control" name="marital_status"> 
													<option> Select </option>
													<option> Married </option>
													<option> Unmarried </option>
													</select>
												</div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black">  Date of Registration </label>
												<div class="col-xl-10"><input class="form-control" type="date" name="date_of_reg" placeholder="Eg. 2021-02-28 13:45:00"> </input> </div>
											</div>	
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Address </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="address"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> City </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="city"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Country </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="country"> </input> </div>
											</div>
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Family Member Mobile </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="family_mobile"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Occupation </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="occupation"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Height in Centimeter </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="height"> </input> </div>
											</div>
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Weight in Kg </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="weight"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Age </label>
												<div class="col-xl-10"><input class="form-control" type="number" name="age"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Doctor Image </label>
												<div class="col-xl-10"><input class="form-control" type="file" name="image"> </input> </div>
											</div>
										</div>
										<div class="row" style="margin-top: 8px;">
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> Aadhar No. </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="aadhar_no"> </input> </div>
											</div>
											<div class="col-sm-4" style="background-color:;">
												<label class="col-xl-2" style="color:black"> PAN No. </label>
												<div class="col-xl-10"><input class="form-control" type="text" name="pancard_no"> </input> </div>
											</div>
										</div>
									</div>
									<div class="modal-footer" style="margin-top:30px">	
										<p style="color:red;margin-top:-33px; margin-bottom:0px; float:left;"> <?php echo $msg ?> </p>
										<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:red; color:white;">Close</button>
										<button type="submit" name="submit" class="btn btn-primary">Register Patient</button>
									</div>
								</form>
							</div>
						  </div>
						</div>
						
				</div>
              </header>
			
			  <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
					<th><!--<i class="ri-information-line"></i>--> ID </th>
					<th><!--<i class="ri-information-line"></i>--> Image </th>
					<th><!--<i class="icon_calendar"></i>--> Registeration No </th>
                    <th><i class="icon_calendar"></i> Registeration Date </th>
					<th><i class="icon_profile"></i> Name </th>	
					<th><!--<i class="icon_mobile"></i>--> Occupation </th>
					<th><i class="icon_mobile"></i> Mobile </th>
                    <th><i class="icon_mail_alt"></i> Email </th>					
                    <th><i class="ri-women-line"></i> Gender </th>					
                    <th><i class="ri-calendar-check-fill"></i> Family Contact</th>				
					<th><i class="ri-timer-line"></i> DOB </th>
					<th><i class="ri-timer-2-line"></i> Age </th>
                   <!-- <th><i class="ri-message-2-line"></i> Message </th>-->
                    <!--<th><i class="icon_cogs"></i> Status</th> -->
					<th><i class="ri-delete-bin-7-line"></i> Delete </th> 
                  </tr>
				  
                  <?php 
					if($seachvariable=='')
					{
					$i=1;
					while($row=mysqli_fetch_assoc($res))
					{ 									
				  ?>
				  <tr>
                    <td><?php echo $row['id'] ?></td>
					<td>
                      <span class="profile-ava">
						<img alt="" class="simple" src="<?php echo PATIENT_IMAGE_SITE_PATH.$row['image']?>" height="50px" width="50px">
					  </span>
                    </td>
					<td><?php echo $row['registeration_no'] ?></td>
					<td><?php echo $row['date_of_reg'] ?></td>
                    <td><?php echo "<a href =patient_details.php?id=".$row['id'].">".$row['fullname']."</a>" ?></td>
                    <td><?php echo $row['occupation'] ?></td>
                    <td><?php echo $row['mobile'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['family_mobile'] ?></td>
                    <td><?php echo $row['dob'] ?></td>
                    <td><?php echo $row['age'] ?></td>
					<td><?php echo"<a href='?type=delete&operation=active&id=".$row['id']."'>&nbsp &nbsp &nbsp<i class='ri-delete-bin-line' title='Click to Delete'></i> </a>"; ?></td>
                  </tr>
				  <?php 
					}			
					}	
				  ?>
				  
				  <?php 
					if($seachvariable!='')
					{
					if(mysqli_num_rows($searchres)>0){
					$i=1;
					while($rowsearch=mysqli_fetch_assoc($searchres))
					{ 									
				  ?>
				  <tr>
                    <td><?php echo $rowsearch['id'] ?></td>
					<td>
                      <span class="profile-ava">
						<img alt="" class="simple" src="<?php echo PATIENT_IMAGE_SITE_PATH.$rowsearch['image']?>" height="50px" width="50px">
					  </span>
                    </td>
					<td><?php echo $rowsearch['registeration_no'] ?></td>
					<td><?php echo $rowsearch['date_of_reg'] ?></td>
                    <td><?php echo "<a href =patient_details.php?id=".$rowsearch['id'].">".$rowsearch['fullname']."</a>" ?></td>
                    <td><?php echo $rowsearch['occupation'] ?></td>
                    <td><?php echo $rowsearch['mobile'] ?></td>
                    <td><?php echo $rowsearch['email'] ?></td>
                    <td><?php echo $rowsearch['gender'] ?></td>
                    <td><?php echo $rowsearch['family_mobile'] ?></td>
                    <td><?php echo $rowsearch['dob'] ?></td>
                    <td><?php echo $rowsearch['age'] ?></td>
					<td><?php echo"<a href='?type=delete&operation=active&id=".$rowsearch['id']."'>&nbsp &nbsp &nbsp<i class='ri-delete-bin-line' title='Click to Delete'></i> </a>"; ?></td>
                  </tr>
				  <?php 
					}
					}
					else{
				  ?>
					
					<br><h1 style="margin-left:auto; margin-right:auto;text-align:center;color:red;"> No records found </h1><br>
					
				  <?php
					}
					}	
				  ?>
               
                </tbody>
              </table>
			
			</section>
          </div>
        </div>
        <!-- page end-->
	  </section>
    <!--main content end-->
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