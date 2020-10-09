<?php 
    require_once("config.php");   
	$prod_id=$_POST['prod_id'];
    $prod_name=$_POST['prod_name'];
    if (isset($_POST['prod_brand'])) {
        $brand = $_POST['prod_brand'];
    }
    else {
        $brand = $_POST['brand_id'];
    } 
    $prod_price = $_POST['prod_price'];
    $prod_desc = $_POST['prod_desc'];

    $i=0;
    //while loop will access one image at a time with respect to its index and upload it to uploads folder...
    if ( isset( $_FILES["image"] ) && !empty( $_FILES["image"]["name"] ) ) {
    while($i<count($_FILES['image']['name'])){
        $filename = $_FILES['image']['name'][$i]; 

        $new_filename = "";
        if($filename == ""){
            $new_filename = $_POST['p_img'];
        }
        else{
        $files = explode(",", $_POST['p_img']);
        for($j = 0; $j < count($files); $j++){
           unlink('uploads/'.$files[$j]);
        }
        count($_FILES['image']['name']); // 3 (returns number of images uploaded)
        $filename = $_FILES['image']['name']; //Array ( [0] => bird.jpg [1] => book.jpg )
        $filename = $_FILES['image']['name'][$i]; //bird.jpg
        $source = $_FILES['image']['tmp_name'][$i];
        $filename_array = explode('.',$filename); 
        $extension = $filename_array[count($filename_array)-1]; //jpgjpg (stores the extension)
        $new_name = (date('ymdhis')+$i); //190616035003190616035004
        $new_filename = $new_name.'.'.$extension; // 190616035125.jpg190616035126.jpg
        $database_filename_array[] = $new_filename; // 190616035208.jpg190616035209.jpg
        $destination = 'uploads/'.$new_filename;
        move_uploaded_file($source,$destination);
        $i++;
        }
    }
}

    $database_filename_string = implode(',',$database_filename_array);
    
	$update = "UPDATE `mobile_products` set `prod_name` = '$prod_name', `brand_id` = '$brand', `prod_price` = '$prod_price', `prod_desc` = '$prod_desc', `prod_img` = '$database_filename_string'  WHERE `prod_id` = '$prod_id'";
    $run = mysqli_query($conn, $update);
     
	header("Location:view_product.php?success-update");
?>