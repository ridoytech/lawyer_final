<?php

include('db.php');



if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}
$session_email = $_SESSION['email'];


if (isset($_SESSION['email'])) {
    $session_email = $_SESSION['email'];
    $job_result = $mysqli->query("SELECT * FROM users WHERE email='$session_email'");
    if (!empty($job_result)) {
        $row = $job_result->fetch_array();
        $password = $row['password'];
        $image = $row['image'];
        $id = $row['id'];
    }
}

?>

<!doctype html>
<html lang="en">




<head>
<title>TeamCipher || Admin Panel</title>
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
    <link rel="stylesheet" href="assets/vendor/summernote/dist/summernote.css" />

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="doctor.css">
</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">



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

                </div>

                <div class="row clearfix">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="body">
                            </div>



                            <form action="logics.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id ?>">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="Settings">
                                        <div class="body">
                                            <h6 class="text-center"><strong>Profile Photo</strong></h6>
                                            <?php if (isset($_SESSION['message'])): ?>
                                                <div id="flash-message" class="alert alert-<?= $_SESSION['message_type'] ?>" style="text-align:center;">
                                                    <?php
                                                    echo $_SESSION['message'];
                                                    unset($_SESSION['message']);
                                                    ?>
                                                </div>
                                                <script>
                                                    setTimeout(function() {
                                                        var flashMessage = document.getElementById('flash-message');
                                                        if (flashMessage) {
                                                            flashMessage.style.display = 'none';
                                                        }
                                                    }, 3000);
                                                </script>
                                            <?php endif; ?>
                                            <div class="media">
                                                <div class="media-left m-r-15 mx-auto">
                                                    <img style="width: 200px;" src="adminPic/<?php echo $image ?>" class="user-photo media-object" alt="User">
                                                    <input type="file" name="image">
                                                    <input type="hidden" name="old_image" value="<?php echo $image ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="body">
                                            <h6 class="text-center"><strong>Change Password</strong> </h6>
                                          
                                            <div class="row clearfix">
                                                <div class="col-lg-8 col-md-12 mx-auto">
                                                    <div class="form-group">
                                                        <input type="text" name="password" value="<?php echo $password ?>" class="form-control" placeholder="Here Your Image Now">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Centering the button -->
                                            <div class="text-center">
                                                <button type="submit" name="editProfile" class="btn btn-success">Submit</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- table area end -->















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
    <script src="assets/vendor/summernote/dist/summernote.js"></script>
    <script src="js/index.js"></script>
</body>

<!-- Mirrored from wrraptheme.com/templates/iconic/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Oct 2024 12:12:00 GMT -->

</html>