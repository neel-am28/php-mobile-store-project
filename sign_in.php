
<?php
// session_start();
include('common.php');
?>
<style>
.home a, .brand{
    color: #ff4e00;
    letter-spacing: 3px;
    font-weight: 700;
}
.carousel-caption{
  background: rgba(0, 0, 0, 0.5);
  box-shadow: 0 0 0 10px rgba(0, 0, 0, 0.5);
}
.btn.btn-info{
    /*border-radius: 0!important; */
    /*padding:0!important;*/
}
.form-check-label, .price, .cart{
    font-weight: 700;
    text-transform: uppercase;
}
.cart{
    letter-spacing: 2px;
}
.red{
	color: red;
}
*{
        box-sizing: border-box;    
        font-family: 'Montserrat', sans-serif !important;
        border: 0 !important;
        border-radius: 0 !important;
    }
</style>
    

 <?php 
include('config.php');
$name = $email = $contact = $gender = $address = $city = $pincode = $user_name = $password = "";
$nameError = $emailError = $contactError = $genderError = $addressError = $cityError = $pincodeError = $user_nameError = $passwordError = "";


if(isset($_POST['sign_in'])){
	if (empty($_POST["name"])) {
	    $nameError = "Name is required";
	  } else {
	  	$name = $_POST['name'];
	  	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	      $nameError = "Only letters and white spaces are allowed"; 
	    }
	   
	}
	if (empty($_POST["email"])) {
	    $emailError = "Email is required";
	  } else {
	   $email = $_POST['email'];
	   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      	$emailError = "Invalid email format"; 
    	}
	}
	if (empty($_POST["contact"])) {
	    $contactError = "Contact is required";
	  } else {
	   $contact = $_POST['contact'];
	   if (!preg_match("/^[0-9]{10}$/",$contact)) {
	      $contactError = "Invalid mobile number"; 
	    }
	}
	if (empty($_POST["gender"])) {
	    $genderError = "Gender is required";
	  } else {
	   $gender = $_POST['gender'];
	}
	if (empty($_POST["address"])) {
	    $addressError = "Address is required";
	  } else {
	   $address = $_POST['address'];
	}
	if (empty($_POST["city"])) {
	    $cityError = "City is required";
	  } else {
	   $city = $_POST['city'];
	}
	if (empty($_POST["pincode"])) {
	    $pincodeError = "Pincode is required";
	  } else {
	   $pincode = $_POST['pincode'];
	}
	if (empty($_POST["user_name"])) {
	    $user_nameError = "Username is required";
	  } else {
	   $user_name = $_POST['user_name'];
	}
	if (empty($_POST["password"])) {
	    $passwordError = "Password is required";
	  } else{
	   $password = $_POST['password'];
	   $uppercase = preg_match('@[A-Z]@', $password);
	   $lowercase = preg_match('@[a-z]@', $password);
	   $number    = preg_match('@[0-9]@', $password);
	   $specialChars = preg_match('@[^\w]@', $password);
	   if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
		    $passwordError =  'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
	   } else{
	   	$password = $_POST['password'];
	   }
	}

	/*echo $name." ". $gender." ". $email." ". $contact." ". $address." ". $city." ". $pincode." ". $password;
	die;*/

	$dup = mysqli_query($conn, "select * from mobile_users where user_name = '".$user_name."' && email = '".$email."'");
	if(mysqli_num_rows($dup) > 0){
		echo "<div class='container'>";
		echo "<div class='red text-center' style='font-weight:bold;font-size:20px;'>Username or email already exists in the database. Please enter another e-mail/ username </div>";
		echo "</div>";
	}
	else{
	$insert = "insert into `mobile_users`(name, gender, email, contact, address, city, pincode, user_name, password) values('$name', '$gender', '$email', '$contact', '$address', '$city', '$pincode', '$user_name', '$password')";
	$sql = mysqli_query($conn, $insert);
		if($sql == 1){
			echo
                '<script language="javascript">
                alert("Registration Successful!\nRedirecting to Login Page.");
                window.location.href="login.php"
                </script>';
		}
		else{
			// die("DB Selection Error: ".mysqli_error($conn));
			echo
                '<script language="javascript">
                alert("Database Error! Contact Us for help!");
                window.location.href="sign_in.php"
                </script>';
		}
	}
}
?>


<div class="container col-md-6"> 
    <div class="login p-5 bg-dark">
    	<h5 class="text-center mb-4 text-white" style="font-size: 45px;">Sign In</h5>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        	<div class="form-row">
	        	<div class="form-group col-md-4">
	                <label class="mb-2">Name</label>
	                <input type="text" name="name" class="form-control" placeholder="Enter name" required><br>
	                <span class="red"> <?php echo $nameError;?></span><br>
	            </div>
	            <div class="form-group col-md-4">
	                <label class="mb-2">Email address</label>
	                <input type="email" name="email" class="form-control" placeholder="Enter e-mail" required><br>
	                <span class="red"><?php echo $emailError;?></span><br>
            	</div>
            	<div class="form-group col-md-4">
				  <label class="mb-2">Mobile Number</label>
				  <input type="text" name="contact" class="form-control" placeholder="Enter mobile number" required><br>
				  <span class="red"><?php echo $contactError;?></span><br>
				</div>
            </div>
            <div class="form-group">
	            <label class="mb-2 mr-3">Gender</label>	
	            <div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" name="gender" class="form-check-input" value="Male">Male
				    <input type="radio" name="gender" class="form-check-input" value="Female">Female
				  </label>
				</div><br>
				<span class="red"><?php echo $genderError;?></span><br>
			</div>
            <div class="form-group">
			  <label class="mb-2">Address</label>
			  <textarea name="address" class="form-control" rows="5" placeholder="Enter your address here.." required></textarea><br>
			  <span class="red"><?php echo $addressError;?></span><br>
			</div>
			<div class="form-row">				
			    <div class="form-group col-md-6">
			      <label for="inputState" class="mb-2">City</label>
			      <select id="inputState" class="form-control" name="city">
			        <option selected disabled>Choose...</option>
			        <option>Mumbai</option>
			        <option>Pune</option>
			        <option>Delhi</option>
			        <option>Seoul</option>
			      </select>
			      <br>
			  	  <span class="red"><?php echo $cityError;?></span><br>

			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputZip" class="mb-2">Pin Code</label>
			      <input name="pincode" type="text" class="form-control" placeholder="Enter pin code" required>
			      <br>
			  	  <span class="red"><?php echo $pincodeError;?></span><br>
			    </div>
			 </div>
			 <div class="form-row">
				 <div class="form-group col-md-6">
	                <label class="mb-2">Username</label>
	                <input name="user_name" type="text" class="form-control" placeholder="Enter user name of your choice" required>   
	                <br>
			  	  	<span class="red"><?php echo $user_nameError;?></span><br>            
	            </div>			
	            <div class="form-group col-md-6">
	                <label class="mb-2">Password</label>
	                <input name="password" type="password" class="form-control" placeholder="Enter password" required>
	                <br>
			  	  	<span class="red"><?php echo $passwordError;?></span><br>
	            </div>
            </div>
            <button type="submit" name="sign_in" class="btn btn-primary mb-4 text-white">Sign In</button>
        </form>
    </div>                    <!---->
</div>


<script>
    $(document).ready(function () {
        $("#myModal").modal();
    });
	</script>
	<!-- // modal -->

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
	<!-- Count-down -->
	<script src="js/simplyCountdown.js"></script>
	<link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<!--// Count-down -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>

	<!-- //end-smooth-scrolling -->


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

	<script src="js/bootstrap.js"></script>