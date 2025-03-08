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


// update logic for lawyer Category 

if (isset($_POST['udpate_lawyer_category'])) {
  $lawyer_id = $_POST['id'];
  $service_title = $_POST['service_title'];
  $service_des = $_POST['service_des'];


  $service_image = $_FILES['service_image']['name'];
  $old_image = $_POST['old_image'];

  if ($service_image != '') {
    $service_image = $_FILES['service_image']['name'];
  } else {
    $service_image = $old_image;
  }
  $tmpName = $_FILES['service_image']['tmp_name'];
  $folder = 'lawyerCategory/' . $service_image;


  $mysqli->query("UPDATE `service_crud` SET `service_title` = '$service_title', `service_des` = '$service_des', `service_image` = '$service_image' WHERE id=$lawyer_id");
  move_uploaded_file($tmpName, $folder);

  $_SESSION['message'] = "Lawyer Category has been Successfully";
  $_SESSION['message_type'] = 'warning';
  header('location:lawyerCategory.php');
}




// delete lawyer Category logic 

if (isset($_GET['lawyer_category_delete_id'])) {
  $id = $_GET['lawyer_category_delete_id'];

  $mysqli->query("DELETE FROM service_crud WHERE id=$id");

  $_SESSION['message'] = "Lawyer Category has been Deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:lawyerCategory.php");
}



// add logic for lawyer  

if (isset($_POST['add_lawyer'])) {
  $lawyer_name = $_POST['lawyer_name'];
  $lawyer_type = $_POST['lawyer_type'];
  $lawyer_biography = $_POST['lawyer_biography'];
  $lawyer_research = $_POST['lawyer_research'];
  $lawyer_address = $_POST['lawyer_address'];
  $day_1 = $_POST['day_1'];
  $start_time_1 = $_POST['start_time_1'];
  $end_time_1 = $_POST['end_time_1'];
  $day_2 = $_POST['day_2'];
  $start_time_2 = $_POST['start_time_2'];
  $end_time_2 = $_POST['end_time_2'];
  $day_3 = $_POST['day_3'];
  $start_time_3 = $_POST['start_time_3'];
  $end_time_3 = $_POST['end_time_3'];
  $day_4 = $_POST['day_4'];
  $start_time_4 = $_POST['start_time_4'];
  $end_time_4 = $_POST['end_time_4'];
  $day_5 = $_POST['day_5'];
  $start_time_5 = $_POST['start_time_5'];
  $end_time_5 = $_POST['end_time_5'];
  $day_6 = $_POST['day_6'];
  $start_time_6 = $_POST['start_time_6'];
  $end_time_6 = $_POST['end_time_6'];
  $education_qualification = $_POST['education_qualification'];


  $lawyer_picture = $_FILES['lawyer_picture']['name'];
  $tmpName = $_FILES['lawyer_picture']['tmp_name'];
  $folder = 'lawyerPicture/' . $lawyer_picture;


  $mysqli->query("INSERT INTO lawyer_crud (lawyer_name, lawyer_type, lawyer_biography, lawyer_research, lawyer_address, day_1, start_time_1, end_time_1, day_2, start_time_2, end_time_2, day_3, start_time_3, end_time_3, day_4, start_time_4, end_time_4, day_5, start_time_5, end_time_5, day_6, start_time_6, end_time_6, lawyer_picture) VALUES ('$lawyer_name', '$lawyer_type', '$lawyer_biography', '$lawyer_research', '$lawyer_address', '$day_1', '$start_time_1', '$end_time_1', '$day_2', '$start_time_2', '$end_time_2', '$day_3', '$start_time_3', '$end_time_3', '$day_4', '$start_time_4', '$end_time_4', '$day_5', '$start_time_5', '$end_time_5', '$day_6', '$start_time_6', '$end_time_6', '$lawyer_picture')");
  move_uploaded_file($tmpName, $folder);

  $_SESSION['message'] = "Lawyer has been added";
  $_SESSION['message_type'] = 'success';
  header("location:lawyer.php");
}


// update logic for lawyer  

if (isset($_POST['update_lawyer'])) {
  $lawyer_id = $_POST['id'];
  $lawyer_name = $_POST['lawyer_name'];
  // echo $lawyer_name;
  // die();
  $lawyer_type = $_POST['lawyer_type'];
  $lawyer_address = $_POST['lawyer_address'];
  $day_1 = $_POST['day_1'];
  $start_time_1 = $_POST['start_time_1'];
  $end_time_1 = $_POST['end_time_1'];
  $day_2 = $_POST['day_2'];
  $start_time_2 = $_POST['start_time_2'];
  $end_time_2 = $_POST['end_time_2'];
  $day_3 = $_POST['day_3'];
  $start_time_3 = $_POST['start_time_3'];
  $end_time_3 = $_POST['end_time_3'];
  $day_4 = $_POST['day_4'];
  $start_time_4 = $_POST['start_time_4'];
  $end_time_4 = $_POST['end_time_4'];
  $day_5 = $_POST['day_5'];
  $start_time_5 = $_POST['start_time_5'];
  $end_time_5 = $_POST['end_time_5'];
  $day_6 = $_POST['day_6'];
  $start_time_6 = $_POST['start_time_6'];
  $end_time_6 = $_POST['end_time_6'];
  $education_qualification = $_POST['education_qualification'];
  $lawyer_biography = $_POST['lawyer_biography'];
  $lawyer_research = $_POST['lawyer_research'];
 
  // echo $lawyer_research;
  // die();



  $lawyer_picture = $_FILES['lawyer_picture']['name'];
  $old_image = $_POST['old_image'];

  if ($lawyer_picture != '') {
    $lawyer_picture = $_FILES['lawyer_picture']['name'];
  } else {
    $lawyer_picture = $old_image;
  }
  $tmpName = $_FILES['lawyer_picture']['tmp_name'];
  $folder = 'lawyerPicture/' . $lawyer_picture;


  $mysqli->query("UPDATE `lawyer_crud` SET `lawyer_name` = '$lawyer_name', `lawyer_type` = '$lawyer_type', `lawyer_address` = '$lawyer_address', `day_1` = '$day_1', `start_time_1` = '$start_time_1', `end_time_1` = '$end_time_1', `day_2` = '$day_2', `start_time_2` = '$start_time_2', `end_time_2` = '$end_time_2', `day_3` = '$day_3', `start_time_3` = '$start_time_3', `end_time_3` = '$end_time_3', `day_4` = '$day_4', `start_time_4` = '$start_time_4', `end_time_4` = '$end_time_4', `day_5` = '$day_5', `start_time_5` = '$start_time_5', `end_time_5` = '$end_time_5', `day_6` = '$day_6', `start_time_6` = '$start_time_6', `end_time_6` = '$end_time_6', `education_qualification` = '$education_qualification', `lawyer_biography` = '$lawyer_biography', `lawyer_research` = '$lawyer_research', `lawyer_picture` = '$lawyer_picture' WHERE id=$lawyer_id");
  move_uploaded_file($tmpName, $folder);

  $_SESSION['message'] = "Lawyer has been Successfully";
  $_SESSION['message_type'] = 'warning';
  header('location:lawyer.php');
}




// delete lawyer  logic 

if (isset($_GET['lawyer_delete_id'])) {
  $id = $_GET['lawyer_delete_id'];

  $mysqli->query("DELETE FROM lawyer_crud WHERE id=$id");

  $_SESSION['message'] = "Lawyer has been Deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:lawyer.php");
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