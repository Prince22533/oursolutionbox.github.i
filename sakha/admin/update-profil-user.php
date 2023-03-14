<?php 
if($_SESSION["user_role"] == '0'){
	header("Location: {$hostname}/admin/post.php");
}
if(isset($_POST['save'])){
	include "config.php";

	$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$user = mysqli_real_escape_string($conn,$_POST['user']);
	// $password = mysqli_real_escape_string($conn,md5($_POST['password']));
	$role = mysqli_real_escape_string($conn,$_POST['role']);

	$sql = "UPDATE user SET First_Name = '{$fname}', Username = '{$user}', role = '{$role}' where user_id = {$user_id}";


		if(mysqli_query($conn,$sql)){
			header("Location: {$hostname}/admin/user.php");
		}
	}
 ?>
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
			  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
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
			  			<label>User Role</label>
			  			<select class="form-control" name="role" value="<?php echo $row['role'] ;?>" >
			  				<?php if($row['role'] == 1){
							echo "<option value='0'>Normal user</option>
			  					  <option value='1' selected>Admin</option>";
						}else{
							echo "<option value='0' selected>Normal user</option>
			  					  <option value='1' >Admin</option>";
						}
						?>
			  			</select>
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
	