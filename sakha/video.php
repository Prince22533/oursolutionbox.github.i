<?php include 'header.php'; ?>
<div class="bg-secondary">
	<?php  
	include "config.php";

	$limit = 8;
	if(isset($_GET['page'])){
	$page= $_GET['page'];
	}else{
	$page = 1;
	}

	$offset = ($page - 1) * $limit ; 

	$sql = "SELECT post.description, post.post_img, user.username, user.First_Name , user.user_img From post LEFT JOIN user ON post.author = user.user_id ORDER BY post.post_id DESC LIMIT {$offset},{$limit}"; 

	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0 ){
		while($row = mysqli_fetch_assoc($result)){	
	?>
	<section class="home-post my-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ">
					<a href=""><img src="admin/user_image/<?php echo $row['user_img']; ?>" class="home-icon"></a>
					<div class="profile-name">
						<a href=""><h3><?php echo $row['First_Name']; ?></h3></a>
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
	