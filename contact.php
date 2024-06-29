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
                        <h4>Contact Us</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__text">
                    <div class="section-title">
                        <span>Information</span>
                    </div>
                    <ul>
                        <li>
                            <h4>CUSTOMER SERVICE & GENERAL ENQUIRIES</h4>
                            <p>support@africanthreads.com</p>
                        </li>
                        <br>
                        <br>
                        <li>
                            <h4>Head Office: African Threads.</h4>
                            <p>375 Albert Rd, Woodstock, Cape Town. <br />Contact Number: 072-422-8139</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <form action="process_contact.php" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="contact_name" placeholder="Name" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="contact_email" placeholder="Email" required>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="contact_heading" placeholder="Heading" required>
                                <textarea name="contact_desc" placeholder="Message" required></textarea>
                                <button type="submit" class="site-btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

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