<?php

include('db.php');


//  login logic



if (isset($_POST['login_customer'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


  // ডাটাবেজ থেকে ইউজারের তথ্য যাচাই
  $login_query = "SELECT * FROM `users` WHERE email = '$email' ";
  $login_run = mysqli_query($mysqli, $login_query);
  $login_row = mysqli_fetch_array($login_run);

  // ডাটাবেজ থেকে পাওয়া পাসওয়ার্ড ও অন্যান্য তথ্য
  $db_pass = $login_row['password'];
  $email = $login_row['email'];
  $user_id = $login_row['id'];
  $user_type = $login_row['user_type'];


  // পাসওয়ার্ড মিলে গেলে
  if ($password == $db_pass) {
    // সেশন শুরু এবং তথ্য সেট করা
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_type'] = $user_type;


    // user_type অনুসারে রিডিরেক্ট
    if ($user_type == 'customer') {
      header('Location: ../index.php');
    } elseif ($user_type == 'admin') {
      header('Location: index.php');
    }
  } else {
    // পাসওয়ার্ড ভুল হলে লগইন পেজে রিডিরেক্ট
    header('Location: ../login.php');
  }
}



// add logic for lawyer type 



if (isset($_POST['add_lawyer_type'])) {
  $lawyer_type = $_POST['lawyer_type'];

  $mysqli->query("INSERT INTO lawyer_list_type (lawyer_type) VALUES ('$lawyer_type')");

  $_SESSION['message'] = "Lawyer Type has been added";
  $_SESSION['message_type'] = 'success';
  header("location:lawyerType.php");
}

// delete lawyer type logic 

if (isset($_GET['lawyer_type_delete_id'])) {
  $id = $_GET['lawyer_type_delete_id'];

  $mysqli->query("DELETE FROM lawyer_list_type WHERE id=$id");

  $_SESSION['message'] = "Lawyer Type has been Deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:lawyerType.php");
}



// add logic for lawyer Category 

if (isset($_POST['add_lawyer_category'])) {
  $service_title = $_POST['service_title'];
  $service_des = $_POST['service_des'];

  $service_image = $_FILES['service_image']['name'];
  $tmpName = $_FILES['service_image']['tmp_name'];
  $folder = 'lawyerCategory/' . $service_image;


  $mysqli->query("INSERT INTO service_crud (service_title, service_des, service_image) VALUES ('$service_title', '$service_des', '$service_image')");
  move_uploaded_file($tmpName, $folder);

  $_SESSION['message'] = "Lawyer Category has been added";
  $_SESSION['message_type'] = 'success';
  header("location:lawyerCategory.php");
}




// ambulance add Logic

if (isset($_POST['add_project'])) {
  $project_title = $_POST['project_title'];
  $project_link = $_POST['project_link'];
  $project_description = $_POST['project_description'];

  $project_picture = $_FILES['project_picture']['name'];
  $tmpName = $_FILES['project_picture']['tmp_name'];
  $folder = 'projectImg/' . $project_picture;


  $mysqli->query("INSERT INTO projects (project_title, project_link, project_description, project_picture) VALUES ('$project_title', '$project_link', '$project_description', '$project_picture')");
  move_uploaded_file($tmpName, $folder);

  $_SESSION['message'] = "Project has been added";
  $_SESSION['message_type'] = 'success';
  header("location:projects.php");
}





// admin Update Logic

if (isset($_POST['udpate_project'])) {
  $project_id = $_POST['id'];
  $project_title = $_POST['project_title'];
  $project_link = $_POST['project_link'];
  $project_description = $_POST['project_description'];

  $project_picture = $_FILES['project_picture']['name'];
  $old_image = $_POST['old_image'];

  if ($project_picture != '') {
    $project_picture = $_FILES['project_picture']['name'];
  } else {
    $project_picture = $old_image;
  }
  $tmpName = $_FILES['project_picture']['tmp_name'];
  $folder = 'projectImg/' . $project_picture;


  $mysqli->query("UPDATE `projects` SET `project_title` = '$project_title', `project_link` = '$project_link', `project_description` = '$project_description', `project_picture` = '$project_picture' WHERE id=$project_id");
  move_uploaded_file($tmpName, $folder);

  $_SESSION['message'] = "Project has been Successfully";
  $_SESSION['message_type'] = 'warning';
  header('location:projects.php');
}









if (isset($_GET['project_delete_id'])) {
  $id = $_GET['project_delete_id'];

  $mysqli->query("DELETE FROM projects WHERE id=$id");

  $_SESSION['message'] = "Project has been Deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:projects.php");
}



// Department Update Logic

if (isset($_POST['editProfile'])) {
  $id = $_POST['id'];
  $password = $_POST['password'];


  $image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  if ($image != '') {
    $image = $_FILES['image']['name'];
  } else {
    $image = $old_image;
  }
  $adminName = $_FILES['image']['tmp_name'];
  $adminFolder = 'adminPic/' . $image;



  $mysqli->query("UPDATE `users` SET `password` = '$password', `image` = '$image' WHERE id=$id");

  move_uploaded_file($adminName, $adminFolder);
  $_SESSION['message'] = "My Information has been updated";
  $_SESSION['message_type'] = 'warning';
  header('location:editProfile.php');
}