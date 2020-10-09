<?php  
include('config.php');
include('common.php');
?>

<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Your Orders </h3>
				<div class="checkout-right">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Sr. No. </th>
								<th>Product Name</th>
								<th>Price</th> 
								<th>Quantity</th>
								<th>Date</th>								
							</tr>
						</thead>

						<tbody>
							<?php 
							$user_name = $_SESSION['user_name'];
							$user_id = "select `user_id` from `mobile_users` where `user_name` = '$user_name'";
							$run = mysqli_query($conn, $user_id);
							$res = mysqli_fetch_assoc($run);
							if(mysqli_num_rows($run) == 1){
								$_SESSION['user_id'] = $res['user_id'];
								$uid = $_SESSION['user_id'];
							}

							$select = "select * from `mobile_orders` where `user_id` = '$uid' ORDER BY `order_id` desc";
							$query = mysqli_query($conn, $select);
							$k = 1;
							while($result = mysqli_fetch_assoc($query)){					
								$prod_id = explode(",", $result['product_id']); 
								$qty = explode(",", $result['quantity']);  
								// $p_id = implode(",", $prod_id);	
                            	for($i=0; $i<count($prod_id); $i++){
                            		$select2 = "select * from `mobile_products` where `prod_id` = '$prod_id[$i]'";
                            		$run2 = mysqli_query($conn, $select2);
                            		$res2 = mysqli_fetch_assoc($run2);
                            		if(mysqli_num_rows($run2) == 1){                           				
                            		?>
                            			<tr class="rem1">
                            				<td><?php  echo $k++; ?></td>
                            				<td class="invert"><?php echo $res2['prod_name'];?></td>
                            				<td class="invert">&#8377;<?php echo $res2['prod_price'];?></td>                          				
                            			<?php  
                           			}	
		                			?> 
		                			<td class="invert"><?php echo $qty[$i];?></td>
		                			<td><?php echo $result['date']; ?></td>
		                			<?php
		                		}
		                	}
		                
		                    ?>		                        				                       
		                    </tr>		                    																
						</tbody>				    
					</table>
				</div>
				<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</section>


	<?php 
	if (isset($_SESSION['cart']) && $_SESSION['cart'] !== '') {
		unset($_SESSION['cart']);
	}
	?>