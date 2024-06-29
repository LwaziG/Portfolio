<?php

session_start();

include("functions/functions.php");
include("includes/header.php");

?>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="img/hero/Picture3.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                
                                <a href="./shop.php" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


    <!--Welcome Description-->
    <section>
    <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                        <br>
                        <h6>Welcome To</h6>
                                <h2>African Threads</h2>
                            <p>African Threads is a South African retailer that is known for showcasing different African 
                                    cultures and traditions through our range of products that have been created and 
                                    soured from a pool of talented individuals.</p>
                        </div>
                    </div>
                </div>
                </section>
    <!--Welcome Description-->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br><ul class="filter__controls">
                        <li class="active" data-filter="*">Featured Collection</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
            <?php

                getPro();

            ?>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="product__details__cart__option">
                <center><a href="./shop.php" class="primary-btn">Shop Now</a></center>
            </div>
        </div>
        
    </section>
    <!-- Product Section End -->

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
</body>

</html>