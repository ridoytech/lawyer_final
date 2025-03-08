<?php

include('db.php');

if (isset($_GET['lawyer_id'])) {
    $lawyer_id = $_GET['lawyer_id'];
    $lawyer_Category_result = $mysqli->query("SELECT * FROM service_crud WHERE id='$lawyer_id' ");
    if (!empty($lawyer_Category_result)) {
        $row = $lawyer_Category_result->fetch_array();

        $service_title = $row['service_title'];
        $service_des = $row['service_des'];
        $service_image = $row['service_image'];
      
    }

}

?>

<!doctype html>
<html lang="en">




<head>
<title>Lawyer Cateory Update || Admin Panel</title>
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
                                <input type="hidden" name="id" value="<?php echo $lawyer_id ?>"  >
                                <div class="tab-content">

                                    <div class="tab-pane active" id="Settings">

                                        <div class="body">
                                            <h6>Profile Photo</h6>
                                            <div class="media">
                                                <div class="media-left m-r-15">
                                                    <img style="width: 200px;" src="lawyerCategory/<?php echo $service_image ?>" class="user-photo media-object" alt="User">
                                                    <input type="file" name="service_image">
                                                    <input type="hidden" name="old_image" value="<?php echo $service_image ?>">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="body">
                                            <h6><strong>Lawyer Category Information</strong></h6>
                                            <hr>
                                            <div class="row clearfix">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <?php 

                                                        $lawyerType = $mysqli->query("SELECT * FROM lawyer_list_type");      

                                                        // Fetch and display the titles
                                                        ?>
                                                                
                                                                <select name="service_title" class="form-control" id="doctor_department">
                                                                    <option value="">Select Category</option>
                                                                    <?php while ($row = $lawyerType->fetch_assoc()): ?>
                                                                        <option value="<?php echo $row['lawyer_type']; ?>">
                                                                            <?php echo $row['lawyer_type']; ?>
                                                                        </option>
                                                                    <?php endwhile; ?>
                                                                </select>
                                                            </div>
                                                            
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="service_des" value="<?php echo $service_des ?>"  class="form-control" placeholder="Here Proejct Link">
                                                    </div>
                                                </div>
                                                
                                              


                                            </div>


                                            <button type="submit" name="udpate_lawyer_category" class="btn btn-success">Update Lawyer Category</button>

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