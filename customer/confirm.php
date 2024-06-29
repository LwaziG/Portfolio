<?php

session_start();

if(!isset($_SESSION['customer_email'])){

echo "<script>window.open('../checkout.php','_self')</script>";


}else {

include("includes/db.php");
include("functions/functions.php");
include("includes/header.php");



if(isset($_GET['order_id'])){

$order_id = $_GET['order_id'];

}

?>



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->


<div class="col-md-3"><!-- col-md-3 Starts -->

<?php include("includes/sidebar.php"); ?>

</div><!-- col-md-3 Ends -->

<div class="col-md-9"><!-- col-md-9 Starts -->

<div class="box"><!-- box Starts -->

<h1 align="center"> Please Confirm Your Payment </h1>


<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"><!--- form Starts -->

<div class="form-group"><!-- form-group Starts -->

<label>Invoice No:</label>

<input type="text" class="form-control" name="invoice_no" required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label>Amount Sent:</label>

<input type="text" class="form-control" name="amount_sent" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label>Select Payment Mode:</label>

<select name="payment_mode" class="form-control"><!-- select Starts -->

<option>Select Payment Mode</option>
<option>Bank Code</option>
<option>UBL/Omni</option>
<option>Western Union</option>

</select><!-- select Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label>Transaction/Reference Id:</label>

<input type="text" class="form-control" name="ref_no" required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label>Omni Code:</label>

<input type="text" class="form-control" name="code" required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label>Payment Date:</label>

<input type="text" class="form-control" name="date" required>

</div><!-- form-group Ends -->

<div class="text-center"><!-- text-center Starts -->

<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">

<i class="fa fa-user-md"></i> Confirm Payment

</button>

</div><!-- text-center Ends -->

</form><!--- form Ends -->

<?php

if(isset($_POST['confirm_payment'])){

$update_id = $_GET['update_id'];

$invoice_no = $_POST['invoice_no'];

$amount = $_POST['amount_sent'];

$payment_mode = $_POST['payment_mode'];

$ref_no = $_POST['ref_no'];

$code = $_POST['code'];

$payment_date = $_POST['date'];

$complete = "Complete";

$insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

$con = mysqli_connect("localhost","id22329617_root","The@der24","id22329617_african_threads");

$run_payment = mysqli_query($con,$insert_payment);

$update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

$run_customer_order = mysqli_query($con,$update_customer_order);

$update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

$run_pending_order = mysqli_query($con,$update_pending_order);

if($run_pending_order){

echo "<script>alert('your Payment has been received,order will be completed within 24 hours')</script>";

echo "<script>window.open('my_account.php?my_orders','_self')</script>";

}



}



?>


</div><!-- box Ends -->

</div><!-- col-md-9 Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("../includes/footer.php");

?>

<script src="js1/jquery.min.js"> </script>

<script src="js1/bootstrap.min.js"></script>

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
<?php } ?>
