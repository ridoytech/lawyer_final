<?php

include('app/db.php');

//  $session_email = $_SESSION['email'];

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



// Fetch unavailable days
$unavailable_days = [];
if (empty($day_1)) $unavailable_days[] = 0; // Sunday
if (empty($day_2)) $unavailable_days[] = 1; // Monday
if (empty($day_3)) $unavailable_days[] = 2; // Tuesday
if (empty($day_4)) $unavailable_days[] = 3; // Wednesday
if (empty($day_5)) $unavailable_days[] = 4; // Thursday
if (empty($day_6)) $unavailable_days[] = 5; // Friday

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['date'])) {
    $date = $_POST['date'];
    $dayOfWeek = date('l', strtotime($date));

    $available_slots = [];
    $days = [$day_1, $day_2, $day_3, $day_4, $day_5, $day_6];
    $time_slots = [
        [$start_time_1, $end_time_1],
        [$start_time_2, $end_time_2],
        [$start_time_3, $end_time_3],
        [$start_time_4, $end_time_4],
        [$start_time_5, $end_time_5],
        [$start_time_6, $end_time_6]
    ];

    foreach ($time_slots as $index => $slot) {
        if (!empty($slot[0]) && !empty($slot[1]) && !empty($days[$index]) && $days[$index] == $dayOfWeek) {
            $available_slots[] = "$slot[0] - $slot[1]";
        }
    }

    $query = "SELECT * FROM bookings WHERE date = '$date'";
    $result = mysqli_query($mysqli, $query);
    $booked_slots = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $booked_slots[] = $row['time'];
    }

    foreach ($available_slots as $slot) {
        $disabled = in_array($slot, $booked_slots) ? 'disabled style="color:red"' : '';
        echo "<option value='$slot' $disabled>$slot</option>";
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['date'], $_POST['time'], $_POST['name'], $_POST['email'], $_POST['phone'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $check_query = "SELECT * FROM bookings WHERE date = '$date' AND time = '$time'";
    $check_result = mysqli_query($mysqli, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<p style='color: red;'>Slot already booked!</p>";
    } else {
        $insert_query = "INSERT INTO bookings (date, time, name, email, phone) VALUES ('$date', '$time', '$name', '$email', '$phone')";
        if (mysqli_query($mysqli, $insert_query)) {
            echo "<p style='color: green;'>Booking successful!</p>";
        } else {
            echo "<p style='color: red;'>Booking failed!</p>";
        }
    }
    exit;
}
?>



<!DOCTYPE html>
<html lang="zxx">
    

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <!-- Line Awesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
        <!-- Magnific CSS -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <!-- Owl Theme CSS -->
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="assets/css/odometer.css">
        <!-- Stylesheet CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Stylesheet Responsive CSS -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="assets/css/theme-dark.css">
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
        .unavailable-day {
            background-color: yellow !important;
            pointer-events: none;
        }
    </style>
        <!-- Title -->
        <title>Atorn - Law Firm & Attorney Website HTML Template</title>
    </head>
    <body>
        <!-- Preloder Area -->
        <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="lds-hourglass"></div>
                </div>
            </div>
        </div>
        <!-- End Preloder Area -->

        <!-- Heder Area -->
        <header class="header-area">
            <div class="top-header">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 col-sm-6">
                            <ul class="left-info">
                                <li>
                                    <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#dab2bfb6b6b59abbaeb5a8b4f4b9b5b7">
                                        <i class="las la-envelope"></i>
                                        <span class="__cf_email__" data-cfemail="8fe7eae3e3e0cfeefbe0fde1a1ece0e2">[email&#160;protected]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:+0123-456-879">
                                        <i class="las la-phone"></i>
                                        +0123 456 789
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <ul class="right-info">
                                <li>
                                    <a href="https://www.facebook.com/login/" target="_blank">
                                        <i class="lab la-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/i/flow/login" target="_blank">
                                        <i class="lab la-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="lab la-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                     <a href="https://www.google.co.uk/" target="_blank">
                                        <i class="lab la-google-plus"></i>
                                    </a>
                                </li>
                                
                                <li class="heder-btn">
                                    <a href="contact.html">Get A Schedule</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Navbar Area -->
            <div class="navbar-area">
                <div class="atorn-responsive-nav">
                    <div class="container">
                        <div class="atorn-responsive-menu">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="assets/img/logo.png" class="logo1" alt="logo">
                                    <img src="assets/img/logo-white.png" class="logo2" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="atorn-nav">
                    <div class="container">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/img/logo.png" class="logo1" alt="logo">
                                <img src="assets/img/logo-white.png" class="logo2" alt="logo">
                            </a>

                            <div class="collapse navbar-collapse mean-menu">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Home <i class="las la-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="index.html" class="nav-link">Home Demo - 1</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-2.html" class="nav-link">Home Demo - 2</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-3.html" class="nav-link">Home Demo - 3</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">
                                            About Us
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Pages <i class="las la-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="about.html" class="nav-link">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="team.html" class="nav-link">Team</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="testimonials.html" class="nav-link">Testimonials</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="gallery.html" class="nav-link">Gallery</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="faq.html" class="nav-link">FAQ</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    User <i class="las la-angle-right"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item">
                                                        <a href="sign-in.html" class="nav-link">Sign In</a>
                                                    </li>
            
                                                    <li class="nav-item">
                                                        <a href="sign-up.html" class="nav-link">Sign Up</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="nav-item">
                                                <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                            </li>
            
                                            <li class="nav-item">
                                                <a href="terms-condition.html" class="nav-link">Terms & Condition</a>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <a href="coming-soon.html" class="nav-link">Coming Soon</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="error-404.html" class="nav-link">404 Error Page</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Services <i class="las la-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="services.html" class="nav-link">Services</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="service-details.html" class="nav-link">Services Details</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Case Study  <i class="las la-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="case-study.html" class="nav-link">Case Study</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="case-study-details.html" class="nav-link">Case Study Details</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">
                                            Attorney <i class="las la-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="attorney.html" class="nav-link">Attorney</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="attorney-details.html" class="nav-link active">Attorney Details</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Blog <i class="las la-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="blog.html" class="nav-link">Blog</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="blog-details.html" class="nav-link">Blog Details</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="contact.html" class="nav-link">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" class="nav-link search-box">
                                            <i class="las la-search"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Navbar Area -->
        </header>
        <!-- End Heder Area -->

        <!-- Search Overlay -->
        <div class="search-overlay">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="search-overlay-layer"></div>
                    <div class="search-overlay-layer"></div>
                    <div class="search-overlay-layer"></div>
                    
                    <div class="search-overlay-close">
                        <span class="search-overlay-close-line"></span>
                        <span class="search-overlay-close-line"></span>
                    </div>

                    <div class="search-overlay-form">
                        <form>
                            <input type="text" class="input-search" placeholder="Search here...">
                            <button type="submit"><i class='las la-search'></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Overlay -->

        <!-- Page banner Area -->
        <div class="page-banner bg-1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-content">
                            <h2>Attorney Details</h2>
                            <ul>
                                <li><a href="index.html">Home <i class="las la-angle-right"></i></a></li>
                                <li>Attorney Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page banner Area -->

        <!-- Attorney Details -->
        <div class="attorney-details pt-100 pb-70">
            <div class="container faq-area">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5">
                        <div class="attor-details-item">
                            <img src="app/lawyerPicture/<?php echo $lawyer_picture ?>" alt="Image">
                            <div class="attor-details-left">
                                <div class="attor-social">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/" target="_blank">
                                                <i class="lab la-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/" target="_blank">
                                                <i class="lab la-instagram"></i>
                                        </li>
                                        <li>
                                            <a href="https://www.twitter.com/" target="_blank">
                                                <i class="lab la-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/" target="_blank">
                                                <i class="lab la-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="attor-social-details">
                                    <h3>Contact info</h3>
                                    <ul>
                                        <li>
                                            <i class="las la-phone-volume"></i>
                                            <a href="tel:+07554332322">
                                                Call : +07 554 332 322
                                            </a>
                                        </li>
                                        <li>
                                            <i class="las la-envelope"></i>
                                            <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#3b535e5757547b5742415415585456">
                                                <span class="__cf_email__" data-cfemail="a5cdc0c9c9cae5c4d1cad7cb8bc6cac8">[email&#160;protected]</span>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="las la-map-marker"></i>
                                            4th Floor, 408 No Chamber
                                        </li>
                                    </ul>
                                </div> -->
                                <div class="attor-work">
                                    <h3>Working hours</h3>
                                    <div class="attor-work-left">
                                        <ul>
                                         

                                        <?php 
                                            $days = [$day_1, $day_2, $day_3, $day_4, $day_5, $day_6];

                                            echo "<ul>"; // তালিকা শুরু
                                            foreach ($days as $day) {
                                                if ($day) {
                                                    echo "<li>$day</li>";
                                                }
                                            }
                                            echo "</ul>"; // তালিকা শেষ
                                            ?>

                                      
                                           
                                        </ul>
                                    </div>
                                    <div class="attor-work-right">
                                        <ul>
                                       

                                        <?php 
                                            $time_slots = [
                                                [$start_time_1, $end_time_1],
                                                [$start_time_2, $end_time_2],
                                                [$start_time_3, $end_time_3],
                                                [$start_time_4, $end_time_4],
                                                [$start_time_5, $end_time_5],
                                                [$start_time_6, $end_time_6]
                                            ];

                                            echo "<ul>"; // তালিকা শুরু
                                            foreach ($time_slots as $slot) {
                                                if (!empty($slot[0]) && !empty($slot[1])) { // Start & End time দুটোই চেক করবে
                                                    echo "<li>{$slot[0]} - {$slot[1]}</li>";
                                                }
                                            }
                                            echo "</ul>"; // তালিকা শেষ
                                            ?>

                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="attor-prev">
                                <ul>
                                    <li>
                                        <a href="#">Previous</a>
                                    </li>
                                    <li>
                                        <a href="#">Next</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="attor-details-item">
                            <div class="attor-details-right">
                                <div class="attor-details-name">
                                    <h2><?php echo $lawyer_name ?></h2>
                                    <span><?php echo $lawyer_type ?></span>
                                    <!-- <p>Bachelor of Laws in LL.B. (Hons) in the United Kingdom</p> -->
                                </div>
                                <div class="attor-details-things">
                                    <h3>Biography</h3>
                                    <p><?php echo $lawyer_biography ?></p>
                                </div>
                                <div class="attor-details-things">
                                    <h3>Education</h3>
                                    <ul>
                                        <li><?php echo $education_qualification ?></li>
                                    </ul>
                                </div>
                                <div class="attor-details-things">
                                    <h3>Research</h3>
                                    <p><?php echo $lawyer_research ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <form id="bookingForm">
                        <div class="section-title">
                            <h2>Get Appointment</h2>  
                        </div> 
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" required placeholder="Your Name">
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-user"></i>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" required placeholder="Email Address">
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-envelope"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" id="phone" required placeholder="Your Phone">
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-phone"></i>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" id="subject" required placeholder="Your Subject">
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-id-card"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Select Date:</label>
                                    <input type="date" id="date" name="date" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time">Select Time Slot:</label>
                                    <select id="time" name="time" class="form-control" required>
                                        <!-- Available time slots will be loaded dynamically -->
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="6" required placeholder="Write your message..."></textarea>
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-sms"></i>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn-one">Get An Appointment</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Attorney Details -->

        <!-- Footer Area-->
        <footer class="footer-area pt-100 pb-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-sm-6">
                        <div class="footer-widget">
                            <div class="logo">
                                <img src="assets/img/logo-white.png" alt="logo">
                            </div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum.</p>

                            <ul class="footer-socials">
                                <li>
                                    <a href="https://www.facebook.com/login/" target="_blank">
                                        <i class="lab la-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/i/flow/login" target="_blank">
                                        <i class="lab la-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="lab la-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                     <a href="https://www.google.co.uk/" target="_blank">
                                        <i class="lab la-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <div class="footer-widget">
                            <h3>Quick Links</h3>
                    
                            <ul class="footer-text">
                                <li>
                                    <a href="index.html">
                                        <i class="las la-star"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="about.html">
                                        <i class="las la-star"></i>
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="services.html">
                                        <i class="las la-star"></i>
                                        Our Services
                                    </a>
                                </li>
                                <li>
                                    <a href="case-study.html">
                                        <i class="las la-star"></i>
                                        Case Study
                                    </a>
                                </li>
                                <li>
                                    <a href="blog.html">
                                        <i class="las la-star"></i>
                                        Our Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="testimonials.html">
                                        <i class="las la-star"></i>
                                        Clients Review
                                    </a>
                                </li>
                                <li>
                                    <a href="attorney.html">
                                        <i class="las la-star"></i>
                                        Our Attorneys
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-sm-6">
                        <div class="footer-widget pl-50">
                            <h3>Services</h3>

                            <ul class="footer-text">
                                <li>
                                    <a href="service-details.html">
                                        <i class="las la-star"></i>
                                        Civil Law
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        <i class="las la-star"></i>
                                        Family Law
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        <i class="las la-star"></i>
                                        Cyber Law
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        <i class="las la-star"></i>
                                        Education Law
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        <i class="las la-star"></i>
                                        Business Law
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        <i class="las la-star"></i>
                                        Investment Law
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        <i class="las la-star"></i>
                                        Criminal Law
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <h3>Contact Info</h3>

                            <ul class="info-list">
                                <li>
                                    <i class="las la-phone"></i>
                                    <a href="tel:+0123456987">+0123 456 987</a>
                                </li>
                                <li>
                                    <i class="las la-envelope"></i>
                                    <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#5e3f2a312c301e37303831703d3133"><span class="__cf_email__" data-cfemail="a0c1d4cfd2cee0c9cec6cf8ec3cfcd">[email&#160;protected]</span></a>
                                </li>
                                <li>
                                    <i class="las la-map-marker-alt"></i>
                                    Silven House, 4 Lower Gilmor Bank Edinburgh EH3 9QP, UK
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->

        <!-- Footer bottom Area -->
        <div class="footer-bottom">
            <div class="container">
                <p>© Atorn is Proudly Owned by <a href="https://hibootstrap.com/" target="_blank">HiBootstrp</a></p>
            </div>
        </div>
        <!-- End Footer bottom Area -->

        <!-- Go Top -->
        <div class="go-top">
            <i class="las la-hand-point-up"></i>
        </div>
        <!-- End Go Top -->

        <!-- jQuery first, then Bootstrap JS -->
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- Meanmenu JS -->
        <script src="assets/js/meanmenu.min.js"></script>
        <!-- Magnific JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Owl Carousel JS -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Odometer JS -->
        <script src="assets/js/odometer.min.js"></script>
        <!-- Appear JS -->
        <script src="assets/js/jquery.appear.js"></script>
        <!-- Form Validator JS -->
		<script src="assets/js/form-validator.min.js"></script>
		<!-- Contact JS -->
		<script src="assets/js/contact-form-script.js"></script>
		<!-- Ajaxchimp JS -->
		<script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <!-- Custom JS -->
        <script src="assets/js/custom.js"></script>

 
       <script>
        $(document).ready(function () {
            let unavailableDays = <?php echo json_encode($unavailable_days); ?>;
            
            $("#date").on("change", function () {
                let selectedDate = $(this).val();
                let selectedDay = new Date(selectedDate).getDay();
                
                console.log("Selected Day:", selectedDay); // Debugging log
                
                if (unavailableDays.includes(selectedDay)) {
                    $(this).addClass("unavailable-day");
                    alert("This day is not available for booking.");
                    $(this).val("");
                } else {
                    $(this).removeClass("unavailable-day");
                    $.post("", { date: selectedDate }, function (response) {
                        $("#time").html(response);
                    });
                }
            });

            $("#bookingForm").submit(function (event) {
                event.preventDefault();
                let formData = $(this).serialize();

                $.post("", formData, function (response) {
                    $("#msgSubmit").html(response);
                    $("#date").trigger("change");
                });
            });
        });
    </script>


    </body>


</html>