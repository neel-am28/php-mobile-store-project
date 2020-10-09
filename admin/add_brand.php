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
                            <li><a href="#">Brands</a></li>
                            <li class="active">Add Brand</li>
                        </ol>
                    </div>
                </div>
            </div>
    </div>
    
    <div class="content">
    <div class="card mt-3">
        <div class="card-body card-block content mt-3">
            <form role="form" action="insert_brand.php" method="POST">
                <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" class="form-control" placeholder="Enter Brand" name="brand_name" required>
                </div>
                             
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Add Brand
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
    