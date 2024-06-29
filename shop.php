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
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <form id="filterForm" method="GET" action="shop.php">
            <div class="shop__product__option">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__product__option__left">
                            <p>Categories:</p>
                            <select id="categoryFilter" name="category" onchange="document.getElementById('filterForm').submit();">
                                <option value="">All</option>
                                <option value="Clothing" <?php if (isset($_GET['category']) && $_GET['category'] == 'Clothing') echo 'selected'; ?>>Clothing</option>
                                <option value="Shoes" <?php if (isset($_GET['category']) && $_GET['category'] == 'Shoes') echo 'selected'; ?>>Shoes</option>
                                <option value="Accessories" <?php if (isset($_GET['category']) && $_GET['category'] == 'Accessories') echo 'selected'; ?>>Accessories</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__product__option__right">
                            <p>Sort by:</p>
                            <select id="sortFilter" name="sort" onchange="document.getElementById('filterForm').submit();">
                                <option value="">Default</option>
                                <option value="price_asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') echo 'selected'; ?>>Price, Low To High</option>
                                <option value="price_desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') echo 'selected'; ?>>Price, High to Low</option>
                                <option value="alpha_asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'alpha_asc') echo 'selected'; ?>>Alphabetically, A-Z</option>
                                <option value="alpha_desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'alpha_desc') echo 'selected'; ?>>Alphabetically, Z-A</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row" id="productList">
            <?php getProducts(); ?>
        </div>
    </div>
</section>
<!-- Shop Section End -->


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