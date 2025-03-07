<?php

include('db.php');

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

?>

<!doctype html>
<html lang="en">




<head>
    <title>Update Lawyer || Admin Panel</title>
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
    <!-- <link rel="stylesheet" href="assets/vendor/summernote/dist/summernote.css" /> -->
 
  

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- <link rel="stylesheet" href="assets/dist/summernote.css" /> -->
    <link rel="stylesheet" href="assets/dist/summernote.css" />
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
                                                    <img style="width: 200px;" src="lawyerPicture/<?php echo $lawyer_picture ?>" class="user-photo media-object" alt="User">
                                                    <input type="file" name="lawyer_picture">
                                                    <input type="hidden" name="old_image" value="<?php echo $lawyer_picture ?>">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="body">
                                            <h6><strong>Lawyer Personal Information</strong></h6>
                                            <hr>
                                            
                                            <div class="row clearfix">
                                           
                                                <div class="col-lg-4 col-md-12">
                                                <label for="">Name</label>
                                                    <div class="form-group">
                                                        <input type="text" name="lawyer_name" value="<?php echo $lawyer_name ?>"   class="form-control" placeholder=" Type Lawyer Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                <label for="">Type</label>
                                                    <div class="form-group">
                                                        <?php 

                                                        $lawyerType = $mysqli->query("SELECT * FROM lawyer_list_type");      

                                                        // Fetch and display the titles
                                                        ?>
                                                           
                                                           <select name="lawyer_type" class="form-control" id="doctor_department">
                                                               <option value="">Select Type</option>
                                                               <?php while ($row = $lawyerType->fetch_assoc()): ?>
                                                                   <option value="<?php echo $row['lawyer_type']; ?>">
                                                                       <?php echo $row['lawyer_type']; ?>
                                                                   </option>
                                                               <?php endwhile; ?>
                                                           </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                <label for="">Address</label>
                                                    <div class="form-group">
                                                        <input type="text" name="lawyer_address"  value="<?php echo $lawyer_address ?>" class="form-control " placeholder="Type Lawyer Address ">
                                                    </div>
                                                </div>

                                                <!-- <div class="col-lg-3 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="project_description" class="form-control" placeholder="Type Project Description">
                                                    </div>
                                                </div> -->
                                                
                                            



                                            </div>

 
                                               

                                            <h6 style="margin-top:20px"><strong>Lawyer Available Day And Time</strong></h6>
                                            <hr>
                                            <!-- first -->
                                            
                                            <div class="row clearfix">
                                           
                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Day 1</label>
                                                    <div class="form-group">
                                                        <input type="text" name="day_1"  value="<?php echo $day_1 ?>"  class="form-control" placeholder="Type  Sunday  like (Sunday)">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Start Time 1</label>
                                                    <div class="form-group">
                                                        <input type="time" name="start_time_1"  value="<?php echo $start_time_1 ?>"  class="form-control" placeholder=" Type Lawyer Name">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">End Time 1</label>
                                                    <div class="form-group">
                                                        <input type="time" name="end_time_1"  value="<?php echo $end_time_1 ?>"  class="form-control" placeholder=" Type Lawyer Name">
                                                    </div>
                                                </div>
                   
                                            </div>

                                            <!-- second -->

                                            <div class="row clearfix">
                                           
                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Day 2</label>
                                                    <div class="form-group">
                                                        <input type="text" name="day_2"  value="<?php echo $day_2 ?>"  class="form-control" placeholder="Type  Monday  like (Monday)">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Start Time 2</label>
                                                    <div class="form-group">
                                                        <input type="time" name="start_time_2"  value="<?php echo $start_time_2 ?>"  class="form-control" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">End Time 2</label>
                                                    <div class="form-group">
                                                        <input type="time" name="end_time_2"  value="<?php echo $end_time_2 ?>"  class="form-control" >
                                                    </div>
                                                </div>
                    
                                            </div>

                                             <!-- third -->

                                             <div class="row clearfix">
                                           
                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Day 3</label>
                                                    <div class="form-group">
                                                        <input type="text" name="day_3" value="<?php echo $day_3 ?>"   class="form-control" placeholder="Type  Tuesday  like (Tuesday)">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Start Time 3</label>
                                                    <div class="form-group">
                                                        <input type="time" name="start_time_3"  value="<?php echo $start_time_3 ?>"  class="form-control" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">End Time 3</label>
                                                    <div class="form-group">
                                                        <input type="time" name="end_time_3"  value="<?php echo $end_time_3 ?>"  class="form-control" >
                                                    </div>
                                                </div>
                    
                                            </div>
                                             <!-- fourt -->

                                             <div class="row clearfix">
                                           
                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Day 4</label>
                                                    <div class="form-group">
                                                        <input type="text" name="day_4"  value="<?php echo $day_4 ?>"  class="form-control" placeholder="Type  Wednesday  like (Wednesday)">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Start Time 4</label>
                                                    <div class="form-group">
                                                        <input type="time" name="start_time_4"  value="<?php echo $start_time_4 ?>"  class="form-control" placeholder=" Type Lawyer Name">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">End Time 4</label>
                                                    <div class="form-group">
                                                        <input type="time" name="end_time_4"  value="<?php echo $end_time_4 ?>"  class="form-control" placeholder=" Type Lawyer Name">
                                                    </div>
                                                </div>
                    
                                            </div>
                                             <!-- fifth -->

                                             <div class="row clearfix">
                                           
                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Day 5</label>
                                                    <div class="form-group">
                                                        <input type="text" name="day_5"  value="<?php echo $day_5 ?>"  class="form-control" placeholder="Type  Thurday  like (Thurday)">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Start Time 5</label>
                                                    <div class="form-group">
                                                        <input type="time" name="start_time_5" value="<?php echo $start_time_5 ?>"   class="form-control" placeholder=" Type Lawyer Name">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">End Time 5</label>
                                                    <div class="form-group">
                                                        <input type="time" name="end_time_5"   value="<?php echo $end_time_5 ?>" class="form-control" placeholder=" Type Lawyer Name">
                                                    </div>
                                                </div>
                    
                                            </div>
                                             <!-- six -->

                                             <div class="row clearfix">
                                           
                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Day 6</label>
                                                    <div class="form-group">
                                                        <input type="text" name="day_6"  value="<?php echo $day_6 ?>"  class="form-control" placeholder="Type  Friday  like (Friday)">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Start Time 6</label>
                                                    <div class="form-group">
                                                        <input type="time" name="start_time_6"   value="<?php echo $start_time_6 ?>" class="form-control" placeholder=" Type Lawyer Name">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">End Time 6</label>
                                                    <div class="form-group">
                                                        <input type="time" name="end_time_6"  value="<?php echo $end_time_6 ?>"  class="form-control" placeholder=" Type Lawyer Name">
                                                    </div>
                                                </div>
                    
                                            </div>



                                            <h6 style="margin-top:20px"><strong>Lawyer Education, Biography and Research Information</strong></h6>
                                            <hr>
                                            
                                            <div class="row clearfix">

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Lawyer Education Qualification</label>
                                                    <div class="form-group">
                                                    <textarea class="summernote" placeholder="Type Education Qualification " name="education_qualification" id=""><?php echo $education_qualification ?></textarea>
                                               
                                                      
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <label for="">Lawyer Biography </label>
                                                    <div class="form-group">
                                                        <textarea class="summernote" name="lawyer_biography" id=""><?php echo $lawyer_biography ?></textarea>
                                               
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                   

                                                    <label for="">Lawyer Research </label>
                                                    <div class="form-group">
                                                    <textarea class="summernote" name="lawyer_research" id=""><?php echo $lawyer_research ?></textarea>
                                                      
                                                    </div>
                                                </div>

                                           
     

                                            </div>



                                         

                                            <button type="submit" name="update_lawyer" class="btn btn-success">Update Lawyer</button>

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
    <!-- <script src="assets/dist/summernote.js"></script> -->
    <script src="assets/dist/summernote.js"></script>

    <!-- page js file -->
    <script src="assets/bundles/mainscripts.bundle.js"></script>
   
    <script src="js/index.js"></script>
    <!-- <script src="assets/vendor/summernote/dist/summernote.js"></script> -->

</body>


</html>