<?php 
include_once('config.php');
$file_id = $_REQUEST['prod_id'];

$query = "SELECT * FROM `mobile_products` WHERE `prod_id`='$file_id'";
$run = mysqli_query($conn,$query);

$data = mysqli_fetch_assoc($run);
$filename_string = $data['prod_img'];
$filename_array = explode(', ', $filename_string);

for($i=0;$i<count($filename_array);$i++){
	unlink('uploads/'.$filename_array[$i]);
}

$query = "DELETE FROM `mobile_products` WHERE `prod_id`='$file_id'";
$run = mysqli_query($conn,$query);

header('location:view_product.php?success-delete');
 ?>