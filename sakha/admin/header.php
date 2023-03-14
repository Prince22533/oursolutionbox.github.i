<?php 
include "config.php";
	session_start();

	if(!isset($_SESSION["username"])){
		header("Location: {$hostname}/admin/");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<!-- font-awesom -->
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 	<!-- css -->
 	<link rel="stylesheet" type="text/css" href="style.css">
 	<!-- jquaery -->
	<script src="jstop-postion/jquery.js"></script>
 </head>
<body>
	<header >
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-primary fs-1" id="logo">
					<b>Sakha</b>
				</div>
				<div class="col-md-6  fs-3" id="logo">
					<div class="log"> <a href="logout.php">HELLO <?php echo  $_SESSION["user_name"]; ?>, LOGOUT </a></div>
				</div>
				
			</div>
		</div>
	</header>
	<nav id="nav" class="section bg-primary ">
		<div class="container">
			<div class="row ">
				<div class="col-md-12 ">
					<ul class="list-inline">
						<li class="list-inline-item"><a href="post.php" >POST</a></li>
						<?php 
						if($_SESSION["user_role"] == '1'){

						?>
						<li class="list-inline-item"><a href="user.php" >USER</a></li>
						<li class="list-inline-item"><a href="setting.php" >SETTING</a></li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</nav>