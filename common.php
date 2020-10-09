<?php 
session_start();
?>
<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}

</script>
<!-- <script src="https://kit.fontawesome.com/b72e0178db.js"></script> -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css"> -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<style>
    
.carousel-caption{
  background: rgba(0, 0, 0, 0.7);
  box-shadow: 0 0 0 10px rgba(0, 0, 0, 0.7);
}
.form-check-label, .price{
    font-weight: 700;
    text-transform: uppercase;
}
div.top-bar {
    background: #212529;
    color: #fff;
}
div.top-bar a {
    color: #fff;
    font-size: 0.8em;
    margin: 0 5px;
    padding: 10px 0;
}
a {
    color: #ff6b6b;
    text-decoration: none;
    display: inline-block;
    text-decoration: none;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
}
body {
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
}
ul, .navbar {
    padding: 0;
    margin: 0;
}
nav.navbar .navbar-nav .nav-link {
    font-size: 0.9rem;
}
nav.navbar .navbar-nav ul li a {
    padding-right: 0 !important;
    margin: 0;
}
nav.navbar .navbar-nav a {
    color: #333;
}
nav.navbar .navbar-nav ul li .icon.cart {
    color: #fff;
    background: #ff6b6b;
    display: inline-block;
    margin-right: 10px;
}
nav.navbar .navbar-nav ul li .icon {
    width: 40px;
    height: 40px;
    padding-top: 12px;
    text-align: center;
    border-radius: 50%;
}
.logo{
    width: 100px;
    height: 100px;
    margin-top: -18px;
}
.head{
    max-height: 75px;
}
</style>
    
<div class="top-bar d-none d-sm-block">
  <div class="container">
    <div class="row">
        <div class="col-sm-12 text-right account-details d-flex flex-row-reverse">
        <ul class="list-inline">
          <?php 
            if (isset($_SESSION['user_name']) && $_SESSION['user_name'] !== '') { 
                echo '<li class="list-inline-item"><a href="#">Hello, '.$_SESSION['user_name'].'</a></li>';
                echo '<li class="list-inline-item"><a href="logout.php">Logout</a></li>';
            }                   
            else{
                echo '<li class="list-inline-item"><a href="login.php">Login</a></li>';
            }          
            ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- <nav class="navbar navbar-expand-lg">
  <div class="container position-relative">
    <a href="index.php" class="navbar-brand head float-left"><img class="logo" src="images/logo1.png" alt="logo"></a>
    Toggle Button
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="head navbar-toggler  float-right"><i class="fa fa-bars"></i>
    </button>
    Navbar Menu
    <div id="navbarSupportedContent" class="container collapse navbar-collapse">
      <div class="navbar-nav ml-auto align-items-lg-center">
        <div class="nav-item"><a href="contact.html" class="nav-link font-weight-bold border-right bd">My Orders</a></div>     <div class="nav-item">
          <ul class="list-inline">
            <li class="list-inline-item">
                <a href="view_cart.php" class="nav-link font-weight-bold">
                    <div class="icon cart"><i class="fa fa-cart-plus"></i></div>
                    <?php
                    if (isset($_SESSION['cart']) && $_SESSION['cart'] !== '') {
                        ?>
                    <span class="d-md-inline">
                    <span class="no font-weight-bold cart_size"><?php echo count($_SESSION['cart']);?>
                    </span> items
                    </span>
                    <?php
                    }
                    ?>
                </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav> -->
<style type="text/css">
@media only screen and (max-width: 992px) {
  .bd{
    border-right: 0 !important;
    border-bottom: solid 1px #DEE2E6;
  }
}

</style>
