<?php 
    require_once('config.php');
	$brand_id=$_GET['brand_id'];
	$select="SELECT * FROM mobile_brands where brand_id ='".$brand_id."' ";
	$query=mysqli_query($conn, $select);
	$result=mysqli_fetch_assoc($query);
	echo json_encode($result);
?>