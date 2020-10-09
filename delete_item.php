<?php 
session_start();
if(isset($_POST["action"]))
{
 if($_POST["action"] == 'remove')
 {
  foreach($_SESSION["cart"] as $keys => $values)
  {
   if($values == $_POST["prod_id"])
   {
    unset($_SESSION["cart"][$keys]);
   }
  }
 }
}
?>