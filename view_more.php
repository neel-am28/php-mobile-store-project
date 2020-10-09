<?php
include("config.php");
include('common.php');
?>

<style>
*{
    box-sizing: border-box;  
}  
ul.thumb{
    margin: 0 auto;
    float: left;
}
ul.thumb li{
    list-style-type: none;
    margin-bottom: 5px;
    width: 90px;
    height: 100px;
    border: 1px solid rgba(0,0,0,0.2);
    overflow: hidden;
    position: relative;
}
ul.thumb li img{
    display: block;
    height: 90%;
    position: absolute;
    margin-left: auto;
    margin-right: auto;
    left: 0;
    right: 0;
    top: 5px;
}
.imgBox{
    float: left;
    width: 200px;
    height: 310px;
    border: 1px solid rgba(0,0,0,0.2);
    margin-left: 10px;
}
.imgBox img{
    height: 90%;
    display: block;
    margin: 15px auto;
}
</style>
    


	<hr>		
    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container center">
            <div class="inner-sec-shop pt-lg-4 pt-3">
                <div class="row center">
                    <div class="col-lg-4 col-md-6 img-center">
                         <ul class="thumb">
                            <?php 
                            $prod_id = $_GET['prod_id'];
                            // print_r($prod_id);
                            $fetch="SELECT * FROM `mobile_products` where prod_id= '$prod_id'";
                            $run = mysqli_query($conn, $fetch);
                            while ($res = mysqli_fetch_assoc($run)) {
                                $filename = explode(",", $res['prod_img']);  
                                for($i = 0; $i < count($filename); $i++){  
                                                                            
                            ?>
                            <li><a href="admin/uploads/<?= $filename[$i];?>" target="imgBox"><img src="admin/uploads/<?= $filename[$i];?>"></a></li>      
                            <?php }   ?>                     
                            </ul>                           
                            <div class="imgBox"><img src="admin/uploads/<?= $filename[0];?>"></div>                           
                            <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-8 col-md-6 single-right-left">
                        <h3>Model: <?= $res['prod_name'];?></h3>
                        <p>Price: <span class="item_price">&#8377;<?= $res['prod_price'];?></span>
                        </p>
                        <div class="description">
                            <h5>Product Specifications: <?= $res['prod_desc'];?></h5>
                            <input type="hidden" name="prod_id" value="<?php echo $res['prod_id']; ?>">
                        </div>
                        <div class="occasion-cart">
                            <div class="googles single-item singlepage">
                                <form action="insert_cart.php" method="post">
                                <input type="hidden" name="prod_name" value="<?php echo $res['prod_name']; ?>" >
                                <input type="hidden" name="prod_price" value="<?php echo $res['prod_price']; ?>">
                                <input type="hidden" name="prod_id" value="<?php echo $res['prod_id']; ?>">
                                <button type="submit" class="googles-cart pgoogles-cart add_cart">
                                    Add to Cart
                                </button>                                                   
                                </form>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>

    <script src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
        $('.thumb a').bind("click mouseover", function(e){
            e.preventDefault();
            $('.imgBox img').attr("src", $(this).attr("href"));
        });
       }); 
    </script>
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
    <script src="js/bootstrap.js"></script>
    <!-- js file -->
<style type="text/css">
@media only screen and (min-width: 300px) {
ul.thumb li{
    list-style-type: none;
    margin-bottom: 5px;
    width: 70px;
    height: 100px;
    border: 1px solid rgba(0,0,0,0.2);
    overflow: hidden;
    position: relative;
}
ul.thumb li img{
    display: inline-block;
    height: 90%;
    position: absolute;
    margin-left: auto;
    margin-right: auto;
    left: 0;
    right: 0;
    top: 5px;
}
.imgBox{
    float: left;
    width: 185px !important;
    height: 310px;
    border: 1px solid rgba(0,0,0,0.2);
    /*margin-left: 10px;*/
}
.imgBox img{
    height: 90%;
    display: block;
    margin: 15px auto;
}
}
@media only screen and (max-width: 762px) {
.center{

    max-width: 100%;
}
@media (max-width: 991px){
.single-right-left {
    width: 100%;
    padding-top: 35px;
}

</style>