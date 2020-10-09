<?php 
    include('config.php');
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_price'];
    $brand_id = $_POST['prod_brand'];
    $prod_desc = $_POST['prod_desc'];

    $i=0;
    //while loop will access one image at a time with respect to its index and upload it to uploads folder...
    while($i<count($_FILES['image']['name'])){
    count($_FILES['image']['name']); // 3 (returns number of images uploaded)
    $filename = $_FILES['image']['name']; //Array ( [0] => bird.jpg [1] => book.jpg )
    $filename = $_FILES['image']['name'][$i]; //bird.jpg
    $source = $_FILES['image']['tmp_name'][$i]; //C:\wamp64\tmp\php801A.tmpbook.jpg

    //change original file name and set its name as current date
    $filename_array = explode('.',$filename); //Array ( [0] => bird [1] => jpg ) (stores file_name in 1st index, extension in 2nd)
    $extension = $filename_array[count($filename_array)-1]; //jpgjpg (stores the extension)
    $new_name = (date('ymdhis')+$i); //190616035003190616035004
    $new_filename = $new_name.'.'.$extension; // 190616035125.jpg190616035126.jpg
    $database_filename_array[] = $new_filename; // 190616035208.jpg190616035209.jpg

    $destination = 'uploads/'.$new_filename;

    // 'original_name='.$filename.' tmp_location='.$source.' new_name='.$new_filename.'<br>'; 
    move_uploaded_file($source,$destination);
    $i++;
    }
    $database_filename_string = implode(',',$database_filename_array); // 190616035257.jpg,190616035258.jpg
    //print_r($database_filename_string);
    
    $product = "INSERT INTO mobile_products (brand_id, prod_name, prod_price, prod_desc, prod_img) VALUES ('".$brand_id."', '".$prod_name."','".$prod_price."','".$prod_desc."', '".$database_filename_string."')";
    

      //$addProduct = mysqli_query($conn, $product);
      if (mysqli_query($conn, $product)) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $product . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    
	header("Location:view_product.php?success-insert");
?>
