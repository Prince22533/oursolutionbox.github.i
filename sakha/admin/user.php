<?php include 'header.php';
if($_SESSION["user_role"] == '0'){
	header("Location: {$hostname}/admin/post.php");
}
 ?>
	<section>
		<div class="container">
			<div class="row">
			  <div class="col-12">
			  	 <div class=" fs-2" class="float-start" >Users</div>
			  	 <a href="add_user.php"><input type="button" value="Add User" class=" fs-4 float-end btn btn-primary"></a>

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
			   	$sql = "SELECT * From user order by user_id Desc LIMIT {$offset},{$limit}";
			   	$result = mysqli_query($conn, $sql) or die("prince");

			   	if(mysqli_num_rows($result) > 0){



			   	?>
			<table class="table table-striped table-borderless">
				<thead class="table-dark">
					<tr class="align-middle">
						<th>Sr. No</th>
						<th>Full Name</th>
						<th>User Name</th>
						<th>Role</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_assoc($result)) {
						
					?>
					<tr class="align-baseline">
						<td ><?php echo $row['user_id'] ?></td>
						<td><?php echo $row['First_Name'] ?></td>
						<td><?php echo $row['Username'] ?></td>
						<td><?php if($row['role'] == 1){
							echo "Admin";
						}else{
							echo "Normal";
						}
						?></td>	
						<td><a href="update-user.php?id=<?php echo $row['user_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
						<td><a href="delete-user.php?id=<?php echo $row['user_id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php

		}

		$sql1 = "SELECT * From user";
		$result1 = mysqli_query($conn,$sql1) or die("query fail");
		if(mysqli_num_rows($result1) > 0){

			$total_records = mysqli_num_rows($result1);
			
			$total_page = ceil($total_records / $limit);

			echo '<ul class="pagination justify-content-center ">';
			if($page > 1){
                    echo '<li class="page-item"><a href="user.php?page='.($page - 1).'" class="page-link">Prev</a></li>';
              }
			for($i = 1; $i <= $total_page; $i++){
				if($i == $page){
					$active = "active";
				}else{
					$active = "";
				}
				echo '<li class="'.$active.'page-item"><a href="user.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
			}
			if($total_page > $page){
                    echo '<li class="page-item"><a href="user.php?page='.($page + 1).'" class="page-link">Next</a></li>';
              }
			echo '</ul>';
		}
		?>
		</div>	
		 </div>
	</div>
</section>
</body>
</html>
	