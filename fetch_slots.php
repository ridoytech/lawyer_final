<?php
include 'app/db.php';

if (isset($_POST['date'])) {
    $date = $_POST['date'];
    
    // লয়ারের কাজের দিন ও সময় সংজ্ঞায়িত করা
    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    $time_slots = [
        ["09:00", "10:00"], ["10:00", "12:00"], ["12:00", "14:00"],
        ["14:00", "16:00"], ["16:00", "18:00"], ["18:00", "20:00"]
    ];

    // বুক করা স্লট বের করা
    $query = "SELECT * FROM bookings WHERE date = '$date'";
    $result = mysqli_query($mysqli, $query);
    $booked_slots = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $booked_slots[] = $row['time'];
    }

    // উপলব্ধ স্লট দেখানো
    foreach ($time_slots as $slot) {
        $slot_time = "{$slot[0]} - {$slot[1]}";
        $disabled = in_array($slot_time, $booked_slots) ? 'disabled style="color:red"' : '';
        echo "<option value='$slot_time' $disabled>$slot_time</option>";
    }
}
?>
