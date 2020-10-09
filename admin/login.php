<?php
        if (isset($_POST['submit'])){
        include("config.php");
        $username = $_POST['username'];
        $password = $_POST['password'];
        $type = "admin";
        $select = "SELECT * FROM `mobile_admin` WHERE `username`='$username' && `password`='$password' && `type` = '$type'";
        $query = mysqli_query($conn, $select);
        $result = mysqli_fetch_assoc($query);
        if (mysqli_num_rows($query) == 1){
            session_start();
            $_SESSION['username'] = $result['username'];  
            $_SESSION['role'] = $result['type'];        
            echo
                '<script language="javascript">
                alert("Login Succesfull, '.$_SESSION['username'].'!\nRedirecting to Main Page.");
                window.location.href="index.php"
                </script>';
        }
        else if(isset($_SESSION['username']) && $_SESSION['username']!=""){
        echo
        '<script language="javascript">
        alert("Hey '.$_SESSION['username'].',\nYou are already logged in!");
        window.location.href="index.php";
        </script>';
        }
    }
    else {
?>
<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<style>
h1{
    color: rgba(255,255,255,0.8);
}
</style>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">                   
                    <h1>Login Admin</h1>
                </div>
                <div class="login-form">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>
<?php }
?>