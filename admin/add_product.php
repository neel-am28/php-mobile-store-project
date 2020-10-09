<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
  include("config.php");
  include("common.php");
?>
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
          <li class="active">Add Products</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="card mt-3">
    <div class="card-body card-block content mt-3">
      <form role="form" action="insert_product.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Product Name</label>
          <input type="text" class="form-control" placeholder="Enter name" name="prod_name" required>
        </div>

        <div class="form-group">
          <label>Select Brand</label>
          <select class="form-control" name="prod_brand">
            <?php
              $fetchCat = "SELECT * FROM `mobile_brands`";
              $fetched = mysqli_query($conn, $fetchCat);
              while ($brand = mysqli_fetch_assoc($fetched)) {?>
              <option value="<?php echo $brand['brand_id']; ?>" required> <?php echo $brand['brand_name']; ?></option>
              <?php }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label>Product Price</label>
          <input type="text" class="form-control" placeholder="Enter price in ₹" name="prod_price" required>
        </div>

        <div class="form-group">
          <label>Product Description</label>
          <textarea class="form-control" rows="10" placeholder="Enter product description" name="prod_desc" required></textarea>
        </div>

        <div class="form-group">
          <label>Upload Image</label>
          <input type="file" name="image[]" class="form-control-file" multiple required>
        </div>

        <button type="submit" class="btn btn-primary btn-sm">
          <i class="fa fa-dot-circle-o"></i> Add
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
          <i class="fa fa-ban"></i> Reset
        </button>
      </form>
    </div>
  </div>
</div>
</div>


<!--/.row-->
<?php }
    else {
        echo
        '<script language="javascript">
        alert("Please login to access this page");
        window.location.href="login.php"
        </script>';
    }
?>
