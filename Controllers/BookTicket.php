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
            // Insert booking details into the bookings table
            $stmt1 = $admin->Rcud("INSERT INTO `bookings` (`bk_date`,`c_id`, `t_id`, `bk_name`, `bk_phone`, `bk_email`, `bk_total_fair`,`bk_transaction_id`,`bk_payment_status`, `bk_status`) VALUES ('$bookingDate','$cid', '$tid', '$name', '$phone', '$email', '$ticketFare','$trid','Paid', 'Booked')");

            // Loop through each passenger and insert their details along with seat information
            foreach ($_POST['seatIds'] as $index => $seatId) {
                $passengerName = $_POST['passenger'][$index]['name'];
                $passengerAge = $_POST['passenger'][$index]['age'];
                $passengerGender = $_POST['passenger'][$index]['gender'];
                $ticketNumber = 'TCKT' . time() . rand(1000, 9999); // Generating a unique ticket number

                // Insert passenger data into passenger table
                $stmt = $admin->cud("INSERT INTO `passenger` (`ps_name`, `ps_age`, `ps_gender`, `bk_id`, `s_id`, `ps_ticket`, `ps_status`) VALUES ('$passengerName', '$passengerAge', '$passengerGender', '$stmt1', '$seatId', '$ticketNumber', 'confirmed')", "message");

                // Update seat status and booked gender in the seats table
                $stmt = $admin->cud("UPDATE `seats` SET `s_booked_for` = '$passengerGender', `s_status` = 'Booked' WHERE `s_id` = '$seatId'", "message");
            }
            // echo "success";
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