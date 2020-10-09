<?php 
	require_once("config.php");
	$brand_id=$_POST['brands_id'];
	$brand=$_POST['brand'];
	$update="UPDATE `mobile_brands` set `brand_name`='".$brand."' where `brand_id`=$brand_id";
	mysqli_query($conn, $update);
	header("Location:view_brand.php");
?>