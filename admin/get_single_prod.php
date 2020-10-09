<?php 
    require_once('config.php');
	$prod_id=$_GET['prod_id'];
	$select = "SELECT * FROM `mobile_products`, `mobile_brands` WHERE `prod_id` = '$prod_id' && `mobile_products`.`brand_id` = `mobile_brands`.`brand_id`";
	$query=mysqli_query($conn, $select);
	$result=mysqli_fetch_assoc($query);
	echo json_encode($result); 
?>
