<?php

session_start();

include("includes/db.php");
include("functions/functions.php");
include("includes/header.php");

?>


<?php


$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

echo "<script> window.open('index.php','_self') </script>";

}
else{



$row_product = mysqli_fetch_array($run_product);

$p_cat_id = $row_product['p_cat_id'];

$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_price = $row_product['product_price'];

$pro_desc = $row_product['product_desc'];

$pro_img1 = $row_product['product_img1'];

$pro_img2 = $row_product['product_img2'];

$pro_img3 = $row_product['product_img3'];

$pro_label = $row_product['product_label'];

$pro_psp_price = $row_product['product_psp_price'];

$pro_features = $row_product['product_features'];

$pro_video = $row_product['product_video'];

$status = $row_product['status'];

$pro_url = $row_product['product_url'];

if($pro_label == ""){


}
else{

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";

}

$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['p_cat_title'];




?>


    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <!-- content -->
<section class="py-5">
    <div class="container">
      <div class="row gx-5">
      <aside class="col-lg-6">
  <div class="border rounded-4 mb-3 d-flex justify-content-center">
    <a id="mainImageLink" data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="admin_area/product_images/<?php echo $pro_img1; ?>">
      <img id="mainImage" style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="admin_area/product_images/<?php echo $pro_img1; ?>" />
    </a>
  </div>
  <div class="d-flex justify-content-center mb-3">
    <a data-fslightbox="mygalley" class="border mx-1 rounded-2 item-thumb" target="_blank" data-type="image" href="admin_area/product_images/<?php echo $pro_img1; ?>">
      <img width="60" height="60" class="rounded-2 thumb" src="admin_area/product_images/<?php echo $pro_img1; ?>" />
    </a>
    <a data-fslightbox="mygalley" class="border mx-1 rounded-2 item-thumb" target="_blank" data-type="image" href="admin_area/product_images/<?php echo $pro_img2; ?>">
      <img width="60" height="60" class="rounded-2 thumb" src="admin_area/product_images/<?php echo $pro_img2; ?>"/>
    </a>
    <a data-fslightbox="mygalley" class="border mx-1 rounded-2 item-thumb" target="_blank" data-type="image" href="admin_area/product_images/<?php echo $pro_img3; ?>">
      <img width="60" height="60" class="rounded-2 thumb" src="admin_area/product_images/<?php echo $pro_img3; ?>" />
    </a>
  </div>
</aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
              <?php echo $pro_title; ?>
            </h4>
            <div class="mb-3">
              <?php

                                if($status == "product"){

                                    if($pro_label == "Sale" or $pro_label == "Gift"){

                                echo "

                                <p class='price'>

                                <h3>R$pro_price</h3>


                                </p>

                                ";

                                }
                                else{

                                echo "

                                <p class='price'>

                                <h3>R$pro_price</h3>

                                </p>

                                ";

                                }

                                }
                                else{


                                if($pro_label == "Sale" or $pro_label == "Gift"){

                                echo "

                                <p class='price'>

                                <h3>R$pro_price</h3>

                                </p>

                                ";

                                }
                                else{

                                echo "

                                <p class='price'>

                                <h3>R$pro_price</h3>

                                </p>

                                ";

                                }


                                }

                            ?>






                            
                            
                            
                            <?php


if(isset($_POST['add_cart'])){

$ip_add = getRealUserIp();

$p_id = $pro_id;

$product_qty = $_POST['product_qty'];

$product_size = $_POST['product_size'];


$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

$run_check = mysqli_query($con,$check_product);

if(mysqli_num_rows($run_check)>0){

echo "<script>alert('This Product is already added in cart')</script>";

echo "<script>window.open('$pro_url','_self')</script>";

}
else {

$get_price = "select * from products where product_id='$p_id'";

$run_price = mysqli_query($con,$get_price);

$row_price = mysqli_fetch_array($run_price);

$pro_price = $row_price['product_price'];

$pro_psp_price = $row_price['product_psp_price'];

$pro_label = $row_price['product_label'];

if($pro_label == "Sale" or $pro_label == "Gift"){

$product_price = $pro_psp_price;

}
else{

$product_price = $pro_price;

}

$query = "insert into cart (p_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";

$run_query = mysqli_query($db,$query);

echo "<script>window.open('$pro_url','_self')</script>";

}

}


?>

<form action="" method="post" class="form-horizontal" ><!-- form-horizontal Starts -->

<?php

if($status == "product"){

?>

            </div>
  
            <p>
              <?php echo $pro_desc; ?>
            </p>
  
            <hr />
  
            <div class="row mb-4">
              <div class="col-md-4 col-6">
                <select name="product_size" class="form-control" >
                <option>Select a Size</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                    </select>
              </div>
              <!-- col.// -->
              <div class="col-md-4 col-6 mb-3">
                <select name="product_qty" class="form-control" >
                <option>Select quantity</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
              </div>
            </div>
            <?php } ?>

            <button class="btn btn-danger" type="submit" name="add_cart">

                <i class="fa fa-shopping-cart" ></i> Add to Cart
                
                </button>
                
                <button class="btn btn-warning" type="submit" name="add_wishlist">
                
                <i class="fa fa-heart" ></i> Add to Wishlist
                
                </button>

                <?php

if(isset($_POST['add_wishlist'])){

if(!isset($_SESSION['customer_email'])){

echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

}
else{

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

$run_wishlist = mysqli_query($con,$select_wishlist);

$check_wishlist = mysqli_num_rows($run_wishlist);

if($check_wishlist == 1){

echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";

echo "<script>window.open('$pro_url','_self')</script>";

}
else{

$insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

$run_wishlist = mysqli_query($con,$insert_wishlist);

if($run_wishlist){

echo "<script> alert('Product Has Inserted Into Wishlist') </script>";

echo "<script>window.open('$pro_url','_self')</script>";

}

}

}

}

?>

</form><!-- form-horizontal Ends -->  
          </div>
        </main>
      </div>
    </div>
  </section>
  <!-- Shop Details Section End -->


<script>
  document.addEventListener('DOMContentLoaded', function() {
  const thumbnails = document.querySelectorAll('.thumb');
  const mainImage = document.getElementById('mainImage');
  const mainImageLink = document.getElementById('mainImageLink');

  thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default link behavior
      const newSrc = this.src;
      const newHref = this.parentElement.href;

      mainImage.src = newSrc;
      mainImageLink.href = newHref;
    });
  });
});
</script>


<?php

if($status == "product"){



?>

</div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Products</h3>
                </div>
            </div>
            <div class="row">


<?php

$get_products = "select * from products order by rand() LIMIT 0,4";

$run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)) {

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$pro_label = $row_products['product_label'];

$manufacturer_id = $row_products['manufacturer_id'];

$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

$run_manufacturer = mysqli_query($db,$get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_name = $row_manufacturer['manufacturer_title'];

$pro_psp_price = $row_products['product_psp_price'];

$pro_url = $row_products['product_url'];


if($pro_label == "Sale" or $pro_label == "Gift"){

$product_price = "<del> R$pro_price </del>";

$product_psp_price = "| R$pro_psp_price";

}
else{

$product_psp_price = "";

$product_price = "R$pro_price";

}


if($pro_label == ""){


}
else{

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";

}


echo "

<div class='col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals'>
        <div class='product__item'>
        <a href='$pro_url' > 
        <div class='product__item__pic set-bg img-responsive' data-setbg='admin_area/product_images/$pro_img1'>
        </div>
            <div class='product__item__text'>
                <h5>$pro_title</h5>
                <h5>$product_price.00</h5>
            </div>
            </a>
        </div>
    </div>

";


}


?>

<?php }else{ ?>

<?php } ?>        


                            


                            
                                
                                
                

            </div> 
        </div>
    </section>
    <!-- Related Section End -->

   <!-- Footer Section Begin -->
   <?php

        include("includes/footer.php");

    ?>
    <!-- Footer Section End -->

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


<script src="js/jquery.min.js"> </script>

<script src="js/js/bootstrap.min.js"></script>

</body>
</html>

<?php } ?>