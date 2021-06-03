<?php
	require('connection.inc.php'); 
	require('functions.inc.php');
	if(!isset($_SESSION['DOCTOR_ID']))
	{
		header('location:selectlogin.php');
	}
	$id=$_SESSION['DOCTOR_ID'];
	$resdoctor=mysqli_query($con,"select * from doctor_info where id ='$id'");
	$rowdoctor=mysqli_fetch_assoc($resdoctor);

	$joining_date=$rowdoctor['joining_date']; 		//Now this is shown in the input field in below HTML code 
	$doctor_name=$rowdoctor['name']; 						//Now this is shown in the input field in below HTML code 
	$doctor_speciality=$rowdoctor['speciality']; 							//Now this is shown in the input field in below HTML code 
	$doctor_mobile=$rowdoctor['phone']; 						//Now this is shown in the input field in below HTML code 
	$doctor_email=$rowdoctor['email']; 							//Now this is shown in the input field in below HTML code 
	$doctor_gender=$rowdoctor['gender']; 			//Now this is shown in the input field in below HTML code 
	$dob=$rowdoctor['dob']; 			//Now this is shown in the input field in below HTML code 
	$address=$rowdoctor['address']; 			//Now this is shown in the input field in below HTML code 
	$city=$rowdoctor['city']; 				//Now this is shown in the input field in below HTML code 
	$leaving_date=$rowdoctor['leaving_date']; 		//Now this is shown in the input field in below HTML code 
	$country=$rowdoctor['country']; 		//Now this is shown in the input field in below HTML code 
	$time_in=$rowdoctor['time_in']; 		//Now this is shown in the input field in below HTML code 
	$time_out=$rowdoctor['time_out']; 		//Now this is shown in the input field in below HTML code 
	$doctor_password=$rowdoctor['password']; 		//Now this is shown in the input field in below HTML code 
	$image_required='required';
	
	if(isset($_POST['submit']))
	{
		$joining_date=get_safe_value($con,$_POST['joining_date']);
		$doctor_name=get_safe_value($con,$_POST['doctor_name']);
		$doctor_speciality=get_safe_value($con,$_POST['doctor_speciality']);
		$doctor_mobile=get_safe_value($con,$_POST['doctor_mobile']);
		$doctor_email=get_safe_value($con,$_POST['doctor_email']);
		$doctor_gender=get_safe_value($con,$_POST['doctor_gender']);
		$dob=get_safe_value($con,$_POST['dob']);
		$address=get_safe_value($con,$_POST['address']);
		$city=get_safe_value($con,$_POST['city']);
		$country=get_safe_value($con,$_POST['country']);
		$leaving_date=get_safe_value($con,$_POST['leaving_date']);
		$time_in=get_safe_value($con,$_POST['time_in']);
		$time_out=get_safe_value($con,$_POST['time_out']);
		$doctor_password=get_safe_value($con,$_POST['doctor_password']);
		$checkbox1 = $_POST['chkl'] ; 
		$chk="";
		
		foreach($checkbox1 as $chk1)  
		{  
			$chk .= $chk1.",";  
		} 
		if($chk!='')
		{
			if($_FILES['image']['name']!='')
			{
				$image=$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/doctors_image/'.$image);
				mysqli_query($con,"update doctor_info set joining_date='$joining_date',name='$doctor_name',speciality='$doctor_speciality'
				,phone='$doctor_mobile',email='$doctor_email',gender='$doctor_gender',dob='$dob',image='$image',shift='$chk',address='$address'
				,city='$city',country='$country',leaving_date='$leaving_date',time_in='$time_in',time_out='$time_out',password='$doctor_password' where id='$id'");
			}
			
			else{
				mysqli_query($con,"update doctor_info set joining_date='$joining_date',name='$doctor_name',speciality='$doctor_speciality'
				,phone='$doctor_mobile',email='$doctor_email',gender='$doctor_gender',dob='$dob',shift='$chk',address='$address',city='$city',
				country='$country',leaving_date='$leaving_date',time_in='$time_in',time_out='$time_out',password='$doctor_password' where id='$id'");	
				/* echo("Error description: " . mysqli_error($con)); */
			}
		}
		else
		{
			if($_FILES['image']['name']!='')
			{
				$image=$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/doctors_image/'.$image);
				mysqli_query($con,"update doctor_info set joining_date='$joining_date',name='$doctor_name',speciality='$doctor_speciality'
				,phone='$doctor_mobile',email='$doctor_email',gender='$doctor_gender',dob='$dob',image='$image',address='$address'
				,city='$city',country='$country',leaving_date='$leaving_date',time_in='$time_in',time_out='$time_out,password='$doctor_password'' where id='$id'");
			}
			
			else{
				mysqli_query($con,"update doctor_info set joining_date='$joining_date',name='$doctor_name',speciality='$doctor_speciality'
				,phone='$doctor_mobile',email='$doctor_email',gender='$doctor_gender',dob='$dob',address='$address',city='$city',
				country='$country',leaving_date='$leaving_date',time_in='$time_in',time_out='$time_out',password='$doctor_password' where id='$id'");	
				/* echo("Error description: " . mysqli_error($con)); */
			}
		}
		header('location:profilepagedoctor.php'); 
		die();
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Doctor Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Favicons -->
	  <link href="assets/img/doctor-profile.jpg" rel="icon">
	  <link href="assets/img/doctor-profile.jpg" rel="apple-touch-icon">
	
	<style type="text/css">
    	body{margin-top:20px;}                                                                    
    </style>
</head>
<body>

<div class="container bootstrap snippets bootdey">
    <div class="row" style="margin-bottom:10px; background-color: #f94152d9; box-shadow: 0 0 15px #605656;">
        <div class="col-sm-10">
            <h1>Dr. <?php echo $doctor_name; ?></h1>
            <h4><?php echo $rowdoctor['speciality']; ?></h4>
            <h4>Date of Birth : <?php echo $rowdoctor['dob']; ?></h4>
			<p style='font-size: 15px;font-weight: 510;font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;'><?php echo $rowdoctor['shift']; ?></p>
		</div>
        <div class="col-sm-2" style="padding-top:5px; padding-bottom:5px;">
            <img title="profile image" class="img-circle img-responsive" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$rowdoctor['image']?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> <?php echo $rowdoctor['joining_date']; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Timing</strong></span> <?php echo $rowdoctor['time_in']; ?>-<?php echo $rowdoctor['time_out']; ?>  </li>

            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Contact Details <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">Email :<a href="#">&nbsp &nbsp <?php echo $rowdoctor['email']; ?> </a></div>
				<div class="panel-body">Mobile :<a href="#">&nbsp <?php echo $rowdoctor['phone']; ?> </a></div>
            </div>

           <!-- <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
            </ul> -->

            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>
                <div class="panel-body">
					<a class="btn btn-danger" href="logoutd.php">Logout</a>
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#home" data-toggle="tab">Active Appointments</a></li>
                <li><a href="#messages" data-toggle="tab">Notifications</a></li>
                <li><a href="#settings" data-toggle="tab">Edit Profile</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Appoint. ID</th>
									<th>Appointment Date</th>
									<th>Patient Name</th>	
									<th>Patient Mobile</th>
									<th>Patient Email</th>					
									<th>Patient Gender</th>					
									<th>Applied Date</th>
									<th>Message / Note</th>
									<th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="items">
				
                                <?php 
									$sqlforappoin="select * from appointment_info where doctor_id='$id' ORDER BY id desc";
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
									<td><?php echo $rowforappoin['patient_mobile'] ?></td>
									<td><?php echo $rowforappoin['patient_email'] ?></td>
									<td><?php echo $rowforappoin['patient_gender'] ?></td>
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
                        
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <ul class="pagination" id="myPager"></ul>
                            </div>
                        </div>
                    </div>
                    <!--/table-resp-->

                    

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="messages">

                    <h2></h2>
					<?php
						$checktodaydate=date('Y-m-d');
						$sqlnotif = mysqli_query($con,"select count(id) as countid from appointment_info where doctor_id='$id' and today_date='$checktodaydate'");
						$rowcount = mysqli_fetch_assoc($sqlnotif);
					?>
                    <ul class="list-group">
                        <li class="list-group-item text-muted">Inbox</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">You have <?php echo $rowcount['countid'] ;?> new appointments </a> <?php echo $checktodaydate;?></li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>

                    </ul>
					

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="settings">

                    <hr>
                    <form class="form" enctype="multipart/form-data" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>Date of Joining</h4></label>
                                <input type="date" class="form-control" name="joining_date" id="first_name" style="padding-top: 0px;" placeholder="Eg. 2021-02-28 13:45:00" title="Your date of joining this hospital" value="<?php echo $joining_date; ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Full Name</h4></label>
                                <input type="text" class="form-control" name="doctor_name" id="last_name" placeholder="Full name" value="<?php echo $doctor_name; ?>">
                            </div>
                        </div>
						
						<div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Gender</h4></label>
									<select class="form-control" name="doctor_gender"> 
									<option> <?php echo $doctor_gender; ?> </option>
									<option> Male </option>
									<option> Female </option>
									<option> Other </option>
									</select>
								</div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Speciality</h4></label>
									<select class="form-control" name="doctor_speciality"> 
									<option> <?php echo $doctor_speciality; ?> </option>
									<option> Allergists </option>
									<option> Cardiologist </option>
									<option> Dentist </option>
									<option> Dermatologist </option>
									<option> Endocrinologist </option>
									<option> Gastroenterologist </option>
									<option> Gynecologist </option>
									<option> Neurologist </option>
									<option> Pathologist </option>
									<option> Pediatrician </option>
									<option> Physiatrist </option>
									<option> Plastic Surgeon </option>
									<option> Psychiatrist </option>
									<option> Radiologist </option>
									<option> Surgeon </option>
									</select>
							</div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="doctor_mobile" id="mobile" placeholder="enter mobile number" value="<?php echo $doctor_mobile; ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4></label>
                                <input type="email" class="form-control" name="doctor_email" id="email" placeholder="you@email.com" value="<?php echo $doctor_email; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Date of Birth</h4></label>
                                <input type="date" class="form-control" name="dob" id="password" style="padding-top: 0px;" placeholder="password" value="<?php echo $dob; ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Address</h4></label>
                                <input type="text" class="form-control" name="address" id="password2" placeholder="password2" value="<?php echo $address; ?>">
                            </div>
                        </div>
						
						<div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>City</h4></label>
                                <input type="text" class="form-control" name="city" id="password" placeholder="password" value="<?php echo $city; ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Country</h4></label>
                                <input type="text" class="form-control" name="country" placeholder="password2" value="<?php echo $country; ?>">
                            </div>
                        </div>
		
						<div class="form-group mt-3">

                            <div class="col-xs-12" style="margin-top: 4px;margin-bottom: 4px;">
                                <label for="password2">
                                    <h4>Shift Days</h4></label><br>
									<label>Monday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Monday"> </input>  
									<label>&nbsp &nbsp Tuesday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Tuesday"> </input>  
									<label>&nbsp &nbsp Wednesday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Wednesday"> </input>  
									<label>&nbsp &nbsp Thursday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Thursday"> </input>  
									<label>&nbsp &nbsp Friday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Friday"> </input>  
									<label>&nbsp &nbsp Saturday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Saturday"> </input>  
									<label>&nbsp &nbsp Sunday &nbsp </label> <input type="checkbox" name="chkl[ ]" value="Sunday"> </input>  
							</div>
                        </div>
						
						<div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Time In</h4></label>
                                <input type="time" class="form-control" name="time_in" placeholder="Check in Time" value="<?php echo $time_in; ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Time Out</h4></label>
                                <input type="time" class="form-control" name="time_out" placeholder="Check out Time" value="<?php echo $time_out; ?>">
                            </div>
                        </div>
						
						<div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Image</h4></label>
									<input class="form-control" type="file" name="image"> </input> 
								</div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Leaving Date</h4></label>
                                <input type="date" class="form-control" name="leaving_date" style="padding-top: 0px;" value="<?php echo $leaving_date; ?>">
                            </div>
                        </div>
						
						<div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Password</h4></label>
                                <input type="text" class="form-control" name="doctor_password" value="<?php echo $doctor_password; ?>">
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="submit"> Save</button>
                                <!--<button class="btn btn-lg" type="reset"> Reset</button> -->
                            </div>
                        </div>
						
                    </form>
                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
	
	<div class="row" style="margin-top:30px; background-color: #c8c8c8;">
		<div style="text-align:center">
			&copy; Copyright <strong><span>HMS Hospital</span></strong>. All Rights Reserved
		  </div>
		  <div style="text-align:center">
			Designed by <a href="#">HMS TECH TEAM</a>
		</div>
	</div>
	
</div>
<!--/row-->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	                        

                        

              	  
                                                      
</script>
</body>
</html>