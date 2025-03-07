<?php

include('db.php');

//  $session_email = $_SESSION['email'];


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
    <link rel="stylesheet" href="doctor.css">

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="assets/css/main.css">
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                        </div>


                

                            <form action="logics.php" method="post" enctype="multipart/form-data" >
                               
                                <div class="tab-content">

                                    <div class="tab-pane active" id="Settings">

                                        <div class="body">
                                            <h6>Blog Photo</h6>
                                            <div class="media">
                                                <div class="media-left m-r-15">
                                                    <img src="assets/images/user.png" class="user-photo media-object" alt="User">
                                                    <input type="file" name="blog_picture">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="body">
                                            <h6><strong>Blog Information</strong></h6>
                                            <hr>
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="blog_name"   class="form-control" placeholder=" Type Blog Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="date" name="blog_publish_date"  class="form-control" placeholder="Type Date">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="blog_user_name" class="form-control" placeholder="Type User Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="blog_tag" class="form-control" placeholder="Type Blog Tag">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="blog_description" class="form-control" placeholder="Type Blog Description">
                                                    </div>
                                                </div>
                                                
                                            



                                            </div>


                                         

                                            <button type="submit" name="add_blog" class="btn btn-success">Add Blog</button>

                                        </div>
                                    </div>
                            </form>



                            <div class="tab-pane" id="preferences">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="body">
                                            <h6>Your Login Sessions</h6>
                                            <ul class="list-unstyled list-login-session">
                                                <li>
                                                    <div class="login-session">
                                                        <i class="fa fa-laptop device-icon"></i>
                                                        <div class="login-info">
                                                            <h3 class="login-title">Mac - New York, United States</h3>
                                                            <span class="login-detail">Chrome - <span class="text-success">Active Now</span></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="login-session">
                                                        <i class="fa fa-desktop device-icon"></i>
                                                        <div class="login-info">
                                                            <h3 class="login-title">Windows 10 - New York, United States</h3>
                                                            <span class="login-detail">Firefox - about an hour ago</span>
                                                        </div>
                                                        <button type="button" class="btn btn-link btn-logout" data-container="body" data-toggle="tooltip" title="Close this login session"><i class="fa fa-times-circle text-danger"></i></button>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="login-session">
                                                        <i class="fa fa-mobile fa-fw device-icon"></i>
                                                        <div class="login-info">
                                                            <h3 class="login-title">Android - New York, United States</h3>
                                                            <span class="login-detail">Android Browser - yesterday</span>
                                                        </div>
                                                        <button type="button" class="btn btn-link btn-logout" data-container="body" data-toggle="tooltip" title="Close this login session"><i class="fa fa-times-circle text-danger"></i></button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="body">
                                            <h6>Connected Social Media</h6>
                                            <ul class="list-unstyled list-connected-app">
                                                <li>
                                                    <div class="connected-app">
                                                        <i class="fa fa-facebook app-icon"></i>
                                                        <div class="connection-info">
                                                            <h3 class="app-title">FaceBook</h3>
                                                            <span class="actions"><a href="javascript:void(0);">View Permissions</a> <a href="javascript:void(0);" class="text-danger">Revoke Access</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="connected-app">
                                                        <i class="fa fa-twitter app-icon"></i>
                                                        <div class="connection-info">
                                                            <h3 class="app-title">Twitter</h3>
                                                            <span class="actions"><a href="javascript:void(0);">View Permissions</a> <a href="javascript:void(0);" class="text-danger">Revoke Access</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="connected-app">
                                                        <i class="fa fa-instagram app-icon"></i>
                                                        <div class="connection-info">
                                                            <h3 class="app-title">Instagram</h3>
                                                            <span class="actions"><a href="javascript:void(0);">View Permissions</a> <a href="javascript:void(0);" class="text-danger">Revoke Access</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="connected-app">
                                                        <i class="fa fa-linkedin app-icon"></i>
                                                        <div class="connection-info">
                                                            <h3 class="app-title">Linkedin</h3>
                                                            <span class="actions"><a href="javascript:void(0);">View Permissions</a> <a href="javascript:void(0);" class="text-danger">Revoke Access</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="connected-app">
                                                        <i class="fa fa-vimeo app-icon"></i>
                                                        <div class="connection-info">
                                                            <h3 class="app-title">Vimeo</h3>
                                                            <span class="actions"><a href="javascript:void(0);">View Permissions</a> <a href="javascript:void(0);" class="text-danger">Revoke Access</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

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