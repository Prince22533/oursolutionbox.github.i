<?php 
include "config.php";
	session_start();

	if(isset($_SESSION["username"])){
		header("Location: {$hostname}/admin/post.php");
	}

if(isset($_POST['save'])){
	include 'config.php';
	 if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png", "jfif");

	 if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = basename($file_name);
    $target = "admin/user_image/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  
	$fname = ucfirst(mysqli_real_escape_string($conn,$_POST['fname']));
	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$password = mysqli_real_escape_string($conn,md5($_POST['password']));
	$role = mysqli_real_escape_string($conn,$_POST['role']);

	$sql = "SELECT username from user where Username = '{$user}'";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");

	if(mysqli_num_rows($result) > 0){
		echo "<p style='color:red;>user name also exist</p>";
	}else{
		$sqli = "INSERT into user(First_Name,Username,password,role,user_img)
		values ('{$fname}','{$user}','{$password}','{$role}','{$file_name}')";
		if(mysqli_query($conn,$sqli)){
			 $sql1 = "SELECT * FROM user where Username = '{$username}' and password = '{$password}'";
			$result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                              if(mysqli_num_rows($result1) > 0){

                                while($row = mysqli_fetch_assoc($result1)){
                                  session_start();
                                  $_SESSION["username"]   = $row['username'];
                                  $_SESSION["user_id"]    = $row['user_id'];
                                  $_SESSION["user_role"]  = $row['role'];
                                  $_SESSION["user_image"] = $row['user_img']; 
                                  $_SESSION["user_name"]  = $row['First_Name'];

                                 header("Location: {$hostname}/home.php");
                                }

                              }else{
                              echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
          }
		}
	}
	
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
	
	
 	<link rel="stylesheet" type="text/css" href="style.css">
 	<!-- jquaery -->
	 </head>
 <body>
<div id="admin-content" class="m-5 bg-secondary">
	<div class="container">
		<div class="row">
			 <div class="col-md-12">
			  	<h1 class="admin-heading">Add User</h1>
			 </div>
			 <div class="col-md-offset-3 col-md-6">
			  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
			  	<div class="form-group py-3">
			  			<label>First Name</label>
			  			<input type="text" name="fname" class="form-control" placeholder="First Name">
			  	</div>
			  	<div class="form-group py-3">
			  			<label>User Name</label>
			  			<input type="text" name="user" class="form-control" placeholder="User Name">
			  	</div>
			  	<div class="form-group py-3">
			  			<label>Password</label>
			  			<input type="Password" name="password" class="form-control" placeholder="Password">
			  	</div>
			  	<div class="form-group py-3  ">
			  			<input type="hidden" name="role" value="0">
			  	</div>
			  	 <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required>
                 </div>
			  	<input type="submit" name="save" class="btn btn-primary">
			</form>
		 </div>
	  </div>
	</div>
</div>
</body>
</html>
	