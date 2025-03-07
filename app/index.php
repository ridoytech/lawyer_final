<?php include('db.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}


$session_email = $_SESSION['email'];


if (isset($_SESSION['user_type'])) {

    $user_type = $_SESSION['user_type'];
}

if (isset($_SESSION['email'])) {
    $session_email = $_SESSION['email'];
    $job_result = $mysqli->query("SELECT * FROM users WHERE email='$session_email'");
    if (!empty($job_result)) {
        $row = $job_result->fetch_array();
        $name = $row['name'];
        $email = $row['email'];
    }
    
}
?>
<!doctype html>
<html lang="en">


<head>
<title>Lawyer || Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="assets/vendor/charts-c3/plugin.css" />

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="doctor.css">

</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">

        <!-- Page Loader -->
        <!-- <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="assets/images/logo-icon.svg" width="48" height="48" alt="Iconic"></div>
                <p>Please wait...</p>
            </div>
        </div> -->

        <!-- Top navbar div start -->
        <nav class="navbar navbar-fixed-top">
            <?php include('navbar.php') ?>
        </nav>

        <!-- main left menu -->
        <?php include('sidebar.php'); ?>

        <!-- rightbar icon div -->


        <!-- mani page content body part -->
        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">


                    </div>
                </div>
                <?php

                $user_type = $_SESSION['user_type'] ?? null;
                if (isset($_SESSION['user_type'])) {
                    $user_type = $_SESSION['user_type'];
                }
                ?>
                <!-- admin start -->
                <?php
                if (isset($user_type) && $user_type == 'admin') { ?>
                    <div class="row clearfix row-deck">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="header" style="display: flex; justify-content: space-between; align-items: center;">
                                    <h2>Welcome to the Dashboard</h2>
                                </div>
                                <div class="body">
                                    <!-- Date and Time Display -->
                                    <?php
                                    date_default_timezone_set('Asia/Dhaka'); // আপনার সময় অঞ্চলের জন্য সেট করুন
                                    $current_hour = date('H'); // ২৪ ঘণ্টার ফরম্যাটে সময় বের করুন

                                    if ($current_hour >= 5 && $current_hour < 12) {
                                        $greeting = "Good Morning";
                                    } elseif ($current_hour >= 12 && $current_hour < 17) {
                                        $greeting = "Good Afternoon";
                                    } elseif ($current_hour >= 17 && $current_hour < 21) {
                                        $greeting = "Good Evening";
                                    } else {
                                        $greeting = "Good Night";
                                    }
                                    ?>


                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h4><?php echo $greeting; ?>, Mr./Ms. <span class="text-primary"><?php echo $name; ?></span></h4>
                                            <p>Today's Date: <strong><?php echo date('l, F j, Y'); ?></strong></p>
                                        </div>
                                        <div class="p-4 bg-white rounded-lg shadow-lg flex items-center justify-between">
                                            <div>
                                                <h4 class="text-lg font-semibold text-gray-700">Current Time:</h4>
                                                <p class="text-2xl font-bold text-blue-500">
                                                    <span id="current-time"><?php echo date('h:i:s A'); ?></span>
                                                </p>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-clock text-3xl text-gray-400"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Professional Message -->
                                    <div class="alert alert-info">
                                        <strong>Welcome, Mr./Ms. <?php echo $name; ?>!</strong> We hope you have a productive day ahead.
                                        <!-- <br> Let's keep the patient care at its best and ensure every appointment is handled with great care. -->
                                    </div>


                                </div>
                            </div>
                        </div>
                       

                    </div>


                   

                <?php
                }
                ?>
                

            </div>
        </div>

    </div>
    <!-- Javascript -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script>

    <!-- page vendor js file -->
    <script src="assets/vendor/toastr/toastr.js"></script>
    <script src="assets/bundles/c3.bundle.js"></script>

    <!-- page js file -->
    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <script src="js/index.js"></script>

    <!-- time er start -->

    <script>
        function updateTime() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var ampm = hours >= 12 ? 'PM' : 'AM';
            var formattedTime = hours % 12 + ':' + minutes + ':' + seconds + ' ' + ampm;
            document.getElementById('current-time').textContent = formattedTime;
        }

        setInterval(updateTime, 1000); // Update time every second
    </script>
    <!-- time er end -->
</body>


</html>