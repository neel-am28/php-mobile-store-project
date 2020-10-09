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
          <li><a href="#">Brands</a></li>
          <li class="active">View Brands</li>
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
            <strong class="card-title">Data Table(Brands)</strong>
            <a href="add_brand.php" class="btn btn-success">Add more brands</a>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table-export prod_table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Brand Name</th>
                  <th>Actions</th>
              </thead>
              <tbody>
                <?php
                  include('config.php');
                  $fetch = "SELECT * FROM `mobile_brands`";
                  $run = mysqli_query($conn, $fetch);
                  $srno = 1;
                  while ($res = mysqli_fetch_assoc($run)) { ?>
                    <tr>
                      <td> <?php echo $srno++; ?></td>
                      <td> <?php echo $res['brand_name']; ?> </td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#edit_brand_modal" class="edit_brand btn btn-info" brand_id="<?php echo $res['brand_id']; ?>">Edit</a>
                        <a class="btn btn-danger" id="del_brand" href="delete_brand.php?brand_id=<?php echo $res['brand_id'];?>">Delete</a>
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

<script src="jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function () {
    $('.edit_brand').click(function() {
      var brand_id = $(this).attr('brand_id');
      $.ajax({
        'url': 'get_single_brand.php',
        'data': 'brand_id=' + brand_id,
        'method': 'get',
        'datatype': 'json',
        success: function(result) {
          var res = JSON.parse(result);
          $('input[name="brand"]').val(res.brand_name);
          $('input[name="brands_id"]').val(res.brand_id);
        }
      });
    });
  });

</script>

<!-- Modal -->
<div class="modal fade" id="edit_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="update_brand.php" method="POST">
        <div class="modal-body">
          <div class="form-group my-5">
            <input type="text" class="form-control" id="brand" name="brand" required>
            <input type="hidden" class="form-control" id="brands_id" name="brands_id">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--Modal close-->
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
