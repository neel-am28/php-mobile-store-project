<?php 
    require_once('config.php');
	$user_id=$_GET['user_id'];
	$select = "SELECT * FROM `mobile_users` where `user_id` = $user_id";
	$query=mysqli_query($conn, $select);
	$result=mysqli_fetch_assoc($query);
	echo json_encode($result); 
?>
