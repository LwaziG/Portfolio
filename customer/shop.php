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
        <div class="shop__product__option">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__product__option__left">
                        <p>Categories:</p>
                        <select id="categoryFilter" name="category">
                            <option value="">All</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Shoes">Shoes</option>
                            <option value="Accessories">Accessories</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__product__option__right">
                        <p>Sort by:</p>
                        <select id="sortFilter" name="sort">
                            <option value="">Default</option>
                            <option value="price_asc">Price, Low To High</option>
                            <option value="price_desc">Price, High to Low</option>
                            <option value="alpha_asc">Alphabetically, A-Z</option>
                            <option value="alpha_desc">Alphabetically, Z-A</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="productList">
            <?php getProducts(); ?>
        </div>
    </div>
</section>
    <!-- Shop Section End -->

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryFilter = document.getElementById('categoryFilter');
        const sortFilter = document.getElementById('sortFilter');
        
        categoryFilter.addEventListener('change', applyFilters);
        sortFilter.addEventListener('change', applyFilters);

        function applyFilters() {
            const category = categoryFilter.value;
            const sort = sortFilter.value;

            // Create a new URL with the filter parameters
            const url = new URL(window.location.href);
            url.searchParams.set('category', category);
            url.searchParams.set('sort', sort);

            // Reload the page with the new parameters
            window.location.href = url.toString();
        }
    });
</script>

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