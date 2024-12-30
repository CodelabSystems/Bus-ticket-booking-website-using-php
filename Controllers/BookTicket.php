<?php
include '../config.php';
$admin = new Admin();

if (isset($_SESSION['c_id'])) {
    if (isset($_POST['book'])) {
        $cid = $_SESSION['c_id'];
        // Get contact details
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $trid = $_POST['trid'];

        // Get booking ID, ticket ID, and selected seats
        $tid = $_POST['tid'];
        $ticketFare = $_POST['ticketFare'];
        $bookingDate = date('Y-m-d'); // Current date for the booking

        // Validate contact details
        if (empty($name) || empty($phone) || empty($email)) {
            echo "<script>alert('All contact details must be provided!');window.history.back();</script>";
            exit;
        }

        // Ensure 'seatIds' and 'passenger' exist and are arrays
        if (!isset($_POST['seatIds']) || !is_array($_POST['seatIds'])) {
            echo "<script>alert('Invalid seat selection data!');window.history.back();</script>";
            exit;
        }

        if (!isset($_POST['passenger']) || !is_array($_POST['passenger'])) {
            echo "<script>alert('Invalid passenger data!');window.history.back();</script>";
            exit;
        }

        try {
            echo "<script>alert('Booking successful!');window.location='../myBookings.php';</script>";
        } catch (Exception $e) {
            // Rollback if anything fails
            echo "<script>alert('An error occurred while processing your booking. Please try again.');window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No booking data received.');window.history.back();</script>";
    }
} else {
    echo "<script>alert('You are not logged in to book the seat! Login and try again');window.location='../login.php';</script>";

}
?>