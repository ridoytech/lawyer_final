<?php
include('db.php');

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
    <link rel="stylesheet" href="doctor.css">

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="assets/css/main.css">
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
            <!--  -->
            <?php include('navbar.php') ?>
        </nav>

        <!-- main left menu -->
        <?php include('sidebar.php'); ?>

        <!-- rightbar icon div -->


        <!-- mani page content body part -->
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Table Section -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header" style="display: flex; justify-content: space-between; align-items: center;">
                                <h2>All Lawyers Type</h2>
                                <!-- <a href="addProject.php" type="button" class="btn btn-success">Add </a> -->
                            </div>
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
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0 c_list">
                                        <thead>
                                            <tr>
                                                <th>Lawyer Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $project = $mysqli->query("SELECT * FROM lawyer_list_type");
                                            while ($row = $project->fetch_assoc()):
                                            ?>
                                            <tr>
                                                <td><?php echo ($row['lawyer_type']) ?></td>
                                                <td>
                                                    <!-- <a href="updateProject.php?project_id=<?php echo $row['id']; ?>" type="submit" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a> -->
                                                    <a href="logics.php?lawyer_type_delete_id=<?php echo $row['id']; ?>" type="submit" data-type="confirm" class="btn btn-danger js-sweetalert" onclick="return confirm('Are You Sure?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <form action="logics.php" method="post" enctype="multipart/form-data">
                                    

                                    <h6><strong>Add Lawyer Type </strong></h6>
                                    <hr>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="lawyer_type" class="form-control" placeholder="Type Project Name">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <button type="submit" name="add_lawyer_type" class="btn btn-success">Submit Lawyer Type</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Row -->
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
</body>

<!-- Mirrored from wrraptheme.com/templates/iconic/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Oct 2024 12:12:00 GMT -->

</html>