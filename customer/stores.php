<?php

session_start();

include("functions/functions.php");
include("includes/header.php");

?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Stores</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Stores</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->



    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Official Stockists</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/store_images/durban.jpg"></div>
                        <div class="blog__item__text">
                            <span>Durban Store</span>
                            <h5>Victoria Street Market</h5>
                            <a href="https://www.victoriastreetmarket.co.za/" target="_blank">View Map</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/store_images/cpt.jpeg"></div>
                        <div class="blog__item__text">
                            <span>Cape Town Store</span>
                            <h5>Neighbourgoods Market</h5>
                            <a href="https://theoldbiscuitmill.co.za/neighbourgoods-market/" target="_blank">View Map</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/store_images/jhb.jpg"></div>
                        <div class="blog__item__text">
                            <span>Johannesburg Store</span>
                            <h5>Rosebank Sunday Market</h5>
                            <a href="https://www.rosebanksundaymarket.co.za/the-market/" target="_blank">View Map</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->


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