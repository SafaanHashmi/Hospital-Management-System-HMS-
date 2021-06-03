
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>HMS Hospital</h3>
              <p>
                Plot No. 91, Scheme No. 53 Ratanlok Colony,
                Vijay Nagar, Indore, Madhya Pradesh 452011 <br><br>
                <strong>Phone:</strong> +91 9039228002<br>
                <strong>Email:</strong> hms@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/safaanhashmi/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="services.php">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Neuro surgery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Vascular Surgery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">NICU</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">ICU</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">ELEKTA SYNERGY</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe to our newsletter.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>HMS Hospital</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">HMS TECH TEAM</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  
  <script>
	function doctor_login()
	{
		jQuery('.field_error').html('');
		var email=jQuery("#doctor_email").val();
		var password=jQuery("#doctor_password").val();	
		var is_error='';
		
		if(email=="")
		{
			jQuery('#doctor_email_error').html('Please enter email');
			is_error='yes';
		}
		if(password=="")
		{
			jQuery('#doctor_password_error').html('Please enter password');
			is_error='yes';
		}
		
		if(is_error=='')
		{
			jQuery.ajax
			({
				url:'profilecheckdoctor.php',
				method:'post',
				data:'email='+email+'&password='+password,
				success:function(result)
				{
					if(result=='wrong')
					{
						jQuery('.login_msg').html('Please enter valid login details');
					}
					if(result=='valid')
					{
						window.location.href='profilepagedoctor.php';
					}
				}
			});
		}
		
	}
	
	
	function patient_login()
	{
		jQuery('.field_error').html('');
		var email=jQuery("#patient_email").val();
		var password=jQuery("#patient_password").val();	
		var is_error='';
		
		if(email=="")
		{
			jQuery('#patient_email_error').html('Please enter email');
			is_error='yes';
		}
		if(password=="")
		{
			jQuery('#patient_password_error').html('Please enter password');
			is_error='yes';
		}
		
		if(is_error=='')
		{
			jQuery.ajax
			({
				url:'profilecheckpatient.php',
				method:'post',
				data:'email='+email+'&password='+password,
				success:function(result)
				{
					if(result=='wrong')
					{
						jQuery('.login_msg_patient').html('Please enter valid login details');
					}
					if(result=='valid')
					{
						window.location.href='profilepagepatient.php';
					}
				}
			});
		}
		
	}
	
  </script>

</body>

</html>