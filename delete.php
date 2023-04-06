<?php
require ('connection.inc.php');
require ('functions.inc.php');

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
?>