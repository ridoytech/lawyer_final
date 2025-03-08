<!-- লয়ার কতখন কাজ করে , এবং কখন শুরু এবং কখন শেষ তা করেছি , এবং কি কি বারে লয়ার এভেইলেবল, তাও বলে দিয়েছে, এখন তুমি আমাকে ajax দিয়ে, live পরিবর্তন যেনো হয় এমন করে দাও, 
সেটা হলো, 
এই ধরো, লয়ার কাজ করে সকাল ৯ টা রাত ৮ টা পর্যন্ত,
কেউ কোনো লয়ার কে বুকিং করলে্‌  ১০ টা থেকে ২ টা পর্যন্ত, তখন আর কেউ চাইলে ও বুকিং করতে পারবে না, আবার ৯ টা থেকে ১০ টা পর্যন্ত এবং ২ টা থেকে ৮ টা পর্যন্ত দেখাবে,আর বুকিং টাইম টা রেড আকারে দেখাবে, আর এডমিন প্যানেল থেকে যেনো , এটা কন্ট্রোল করতে পারে এডমিন, বুকিং টাইম শেষ হয়ে গেলে, এটা যেনো আবার দেখা যায়, বা এডমিন চাইল, যেকোনো সময় বুকিং করা টাইম চেঞ্জ করতে পারে, এখন তুমি সুন্দর এবং প্রফেশনাল ভাবে এটা করে দাও -->
<?php include 'app/db.php'; 
if (isset($_GET['lawyer_id'])) {
    $lawyer_id = $_GET['lawyer_id'];
    $lawyer_result = $mysqli->query("SELECT * FROM lawyer_crud WHERE id='$lawyer_id' ");
    if (!empty($lawyer_result)) {
        $row = $lawyer_result->fetch_array();

        $lawyer_name = $row['lawyer_name'];
        $lawyer_type = $row['lawyer_type'];
        $lawyer_biography = $row['lawyer_biography'];
        $lawyer_research = $row['lawyer_research'];
        $lawyer_address = $row['lawyer_address'];
        $day_1 = $row['day_1'];
        $start_time_1 = $row['start_time_1'];
        $end_time_1 = $row['end_time_1'];
        $day_2 = $row['day_2'];
        $start_time_2 = $row['start_time_2'];
        $end_time_2 = $row['end_time_2'];
        $day_3 = $row['day_3'];
        $start_time_3 = $row['start_time_3'];
        $end_time_3 = $row['end_time_3'];
        $day_4 = $row['day_4'];
        $start_time_4 = $row['start_time_4'];
        $end_time_4 = $row['end_time_4'];
        $day_5 = $row['day_5'];
        $start_time_5 = $row['start_time_5'];
        $end_time_5 = $row['end_time_5'];
        $day_6 = $row['day_6'];
        $start_time_6 = $row['start_time_6'];
        $end_time_6 = $row['end_time_6'];
        $education_qualification = $row['education_qualification'];
        $lawyer_picture = $row['lawyer_picture'];
      
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Appointment</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="contact-form">
        <form id="bookingForm">
            <h2>Get Appointment</h2>
            
            <input type="text" name="name" class="form-control" id="name" required placeholder="Your Name">
            <input type="email" name="email" class="form-control" id="email" required placeholder="Email Address">
            <input type="text" name="phone" class="form-control" id="phone" required placeholder="Your Phone">
            
            <label>Select Date:</label>
            <input type="date" id="date" name="date" class="form-control" required>

            <label>Select Time Slot:</label>
            <select id="time" name="time" class="form-control" required>
                <option value="">Select a date first</option>
            </select>

            <button type="submit">Book Now</button>
            <div id="msgSubmit"></div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            // তারিখ পরিবর্তন হলে টাইম স্লট লোড করবে
            $("#date").on("change", function () {
                let selectedDate = $(this).val();

                $.ajax({
                    url: "fetch_slots.php",
                    type: "POST",
                    data: { date: selectedDate },
                    success: function (response) {
                        $("#time").html(response);
                    }
                });
            });

            // বুকিং সাবমিট হলে AJAX এ সাবমিট করবে
            $("#bookingForm").submit(function (event) {
                event.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "book_slot.php",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        $("#msgSubmit").html(response);
                        $("#date").trigger("change"); // টাইম স্লট রিফ্রেশ করবে
                    }
                });
            });
        });
    </script>

</body>
</html>
