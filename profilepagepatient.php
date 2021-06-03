<?php
	require('connection.inc.php'); 
	require('functions.inc.php');
	if(!isset($_SESSION['PATIENT_ID']))
	{
		header('location:selectlogin.php');
	}
	$id=$_SESSION['PATIENT_ID'];
	$respatient=mysqli_query($con,"select * from patient_info where id ='$id'");
	$rowpatient=mysqli_fetch_assoc($respatient);

	$registeration_no=$rowpatient['registeration_no']; 		//Now this is shown in the input field in below HTML code 
	$date_of_reg=$rowpatient['date_of_reg'];					//Now this is shown in the input field in below HTML code
	$patient_fullname=$rowpatient['fullname']; 			//Now this is shown in the input field in below HTML code
	$patient_password=$rowpatient['password']; 			//Now this is shown in the input field in below HTML code 
	$patient_occupation=$rowpatient['occupation']; 			//Now this is shown in the input field in below HTML code 
	$patient_mobile=$rowpatient['mobile']; 				//Now this is shown in the input field in below HTML code 
	$patient_email=$rowpatient['email']; 				//Now this is shown in the input field in below HTML code 
	$patient_gender=$rowpatient['gender'];	 			//Now this is shown in the input field in below HTML code 
	$dob=$rowpatient['dob']; 							//Now this is shown in the input field in below HTML code 
	$address=$rowpatient['address']; 					//Now this is shown in the input field in below HTML code 
	$city=$rowpatient['city']; 							//Now this is shown in the input field in below HTML code 
	$country=$rowpatient['country']; 					//Now this is shown in the input field in below HTML code 
	$marital_status=$rowpatient['marital_status'];
	//$leaving_date=$rowpatient['leaving_date']; 				Now this is shown in the input field in below HTML code 
	$family_mobile=$rowpatient['family_mobile'];
	$height=$rowpatient['height'];
	$weight=$rowpatient['weight'];
	$age=$rowpatient['age'];
	$aadhar_no=$rowpatient['aadhar_no'];
	$pancard_no=$rowpatient['pancard_no'];
	$image_required='required';
	
	//FOR EDIT DETAILS
	if(isset($_POST['submit']))
	{
		$patient_fullname=get_safe_value($con,$_POST['patient_fullname']);
		$patient_password=get_safe_value($con,$_POST['patient_password']);
		$patient_occupation=get_safe_value($con,$_POST['patient_occupation']);
		$patient_email=get_safe_value($con,$_POST['patient_email']);
		$patient_mobile=get_safe_value($con,$_POST['patient_mobile']);
		$patient_gender=get_safe_value($con,$_POST['patient_gender']);
		$dob=get_safe_value($con,$_POST['dob']);
		$address=get_safe_value($con,$_POST['address']);
		$city=get_safe_value($con,$_POST['city']);
		$country=get_safe_value($con,$_POST['country']);
		$marital_status=get_safe_value($con,$_POST['marital_status']);
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
			mysqli_query($con,"update patient_info set fullname='$patient_fullname',password='$patient_password',occupation='$patient_occupation'
			,mobile='$patient_mobile',email='$patient_email',gender='$patient_gender',dob='$dob',image='$image',marital_status='$marital_status'
			,address='$address',city='$city',country='$country',family_mobile='$family_mobile',height='$height',weight='$weight',age='$age'
			,aadhar_no='$aadhar_no',pancard_no='$pancard_no' where id='$id'");
		}
		else{
			mysqli_query($con,"update patient_info set fullname='$patient_fullname',password='$patient_password',occupation='$patient_occupation'
			,mobile='$patient_mobile',email='$patient_email',gender='$patient_gender',dob='$dob',marital_status='$marital_status'
			,address='$address',city='$city',country='$country',family_mobile='$family_mobile',height='$height',weight='$weight',age='$age'
			,aadhar_no='$aadhar_no',pancard_no='$pancard_no' where id='$id'");	
			/* echo("Error description: " . mysqli_error($con)); */
		}
		
		header('location:profilepagepatient.php'); 
		die();
	}
	
	//FOR BOOK APPOINTMENT
	if(isset($_POST['submitapp']))
	{
		$doctor_nameid=get_safe_value($con,$_POST['doctor_nameid']);
		$messageinp=get_safe_value($con,$_POST['messageinp']);
		$today_dateinp=get_safe_value($con,$_POST['today_dateinp']);
		
		mysqli_query($con,"insert into appointment_info(`patient_name`,`patient_mobile`,`doctor_id`,`patient_id`,`patient_email`,`patient_gender`,`today_date`,`message`,`status`) 
					values('$patient_fullname','$patient_mobile','$doctor_nameid','$id','$patient_email','$patient_gender','$today_dateinp','$messageinp',0)");	
		header('location:profilepagepatient.php'); 
		die();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title><?php echo $patient_fullname;?>'s Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Favicons -->
	  <link href="assets/img/patient-profile.png" rel="icon">
	  <link href="assets/img/patient-profile.png" rel="apple-touch-icon">
	
	<style type="text/css">
    	body{margin-top:20px;}                                                                    
    </style>
</head>
<body>

<div class="container bootstrap snippets bootdey">
    <div class="row" style="margin-bottom:10px; background-color: #41f9abd9; box-shadow: 0 0 15px #605656;">
        <div class="col-sm-10">
            <h1><?php if($rowpatient['gender']=='Male'){echo "Mr. ".$rowpatient['fullname'];} 
					elseif($rowpatient['gender']=='Female'){ echo "Miss. ".$rowpatient['fullname'];}
					else{ echo $rowpatient['fullname'];}?></h1>
            <h4><?php echo $rowpatient['occupation']; ?></h4>
            <h4>Date of Birth : <?php echo $rowpatient['dob']; ?></h4>
            <h4>HMS ID : <?php echo $rowpatient['registeration_no']; ?></h4>
			</div>
        <div class="col-sm-2" style="padding-top:5px; padding-bottom:5px;">
            <img title="profile image" class="img-circle img-responsive" src="<?php echo PATIENT_IMAGE_SITE_PATH.$rowpatient['image']?>">
        </div>
    </div>
	
	
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Registered</strong></span> <?php echo $rowpatient['date_of_reg']; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Age</strong></span> <?php echo $rowpatient['age']; ?></li>

            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Contact Details <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">Email :<a href="#">&nbsp &nbsp <?php echo $rowpatient['email']; ?> </a></div>
				<div class="panel-body">Mobile :<a href="#">&nbsp <?php echo $rowpatient['mobile']; ?> </a></div>
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
					<a class="btn btn-danger" href="logoutp.php">Logout</a>
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#home" data-toggle="tab">Active Appointments</a></li>
                <li><a href="#messages" data-toggle="tab">Make Appointment</a></li>
                <li><a href="#settings" data-toggle="tab">Edit Profile</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Appoint. ID</th>
									<th>Patient Name</th>	
									<th>Doctor Name</th>
									<th>Dr Time In</th>					
									<th>Dr Time Out</th>					
									<th>Applied Date</th>
									<th>Message / Note</th>
									<th>Appointment Date</th>
									<th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="items">
				
                                <?php 
									
									$sqlforappoin="select * from appointment_info where patient_id='$id' ORDER BY id desc";
									$resforappoin = mysqli_query($con,$sqlforappoin);
									if(mysqli_num_rows($resforappoin)!=0)
									{
									while($rowforappoin=mysqli_fetch_assoc($resforappoin))
									{ 									
								?>
								  
								<tr>
									<td><?php echo $rowforappoin['id'] ?></td>
									
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
									<td><?php if($rowforappoin['appointment_date']!='0000-00-00 00:00:00')
											{
												echo $rowforappoin['appointment_date'];
											}
											else{
												echo "Estimated app. time <br>".$rowfordoctordetails['time_in']." - ".$rowfordoctordetails['time_out']."<br> on any of upcoming<br>".$rowfordoctordetails['shift'];
											}?></td>
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
									else
									{
								  ?> 
									<tr>
										<td>  </td>
										<td>  </td>
										<td>  </td>
										<td style="color:red;font-size: 17px;"> No&nbspActive </td>
										<td style="color:red;font-size: 17px;">Appointments </td>
									</tr>
								   <?php 
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

					<form class="form" enctype="multipart/form-data" method="post" id="registrationForm">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Select Department</h4></label>
									<select class="form-control" name="doctor_speciality" id="specialitydoc"> 
										<option value="blank0"> Select Speciality </option>
										<option value="allergists"> Allergists </option>
										<option value="cardiologist"> Cardiologist </option>
										<option value="dentist"> Dentist </option>
										<option value="dermatologist"> Dermatologist </option>
										<option value="endocrinologist"> Endocrinologist </option>
										<option value="gastroenterologist"> Gastroenterologist </option>
										<option value="gynecologist"> Gynecologist </option>
										<option value="neurologist"> Neurologist </option>
										<option value="pathologist"> Pathologist </option>
										<option value="pediatrician"> Pediatrician </option>
										<option value="physiatrist"> Physiatrist </option>
										<option value="plasticsurgeon"> Plastic Surgeon </option>
										<option value="psychiatrist"> Psychiatrist </option>
										<option value="radiologist"> Radiologist </option>
										<option value="surgeon"> Surgeon </option>
									</select>
							</div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Releted Doctor</h4></label>
									<select class="form-control" name="doctor_nameid" id="namedoc"> 
										<option value=""> Name of doctor</option>
									</select>
							</div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Today's Date</h4></label>
                                <input type="date" class="form-control" name="today_dateinp" id="password" style="padding-top: 0px;" placeholder="">
                            </div>
                        </div>
						
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Note</h4></label>
                                <input type="text" class="form-control" name="messageinp" id="password" style="padding-top: 0px;" placeholder="">
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="submitapp"> Apply for Appointment</button>
                                <!--<button class="btn btn-lg" type="reset"> Reset</button> -->
                            </div>
                        </div>
						
					</form>
						
                    <!--<h2></h2>

                    <ul class="list-group">
                        <li class="list-group-item text-muted">Inbox</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>

                    </ul> -->

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="settings">

                    <hr>
                    <form class="form" enctype="multipart/form-data" method="post" id="registrationForm">
                        
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Full Name</h4></label>
                                <input type="text" class="form-control" name="patient_fullname" id="last_name" placeholder="Full name" value="<?php echo $patient_fullname; ?>">
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Password</h4></label>
                                <input type="text" class="form-control" name="patient_password" value="<?php echo $patient_password; ?>">
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Gender</h4></label>
									<select class="form-control" name="patient_gender"> 
									<option> <?php echo $patient_gender; ?> </option>
									<option> Male </option>
									<option> Female </option>
									<option> Other </option>
									</select>
								</div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="patient_mobile" id="mobile" placeholder="enter mobile number" value="<?php echo $patient_mobile; ?>">
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4></label>
                                <input type="email" class="form-control" name="patient_email" id="email" placeholder="you@email.com" value="<?php echo $patient_email; ?>">
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
                                <label for="password2">
                                    <h4>Occupation</h4></label>
                                <input type="text" class="form-control" name="patient_occupation" id="password2" placeholder="password2" value="<?php echo $patient_occupation; ?>">
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Age</h4></label>
                                <input type="text" class="form-control" name="age" id="password2" placeholder="password2" value="<?php echo $age; ?>">
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Marital Status</h4></label>
									<select class="form-control" name="marital_status"> 
									<option> <?php echo $marital_status; ?></option>
									<option> Married </option>
									<option> Unmarried </option>
									</select>
							</div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Family Mobile</h4></label>
                                <input type="text" class="form-control" name="family_mobile" id="mobile" placeholder="enter mobile number" value="<?php echo $family_mobile; ?>">
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
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Image</h4></label>
									<input class="form-control" type="file" name="image"> </input> 
								</div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Height in cm </h4></label>
									<input class="form-control" type="text" name="height" value="<?php echo $height; ?>"> </input> 
								</div>
                        </div>
				
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Weight in Kg </h4></label>
									<input class="form-control" type="text" name="weight" value="<?php echo $weight; ?>"> </input> 
								</div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Pancard No.</h4></label>
									<input class="form-control" type="text" name="pancard_no" value="<?php echo $pancard_no; ?>"> </input> 
								</div>
                        </div>
						
						<div class="form-group">
                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Aadhar No.</h4></label>
									<input class="form-control" type="text" name="aadhar_no" value="<?php echo $aadhar_no; ?>"> </input> 
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
    
	<div class="row" style="margin-top:30px; background-color:#c8c8c8;">
		<div style="text-align:center">
			&copy; Copyright <strong><span>HMS Hospital</span></strong>. All Rights Reserved
		  </div>
		
		  <div style="text-align:center">
			Designed by <a href="#">HMS TECH TEAM</a>
		</div>
	</div>
	<!--/col-9-->
</div>
<!--/row-->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>	    

<script>
$(document).ready(function () {
    $("#specialitydoc").change(function () {
        var val = $(this).val();   //For this value(doctor ID) select time-in time-out.  
		if (val == "allergists") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Allergists" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "cardiologist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Cardiologist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "dentist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Dentist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "dermatologist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Dermatologist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "endocrinologist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Endocrinologist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "gastroenterologist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Gastroenterologist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "gynecologist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Gynecologist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "neurologist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Neurologist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "pathologist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Pathologist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "pediatrician") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Pediatrician" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "physiatrist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Physiatrist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "plasticsurgeon") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Plastic Surgeon" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "psychiatrist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Psychiatrist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "radiologist") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Radiologist" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "surgeon") {
			$("#namedoc").html("<?php $res0=mysqli_query($con,'select id,name,speciality from doctor_info where speciality="Surgeon" order by name asc');
								while($rowx=mysqli_fetch_assoc($res0))
								{
									echo '<option value='.$rowx["id"].'>' .$rowx["name"].'</option>';
								}?>");
		} else if (val == "blank0") {
			$("#namedoc").html("<option value=''>--select speciality first--</option>");
		}
	});
});


</script>  
    
</body>
</html>