<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
  include("config.php");
  include("common.php");
?>
<link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<style>
  .btn{
    border-radius: 4px;
  }
</style>


<div class="breadcrumbs mt-2">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Dashboard</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Orders</a></li>
          <li class="active">View Orders</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Order Information</strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table-export prod_table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Order ID</th>
                  <th>User Name</th>
                  <th>Product Name</th>
                  <th>Order placed on</th>
                  <th>Quantity</th>
              </thead>
              <tbody>
                <?php
                  include('config.php');
                  $fetch = "SELECT * FROM `mobile_orders` join `mobile_users` on mobile_orders.user_id = mobile_users.user_id join `mobile_products` on mobile_orders.product_id = mobile_products.prod_id order by `order_id` desc";
                  $run = mysqli_query($conn, $fetch);
                  $srno = 1;
                  while ($res = mysqli_fetch_assoc($run)) { 
                    $prod_id = explode(",", $res['product_id']);
                    $qty = explode(",", $res['quantity']);
                    for($i=0; $i<count($prod_id); $i++){
                      $select2 = "select * from `mobile_products` where `prod_id` = '$prod_id[$i]'";
                      $run2 = mysqli_query($conn, $select2);
                      $res2 = mysqli_fetch_assoc($run2);
                      if(mysqli_num_rows($run2) == 1){                                                       
                    ?>                   
                    <tr>
                      <td> <?php echo $srno++; ?></td>
                      <td> <?php echo $res['order_id']; ?> </td>
                      <td style="text-transform:capitalize;"> <?php echo $res['user_name']; ?> </td>
                      <td> <?php echo $res2['prod_name']; ?> </td>
                      <td> <?php echo $res['date']; ?> </td>
                      <td> <?php echo $qty[$i] ?> </td>
                      
                    </tr>
                <?php } }}?>
              
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div>

<script src="jquery-3.3.1.min.js"></script>




<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
<?php }
    else {
        echo
        '<script language="javascript">
        alert("Please login to access this page");
        window.location.href="login.php"
        </script>';
    }
?>
