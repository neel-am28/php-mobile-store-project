<?php  
include('config.php');
include('common.php');
?>
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<style type="text/css">

    .carousel-item {
    background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(images/banner1.jpg) no-repeat;
    background-size: cover;
    filter: grayscale(0) !important;
}

.carousel-item.item2 {
    background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(images/banner1.jpg) no-repeat;
    background-size: cover;
}

.carousel-item.item3 {
    background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(images/banner3.jpg) no-repeat;
    background-size: cover;
}

.carousel-item.item4 {
    background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(images/banner4.jpg) no-repeat;
    background-size: cover;
}
.scrl{
    font-size: 13px !important;
}
.brand_name{
    font-size: 15px !important;
}

</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- <div class="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="carousel-caption text-center">
                    <h3>New Arrivals
                        <span>Cool monsoon sale 50% off</span>
                    </h3>
                    <a href="#shop_now" class="scrl btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                </div>
            </div>
            <div class="carousel-item item2">
                <div class="carousel-caption text-center">
                    <h3>All Brands
                        <span>Want to Buy Your Best?</span>
                    </h3>
                    <a href="#shop_now" class="scrl btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                </div>
            </div>
            <div class="carousel-item item3">
                <div class="carousel-caption text-center">
                <h3>New Arrivals
                        <span>Cool monsoon sale 50% off</span>
                    </h3>
                    <a href="#shop_now" class="scrl btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                </div>
            </div>
            <div class="carousel-item item4">
                <div class="carousel-caption text-center">
                <h3>All Brands
                        <span>Want to Buy Your Best?</span>
                    </h3>
                    <a href="#shop_now" class="scrl btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div> -->
    

    <div class="container" style="margin-top:30px;" id="shop_now">
        <div class="row">
            <div class="col-lg-3">     
            <h3 class="brand">BRANDS</h3>
            <!-- <hr>  -->
                <ul class="list-group">                    
                    <br>					
                        <?php 
                        $fetch="SELECT * from `mobile_brands` order by `brand_name`";
                        $run = mysqli_query($conn, $fetch);
                        while ($res = mysqli_fetch_assoc($run)) {
                        ?>
                        <li class="list-group-item bg-light">
                            <div class="form-check">                           
                                <label class="form-check-label brand_name">
                                    <input type="checkbox" name="brand" class="form-check-input product_check" id="brand" value="<?php echo $res['brand_name']; ?>" > <?php echo $res['brand_name']; ?>
                                </label>  
                            </div>                           
                        </li>
                        <?php  } ?>                   
			    </ul>
            </div>  <!--col-lg-3-end-->
            <div class="col-lg-9 prod">
                <h3 class="text-center brand" id="textChange">ALL PRODUCTS</h3>
                <!-- <hr> -->
                <div class="container">
                    <!-- OUTPUT DIV -->
                <div class="row inner" id="result" style="margin-top:23px !important;">                  
                    <?php 
                    $fetch="SELECT * FROM `mobile_products`, `mobile_brands` WHERE `mobile_products`.`brand_id` = `mobile_brands`.`brand_id` order by `prod_id` desc";
                        $run = mysqli_query($conn, $fetch);
                        while ($res = mysqli_fetch_assoc($run)) {
                            // print_r($res['prod_img']);
                            $filename = explode(",", $res['prod_img']);  
                            foreach($filename as $index => $value){  
                            if ($index == 0) {                                             
                    ?>
                    <div class="col-md-3 col-sm-4 mb-4">
                        <a href="view_more.php?prod_id=<?= $res['prod_id'];?>">
                        <div class="border d-flex flex-column bg-light small-screen px-auto">
                            <img style="padding:10px; height:310px;width:150px;" src="admin/uploads/<?= $filename[$index];?>" class="img-fluid mx-auto"/>  
                            <hr width="50%" style="background-color:#00bcd4!important;">                        
                             <h6 style="color:#666!important;font-weight:700;font-size:12px;height:60px;" class="text-uppercase text-center p-1 tittle-w3layouts mx-auto"><?= $res['prod_name'];?>
                            </h6>
                            <p class="text-center text-uppercase price mx-auto mb-2" style="font-size:12px;color:#00bcd4;">&#8377;<?= $res['prod_price'];?></p>                           
                        </div>
                        </a>
                    </div>   
                    <!-- <img style="padding:10px; height:350px;" src="admin/uploads/<?= $filename[1];?>" class="img-fluid"/>
                               <img style="padding:10px; height:350px;" src="admin/uploads/<?= $filename[2];?>" class="img-fluid"/>  -->           
                    <?php 
                        }
                    }
                    } 
                    ?>                   
                </div> <!--col-md-3 mb-4-->
                </div>
            </div> <!--col-lg-9-end-->            
        </div> <!--row-end-->
    </div> <!--container-end-->
    <br><br>

    <footer class="py-lg-5 py-3">      
                <p class="copy-right text-center">&copy; 2019 Mobiles. All Rights Reserved | Design by
                    <a href="index.php"> Advanced Mobile Store </a>
                </p>
    </footer>
    <!-- //footer -->
    <script src="js/jquery-2.2.3.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".product_check").change(function(){
                var brand = get_brand_names('brand');              
                $.ajax({
                    url: 'action.php',
                    method: 'POST',
                    data:{brand: brand},
                    success: function(response){
                        $('#result').html(response);
                        // $('#textChange').text("FILTERED PRODUCTS");
                    }
                });
            }); 

            // IMPPRTANT: Here we have used parameter 'brand' in the function just in case if we want to add more filters like RAM, Storage. etc. We can just pass the required parameter like var ram = get_filter_text('ram'); then
           function get_brand_names(brand){
            var filterData = [];
            $('#'+brand+':checked').each(function(){
                filterData.push($(this).val());
            });
            
            // console.log(filterData); // (2) ["Oppo", "Realme"]
            return filterData;
           }
           });
    </script>

    <script>
    $(document).ready(function(){
      $(".scrl").click(function() {
        $('html, body').animate({
            scrollTop: $("#shop_now").offset().top
        }, 1000);
        });
      });
    </script>
    
    <script>
    $(document).ready(function () {
        $("#myModal").modal();
    });
	</script>
	<!-- // modal -->

	<!--search jQuery-->
	
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
	

	<script src="js/bootstrap.js"></script>
	<!-- js file -->
<style type="text/css">
    @media only screen and (max-width: 576px) {
  .prod{
    padding: 0;
  }
  .inner{
    width: 400px;
  }
  .small-screen{
    width: 90vw;
  }
}
</style>