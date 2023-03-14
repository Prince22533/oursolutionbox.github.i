<?php include 'header.php'; ?>
<div class="bg-secondary">
	<section class="home-profile section">
		<div class="container">
			<div class="row">
				<?php  
	include "config.php"; 

	$sql1 = "SELECT user_img From user where user_id = {$_SESSION['user_id']} "; 

	$result1 = mysqli_query($conn, $sql1);
	if(mysqli_num_rows($result1) > 0 ){
		while($row = mysqli_fetch_assoc($result1)){	
	?>
				<div class="col-md-2">
					<a href="profile.php"><img src="admin/user_image/<?php echo $row['user_img']; ?>" id="photo" ></a>
				</div>
				<?php
		}
	}

	?>
				<div class="col-md-10">
					<a href="post.php"><input type="text" name="" class="some-mg" placeholder="Write something here..." readonly></a>
				</div>
			</div>
		</div>
	</section>	
	<?php  
	include "config.php";

	

	$sql = "SELECT post.description, post.post_img, user.user_id, user.username, user.First_Name , user.user_img From post LEFT JOIN user ON post.author = user.user_id ORDER BY post.post_id DESC "; 

	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0 ){
		while($row = mysqli_fetch_assoc($result)){	
	?>
	<section class="home-post my-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ">
					<a href="other-profile.php?id=<?php echo $row['user_id']; ?>"><img src="admin/user_image/<?php echo $row['user_img'];?>" class="home-icon"></a>
					<div class="profile-name">
						<a href="other-profile.php?id=<?php echo $row['user_id']; ?>"><h3><?php echo $row['First_Name']; ?></h3></a>
					</div>
				</div>
	
			</div>
			<div class="row">
				<div class="descip">
					<p><?php echo $row['description']; ?></p>
				</div>
			</div>
		
		<div class="row fs-2 py-2">
			<div class="col">
				<img src="admin/upload/<?php echo $row['post_img']; ?>"  class="home-post-frist">
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

	?>

	</div>
</body>
</html>	