<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
  include("config.php");
  include("common.php");
?>
<style>
  .btn{
    border-radius: 4px;
  }
  img.img-margin{
    margin: 5px auto;
    display: block;
  }
</style>
<script src="jquery-3.3.1.min.js"></script>
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
          <li><a href="#">Products</a></li>
          <li class="active">View Products</li>
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
            <strong class="card-title">Data Table(Products)</strong>
            <a href="add_product.php" class="btn btn-success">Add more products</a>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Brand</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
               <?php 
                $fetch="SELECT `mobile_products`.*, `mobile_brands`.brand_name FROM `mobile_products` JOIN `mobile_brands` ON mobile_products.brand_id=mobile_brands.brand_id order by `prod_id` desc";					

                $run = mysqli_query($conn, $fetch);
                $srno = 1;
                while ($res = mysqli_fetch_assoc($run)) {
                  ?>
                  <tr>
                      <td> <?php echo $srno++; ?></td>
                      <td> <?php echo $res['prod_name']; ?> </td>
                      <td>&#8377;<?php echo $res['prod_price']; ?> </td>
                      <td> <?php echo $res['brand_name']; ?> </td>
                      <td> <?php echo $res['prod_desc']; ?> </td>
                      <td>
                          <?php
                          $filename = explode(',',$res['prod_img']);
                          // for($i=0; $i<=count($filename)-1; $i++){
                            echo '<img class="img-margin" src="uploads/'.$filename[0].'" height="100px" width="auto">';
                            // echo '&nbsp;&nbsp;&nbsp;';
                          // }
                          ?>
                      </td>
                      <td>
                      <a href="update_product.php?prod_id=<?php echo $res['prod_id'];?>" data-toggle="modal" data-target="#edit_prod_modal" name="edit" class="edit_product btn btn-info" prod_id="<?php echo $res['prod_id']; ?>">Edit</a><br><br>
                      <a class="btn btn-danger" id="del_prod" href="delete_product.php?prod_id=<?php echo $res['prod_id'];?> && file_name=<?php echo $res['prod_img']; ?>">Delete</a>
                      </td>
                  </tr>
                  <?php } ?>               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div>

<script>
  $(document).ready(function () {
    $('.edit_product').click(function() {
      var prod_id = $(this).attr('prod_id');
      $.ajax({
        'url': 'get_single_prod.php',
        'data': 'prod_id=' + prod_id,
        'method': 'get',
        'datatype': 'json',
        success: function(result) {
          var res = JSON.parse(result);
          console.log(res.prod_img); 
          $('input[name="prod_name"]').val(res.prod_name);
          $('input[name="p_img"]').val(res.prod_img);
          $('input[name="prod_id"]').val(res.prod_id);
          $('input[name="prod_price"]').val(res.prod_price);
          $('#prod_desc').text(res.prod_desc);
          $('#prod_brand option:selected').html(res.brand_name);
          $('input[name="brand_id"]').val(res.brand_id);
          var arr = res.prod_img;
          var arr1 = arr.split(",");
          var img_list="";
          for(var x = 0; x < arr1.length ; x++){
            var src='uploads/'+arr1[x];
            img_list+="<img src='"+src+"' style='width:auto; height:100px; margin-right:20px;'>";
          }
          // console.log(img_list);
          $('.old_images').html(img_list);  
        }
      });
    });
  });

</script>

<div class="modal fade" id="edit_prod_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="update_product.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="brand_id">
        <div class="modal-body">                 
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="prod_name" id="prod_name">
            <input type="hidden" class="form-control" id="prod_id" name="prod_id">
          </div>

          <div class="form-group">
            <label>Select Brand</label>
            <select class="form-control" name="prod_brand" id="prod_brand"> 
            <option selected disabled hidden>Select Category</option>
            <?php
              $fetchCat = "SELECT * FROM `mobile_brands`";
              $fetched = mysqli_query($conn, $fetchCat);
              while ($brand = mysqli_fetch_assoc($fetched)) {?>
                <option value="<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></option>
                
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" name="prod_price" id="prod_price">
          </div>

          <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="10" name="prod_desc" id="prod_desc"></textarea>
          </div>

          <div class="form-group old_images">
            <label>Old Image:</label>  
          </div>

          <div class="form-group">
            <label>Upload New Image</label>
            <input type="text" name="p_img">
            <input type="file" name="image[]" class="form-control-file" multiple/>            
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
          </div>

      </form>
    </div>
  </div>
</div>




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