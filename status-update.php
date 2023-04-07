<?php
require ('connection.inc.php');
require ('functions.inc.php');

//Active students
if(isset($_GET['activeStudent'])){
  $id = get_safe_value($con, $_GET['activeStudent']);
  
  $result = mysqli_query($con,"UPDATE `students` SET `status`='0' WHERE `id` = '$id'");
  if($result){
    header('location: students.php');
  }else{
    header('location: students.php');
  }
}

//Deactive students
if(isset($_GET['deactiveStudent'])){
  $id = get_safe_value($con, $_GET['deactiveStudent']);
  
  $result = mysqli_query($con,"UPDATE `students` SET `status`='1' WHERE `id` = '$id'");
  if($result){
    header('location: students.php');
  }else{
    header('location: students.php');
  }
}

//Active User
if(isset($_GET['activeUser'])){
  $id = get_safe_value($con, $_GET['activeUser']);
  
  $result = mysqli_query($con,"UPDATE `user` SET `status`='0' WHERE `id` = '$id'");
  if($result){
    header('location: users.php');
  }else{
    header('location: users.php');
  }
}

//Deactive User
if(isset($_GET['deactiveUser'])){
  $id = get_safe_value($con, $_GET['deactiveUser']);
  
  $result = mysqli_query($con,"UPDATE `user` SET `status`='1' WHERE `id` = '$id'");
  if($result){
    header('location: users.php');
  }else{
    header('location: users.php');
  }
}


//Active User Type
if(isset($_GET['activeUserType'])){
  $id = get_safe_value($con, $_GET['activeUserType']);
  
  $result = mysqli_query($con,"UPDATE `user` SET `user_type`='0' WHERE `id` = '$id'");
  if($result){
    header('location: users.php');
  }else{
    header('location: users.php');
  }
}

//Deactive User Type
if(isset($_GET['deactiveUserType'])){
  $id = get_safe_value($con, $_GET['deactiveUserType']);
  
  $result = mysqli_query($con,"UPDATE `user` SET `user_type`='1' WHERE `id` = '$id'");
  if($result){
    header('location: users.php');
  }else{
    header('location: users.php');
  }
}
?>