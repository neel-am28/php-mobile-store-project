<style type="text/css">
    
*{
    font-family: 'Montserrat', sans-serif !important;
}
</style>
<?php
    session_start();
    if (isset($_SESSION['user_name']) && $_SESSION['user_name'] !== '') {
        unset($_SESSION['user_name']);
        // session_destroy();
        echo
        '<script language="javascript">
        alert("Logout Successful!");
        window.location.href="index.php"
        </script>';
    }
    else {
        echo
        '<script language="javascript">
        alert("You are not logged in!");
        window.location.href="index.php"
        </script>';
    }
    // unset($_SESSION['user_name']);
    // session_destroy();
?>