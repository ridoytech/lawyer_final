<?php

include('db.php');

 // User login logic


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

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">

</head>

<body data-theme="light" class="font-nunito">
	<!-- WRAPPER -->
	<div id="wrapper" class="theme-cyan">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                       
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">WELCOME TO TeamCipher</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="logics.php" method="post">
                                <div class="form-group">
                                    <input  class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                             
                                <button name="login_customer" type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <a href="../index.php"><h5 style="margin-top: 10px;"><strong>Back</strong></h5></a>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <br>
	<!-- END WRAPPER -->
</body>

<!-- Mirrored from wrraptheme.com/templates/iconic/dist/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Oct 2024 12:12:03 GMT -->
</html>
