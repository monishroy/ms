<?php
require ('connection.inc.php');
require ('functions.inc.php');


//Department Add
if(isset($_POST['department'])){
    $department_name = get_safe_value($con,$_POST['department_name']);

    if(!empty($department_name)){
        $chack = mysqli_query($con, "SELECT * FROM `department` WHERE `name` = '$department_name'");
        $chack_row = mysqli_num_rows($chack);
        if($chack_row == 0){
            $result = mysqli_query($con, "INSERT INTO `department` (`name`) VALUES ('$department_name')");
            if($result){
            $_SESSION['department-success'] = "Add Successfully";
            header('location: add_categories.php');
            exit(0);
            }else{
            $_SESSION['department-error'] = "Something is Worng";
            header('location: add_categories.php');
            exit(0);
            }
        }else{
            $_SESSION['department-error'] = "This Department alrady exsit";
            header('location: add_categories.php');
            exit(0);
        }
    }else{
        $_SESSION['department-error'] = "Please Enter Department";
        header('location: add_categories.php');
        exit(0);
    }
    
}

//Session Add
if(isset($_POST['session'])){
    $session_name = get_safe_value($con,$_POST['session_name']);

    if(!empty($session_name)){
        $chack = mysqli_query($con, "SELECT * FROM `session` WHERE `name` = '$session_name'");
        $chack_row = mysqli_num_rows($chack);
        if($chack_row == 0){
            $result = mysqli_query($con, "INSERT INTO `session` (`name`) VALUES ('$session_name')");
            if($result){
            $_SESSION['session-success'] = "Add Successfully";
            header('location: add_categories.php');
            exit(0);
            }else{
            $_SESSION['session-error'] = "Something is Worng";
            header('location: add_categories.php');
            exit(0);
            }
        }else{
            $_SESSION['session-error'] = "This Session alrady exsit";
            header('location: add_categories.php');
            exit(0);
        }
    }else{
        $_SESSION['session-error'] = "Please Enter Session";
        header('location: add_categories.php');
        exit(0);
    }
    
}

//Company Add
if(isset($_POST['company'])){
    $company_name = get_safe_value($con,$_POST['company_name']);

    if(!empty($company_name)){
        $chack = mysqli_query($con, "SELECT * FROM `company` WHERE `name` = '$company_name'");
        $chack_row = mysqli_num_rows($chack);
        if($chack_row == 0){
            $result = mysqli_query($con, "INSERT INTO `company` (`name`) VALUES ('$company_name')");
            if($result){
            $_SESSION['company-success'] = "Add Successfully";
            header('location: add_categories.php');
            exit(0);
            }else{
            $_SESSION['company-error'] = "Something is Worng";
            header('location: add_categories.php');
            exit(0);
            }
        }else{
            $_SESSION['company-error'] = "This Company alrady exsit";
            header('location: add_categories.php');
            exit(0);
        }
    }else{
        $_SESSION['company-error'] = "Please Enter Company";
        header('location: add_categories.php');
        exit(0);
    }
    
}

//Send Message
if(isset($_POST['send_message'])){
    $user_id = get_safe_value($con,$_POST['user_id']);
    $subject = get_safe_value($con,$_POST['subject']);
    $message = get_safe_value($con,$_POST['message']);

    $result = mysqli_query($con, "INSERT INTO `message`(`user_id`, `subject`, `message`, `status`) VALUES ('$user_id','$subject','$message','1')");
    if($result){
        $_SESSION['message-success'] = "Send Successfully";
        header('location: u-index.php');
        exit(0);
    }else{
        $_SESSION['message-error'] = "Something is Worng";
        header('location: u-index.php');
        exit(0);
    }
    
}
?>