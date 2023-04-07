<?php
require ('connection.inc.php');
require ('functions.inc.php');

//Update Student Admin
if(isset($_POST['update_student'])){
  
  $id = get_safe_value($con,$_POST['id']);
  $fname = get_safe_value($con, $_POST['fname']);
  $lname = get_safe_value($con, $_POST['lname']);
  $email = get_safe_value($con, $_POST['email']);
  $department = get_safe_value($con, $_POST['department']);
  $roll = get_safe_value($con, $_POST['roll']);
  $reg = get_safe_value($con, $_POST['reg']);
  $session = get_safe_value($con, $_POST['session']);
  $phone = get_safe_value($con, $_POST['phone']);
  $company = get_safe_value($con, $_POST['company']);

  $result = mysqli_query($con, "UPDATE `students` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`roll`='$roll',`registration`='$reg',`session`='$session',`department`='$department',`company`='$company' WHERE `id` = '$id'");
  if($result){
    $_SESSION['student-success'] = "Update Successfully";
    header('location: students.php');
    exit(0);
  }else{
    $_SESSION['student-error'] = "Something is Worng";
    header('location: students.php');
    exit(0);
  }
}

//Update Profile
if(isset($_POST['update_profile'])){
  
  $id = get_safe_value($con,$_POST['id']);
  $fname = get_safe_value($con, $_POST['fname']);
  $lname = get_safe_value($con, $_POST['lname']);
  $email = get_safe_value($con, $_POST['email']);
  $department = get_safe_value($con, $_POST['department']);
  $roll = get_safe_value($con, $_POST['roll']);
  $reg = get_safe_value($con, $_POST['reg']);
  $session = get_safe_value($con, $_POST['session']);
  $phone = get_safe_value($con, $_POST['phone']);
  $company = get_safe_value($con, $_POST['company']);

  $result = mysqli_query($con, "UPDATE `students` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`roll`='$roll',`registration`='$reg',`session`='$session',`department`='$department',`company`='$company' WHERE `id` = '$id'");
  if($result){
    $_SESSION['student-success'] = "Update Successfully";
    header('location: update_student.php');
    exit(0);
  }else{
    $_SESSION['student-error'] = "Something is Worng";
    header('location: update_student.php');
    exit(0);
  }
}

//Update User Admin Panel
if(isset($_POST['update_user'])){
  
  $id = get_safe_value($con,$_POST['id']);
  $fname = get_safe_value($con, $_POST['fname']);
  $lname = get_safe_value($con, $_POST['lname']);
  $email = get_safe_value($con, $_POST['email']);
  $phone = get_safe_value($con, $_POST['phone']);
  $password = get_safe_value($con, $_POST['password']);

  if(empty($password)){
  $result = mysqli_query($con, "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone' WHERE `id` = '$id'");
  }else{
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($con, "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`password`='$password_hash' WHERE `id` = '$id'");
  }
  if($result){
    $_SESSION['user-success'] = "Update Successfully";
    header('location: users.php');
    exit(0);
  }else{
    $_SESSION['user-error'] = "Something is Worng";
    header('location: users.php');
    exit(0);
  }
}

//Update Department
if(isset($_POST['update_department'])){
  $department_name = get_safe_value($con,$_POST['department_name']);
  $id = get_safe_value($con,$_POST['id']);

  $result = mysqli_query($con, "UPDATE `department` SET `name`='$department_name' WHERE `id` = '$id'");
  if($result){
    $_SESSION['department-success'] = "Update Successfully";
    header('location: add_categories.php');
    exit(0);
  }else{
    $_SESSION['department-error'] = "Something is Worng";
    header('location: add_categories.php');
    exit(0);
  }
}

//Update Session
if(isset($_POST['update_session'])){
  $session_name = get_safe_value($con,$_POST['session_name']);
  $id = get_safe_value($con,$_POST['id']);

  $result = mysqli_query($con, "UPDATE `session` SET `name`='$session_name' WHERE `id` = '$id'");
  if($result){
    $_SESSION['session-success'] = "Update Successfully";
    header('location: add_categories.php');
    exit(0);
  }else{
    $_SESSION['session-error'] = "Something is Worng";
    header('location: add_categories.php');
    exit(0);
  }
}

//Update Company
if(isset($_POST['update_company'])){
  $company_name = get_safe_value($con,$_POST['company_name']);
  $id = get_safe_value($con,$_POST['id']);

  $result = mysqli_query($con, "UPDATE `company` SET `name`='$company_name' WHERE `id` = '$id'");
  if($result){
    $_SESSION['company-success'] = "Update Successfully";
    header('location: add_categories.php');
    exit(0);
  }else{
    $_SESSION['company-error'] = "Something is Worng";
    header('location: add_categories.php');
    exit(0);
  }
}

//Message Replay
if(isset($_POST['message_replay'])){
  $replay = get_safe_value($con,$_POST['replay']);
  $id = get_safe_value($con,$_POST['id']);

  $result = mysqli_query($con, "UPDATE `message` SET `replay`='$replay', `status`='0' WHERE `id` = '$id'");
  if($result){
    $_SESSION['message-success'] = "Replay Send Successfully";
    header('location: a-message.php');
    exit(0);
  }else{
    $_SESSION['message-error'] = "Something is Worng";
    header('location: a-message.php');
    exit(0);
  }
}

//Update Profile Picture
if(isset($_POST['upload_picture'])){
  $id = get_safe_value($con,$_POST['id']);
  $phone = get_safe_value($con,$_POST['phone']);
  
  $image_size = $_FILES['image']['size'];
  if($image_size < 819200){

      $image = explode('.',$_FILES['image']['name']);
      $image_ext = end($image);
      $image = date('Ymdhis.').$image_ext;

      $result = mysqli_query($con, "UPDATE `user` SET `image`='$image' WHERE `id` = '$id'");
      $result = mysqli_query($con, "UPDATE `students` SET `image`='$image' WHERE `phone` = '$phone'");
      if($result){
          move_uploaded_file($_FILES['image']['tmp_name'],'images/user/'.$image);
          $_SESSION['profile-success'] = "Profile Picture Changed";
          header('location: profile.php');
          exit(0);
      }else{
          $_SESSION['profile-error'] = "Something is Worng";
          header('location: profile.php');
          exit(0);
      }
  }else{
      $_SESSION['profile-error'] = "Please Enter 800KB image !";
      header('location: profile.php');
      exit(0);
  }

}
?>
