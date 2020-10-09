<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
<link href="css/style6.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/shop.css" type="text/css" />
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/fontawesome-all.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
    rel="stylesheet">

    <?php
    session_start();
	  if(isset($_SESSION['user_name']) && $_SESSION['user_name']!=""){
        echo
        '<script language="javascript">
        alert("Hey '.$_SESSION['user_name'].',\nYou are already logged in!");
        window.location.href="index.php";
        </script>';
    }
    else {  
        if (isset($_POST['submit'])){
        include("config.php");
        $email = $_POST['email'];
        $password = $_POST['password'];
        $loginQuery = "SELECT * FROM `mobile_users` WHERE `email`='$email' && `password`='$password'";
        $result = mysqli_query($conn, $loginQuery);
        if (mysqli_num_rows($result) == 1){
            while ($res = mysqli_fetch_assoc($result)){
                $_SESSION['user_name']=$res['user_name'];
                $_SESSION['user_id'] = $res['user_id'];
                echo
                '<script language="javascript">
                alert("Login Succesfull, '.$_SESSION['user_name'].'!\nRedirecting to Main Page.");
                window.location.href="view_cart.php"
                </script>';
            }
        }
        else{
            echo
                '<script language="javascript">
                alert("Email or password incorrect!");
                window.location.href="view_cart.php"
                </script>';              
        }
    }
}
?>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.js"></script>