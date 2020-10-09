<?php 
include("config.php");
	$sql = "SELECT * FROM `mobile_products`, `mobile_brands` WHERE `mobile_products`.`brand_id` = `mobile_brands`.`brand_id`";
	if(isset($_POST['brand'])){
		$brand = implode("','", $_POST['brand']);
		$sql.= "AND `mobile_brands`.`brand_name` IN('".$brand."') order by `prod_id` desc";
	}
// print_r($sql);
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    	while($row = mysqli_fetch_assoc($result)){
            // print_r($row);
    		list($filename) = explode(",", $row['prod_img']);
            // var_dump($filename); // $filename stores the name of the image
        for($i=0; $i<count($filename); $i++){
            // print_r($row);
            // echo var_dump($filename);
        	echo '
            <div class="col-md-3 mb-4">
                        <a href="view_more.php?prod_id='.$row['prod_id'].'">
                        <div class="border d-flex flex-column bg-light small-screen">
                            <img style="padding:10px; height:310px;width:150px;" src="admin/uploads/'.$filename.'" class="img-fluid mx-auto"/> 
                            <hr width="50%" style="background-color:#00bcd4!important;">  
                            <h6 style="color:#666!important;font-weight:700;font-size:12px;height:60px;" class="text-uppercase text-center p-1 tittle-w3layouts mx-auto">'. $row['prod_name'] .'
                            </h6>
                            <p class="text-center text-uppercase price mx-auto mb-2" style="font-size:12px;color:#00bcd4;">&#8377;'. $row['prod_price'] .'</p>
                                                                                     
                        </div>
                        </a>
                   </div>';
           }
	}
}
else{
	 echo "<h3 class='brand'>NO PRODUCTS FOUND</h3>";
	}
?>