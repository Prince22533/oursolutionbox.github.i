<?php 
include "config.php";
	session_start();

	if(isset($_SESSION["username"])){
		header("Location: {$hostname}/home.php");
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
	
	
 	<link rel="stylesheet" type="text/css" href="admin/style.css">
 	<!-- jquaery -->
	 </head>
<body bgcolor="grey">
	<section class="admin bg-secondary">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="text-center text-primary logo bg-secondary">Sakha</h1>
				</div>
			</div>
			<div class="row">
				<form action="<?php $_SERVER['PHP_SELF'];  ?>" method="POST" class=" bg-white p-5">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<input type="submit" name="login" value="login" class="btn btn-primary fs-5 m-1">
					<div class="form-group">
						<a href="profil-add-user.php"><u>create your account</u></a>
					</div>
				</form>

				 <?php
                          if(isset($_POST['login'])){
                            include "config.php";
                         
                              $username = mysqli_real_escape_string($conn, $_POST['username']);
                              $password = md5($_POST['password']);


                              $sql = "SELECT username, user_id, role, user_img, First_Name FROM user where Username = '{$username}' and password = '{$password}'";

                              $result = mysqli_query($conn, $sql) or die("Query Failed.");

                              if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_assoc($result)){
                                  
                                  $_SESSION["username"] = $row['username'];
                                  $_SESSION["user_id"] = $row['user_id'];
                                  $_SESSION["user_role"] = $row['role'];
                                  $_SESSION["user_image"] = $row['user_img']; 
                                  $_SESSION["user_name"] = $row['First_Name']; 

                                  header("Location: {$hostname}/home.php");
                                }

                              }else{
                              echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                            }
                          }
                          
                          
                        ?>

			</div>
		</div>
	</section>
</body>
</html>
	