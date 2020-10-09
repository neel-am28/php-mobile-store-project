<?php 
include('config.php');
session_start();
if (empty($_SESSION['cart'])) {
echo
        '<script language="javascript">
        alert("You have no items in your cart!");
        window.location.href="view_cart.php"
        </script>';
	}
else if(isset($_SESSION['user_name']) && $_SESSION['user_name']!=""){
$qty = $_POST['qty'];
$prod_id = $_POST['prod_id'];
$user_name = $_SESSION['user_name'];
$p = implode(",", $prod_id);
$q = implode(",", $qty);
date_default_timezone_set('Asia/Kolkata');
$date = date('M,d,Y h:i:s A');

$select = "select * from `mobile_users` where `user_name` = '$user_name'";
$query = mysqli_query($conn, $select);
$result = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) == 1){
	$insert = "insert into `mobile_orders` (`user_id`, `product_id`, `date`, `quantity`) values ('".$result['user_id']."', '".$p."', '".$date."', '".$q."')";
	$sql = mysqli_query($conn, $insert);
}
	
if(!$sql){
		echo mysqli_error($conn);
}
else{
	header("location:payment.php");
}
}
else{
	header("location:login.php");
}

?>
 
 