<?php include 'header.php';

 ?>
	<section>
		<div class="container">
			<div class="row">
			  <div class="col-12">
			  	 <div class=" fs-2" class="float-start" >All Post</div>
			     <a href="add-post.php"><input type="button" value="Add Post" class=" fs-4 float-end btn btn-primary"></a>
			  </div>
			   <div class="col-12 py-3 table-responsive">
			   		<?php
			   	include "config.php";
			   	$limit =3 ;
			   	if(isset($_GET['page'])){
			   		$page = $_GET['page'];
			   	}else{
			   		$page = 1;
			   	}
			   	$offset = ($page - 1) * $limit;
			   
			   	

			   	if($_SESSION["user_role"] == '1'){
			   	$sql = "SELECT * From post
			   	left join category on post.category = category.category_id
			   	left join user on post.author = user.user_id
			   	order by post.post_id 
			   	Desc LIMIT {$offset},{$limit}";
			   }elseif($_SESSION["user_role"] == '0'){
			   	$sql = "SELECT * From post
			   	left join category on post.category = category.category_id
			   	left join user on post.author = user.user_id 
			   	where post.author = {$_SESSION['user_id']}
			   	order by post.post_id 
			   	Desc LIMIT {$offset},{$limit}";
			   }


			   	$result = mysqli_query($conn, $sql) or die("prince");

			   	if(mysqli_num_rows($result) > 0){



			   	?>
			<table class="table table-striped table-borderless">
				<thead class="table-dark">
					<tr class="align-middle">
						<th>Sr. No</th>
						<th>Title</th>		
						<th>Categary</th>
						<th>Date</th>
						<th>Author</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_assoc($result)) {
						
					?>
					<tr class="align-baseline">
						<td ><?php echo $row['post_id'] ?></td>
						<td><?php echo $row['title'] ?></td>	
						<td><?php echo $row['category_name'] ?></td>
						<td><?php echo $row['post_date'] ?></td>
						<td><?php echo $row['Username'] ?></td>
						<td><a href="update-post.php?id=<?php echo $row['post_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
						<td><a href="delete-post.php?id=<?php echo $row['post_id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
					</tr>
						<?php } ?>
				</tbody>
			</table>
		<?php

		}
		if($_SESSION["user_role"] == '1'){
			$sql1 = "SELECT * From post";
		}elseif($_SESSION["user_role"] == '0'){
			$sql1 = "SELECT * From post 
			where author = {$_SESSION['user_id']}";
		}
		
		$result1 = mysqli_query($conn,$sql1) or die("query fail");
		if(mysqli_num_rows($result1) > 0){

			$total_records = mysqli_num_rows($result1);
			
			$total_page = ceil($total_records / $limit);

			echo '<ul class="pagination justify-content-center ">';
			if($page > 1){
                    echo '<li class="page-item"><a href="post.php?page='.($page - 1).'" class="page-link">Prev</a></li>';
              }
			for($i = 1; $i <= $total_page; $i++){
				if($i == $page){
					$active = "active";
				}else{
					$active = "";
				}
				echo '<li class="'.$active.'page-item"><a href="post.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
			}
			if($total_page > $page){
                    echo '<li class="page-item"><a href="post.php?page='.($page + 1).'" class="page-link">Next</a></li>';
              }
			echo '</ul>';
		}
		?>
	  </div>
	</div>
</section>
</body>
</html>
	