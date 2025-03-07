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

// Add Gallery_Image  Logic

if (isset($_POST['add_gallery_image'])) {
  $image_title = $_POST['image_title'];

  $image = $_FILES['image']['name'];
  $tmpName = $_FILES['image']['tmp_name'];
  $folder = 'ImageGallery/' . $image;



  $mysqli->query("INSERT INTO lawyer_image (image_title, image) VALUES ('$image_title','$image')");

  move_uploaded_file($tmpName, $folder);


  $_SESSION['message'] = "Image has been added";
  $_SESSION['message_type'] = 'success';
  header("location:imageGallery.php");
}



// Delete Gallery_Image  Logic

if (isset($_GET['image_id'])) {
  $ID = $_GET['image_id'];

  $mysqli->query("DELETE FROM lawyer_image WHERE id=$ID");

  $_SESSION['message'] = "Image has been deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:imageGallery.php");
}


// Update Gallery_Image  Logic

if (isset($_POST['udpate_image'])) {
  $image_id = $_POST['ID'];
  $image_title = $_POST['image_title'];



  $image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  if ($image != '') {
    $image = $_FILES['image']['name'];
  } else {
    $image = $old_image;
  }
  $tmpName = $_FILES['image']['tmp_name'];
  $folder = 'ImageGallery/' . $image;



  $mysqli->query("UPDATE `lawyer_image` SET `image_title` = '$image_title', `image` = '$image' WHERE ID=$image_id");

  move_uploaded_file($tmpName, $folder);
  $_SESSION['message'] = "Image has been updated";
  $_SESSION['message_type'] = 'warning';
  header('location:imageGallery.php');
}



// Add Gallery_video  Logic

if (isset($_POST['add_gallery_video'])) {
  $video_title = $_POST['video_title'];
  $video_link = $_POST['video_link'];

  $mysqli->query("INSERT INTO lawyer_video (video_title, video_link) VALUES ('$video_title','$video_link')");


  $_SESSION['message'] = "Video has been added";
  $_SESSION['message_type'] = 'success';
  header("location:videoGallery.php");
}

// Delete Gallery_Video  Logic

if (isset($_GET['video_id'])) {
  $ID = $_GET['video_id'];

  $mysqli->query("DELETE FROM lawyer_video WHERE id=$ID");

  $_SESSION['message'] = "Video has been deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:videoGallery.php");
}


// Update Gallery_video  Logic

if (isset($_POST['update_video'])) {
  $video_id = $_POST['ID'];
  $video_title = $_POST['video_title'];
  $video_link = $_POST['video_link'];

  $mysqli->query("UPDATE `lawyer_video` SET `video_title` = '$video_title', `video_link` = '$video_link' WHERE ID=$video_id");

  move_uploaded_file($tmpName, $folder);
  $_SESSION['message'] = "Video has been updated";
  $_SESSION['message_type'] = 'warning';
  header('location:videoGallery.php');
}


// Add Blog  Logic

if (isset($_POST['add_blog'])) {
  $blog_name = $_POST['blog_name'];
  $blog_publish_date = $_POST['blog_publish_date'];
  $blog_user_name = $_POST['blog_user_name'];
  $blog_tag = $_POST['blog_tag'];
  $blog_description = $_POST['blog_description'];

  $blog_picture = $_FILES['blog_picture']['name'];
  $tmpName = $_FILES['blog_picture']['tmp_name'];
  $folder = 'blogImage/' . $blog_picture;



  $mysqli->query("INSERT INTO blog (blog_name, blog_publish_date, blog_user_name, blog_tag, blog_description, blog_picture) VALUES ('$blog_name','$blog_publish_date','$blog_user_name','$blog_tag','$blog_description','$blog_picture')");

  move_uploaded_file($tmpName, $folder);


  $_SESSION['message'] = "Blog been added";
  $_SESSION['message_type'] = 'success';
  header("location:blog.php");
}



// Delete Blog  Logic

if (isset($_GET['blog_delete_id'])) {
  $ID = $_GET['blog_delete_id'];

  $mysqli->query("DELETE FROM blog WHERE id=$ID");

  $_SESSION['message'] = "Blog has been deleted";
  $_SESSION['message_type'] = 'danger';
  header("location:blog.php");
}


// Update Blog  Logic

if (isset($_POST['update_blog'])) {
  $project_update_id = $_POST['ID'];

  $blog_name = $_POST['blog_name'];
  $blog_publish_date = $_POST['blog_publish_date'];
  $blog_user_name = $_POST['blog_user_name'];
  $blog_tag = $_POST['blog_tag'];
  $blog_description = $_POST['blog_description'];



  $blog_picture = $_FILES['blog_picture']['name'];
  $old_image = $_POST['old_image'];

  if ($blog_picture != '') {
    $blog_picture = $_FILES['blog_picture']['name'];
  } else {
    $blog_picture = $old_image;
  }
  $tmpName = $_FILES['blog_picture']['tmp_name'];
  $folder = 'blogImage/' . $blog_picture;


  $mysqli->query("UPDATE `blog` SET `blog_name` = '$blog_name', `blog_publish_date` = '$blog_publish_date', `blog_user_name` = '$blog_user_name', `blog_tag` = '$blog_tag', `blog_picture` = '$blog_picture' WHERE ID=$project_update_id");

  move_uploaded_file($tmpName, $folder);
  $_SESSION['message'] = "Blog has been updated";
  $_SESSION['message_type'] = 'warning';
  header('location:blog.php');
}