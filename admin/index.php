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
		$doctor_id=get_safe_value($con,$_POST['doctor_id']);
		$appointment_date=get_safe_value($con,$_POST['appointment_date']);
		$patient_name=get_safe_value($con,$_POST['patient_name']);
		$patient_mobile=get_safe_value($con,$_POST['patient_mobile']);
		$patient_email=get_safe_value($con,$_POST['patient_email']);
		$patient_gender=get_safe_value($con,$_POST['patient_gender']);
		$message=get_safe_value($con,$_POST['message']);
		$today_date=get_safe_value($con,$_POST['today_date']);
		
		if($msg=='')
		{	
			mysqli_query($con,"insert into appointment_info(`appointment_date`,`patient_name`,`patient_mobile`,`doctor_id`,`patient_email`,`patient_gender`,`today_date`,`message`,`status`) 
					values('$appointment_date','$patient_name','$patient_mobile','$doctor_id','$patient_email','$patient_gender','$today_date','$message',1)");	
			header('location:index.php'); 
			die();
		}
	}
	
	//FOR REGISTERED Patients
	if(isset($_POST['submit2']))
	{
		$patient_idrp=get_safe_value($con,$_POST['patient_idrp']);
		$doctor_idrp=get_safe_value($con,$_POST['doctor_idrp']);
		$appointment_daterp=get_safe_value($con,$_POST['appointment_daterp']);	
		$messagerp=get_safe_value($con,$_POST['messagerp']);
		$today_daterp=get_safe_value($con,$_POST['today_daterp']);		
		
		$resforregisterpatients=mysqli_query($con,"Select fullname,mobile,email,gender from patient_info where id='$patient_idrp'");
		$rowforregisterpatients=mysqli_fetch_assoc($resforregisterpatients);
		
		$patient_namerp=$rowforregisterpatients['fullname'];
		$patient_mobilerp=$rowforregisterpatients['mobile'];
		$patient_emailrp=$rowforregisterpatients['email'];
		$patient_genderrp=$rowforregisterpatients['gender'];
		
		if($msg=='')
		{	
			mysqli_query($con,"insert into appointment_info(`appointment_date`,`patient_name`,`patient_mobile`,`doctor_id`,`patient_id`,`patient_email`,`patient_gender`,`today_date`,`message`,`status`) 
					values('$appointment_daterp','$patient_namerp','$patient_mobilerp','$doctor_idrp','$patient_idrp','$patient_emailrp','$patient_genderrp','$today_daterp','$messagerp',1)");	
			header('location:index.php'); 
			die();
		}
	}
	
	//SEARCH FIELD
	if(isset($_POST['submit1']))
	{
		$searchinput=get_safe_value($con,$_POST['search']);
		$searchsql="Select * from appointment_info where patient_name like '%$searchinput%'";
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
				$status='0';
			}
			else
			{
				$status='1';
			}
			$update_status="update appointment_info set status='$status' where id='$ID'";
			mysqli_query($con,$update_status);
		}	
			
		if($Type=='delete')
		{
			$ID=get_safe_value($con,$_GET['id']);
			$delete_sql="delete from appointment_info where id='$ID'";
			mysqli_query($con,$delete_sql);
			header('location:index.php');
		}			
	}
	
	$sql="SELECT * FROM appointment_info ORDER BY id desc";
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
            <section class="panel">
              <header class="panel-heading">
				<div style="float:left;"><p style="padding-top: 6px;font-weight: bold;">Appointment Details</p> </div>
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
				<div class="btn-group" style="margin-left:2px;float: right; padding-top: 10px;">
					<!--    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> -->
					<button class="btn" href="#" style="width: 200px;height: 28px; background: #1a2732;" data-toggle="modal" data-target="#exampleModal1">
						<p style="margin-top: -3.5px; color: #fff; font-weight:bolder"> + For Registerd Patients</p>
						<!--	<i class="icon_check_alt2"></i>-->
					</button>
				
					<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document" style="width:800px; margin-top:50px"> 
						<div class="modal-content"style="background-color:white">
							<div class="modal-header"  style="background-color:#313e4a">
								<h5 class="modal-title" id="exampleModalLabel" style="color: white;">Add Appointment for Registered Patient</h5>
							</div>
							<form method="post">
								<div class="container">
									<div class="row">
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black">  Date for Appointment </label>
											<div class="col-xl-10"><input class="form-control" type="datetime-local" name="appointment_daterp" placeholder="Eg. 2021-02-28 13:45:00"> </input> </div>
										</div>
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black"> Patient Name </label>
											<div class="col-xl-10">
												<!--<input type="text"> </input> -->
												<select class="form-control" name="patient_idrp"> 
												<option> Select Patient </option>
												<?php
													$resregpatient=mysqli_query($con,"select id,fullname,registeration_no from patient_info order by fullname asc");
													while($rowxregpatient=mysqli_fetch_assoc($resregpatient))
													{
													if($rowxregpatient['id']==$categories_id)
														{	
															echo "<option selected value=".$rowxregpatient['id'].">" .$rowxregpatient['registeration_no']. "</option>";
														}
														else
														{	
															echo "<option value=".$rowxregpatient['id'].">" .$rowxregpatient['fullname']." (".$rowxregpatient['registeration_no'].")</option>";
														}
													}
												?>
												</select>
											</div>
										</div>
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black">  Doctor Name </label>
											<div class="col-xl-10">
												<!--<input type="text"> </input> -->
												<select class="form-control" name="doctor_idrp"> 
												<option> Select Doctor </option>
												<?php
													$res0=mysqli_query($con,"select id,name,speciality from doctor_info where leaving_date='0000-00-00' order by name asc");
													while($rowx=mysqli_fetch_assoc($res0))
													{
													if($rowx['id']==$categories_id)
														{	
															echo "<option selected value=".$rowx['id'].">" .$rowx['name']. "</option>";
														}
														else
														{	
															echo "<option value=".$rowx['id'].">" .$rowx['name']." (".$rowx['speciality'].")</option>";
														}
													}
												?>
												</select>
											</div>
										</div>	
									</div>
									<div class="row" style="margin-top: 8px;">
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black">  Today's Date </label>
											<div class="col-xl-10"><input class="form-control" type="date" name="today_daterp"> </input> </div>
										</div>
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black"> Message/Note </label>
											<div class="col-xl-10"><input class="form-control" type="text" name="messagerp"> </input> </div>
										</div>
									</div>
								</div>
								<div class="modal-footer" style="margin-top:30px">	
									<p style="color:red;margin-top:-33px; margin-bottom:0px; float:left;"> <?php echo $msg ?> </p>
									<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:red; color:white;">Close</button>
									<button type="submit" name="submit2" class="btn btn-primary">Book Appointment</button>
								</div>
							</form>
						</div>
					  </div>
					</div>
				</div>
				<div class="btn-group" style="float: right; padding-top: 10px;">
					<button class="btn" href="#" style="width: 200px;height: 28px; background: #1a2732;" data-toggle="modal" data-target="#exampleModal">
						<p style="margin-top: -3.5px; color: #fff; font-weight:bolder"> + For UnRegisterd Patients</p>
						<!--	<i class="icon_check_alt2"></i>-->
					</button>
				
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document" style="width:800px; margin-top:50px"> 
						<div class="modal-content"style="background-color:white">
							<div class="modal-header"  style="background-color:#313e4a">
								<h5 class="modal-title" id="exampleModalLabel" style="color: white;">Add Appointment for Unregistered Patient</h5>
								<!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>-->
							</div>
							<!--  <div class="modal-body">
								...
							  </div> -->
							<form method="post">
								<div class="container">
									<div class="row">
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black">  Date for Appointment </label>
											<div class="col-xl-10"><input class="form-control" type="datetime-local" name="appointment_date" placeholder="Eg. 2021-02-28 13:45:00"> </input> </div>
										</div>
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black"> Patient Name </label>
											<div class="col-xl-10"><input class="form-control" type="text" name="patient_name"> </input> </div>
										</div>
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black"> Patient Mobile </label>
											<div class="col-xl-10"><input class="form-control" type="number" name="patient_mobile"> </input> </div>
										</div>
									</div>
									<div class="row" style="margin-top: 8px;">
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black">  Doctor Name </label>
											<div class="col-xl-10">
												<!--<input type="text"> </input> -->
												<select class="form-control" name="doctor_id"> 
												<option> Select Doctor </option>
												<?php
													$res0=mysqli_query($con,"select id,name,speciality from doctor_info where leaving_date='0000-00-00' order by name asc");
													while($rowx=mysqli_fetch_assoc($res0))
													{
													if($rowx['id']==$categories_id)
														{	
															echo "<option selected value=".$rowx['id'].">" .$rowx['name']. "</option>";
														}
														else
														{	
															echo "<option value=".$rowx['id'].">" .$rowx['name']." (".$rowx['speciality'].")</option>";
														}
													}
												?>
												</select>
											</div>
										</div>
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black"> Patient Email </label>
											<div class="col-xl-10"><input class="form-control" type="text" name="patient_email"> </input> </div>
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
									<div class="row" style="margin-top: 8px;">
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black">  Today's Date </label>
											<div class="col-xl-10"><input class="form-control" type="date" name="today_date"> </input> </div>
										</div>
										<div class="col-sm-4" style="background-color:;">
											<label class="col-xl-2" style="color:black"> Message/Note </label>
											<div class="col-xl-10"><input class="form-control" type="text" name="message"> </input> </div>
										</div>
									</div>
								</div>
								<div class="modal-footer" style="margin-top:30px">	
									<p style="color:red;margin-top:-33px; margin-bottom:0px; float:left;"> <?php echo $msg ?> </p>
									<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:red; color:white;">Close</button>
									<button type="submit" name="submit" class="btn btn-primary">Book Appointment</button>
								</div>
							</form>	
						</div>
					  </div>
					</div>
				</div>
              </header>
				
			  <div style="overflow-y: hidden;overflow-x: scroll;">	
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
					<th><i class="ri-information-line"></i> Appoint. ID</th>
                    <th><i class="icon_calendar"></i> Appointment Date</th>
					<th><i class="icon_profile"></i> Patient Name</th>	
					<th><i class="icon_mobile"></i> Patient Mobile</th>
                    <th><i class="icon_mail_alt"></i> Patient Email</th>					
                    <th><i class="ri-women-line"></i> Patient Gender</th>					
					<th><i class="ri-nurse-line"></i> Doctor Name</th>
					<th><i class="icon_calendar"></i> Applied Date</th>
                    <th><i class="ri-message-2-line"></i> Message</th>
                    <th><i class="icon_cogs"></i> Status</th>
					<th><i class="ri-pencil-line"></i> Edit</th>
					<th><i class="ri-delete-bin-7-line"></i> Delete</th>
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
					<td><?php echo $row['appointment_date'] ?></td>
					<?php if($row['patient_id']==0){?>
                    <td><?php echo $row['patient_name'] ?></td>
					<?php } ?>
					<?php if($row['patient_id']!=0){?>
                    <td><?php echo "<a href=patient_details.php?id=".$row['patient_id'].">".$row['patient_name']."</a>"?></td>
					<?php } ?>
                    <td><?php echo $row['patient_mobile'] ?></td>
                    <td><?php echo $row['patient_email'] ?></td>
                    <td><?php echo $row['patient_gender'] ?></td>
                    <td><?php 	$xyz=$row['doctor_id'];
								$queryxyz="select name from doctor_info where id='$xyz'";
								$sqlnew=mysqli_query($con,$queryxyz); 
								while($row1=mysqli_fetch_assoc($sqlnew))
								{ 
									echo $row1['name']; 
								}
						?></td>
                    <td><?php echo $row['today_date'] ?></td>
                    <td><?php echo $row['message'] ?></td>
                    <td>
                      <div class="btn-group">
					  <?php
						if($row['status']==1)
						{
							echo"<a href='?type=status&operation=active&id=".$row['id']."' title='Click to Disapprove'> <Font Color='green'> Approved </a>";
						}
						else
						{
							echo"<a href='?type=status&operation=deactive&id=".$row['id']."' title='Click to Approve'><Font Color='red'> Disapproved </a>";
						}
					  ?>		
                    <!--    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> 
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                    <!--    <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>  -->
                      </div>
                    </td>				
					<td><?php echo"<a href='edit_appointment.php?id=".$row['id']."'>&nbsp &nbsp &nbsp<i class='ri-pencil-line' title='Click to Edit'></i> </a>"; ?></td>
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
					<td><?php echo $rowsearch['appointment_date'] ?></td>
                    <?php if($rowsearch['patient_id']==0){?>
                    <td><?php echo $rowsearch['patient_name'] ?></td>
					<?php } ?>
					<?php if($rowsearch['patient_id']!=0){?>
                    <td><?php echo "<a href=patient_detals.php?id=".$rowsearch['patient_id'].">".$rowsearch['patient_name']."</a>"?></td>
					<?php } ?>
                    <td><?php echo $rowsearch['patient_mobile'] ?></td>
                    <td><?php echo $rowsearch['patient_email'] ?></td>
                    <td><?php echo $rowsearch['patient_gender'] ?></td>
                    <td><?php 	$xyz=$rowsearch['doctor_id'];
								$queryxyz="select name from doctor_info where id='$xyz'";
								$sqlnew=mysqli_query($con,$queryxyz); 
								while($row1search=mysqli_fetch_assoc($sqlnew))
								{ 
									echo $row1search['name']; 
								}
						?></td>
                    <td><?php echo $rowsearch['today_date'] ?></td>
                    <td><?php echo $rowsearch['message'] ?></td>
                    <td>
                      <div class="btn-group">
					  <?php
						if($rowsearch['status']==1)
						{
							echo"<a href='?type=status&operation=active&id=".$rowsearch['id']."' title='Click to Disapprove'> <Font Color='green'> Approved </a>";
						}
						else
						{
							echo"<a href='?type=status&operation=deactive&id=".$rowsearch['id']."' title='Click to Approve'><Font Color='red'> Disapproved </a>";
						}
					  ?>		
                    <!--    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> 
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                    <!--    <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>  -->
                      </div>
                    </td>
					<td><?php echo"<a href='edit_appointment.php?id=".$rowsearch['id']."'>&nbsp &nbsp &nbsp<i class='ri-pencil-line' title='Click to Edit'></i> </a>"; ?></td>
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
			  </div>
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
