<?php
require ('connection.inc.php');
require ('functions.inc.php');

  //Active Categories
  if(isset($_GET['activeStudent'])){
    $id = get_safe_value($con, $_GET['activeStudent']);
    
    $result = mysqli_query($con,"UPDATE `students` SET `status`='0' WHERE `id` = '$id'");
    if($result){
      header('location: students.php');
    }else{
      header('location: students.php');
    }
  }
  
  //Deactive Categories
  if(isset($_GET['deactiveStudent'])){
    $id = get_safe_value($con, $_GET['deactiveStudent']);
    
    $result = mysqli_query($con,"UPDATE `students` SET `status`='1' WHERE `id` = '$id'");
    if($result){
      header('location: students.php');
    }else{
      header('location: students.php');
    }
  }


?>