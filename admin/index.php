<?php 
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
include("config.php");	
$fetchProds = "SELECT * FROM `mobile_products`";
$fetchBrands = "SELECT * FROM `mobile_brands`";
$fetchUsers = "SELECT * FROM `mobile_users`";
$fetchOrders = "SELECT * FROM `mobile_orders`";
$brands = mysqli_query($conn, $fetchBrands);
$products = mysqli_query($conn, $fetchProds);
$users = mysqli_query($conn, $fetchUsers);
$orders = mysqli_query($conn, $fetchOrders);
include('common.php');
?>
<style>
    .custom{
        width: 60px;
        height: 50px;
    }
    h2{
        text-transform: capitalize; 
    }
</style>
<section class="card mt-3 mx-auto">
	<div class="card-header user-header alt bg-dark">
        <div class="media">
            <div class="media-body">
                <h2 class="text-light display-6"><?php  echo $_SESSION['username']; ?></h2>
                <p>Project Manager</p>
            </div>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="#">View Total Number Of Products <span class="badge badge-primary pull-right custom d-flex justify-content-center align-items-center"><h1><?php echo mysqli_num_rows($products) ?></h1></span></a>
        </li>
        <li class="list-group-item">
            <a href="#">View Total Number Of Categories <span class="badge badge-success pull-right custom d-flex justify-content-center align-items-center"><h1><?php echo mysqli_num_rows($brands) ?></h1></span></a>
        </li>  
        <li class="list-group-item">
            <a href="#">View Total Number Of Users <span class="badge badge-warning pull-right custom d-flex justify-content-center align-items-center"><h1><?php echo mysqli_num_rows($users) ?></h1></span></a>
        </li>  
        <li class="list-group-item">
            <a href="#">View Total Number Of Orders <span class="badge badge-dark pull-right custom d-flex justify-content-center align-items-center"><h1><?php echo mysqli_num_rows($orders) ?></h1></span></a>
        </li>             
    </ul>
</section>
</div>
<?php }
    else {
        echo
        '<script language="javascript">
        alert("Please login to access this page");
        window.location.href="login.php"
        </script>';
    }
?>


      