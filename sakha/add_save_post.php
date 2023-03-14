<?php
  include "config.php";
  if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png", "jfif");

	 if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = basename($file_name);
    $target = "admin/upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  	session_start();

	$description = mysqli_real_escape_string($conn,$_POST['postdesc']);
	$date = date("d M, Y");
	$author = $_SESSION['user_id'];

	$sql = "INSERT INTO post( description,post_date, author,post_img)
			VAlUES('{$description}','{$date}',{$author},'{$file_name}')";

	 if(mysqli_query($conn, $sql)){
    header("location: {$hostname}/home.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>