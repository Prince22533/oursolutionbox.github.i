<?php

if(isset($_POST['save'])){
	include "config.php";

	if(empty($_FILES['new-image']['name'])){
	$file_name = $_POST['old_image'];
}else{
	$errors = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
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

	$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
	$fname = ucfirst(mysqli_real_escape_string($conn,$_POST['fname']));
	$user = mysqli_real_escape_string($conn,$_POST['user']);

	$sql = "UPDATE user SET First_Name = '{$fname}', Username = '{$user}', user_img ='{$file_name}' where user_id = {$user_id}";


		if(mysqli_query($conn,$sql)){
			header("Location: {$hostname}/profile.php");
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
	
	
 	<link rel="stylesheet" type="text/css" href="admin/style.css">
 	<!-- jquaery -->
	 </head>

<div id="admin-content">
	<div class="container">
		<div class="row">
			 <div class="col-md-12">
			  	<h1 class="admin-heading">modify user</h1>
			 </div>
			 <div class="col-md-offset-3 col-md-6">
			 	<?php
			 	include "config.php";
			 	$user_id = $_GET['id'];
			   	$sql = "SELECT * From user where user_id = {$user_id} ";
			   	$result = mysqli_query($conn, $sql) or die("prince");
			   	if(mysqli_num_rows($result) > 0){
			   		while ($row = mysqli_fetch_assoc($result)) {
			   		
			 	?>
			  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"  enctype="multipart/form-data">
			  	<div class="form-group">
			  			<input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>" class="form-control" placeholder="First Name">
			  	</div>
			  	<div class="form-group">
			  			<label>First Name</label>
			  			<input type="text" name="fname" value="<?php echo $row['First_Name'] ?>" class="form-control" placeholder="First Name">
			  	</div>
			  	<div class="form-group">
			  			<label>User Name</label>
			  			<input type="text" name="user" value="<?php echo $row['Username'] ?>" class="form-control" placeholder="User Name">
			  	</div>
				 <div class="form-group">
            	    <label for="">Post image</label>
            	    <input type="file" name="new-image">
            	    <img  src="admin/user_image/<?php echo $row['user_img']; ?>" height="150px">
            	    <input type="hidden" name="old_image" value="<?php echo $row['user_img']; ?>">
            	</div>
			  	<input type="submit" name="save" value="update" class="btn btn-primary">
			</form>
			<?php
		}
	}
			?>
		 </div>
	  </div>
	</div>
</div>
</body>
</html>
	