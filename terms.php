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
                        <h4>Terms of use</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Terms of use</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
  <!-- MAIN -->
  <main>
    <!-- HERO -->
    

<div id="content"><!-- content Starts -->

<div class="container"><!-- container Starts -->


<div class="col-md-3"><!-- col-md-3 Starts -->

<div class="box"><!-- box Starts -->

<ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Starts -->

<?php

$get_terms = "select * from terms LIMIT 0,1";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_link = $row_terms['term_link'];

?>

<li class="active">

<a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>

</a>

</li>

<?php } ?>

<?php

$count_terms = "select * from terms";

$run_count = mysqli_query($con,$count_terms);

$count = mysqli_num_rows($run_count);

$get_terms = "select * from terms LIMIT 1,$count";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_link = $row_terms['term_link'];

?>

<li>

<a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>

</a>

</li>

<?php } ?>

</ul><!-- nav nav-pills nav-stacked Ends -->

</div><!-- box Ends -->

</div><!-- col-md-3 Ends -->

<div class="col-md-9"><!-- col-md-9 Starts -->

<div class="box"><!-- box Starts -->

<div class="tab-content" ><!-- tab-content Starts -->

<?php

$get_terms = "select * from terms LIMIT 0,1";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_desc = $row_terms['term_desc'];

$term_link = $row_terms['term_link'];

?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in active" ><!-- tab-pane fade in active Starts -->

<h1> <?php echo $term_title; ?>  </h1>

<p> <?php echo $term_desc; ?> </p>

</div><!-- tab-pane fade in active Ends -->

<?php } ?>


<?php

$count_terms = "select * from terms";

$run_count = mysqli_query($con,$count_terms);

$count = mysqli_num_rows($run_count);

$get_terms = "select * from terms LIMIT 1,$count";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_desc = $row_terms['term_desc'];

$term_link = $row_terms['term_link'];

?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in"><!-- tab-pane fade in Starts -->


<h1><?php echo $term_title; ?></h1>

<p><?php echo $term_desc; ?></p>


</div><!-- tab-pane fade in Ends -->

<?php } ?>

</div><!-- tab-content Ends -->

</div><!-- box Ends -->


</div><!-- col-md-9 Ends -->

</div><!-- container Ends -->

</div><!-- content Ends -->

<?php

include("includes/footer.php");

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