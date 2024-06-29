<?php
session_start();

include("includes/db.php");
include("functions/functions.php");
include("includes/header.php");

// Fetch cart items
$ip_add = getRealUserIp();
$select_cart = "select * from cart where ip_add='$ip_add'";
$run_cart = mysqli_query($con,$select_cart);

?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <a href="./shop.php">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                    
                            <?php

if(!isset($_SESSION['customer_email'])){

include("customer/customer_login.php");


}else{

include("payment_options.php");

}



?>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <?php
                            // Fetch cart items and calculate totals dynamically
                            $subtotal = 0;
                            while($row_cart = mysqli_fetch_array($run_cart)){
                                $pro_id = $row_cart['p_id'];
                                $pro_qty = $row_cart['qty'];
                                $only_price = $row_cart['p_price'];
                                $get_product = "select * from products where product_id='$pro_id'";
                                $run_product = mysqli_query($con,$get_product);
                                $row_product = mysqli_fetch_array($run_product);
                                $product_title = $row_product['product_title'];
                                $product_image = $row_product['product_img1'];
                                $sub_total = $only_price * $pro_qty;
                                $subtotal += $sub_total;
                            ?>
                            <div class="checkout__order__product">
                                <ol class="checkout__total__products">
                                    <li><?php echo $product_title; ?><span>R<?php echo number_format($sub_total, 2); ?></span></li>
                                </ol>    
                            </div>
                            <?php } ?>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>R<?php echo number_format($subtotal, 2); ?></span></li>
                                <li>Total <span>R<?php echo number_format($subtotal, 2); ?></span></li>
                            </ul>
                            <!-- Checkbox inputs and additional content as before -->
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<!-- Footer Section Begin -->
<?php include("includes/footer.php"); ?>
<!-- Footer Section End -->

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
 

<!-- Search Begin -->
<div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>