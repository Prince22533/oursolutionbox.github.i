<?php include 'header.php'; ?>
	<header class="post-header">
		<div class="container">
			<div class="row">
			  <div class="col-12">
				<div class="fs-2 float-start">
			   <a href="home.php"><i class="fa-solid fa-arrow-left"></i></a>
		       </div>
		       <div class="text-center fs-2">Create post </div>
	         </div>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-2 ">
					<img src="admin/user_image/<?php echo  $_SESSION["user_image"]; ?>" class="post-icon">
				</div>
					<div class="col-6 fs-1">
							<h3><?php echo  $_SESSION["user_name"]; ?></h3>	
					</div>
				
			</div>
		</div>
	</section>
	<section>
		 <form  action="add_save_post.php" method="POST" enctype="multipart/form-data" class="mx-5   p-5">
                       <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5" placeholder="Say somethig about this photo" ></textarea>
                      </div>
                      <div class="form-group my-5">
                          <label for="exampPassword1"leInput>Post image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
	</section>
</div>
</body>
</html>
	