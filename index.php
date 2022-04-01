<?php
	$koneksi = new mysqli("localhost","root","","db_koperasi");
	session_start();


	if(empty($_SESSION['admin'])){	?>
	<script>
    alert("Anda Harus Login Dahulu"); 
    window.location="login.php"; 
    </script>
    <?php
	}
?>

<?php
	include('include/head.php');
	include('include/class.php');
	include('include/lib.php');
?>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->

	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="assets/images/avatar.png" alt="User-Profile-Image">
						<div class="user-details">	
							<div id="more-details">ADMIN</div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-inline">
							<li class="list-inline-item"><a href="logout.php" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
						</ul>
					</div>
				</div>
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li class="nav-item"><a href="index.php?page=dashboard" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a></li>
					<li class="nav-item"><a href="index.php?page=nasabah" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Anggota</span></a></li>
					<li class="nav-item"><a href="index.php?page=simpanan" class="nav-link "><span class="pcoded-micon"><i class="feather icon-folder"></i></span><span class="pcoded-mtext">Simpanan</span></a></li>
                    <li class="nav-item"><a href="index.php?page=pinjaman" class="nav-link "><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Pinjaman</span></a></li>
					<li class="nav-item"><a href="index.php?page=angsuran" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Angsuran</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->

	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<a style="font-size:20px">Koperasi</a>
						
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	<!-- [ Main ] start -->

    <?php
    include('config/program.php');
    ?>

    <!-- [ Main ] end -->


    <?php
    include('include/script.php');
    ?>
	

</body>
</html>