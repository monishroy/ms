<?php
require ('connection.inc.php');
require ('functions.inc.php');

//Student Delete
if(isset($_GET['student'])){
  $id = get_safe_value($con,$_GET['student']);

  $result = mysqli_query($con, "DELETE FROM `students` WHERE `id` = '$id'");
  if($result){
    $_SESSION['student-success'] = "Delete Successfully";
    header('location: students.php');
    exit(0);
  }else{
    $_SESSION['student-error'] = "Something is Worng";
    header('location: students.php');
    exit(0);
  }
}

//Department Delete
if(isset($_GET['department'])){
    $id = get_safe_value($con,$_GET['department']);
  
    $result = mysqli_query($con, "DELETE FROM `department` WHERE `id` = '$id'");
    if($result){
      $_SESSION['department-success'] = "Delete Successfully";
      header('location: add_categories.php');
      exit(0);
    }else{
      $_SESSION['department-error'] = "Something is Worng";
      header('location: add_categories.php');
      exit(0);
    }
}

//Session Delete
if(isset($_GET['session'])){
    $id = get_safe_value($con,$_GET['session']);
  
    $result = mysqli_query($con, "DELETE FROM `session` WHERE `id` = '$id'");
    if($result){
      $_SESSION['session-success'] = "Delete Successfully";
      header('location: add_categories.php');
      exit(0);
    }else{
      $_SESSION['session-error'] = "Something is Worng";
      header('location: add_categories.php');
      exit(0);
    }
}

//Company Delete
if(isset($_GET['company'])){
    $id = get_safe_value($con,$_GET['company']);
  
    $result = mysqli_query($con, "DELETE FROM `company` WHERE `id` = '$id'");
    if($result){
      $_SESSION['company-success'] = "Delete Successfully";
      header('location: add_categories.php');
      exit(0);
    }else{
      $_SESSION['company-error'] = "Something is Worng";
      header('location: add_categories.php');
      exit(0);
    }
}


//Message Delete
if(isset($_GET['message'])){
  $id = get_safe_value($con,$_GET['message']);

  $result = mysqli_query($con, "DELETE FROM `message` WHERE `id` = '$id'");
  if($result){
    $_SESSION['message-success'] = "Delete Successfully";
    header('location: a-message.php');
    exit(0);
  }else{
    $_SESSION['message-error'] = "Something is Worng";
    header('location: a-message.php');
    exit(0);
  }
}

//User Delete
if(isset($_GET['user'])){
  $id = get_safe_value($con,$_GET['user']);

  $result = mysqli_query($con, "DELETE FROM `user` WHERE `id` = '$id'");
  if($result){
    $_SESSION['user-success'] = "Delete Successfully";
    header('location: users.php');
    exit(0);
  }else{
    $_SESSION['user-error'] = "Something is Worng";
    header('location: users.php');
    exit(0);
  }
}
?>