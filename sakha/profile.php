<?php include 'header.php'; ?>
<div class="bg-secondary">
	<?php  
	include "config.php"; 

	$sql = "SELECT username, First_Name , user_img From user where user_id = {$_SESSION['user_id']}"; 

	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0 ){
		while($row = mysqli_fetch_assoc($result)){	
	?>
<section class="profile-admin">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class=" profile-bg">
				<img src="admin/user_image/<?php echo  $row["user_img"]; ?>" class=" profile-ph">
				<i class="fa-solid fa-camera bg-camera "></i>
				<i class="fa-solid fa-camera ph-camera  "></i>
			</div>
			</div>
		</div>
	</div>
</section>
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<b class="fs-1 py-5 section"><?php echo $row["First_Name"]; ?></b><br>
	 			<a href="upadate-user.php?id=<?php echo $_SESSION["user_id"]; ?>" class="btn btn-primary fs-1"><i class="fa-solid fa-pen-to-square"></i>Edit profile</a>
			</div>
			<div class="col-12">
	 			<a href="logout.php" class="btn btn-primary fs-1">LOGOUT</a>
			</div>
		</div>
	</div>
</section>
<section class="profile-post my-2">
	<div class="container">
		<div class="row py-5">
			<div class="col-12">
				<b class="fs-1 py-3">Posts</b>
			</div>
			<div class="col-md-2">
				<a href=""><img src="admin/user_image/<?php echo  $row["user_img"]; ?>" id="photo"></a>
			</div>
			<div class="col-md-10">
				<a href="post.php"><input type="text" name="" class="some-mg" placeholder="Write something here..." readonly></a>
			</div>
		</div>
	</div>
</section>
<?php  
	 

	$sqli = "SELECT post.description, post.post_id, post.post_img, user.username, user.First_Name , user.user_img From post LEFT JOIN user ON post.author = user.user_id where post.author = {$_SESSION['user_id']} ORDER BY post.post_id DESC"; 

	$resulti = mysqli_query($conn, $sqli);
	if(mysqli_num_rows($resulti) > 0 ){
		while($rowi = mysqli_fetch_assoc($resulti)){	
	?>
	<section class="home-post my-2">
		<div class="container">
			<div class="row">
				<div class="col-md-6 ">
					<a href="profile.php"><img src="admin/user_image/<?php echo $rowi['user_img']; ?>" class="home-icon"></a>
					<div class="profile-name">
						<a href=""><h3><?php echo $rowi['First_Name']; ?></h3></a>
					</div>
				</div>
					<div align="right" class="f-5 col-md-6">
					  <a href="delete-post.php?id=<?php echo $rowi['post_id']; ?>"><i class="fa-solid fa-xmark" style="font-size: 60px;"></i></a>	
					</div>
			</div>
			<div class="row">
				<div class="descip">
					<p><?php echo $rowi['description']; ?></p>
				</div>
			</div>
		
		<div class="row fs-2 py-2">
			<div class="col">
				<img src="admin/upload/<?php echo $rowi['post_img']; ?>"  class="home-post-frist">
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
		}
	}

	?>
	</div>
</body>
</html>
	