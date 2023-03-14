<?php include 'header.php'; ?>
<section class="friends pt-2">
		<h2 class="fs-4 p-2">Chat To Other Person</h2>
</section>
	<?php  
	include "config.php";

	

	$sql = "SELECT First_Name , user_img, user_id From user where user_id !=  {$_SESSION['user_id']} ORDER BY user_id DESC "; 

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
	     		<a href="chat.php?id=<?php echo $row['user_id']; ?>"><button class="btn btn-primary">Chat With us</button></a>
	     	</div>
	     </div>
	</div>
</section>
	<?php
		}
	}

	?>
</body>
</html>
	