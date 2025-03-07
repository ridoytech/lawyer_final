<?php

include('db.php');

if (isset($_GET['project_update_id'])) {
    $project_update_id = $_GET['project_update_id'];
    $project_update_id_result = $mysqli->query("SELECT * FROM blog WHERE id='$project_update_id' ");
    if (!empty($project_update_id_result)) {
        $row = $project_update_id_result->fetch_array();

        $blog_name = $row['blog_name'];
        $blog_publish_date = $row['blog_publish_date'];
        $blog_user_name = $row['blog_user_name'];
        $blog_tag = $row['blog_tag'];
        $blog_description = $row['blog_description'];
        $blog_picture = $row['blog_picture'];
      
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                        </div>


                

                            <form action="logics.php" method="post" enctype="multipart/form-data" >
                                <input type="hidden" name="ID" value="<?php echo $project_update_id ?>"  >
                                <div class="tab-content">

                                    <div class="tab-pane active" id="Settings">

                                        <div class="body">
                                            <h6>Blog Photo</h6>
                                            <div class="media">
                                                <div class="media-left m-r-15">
                                                    <img style="width: 100px;" src="blogImage/<?php echo $blog_picture ?>" class="user-photo media-object" alt="User">
                                                    <input type="file" name="blog_picture">
                                                    <input type="hidden" name="old_image" value="<?php echo $blog_picture ?>">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="body">
                                            <h6><strong>Blog Information</strong></h6>
                                            <hr>
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="blog_name" value="<?php echo $blog_name ?>"  class="form-control" placeholder=" Type Project Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="blog_publish_date" value="<?php echo $blog_publish_date ?>"  class="form-control" placeholder="Here Proejct Link">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="blog_user_name" value="<?php echo $blog_user_name ?>" class="form-control" placeholder="Type Project Description">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="blog_description" value="<?php echo $blog_description ?>" class="form-control" placeholder="Type Project Description">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="blog_tag" value="<?php echo $blog_tag ?>" class="form-control" placeholder="Type Project Description">
                                                    </div>
                                                </div>
                                        
                                            </div>


                                            <button type="submit" name="update_blog" class="btn btn-success">Update Project</button>

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