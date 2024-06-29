<!DOCTYPE html>
<html>

<?php

session_start();

include("includes/header.php");


?>

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Why Us</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Why Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    
  <!-- why us section -->

  <section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/w1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Fast Delivery
              </h5>
              <p>
              We understand that when you order something online, you want it as soon as possible. 
              That's why we're committed to providing fast and efficient delivery to all our customers. 
              With our expedited shipping options, you can expect your order to arrive at your doorstep in no time. 
              Whether you need a last-minute outfit for a special occasion or just can't wait to try out your new fashion finds, 
              you can rely on us to get your order to you quickly and hassle-free.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/w2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Free Shiping
              </h5>
              <p>
              We believe that shopping for fashion online should be convenient and affordable. 
              That's why we offer free shipping on all orders, no matter how big or small. 
              With our free shipping option, you can shop to your heart's content without worrying about extra costs at checkout. 
              It's just one more way we're making it easier for you to get the fashion you love, delivered right to your door.
            </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/w3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Best Quality
              </h5>
              <p>
              At African Threads, we're passionate about fashion, and we believe that high-quality clothing is the key to looking and feeling your best. 
              That's why we go above and beyond to source the best materials and craftsmanship for all our products. 
              From the finest fabrics to meticulous attention to detail, we're committed to providing you with fashion pieces that not only look great but also stand the test of time. 
              When you shop with us, you can trust that you're getting the best quality fashion that will keep you looking stylish for years to come.
            </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why us section -->

  <?php

    include("includes/footer.php")

  ?>
  
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