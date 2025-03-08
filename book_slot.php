<?php
include 'app/db.php';

if (isset($_POST['date']) && isset($_POST['time']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // চেক করবে এই স্লট বুকড কিনা
    $check_query = "SELECT * FROM bookings WHERE date = '$date' AND time = '$time'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<p style='color: red;'>Slot already booked!</p>";
    } else {
        // নতুন বুকিং সংরক্ষণ করা
        $insert_query = "INSERT INTO bookings (date, time, name, email, phone) VALUES ('$date', '$time', '$name', '$email', '$phone')";
        if (mysqli_query($conn, $insert_query)) {
            echo "<p style='color: green;'>Booking successful!</p>";
        } else {
            echo "<p style='color: red;'>Booking failed!</p>";
        }
    }
}
?>
