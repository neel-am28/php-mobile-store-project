<?php
	require_once('config.php');
	$brand_id=$_GET['brand_id'];
	$delete="DELETE FROM `mobile_brands` where `brand_id`=$brand_id";
	mysqli_query($conn, $delete);
	header("Location:view_brand.php?success-delete");
 ?>