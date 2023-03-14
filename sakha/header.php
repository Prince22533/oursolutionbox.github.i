<?php 
include "config.php";
	session_start();

	if(!isset($_SESSION["username"])){
		header("Location: {$hostname}/");
	}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- font-awesom -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 	<!-- css -->
 	<link rel="stylesheet" type="text/css" href="css/a.css">
 	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
 	<!-- jquaery -->
	<script src="jstop-postion/jquery.js"></script>
 </head>
<body>
<div class="all-index-in">
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-3 text-center fs-1" id="logo">
					<b class="text-primary">Sakha</b>
				</div>
				<div class="col-md-9 form-group" >
					<a href="search.php"><input type="text" placeholder="Search...." name="" class="form-control form-control-lg" readonly></a>
				</div>
			</div>
		</div>
	</header>

	<nav id="nav" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="list-inline">
						<li class="list-inline-item"><a href="home.php" ><i class="fa-solid fa-house" id="fa"></i></a></li>
						<li class="list-inline-item"><a href="friends.php" ><i class="fa-solid fa-user-group" id="fa"></i></a></li>
						<li class="list-inline-item"><a href="video.php" ><i class="fa-solid fa-tv" id="fa"></i></a></li>
						<li class="list-inline-item"><a href="profile.php" ><i class="fa-regular fa-circle-user" id="fa"></i></a></li>
						<li class="list-inline-item"><a href="message.php" ><i class="fa-regular fa-bell" id="fa"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
