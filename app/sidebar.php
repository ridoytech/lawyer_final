<?php
$user_type = $_SESSION['user_type'] ?? null;
if (isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];
}

if (isset($_SESSION['email'])) {
    $session_email = $_SESSION['email'];
}


if (isset($session_email)) {
    $user_result = $mysqli->query("SELECT * FROM users WHERE email='$session_email'");
    if ($user_result && $user_result->num_rows > 0) {
        $row = $user_result->fetch_array();
        $name = $row['name'];
        $email = $row['email'];
        $id = $row['id'];
        $image = $row['image'];
    } else {
        $name = null;
        $email = null;
        $id = null;
        $image = null;
    }
} else {
    $name = null;
    $email = null;
    $id = null;
    $image = null;
}

?>


<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">

        <?php
        if (isset($session_email)) {
        ?>
            <div class="user-account">
                <!-- <img src="assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture"> -->
                <img src="adminPic/<?php echo $image ?>" class="rounded-circle user-photo" alt="Picture">
                <div class="dropdown">
                    <span>Welcome,</span>
                    <p href="javascript:void(0);"><strong><?php echo $name; ?></strong></p>

                </div>
                <hr>

            </div>
        <?php
        }
        ?>

        <!-- Tab panes -->
        <div class="tab-content padding-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <?php
                        if (!isset($session_email)) {
                        ?>
                            <li class="active">
                                <a href="login.php"><i class="fa fa-dashboard"></i><span>Login</span></a>

                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        if (isset($user_type) && $user_type == 'admin' || $user_type == 'lawyer' || $user_type == 'customer') { ?>
                            <li class="">
                                <a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>

                            </li>
                        <?php } ?>
                        <?php
                        if (isset($user_type) && $user_type == 'admin') { ?>


                            <li>
                                <a href="projects.php"><i class="fa icon-plus"></i><span> Projects</span></a>
                            </li>
                            <li>
                                <a href="lawyerType.php"><i class="fa icon-plus"></i><span> Lawyer Type </span></a>
                            </li>
                            <li>
                                <a href="lawyerCategory.php"><i class="fa icon-plus"></i><span> Lawyer Category </span></a>
                            </li>
                            <li>
                                <a href="imageGallery.php"><i class="fa icon-plus"></i><span> Image Gallery </span></a>
                            </li>
                            <li>
                                <a href="videoGallery.php"><i class="fa icon-plus"></i><span> Video Gallery </span></a>
                            </li>
                            <li>
                                <a href="blog.php"><i class="fa icon-plus"></i><span>Blog</span></a>
                            </li>

                           
                           
                          

                            <li>
                                <a href="users.php"><i class="fa icon-users"></i><span> Users </span></a>
                            </li>



                        <?php } ?>





                       

                        <?php
                        if (isset($user_type) && $user_type == 'admin') { ?>


                            <li>
                                <a href="editProfile.php"><i class="fa fa-edit"></i><span>Edit My Profile </span></a>
                            </li>

                        <?php } ?>

                       

                        <li>
                            <a href="../index.php"><i class="fa fa-arrow-left"></i><span>Home</span></a>
                        </li>




                    </ul>
                </nav>
            </div>


            <div class="tab-pane" id="question">
                <form>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <ul class="list-unstyled question">
                    <li class="menu-heading">HOW-TO</li>
                    <li><a href="javascript:void(0);">How to Create Campaign</a></li>
                    <li><a href="javascript:void(0);">Boost Your Sales</a></li>
                    <li><a href="javascript:void(0);">Website Analytics</a></li>
                    <li class="menu-heading">ACCOUNT</li>
                    <li><a href="javascript:void(0);">Cearet New Account</a></li>
                    <li><a href="javascript:void(0);">Change Password?</a></li>
                    <li><a href="javascript:void(0);">Privacy &amp; Policy</a></li>
                    <li class="menu-heading">BILLING</li>
                    <li><a href="javascript:void(0);">Payment info</a></li>
                    <li><a href="javascript:void(0);">Auto-Renewal</a></li>
                    <li class="menu-button mt-3">
                        <a href="https://wrraptheme.com/templates/iconic/docs/index.html" class="btn btn-primary btn-block">Documentation</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>