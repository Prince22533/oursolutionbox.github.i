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
 	<!-- css -->
 	<link rel="stylesheet" type="text/css" href="css/style.css">
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
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="col form-group" >
					<input type="text" placeholder="Search...." name="search" class="form-control form-control-lg">
				</div>
			</form>
			</div>
		</div>
	</header>
	<?php  
	if (isset($_POST['search'])) {
		
	
	if(isset($_POST['search'])){
      $search_term = mysqli_real_escape_string($conn, $_POST['search']);
       }   

	$sql = "SELECT First_Name , user_img From user where First_Name LIKE '%{$search_term}%' ORDER BY user_id DESC "; 

	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0 ){
		while($row = mysqli_fetch_assoc($result)){	
	?>
<section class="friends">
	<div class="container">
	     <div class="row friend-icons">
	     	<div class="col-3">
	     		<a href=""><img src="admin/user_image/<?php echo $row['user_img'];?>" class="friend-image"></a>
	     	</div>
	     	<div class="col-9">
	     		<?php echo $row['First_Name']; ?>
	     		<br>
	     		<a href=""><button class="btn btn-primary">Chat With us</button></a>
	     	</div>
	     </div>
	</div>
</section>
	<?php
		}
	}

	?>
<div class="bg-secondary">
		
	<?php  
	include "config.php";
	$sql1 = "SELECT post.description, post.post_img, user.username, user.First_Name , user.user_img From post LEFT JOIN user ON post.author = user.user_id WHERE user.First_Name LIKE '%{$search_term}%' OR post.description LIKE '%{$search_term}%'
         ORDER BY post.post_id DESC "; 

	$result1 = mysqli_query($conn, $sql1);
	if(mysqli_num_rows($result1) > 0 ){
		while($row1 = mysqli_fetch_assoc($result1)){	
	?>
	<section class="home-post my-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ">
					<a href=""><img src="admin/user_image/<?php echo $row1['user_img'];	 ?>" class="home-icon"></a>
					<div class="profile-name">
						<a href=""><h3><?php echo $row1['First_Name']; ?></h3></a>
					</div>
				</div>
	
			</div>
			<div class="row">
				<div class="descip">
					<p><?php echo $row1['description']; ?></p>
				</div>
			</div>
		
		<div class="row fs-2 py-2">
			<div class="col">
				<img src="admin/upload/<?php echo $row1['post_img']; ?>"  class="home-post-frist">
			</div>
		</div>
		<div class="row py-2 float-center bottom fs-3">
			<div class="col-6">
				<a href=""><i class="fa-regular fa-thumbs-up"></i> Like</a>
			</div>
			<div class="col-6" align="right">
				<a href=""><i class="fa-regular fa-comment"></i> Comment</a>
			</div>
		</div>
		</div>
	</section>
	<?php
		}
	}
}else{
	echo "Search Some thing";
}

	?>

	</div>
</body>
</html>	