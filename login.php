
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/shop.css" type="text/css" />
    <link href="css/style6.css" rel='stylesheet' type='text/css' />
    <link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
    <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
    
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<style>
 *{
        box-sizing: border-box;    
        font-family: 'Montserrat', sans-serif !important;
        border: 0 !important;
        border-radius: 0 !important;
    }   
.home a, .brand{
    color: #ff4e00;
    letter-spacing: 3px;
    font-weight: 700;
}
.carousel-caption{
  background: rgba(0, 0, 0, 0.7);
  box-shadow: 0 0 0 10px rgba(0, 0, 0, 0.7);
}
.form-check-label, .price, .cart{
    font-weight: 700;
    text-transform: uppercase;
}
.cart{
    letter-spacing: 2px;
}
header {
    padding: 0 2em 0 2em !important;
    height: 70px !important;
}
header img{
    width: 110px;
    height: 110px;
    margin-top: -13px;
}
.custom>ul{
    margin-top: -6px;
}
i.fas.fa-cart-arrow-down{
    font-family:FontAwesome !important;
}
button.top_googles_cart {
        padding: 0.5em 2em;
        letter-spacing: 1px;
    }
</style>
<div class="banner-top container-fluid" id="home">
<header>
    <div class="row">
        <div class="col-md-2 logo-w3layouts">
                <a href="index.php">
                    <span><img src="images/p-trans.png" alt="logo"></span>
                </a>
        </div>       
        <div class="col-md-10 top-info-cart text-right mt-lg-4 custom">
            <ul class="cart-inner-info">
                <li class="galssescart galssescart2 cart cart box_1">
                    <form action="view_cart.php" method="post" class="last">
                        <button class="top_googles_cart font-weight-bold" type="submit" name="submit" value="">
                            <!-- <i class="fas fa-cart-arrow-down"></i> -->CART
                            <?php
                            if (isset($_SESSION['cart']) && $_SESSION['cart'] !== '') {
                                ?>
                            <span id='size_of_cart' class='badge badge-dark '><?php echo count($_SESSION['cart']);?></span>
                            <?php
                            }
                            ?>
                        
                        </button>
                        <?php 
                        if (isset($_SESSION['user_name']) && $_SESSION['user_name'] !== '') {
                        echo "Hello,".  $_SESSION['user_name'];
                        echo '
                                <button class="top_googles_cart"><a href="logout.php" class="text-dark">Logout</a></button>
                                <button class="top_googles_cart"><a href="orders.php" class="text-dark">View Orders</a></button>
                              ';
                        }
                        ?>
                    </form>
                </li>
                
            </ul>
            <!---->
            
        </div>
    </div>
            
    <!-- <label class="top-log mx-auto"></label> -->
    
</header>
</div>
<?php
if(!isset($_SESSION['user_name'])) { 
echo '<div class="wrap container col-md-4 my-0">
    <h5 class="text-center mb-4">Login Now</h5>
    <div class="login p-5 bg-dark mx-auto mw-100">
        <form action="login_check.php" method="post">
            <div class="form-group">
                <label class="mb-2">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter e-mail" required>
            </div>
            <div class="form-group">
                <label class="mb-2">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary mb-4" name="submit">Log In</button>
            <a href="sign_in.php" class="btn btn-info mb-4 text-white" name="sign_in">Sign In</a>
        </form>
    </div>
</div>';
} 
else{
    echo
                '<script language="javascript">
                alert("Redirecting to payment gateway!");
                window.location.href="checkout.php";
                </script>';
}
?>
<script src="js/bootstrap.js"></script>
