<?php 
	include('config.php');
	$brand_name=$_POST['brand_name'];
	$insert="INSERT INTO `mobile_brands` ( `brand_name`) VALUES ('$brand_name')";
	echo mysqli_query($conn, $insert);
	header("Location:view_brand.php?success-insert-brand");
?>