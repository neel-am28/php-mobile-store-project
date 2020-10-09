<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<?php  
session_start();
/*session_destroy();
die;*/
$prod_id = $_POST['prod_id'];
if(empty($_SESSION['cart'])){
$_SESSION['cart']=array($prod_id);
echo
        '<script language="javascript">
        alert("First item added to the cart!");
        window.location.href="view_cart.php"
        </script>';
        // print_r($_SESSION['cart']);
        // die;
}
else if(in_array($_POST['prod_id'], $_SESSION['cart'])){
        echo
        '<script language="javascript">
        alert("Item already in cart!");
        window.location.href="view_cart.php"
        </script>';
}

else{
        array_push($_SESSION['cart'],$prod_id);
        echo
        '<script language="javascript">
        alert("Product added to cart!");
        window.location.href="view_cart.php"
        </script>';
}


?>