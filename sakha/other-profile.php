<?php include 'header.php'; ?>
<div class="bg-secondary">
	<?php  
	include "config.php"; 
	$user_id = $_GET['id'];

	$sql = "SELECT username, First_Name , user_img From user where user_id = {$user_id}"; 

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
<?php  
	 
	

	$sqli = "SELECT post.description, post.post_img, user.username, user.First_Name , user.user_img From post LEFT JOIN user ON post.author = user.user_id where post.author = {$user_id} ORDER BY post.post_id DESC"; 

	$resulti = mysqli_query($conn, $sqli);
	if(mysqli_num_rows($resulti) > 0 ){
		while($rowi = mysqli_fetch_assoc($resulti)){	
	?>
	<section class="home-post my-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ">
					<a href="profile.php"><img src="admin/user_image/<?php echo $rowi['user_img']; ?>" class="home-icon"></a>
					<div class="profile-name">
						<a href=""><h3><?php echo $rowi['First_Name']; ?></h3></a>
					</div>
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
	