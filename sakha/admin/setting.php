<?php include 'header.php';
if($_SESSION["user_role"] == '0'){
	header("Location: {$hostname}/admin/post.php");
}
 ?>
	<section >
		<div class="container">
			<div class="row">
			  <div class="col-12">
			  	 <div class=" fs-2" class="float-start" >WEBSITE SETTING</div>
			  </div>
			  <form action="" method="post" class="web-set">
					<div class="col-12 form-group bg-white p-5">
					<div class="user fs-5">
						<b>Website Name</b><br>
					<input type="text" name="" class="form-control"><br>
					</div><div>
					<a href=""><input type="submit" name="save" value="save" class="btn btn-primary fs-5 m-1"></a>
				</div>
			</form>
	  </div>
	</div>
</section>
</body>
</html>
	