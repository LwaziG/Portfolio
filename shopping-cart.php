<?php

session_start();

include("includes/db.php");
include("functions/functions.php");
include("includes/header.php");

?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <?php

$ip_add = getRealUserIp();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

$count = mysqli_num_rows($run_cart);

?>


  
    
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form action="shopping-cart.php" method="post" enctype="multipart-form-data">
                <div class="shopping__cart__table">
                    
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                while($row_cart = mysqli_fetch_array($run_cart)){
                                    $pro_id = $row_cart['p_id'];
                                    $pro_size = $row_cart['size'];
                                    $pro_qty = $row_cart['qty'];
                                    $only_price = $row_cart['p_price'];
                                    $get_products = "select * from products where product_id='$pro_id'";
                                    $run_products = mysqli_query($con,$get_products);
                                    while($row_products = mysqli_fetch_array($run_products)){
                                        $product_title = $row_products['product_title'];
                                        $product_img1 = $row_products['product_img1'];
                                        $sub_total = $only_price * $pro_qty;
                                        $_SESSION['pro_qty'] = $pro_qty;
                                        $total += $sub_total;
                                ?>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product Image" class="product-image">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?php echo $product_title; ?></h6>
                                            <h6><?php echo $pro_size; ?></h6>
                                        </div>
                                    </td>
                                    <td class="cart__price">R<?php echo $only_price; ?>.00</td>
                                    <td class="quantity__item">
                                        
                                                <input type="text" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity form-control">
                                            
                                    </td>
                                    <td class="cart__price">R<?php echo $sub_total; ?>.00</td>
                                    <td class="cart__close"><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                </tr>
                                <?php 
                                        }
                                    } 
                                ?>
                            </tbody>
                        </table>
                        
                    
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="./shop.php">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <button class="btn btn-info" type="submit" name="update" value="Update Cart">
                                <i class="fa fa-spinner"></i> Update cart
                            </button>
                        </div>
                    </div>
                </div>
                </form>
                <p class="text-muted" > You currently have <?php echo $count; ?> item(s) in your cart. </p>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code" name="code" class="form-control">
                        <button type="submit" name="apply_coupon">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>R<?php echo $total; ?>.00</span></li>
                        <li>Total <span>R<?php echo $total; ?>.00</span></li>
                    </ul>
                    <a href="./checkout.php" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->



    
        <?php

function update_cart(){

global $con;

if(isset($_POST['update'])){

foreach($_POST['remove'] as $remove_id){


$delete_product = "delete from cart where p_id='$remove_id'";

$run_delete = mysqli_query($con,$delete_product);

if($run_delete){
echo "<script>window.open('shopping-cart.php','_self')</script>";
}



}




}



}

echo @$up_cart = update_cart();



?>

       <!-- Footer Section Begin -->
   <?php

        include("includes/footer.php");

    ?>
    <!-- Footer Section End -->

    <script src="js/js/jquery.min.js"> </script>

<script src="js/js/bootstrap.min.js"></script>

<script>

$(document).ready(function(data){

$(document).on('keyup', '.quantity', function(){

var id = $(this).data("product_id");

var quantity = $(this).val();

if(quantity  != ''){

$.ajax({

url:"change.php",

method:"POST",

data:{id:id, quantity:quantity},

success:function(data){

$("quantity__item").load('shopping-cart.php');

}




});


}




});




});

</script>

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

    

</script>

</body>

</html>