
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Jimboree Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="http://202.56.162.67/w/assets/img/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/css/util.css">
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v8/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="<?php echo base_url(); ?>welcome/doLogin">
					<span class="login100-form-title">
						Sign In
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
                            
						</span>
                        <!--
						<a href="#" class="txt2">
							Username / Password?
						</a>-->
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
                    <?php 
                                if(!is_null($msg))
                                    echo base64_decode($msg);
                            ?>
					</div>
				</form>
			</div>
		</div>
	</div>


<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/lf/Login_v8/vendor/jquery/jquery-3.2.1.min.js" type="53045b94970dd5721055ab92-text/javascript"></script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/lf/Login_v8/vendor/animsition/js/animsition.min.js" type="53045b94970dd5721055ab92-text/javascript"></script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/lf/Login_v8/vendor/bootstrap/js/popper.js" type="53045b94970dd5721055ab92-text/javascript"></script>
	<script src="https://colorlib.com/etc/lf/Login_v8/vendor/bootstrap/js/bootstrap.min.js" type="53045b94970dd5721055ab92-text/javascript"></script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/lf/Login_v8/vendor/select2/select2.min.js" type="53045b94970dd5721055ab92-text/javascript"></script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/lf/Login_v8/vendor/daterangepicker/moment.min.js" type="53045b94970dd5721055ab92-text/javascript"></script>
	<script src="https://colorlib.com/etc/lf/Login_v8/vendor/daterangepicker/daterangepicker.js" type="53045b94970dd5721055ab92-text/javascript"></script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/lf/Login_v8/vendor/countdowntime/countdowntime.js" type="53045b94970dd5721055ab92-text/javascript"></script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/lf/Login_v8/js/main.js" type="53045b94970dd5721055ab92-text/javascript"></script>
	
</body>
</html>
