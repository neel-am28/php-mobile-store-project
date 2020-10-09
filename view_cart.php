<?php  
include('config.php');
include('common.php');
?>
<style>
    
button{
  border-radius: 0 !important;
}
div#my-cart-modal .table>thead>tr>th,
.table>tbody>tr>th,
.table>tfoot>tr>th,
.table>thead>tr>td,
.table>tbody>tr>td,
.table>tfoot>tr>td {
  padding: 10px;
  vertical-align: middle;
  border: 1px solid #CCC;
}
</style>
<hr>

<div class="container">   
<table id="bootstrap-data-table-export" class="table table-striped table-bordered tbl">
<?php
if (isset($_SESSION['cart']) && $_SESSION['cart'] !== '') {
?>
<h1 class="text-center text-info mb-4">YOUR CART</h1>
<?php }
else{ 
echo '<h1 class="text-center text-info mb-4">YOUR CART IS EMPTY</h1>';
} 
?>

  <thead>
    <tr>
      <th>Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <form method="POST" action="checkout.php">
    <?php
      $total = 0;
      $grandTotal = 0;
      if (isset($_SESSION['cart']) && $_SESSION['cart'] !== '') {
      if(is_array($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $products){
          // print_r($products);
          $select = "select * from `mobile_products` where `prod_id` = $products";
          $query = mysqli_query($conn, $select);
          $res = mysqli_fetch_assoc($query);
          echo "<tr>";
            echo "<td class='name'>".$res['prod_name']."</td>";
            echo "<td class='prc'>".$res['prod_price']."</td>"; 
            $prc = $res['prod_price'];      
            // quantity
            echo "<td><input type='number' class='form-control qty' value='1' min='1' name='qty[]'></td>";
            $qty = 1;
            $total = ($qty * $prc);
            $grandTotal = $grandTotal + $total;
            // total
            echo "<td class='ttl'>".$total."</td>";
            echo "<input type='hidden' name='prod_id[]' class='form-control' value='".$products."'>";
            echo "<td><input name='event' value='Delete' class='delete btn btn-danger' id='".$res['prod_id']."'></td>";
          echo "</tr>";
        }
          echo "<tr class='gt'>";
            echo "<td colspan='5' class='text-right grandTtl' style='font-size:20px;font-weight:bold;'>Grand Total: ".$grandTotal."</td>";
          echo "</tr>"; 

      }
      // echo count($_SESSION['cart']);
    }
    ?>
  </tbody>
</table>

<button class='btn btn-dark' id='checkout' type="submit">Checkout</button>
</form>
<!-- <button type="submit" name="checkout" class="text-right">Place Order</button> -->
</div>
<script src="js/jquery-2.2.3.min.js"></script>

    
    <script>
    $(document).ready(function () {
        $("#myModal").modal();
    });
  </script>
  <!-- // modal -->
  

<script type="text/javascript">

  
  $(document).ready(function(){
    function update_total(){
      var sum = 0;
      var q = 0;
      $('.tbl > tbody > tr').each(function(){
        var qty = parseInt($(this).find('.qty').val());
        // console.log(qty);
        var prc = parseInt($(this).find('.prc').html());
        var total = qty * prc;
        q = (q || 0) + (qty || 0);
        sum += total; 
        $(this).find('.ttl').html(total);
        $(this).siblings('.gt').children('.grandTtl').html("Grand Total: " + sum);   
        $('.cart_size').text(q);   
      });
    }

    $('.qty').change(function(){
      update_total();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.delete').click(function () {
      var prod_id = $(this).attr('id');
      var action = 'remove';
      var $tr = $(this).closest('tr');
      if(confirm("Are you sure you want to remove this product from the cart?")){
        $.ajax({
          url : 'delete_item.php',
          method: 'POST',
          data: {prod_id: prod_id, action: action},
          success: function(){
            $tr.find('td').fadeOut(500,function(){ 
            $tr.remove();                           
            location.reload(true);  
            // alert("Item has been removed from the cart");                 
            }); 
          }
        })
      }
      else{
        return false;
      }
    });
  });
</script>
  <!--search jQuery-->
  <!-- <script src="js/modernizr-2.6.2.min.js"></script> -->
  <!-- <script src="js/classie-search.js"></script> -->
  <!-- <script src="js/demo1-search.js"></script> -->
  <!--//search jQuery-->
  <!-- cart-js -->
  <!-- <script src="js/minicart.js"></script> -->


  <script src="js/bootstrap.js"></script>
  <!-- js file -->
<style type="text/css">
@media only screen and (max-width: 992px) {
  .delete{
    padding: 2px 5px !important;
    text-align: left;
    width: 96%;
  }
}

</style>

