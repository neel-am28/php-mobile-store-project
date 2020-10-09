<?php  
include('config.php');
include('common.php');
?>
<style>
</style>
</div>
<!-- <label class="top-log mx-auto"></label> -->
<hr>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
	<div class="container">
		<div class="inner-sec-shop px-lg-4 px-3">
			<h3 class="tittle-w3layouts my-lg-4 mt-3">Payment </h3>
			<!--/tabs-->
			<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Cash on delivery (COD)</li>
						<li>Credit/Debit</li>
					</ul>
					<div class="resp-tabs-container">
						<!--/tab_one-->
						<div class="tab1">
							<?php 
							$user_name = $_SESSION['user_name'];
							$user_id = "select * from `mobile_users` where `user_name` = '$user_name'";
							$run = mysqli_query($conn, $user_id);
							$res = mysqli_fetch_assoc($run);
							if(mysqli_num_rows($run) == 1){
							?>
							<div class="pay_info">
								<div class="vertical_post check_box_agile">
									<div class="card text-center">
									  <div class="card-header font-weight-bold">
									    <?php echo $res['name']; ?>
									  </div>
									  <div class="card-body">									    
									    <form action="orders.php" method="post">
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">ADDRESS:</label>
										    <div class="col-sm-10">
										      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $res['address']; ?>" name="address">
										    </div>
										  </div>
										  <hr>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">CITY:</label>
										    <div class="col-sm-10">
										      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $res['city']; ?>" name="city">
										    </div>
										  </div>
										  <hr>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">CONTACT:</label>
										    <div class="col-sm-10">
										      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $res['contact']; ?>" name="contact">
										    </div>
										  </div>
										  <hr>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">E-MAIL:</label>
										    <div class="col-sm-10">
										      <input type="text" readonly class="form-control-plaintext" value="<?php echo $res['email']; ?>" name="e-mail">
										    </div>
										  </div>
										  <hr>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">GENDER:</label>
										    <div class="col-sm-10">
										      <input type="text" readonly class="form-control-plaintext" value="<?php echo $res['gender']; ?>" name="gender">
										    </div>
										  </div>
										  <hr>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">ZIP CODE:</label>
										    <div class="col-sm-10">
										      <input type="text" readonly class="form-control-plaintext" value="<?php echo $res['pincode']; ?>" name="pincode">
										    </div>
										  </div>
										  <hr>
										  <a href="edit_info.php?user_id=<?php echo $res['user_id'];?>" data-toggle="modal" data-target="#edit_info_modal" name="edit" class="edit_info btn btn-info border-0" user_id="<?php echo $res['user_id']; ?>">Edit Info</a>
										  <br>
										  <button type="submit" class="btn btn-dark rounded-0 mt-4">Make Payment</button>
										</form>
									  </div>									  
									</div>									
								</div>
							</div>
						<?php  } ?>

						</div>
						<!--//tab_one-->
						<div class="tab2">
							<div class="pay_info">
								<form action="orders.php" method="post">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="credit-card-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Name on Card</label>
													<input class="form-control" type="text" name="name" placeholder="Enter your name on the card" required>
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Card Number</label>
															<input class="form-control" type="text" name="number" placeholder="Enter card number" required>
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">CVV</label>
															<input class="form-control" type="password"  placeholder="Enter CVV" required>
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Expiration Date</label>
													<input class="form-control" type="text" placeholder="MM / YY" required>
												</div>
											</div>
											<button type="submit" class="btn btn-dark rounded-0">Make Payment</button>
										</div>
									</section>
								</form>
							</div>
						</div>
						<!-- tab-2 end -->
					</div>
				</div>
			</div>
			<!--//tabs-->
		</div>

	</div>
			<!-- //payment -->
</section>

    <script src="js/jquery-2.2.3.min.js"></script>
    <script>
  	$(document).ready(function () {
    $('.edit_info').click(function() {
      var user_id = $(this).attr('user_id');

      $.ajax({
        'url': 'get_single_user.php',
        'data': 'user_id=' + user_id,
        'method': 'get',
        'datatype': 'json',
        success: function(result) {
          var res = JSON.parse(result);
          $('input[name="user_id"]').val(res.user_id);
          $('textarea[name="address"]').html(res.address);
          $('input[name="city"]').val(res.city);
          $('input[name="contact"]').val(res.contact);
          $('input[name="pincode"]').val(res.pincode);          
      }
  });
  });
});
</script>
<div class="modal fade" id="edit_info_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold" id="exampleModalLabel">EDIT INFO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="update_info.php" method="POST" enctype="multipart/form-data" class="font-weight-bold">
        <input type="hidden" name="user_id">
        <div class="container">
        <div class="modal-body">                 
          <div class="form-group">
            <label>ADDRESS</label>
            <textarea type="text" class="form-control" name="address" required></textarea>
          </div>
          <div class="form-group">
            <label>CITY</label>
            <input type="text" class="form-control" name="city" required>
          </div>
          <div class="form-group">
            <label>CONTACT</label>
            <input type="text" class="form-control" name="contact" required>
          </div>
          <div class="form-group">
            <label>ZIP-CODE</label>
            <input type="text" class="form-control" name="pincode" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
          </div>
          </div>

      </form>
    </div>
  </div>
</div>

     <footer class="py-lg-5 py-3">      
                <p class="copy-right text-center">&copy; 2019 Mobiles. All Rights Reserved | Design by
                    <a href="index.php"> Advanced Mobile Store </a>
                </p>
    </footer>
		<!-- //footer -->
		<!--jQuery-->
		<script src="js/jquery-2.2.3.min.js"></script>
		<!-- newsletter modal -->
		<!--search jQuery-->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<script src="js/classie-search.js"></script>
		<script src="js/demo1-search.js"></script>
		<!--//search jQuery-->
		<!-- cart-js -->
		<script src="js/minicart.js"></script>
		<script>
			googles.render();

			googles.cart.on('googles_checkout', function (evt) {
				var items, len, i;

				if (this.subtotal() > 0) {
					items = this.items();

					for (i = 0, len = items.length; i < len; i++) {}
				}
			});
		</script>
		<!-- //cart-js -->
		<script>
			$(document).ready(function () {
				$(".button-log a").click(function () {
					$(".overlay-login").fadeToggle(200);
					$(this).toggleClass('btn-open').toggleClass('btn-close');
				});
			});
			$('.overlay-close1').on('click', function () {
				$(".overlay-login").fadeToggle(200);
				$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
				open = false;
			});
		</script>
		<!-- carousel -->
		<!-- easy-responsive-tabs -->
		<script src="js/easy-responsive-tabs.js"></script>
		<script>
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
				$('#verticalTab').easyResponsiveTabs({
					type: 'vertical',
					width: 'auto',
					fit: true
				});
			});
		</script>

		<!-- credit-card -->
		<script type="text/javascript" src="js/creditly.js"></script>
		<link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

		<script type="text/javascript">
			$(function () {
					

				$(".creditly-card-form .submit").click(function (e) {
					e.preventDefault();
					var output = creditly.validate();
					if (output) {
						// Your validated credit card output
						console.log(output);
					}
				});
			});
		</script>
		<!-- //credit-card -->
		<!-- dropdown nav -->
		<script>
			$(document).ready(function () {
				$(".dropdown").hover(
					function () {
						$('.dropdown-menu', this).stop(true, true).slideDown("fast");
						$(this).toggleClass('open');
					},
					function () {
						$('.dropdown-menu', this).stop(true, true).slideUp("fast");
						$(this).toggleClass('open');
					}
				);
			});
		</script>
		<!-- //dropdown nav -->
		<script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->


		<!-- //smooth-scrolling-of-move-up -->
		<script src="js/bootstrap.js"></script>
		