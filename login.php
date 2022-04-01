<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 05:57:41 GMT -->
<head>

	<title>Login</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<form role="form" method="POST">
				<div class="row align-items-center text-center">
					<div class="col-md-12">
						<div class="card-body">
							<h4 class="mb-3 f-w-500">LOGIN</h4>
							<div class="form-group mb-3">
								<label class="floating-label" for="username">Username</label>
								<input type="text" class="form-control" name="username" placeholder="">
							</div>
							<div class="form-group mb-4">
								<label class="floating-label" for="Password">Password</label>
								<input type="password" class="form-control" name="password" placeholder="">
							</div>
							<button class="btn btn-block btn-primary mb-4" name="login">Signin</button>
						</div>
					</div>
				</div>
			</form>
			<?php
				$koneksi = new mysqli("localhost","root","","db_koperasi");
				if (isset($_POST['login']))
				{
					$cek = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[username]'
					AND password='$_POST[password]'");
					$admin = $cek->num_rows;
					if ($admin==1)
					{
						$_SESSION['admin']=$cek->fetch_assoc();
						echo "<div class='alert alert-info'>Login Berhasil</div>";
						echo "<meta http-equiv='refresh' content='1;url=index.php'>";
					}
					else
					{
						echo "<div class='alert alert-danger'>Login Gagal</div>";
						echo "<meta http-equiv='refresh' content='1;url=login.php'>";
					}
				}
			?>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>

		

</body>

</html>
