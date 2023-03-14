<?php
include 'config.php';
if($_SESSION["user_role"] == '0'){
	header("Location: {$hostname}/admin/post.php");
}
$user_id = $_GET['id'];

$sql = "DELETE from user where user_id = {$user_id}";

if(mysqli_query($conn,$sql)){
			header("Location: {$hostname}/admin/user.php");
		}else{
			echo "can not be delete";
		}

?>