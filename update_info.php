<?php 
	require_once("config.php");
	$user_id=$_POST['user_id'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$contact = $_POST['contact'];
	$pincode = $_POST['pincode'];
	$update="UPDATE `mobile_users` set `address` = '$address', `city` = '$city', `contact` = '$contact', `pincode` = '$pincode' where `user_id`=$user_id";
	mysqli_query($conn, $update);
	/*echo mysqli_error($conn);
	die;*/
	header("Location:payment.php");
?>