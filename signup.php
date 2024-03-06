<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['fullname'];
	$mobno = $_POST['mobilenumber'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$ret = mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNo='$mobno'");
	$result = mysqli_fetch_array($ret);
	if ($result > 0) {
		$msg = "This email or Contact Number already associated with another account";
	} else {
		$query = mysqli_query($con, "insert into tbluser(FullName, MobileNo, Email,  Password) value('$fname', '$mobno', '$email', '$password' )");
		if ($query) {
			$msg = "You have successfully registered";
		} else {
			$msg = "Something Went Wrong. Please try again";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>WSMS-Signup Page</title>

	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css"> -->
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<style>
		body {
			background-image: url("https://images.unsplash.com/photo-1471286274405-579f8d7132d8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
			object-fit: cover;
		}
	</style>
</head>

<body>

	<div class="super_container">
		<div class="super_overlay"></div>



		<div class="outer-div">
			<div class="inner-div">
				<div class="contact" style="
	margin-bottom: 100px;
	margin-top: 156px" ;>
					<div class="container-register">
						<div class="row">
							<div class="col">
								<div class="section_title_container text-center">
									<!-- <div class="section_subtitle">the best deals of water</div> -->
									<div class="section_title">
										<h1 style="position: relative;top: 252px;">Sign Up</h1>
									</div>
								</div>
							</div>
						</div>
						<div class="row contact_row">

							<!-- Contact - About -->


							<!-- Contact - Image -->
							<div class="col-lg-4 contact_col">
								<div class="contact_image d-flex flex-column align-items-center justify-content-center">
									<div><img src="images/register.png" alt=""
											style=" position: relative;left: 550px;top: 250px;"></div>
								</div>
							</div>

						</div>
						<div class="row contact_form_row">
							<div class="col">
								<div class="contact_form_container">
									<form action="#" class="contact_form text-center" id="contact_form" method="post"
										name="signup">
										<p style="font-size:16px; color:red" align="center">
											<?php if ($msg) {
												echo $msg;
											} ?>
										</p>
										<div class="row">
											<div class="col-lg-12">
												<input type="text" class="form-control" placeholder="Your name"
													id="fullname" name="fullname" required="true" st>
											</div>

										</div>
										<div class="row" style="margin-top:4%">
											<div class="col-lg-12">
												<input type="email" class="form-control" placeholder="Your e-mail"
													id="email" name="email" required="true">
											</div>

										</div>
										<div class="row" style="margin-top:4%">
											<div class="col-lg-12">
												<input type="text" class="form-control" placeholder="Contact Number"
													id="mobilenumber" name="mobilenumber" required="true" maxlength="10"
													pattern="[0-9]+">
											</div>



										</div>
										<div class="row" style="margin-top:4%">
											<div class="col-lg-12">
												<input type="password" class="form-control" placeholder="Password"
													required="true" id="password" name="password">
											</div>

										</div>

										<div class="row" style="margin-top:4%">
											<input class="form-check-input" type="checkbox" value=""
												id="form2Example3c" />
											<label class="form-check-label text-black" for="form2Example3">
												I do accept the <a href="#!" class="text-blue"><u>Terms and
														Conditions</u></a> of your
												site.
											</label>
										</div>


										<button class="btn btn-success" style="margin-top:4%" type="submit"
											name="submit">Register</button>
										<div class="row m-t-50">
											<div class="col-sm-12 text-center" style="margin-top:4%">
												<p class="text-muted">Already have an account? <a href="signin.php"
														class="text-dark m-l-5"><b>Sign In</b></a></p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>

	</div>



	</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="styles/bootstrap-4.1.2/popper.js"></script>
	<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/progressbar/progressbar.min.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="js/contact.js"></script>
</body>

</html>