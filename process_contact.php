<?php
session_start();

include("includes/db.php");
include("functions/functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $contact_email = mysqli_real_escape_string($con, $_POST['contact_email']);
    $contact_heading = mysqli_real_escape_string($con, $_POST['contact_heading']);
    $contact_desc = mysqli_real_escape_string($con, $_POST['contact_desc']);

    // Validate input
    if (!empty($contact_email) && !empty($contact_heading) && !empty($contact_desc)) {

        $query = "INSERT INTO contact_us (contact_email, contact_heading, contact_desc) VALUES ('$contact_email', '$contact_heading', '$contact_desc')";

        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            echo "<script>alert('Thank you for contacting us. We will get back to you soon.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('There was an error submitting your message. Please try again.')</script>";
            echo "<script>window.open('contact.php','_self')</script>";
        }

    } else {
        echo "<script>alert('All fields are required.')</script>";
        echo "<script>window.open('contact.php','_self')</script>";
    }

}
?>