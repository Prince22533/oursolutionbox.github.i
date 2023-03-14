<?php
include "config.php";
if($_SESSION["user_role"] == '0'){
	header("Location: {$hostname}/admin/post.php");
}

session_start();

session_unset();

session_destroy();

header("Location: {$hostname}/admin/");
?>