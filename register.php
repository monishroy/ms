<?php
require ('connection.inc.php');
require ('functions.inc.php');

if(isset($_SESSION['admin_login'])){
  header('location: index.php');
}
if(isset($_SESSION['user_login'])){
  header('location: u-index.php');
}

if(isset($_POST['register'])){
  $fname = trim($_POST['fname']);
  $lname = trim($_POST['lname']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  $password = trim($_POST['password']);

  $input_errors = array();

  if(empty($fname)) {
    $input_errors['fname'] = "field is required!";
  }
  if(empty($lname)) {
    $input_errors['lname'] = "field is required!";
  }
  if(empty($email)) {
    $input_errors['email'] = "field is required!";
  }
  if(empty($phone)) {
    $input_errors['phone'] = "field is required!";
  }
  if(empty($password)) {
    $input_errors['password'] = " field is required!";
  }


  if (count($input_errors) == 0) {
    $email_check = mysqli_query($con, "SELECT * FROM `user` WHERE `email` = '$email'");
    $email_check_row = mysqli_num_rows($email_check);
    if($email_check_row == 0){
      $phone_check = mysqli_query($con, "SELECT * FROM `user` WHERE `phone` = '$phone'");
      $phone_check_row = mysqli_num_rows($phone_check);
      if($phone_check_row == 0) {
        if(strlen($password) > 5){
          $password_hash = password_hash($password, PASSWORD_DEFAULT);
          $result = mysqli_query($con, "INSERT INTO `user`(`fname`, `lname`, `email`, `phone`, `password`, `status`) VALUES ('$fname','$lname','$email','$phone','$password_hash','1')");
          if($result){
            $success = "Registration Successfully !";
            $user = $fname;
          }else{
            $error = "Something Wrong !";
          }
        }else{
          $password_exists = "Password more then 6 Character !";
        }
      }else{
        $phone_exists = "Phone Already Exists !";
      }
    }else{
      $email_exists = "Email Already Exists !";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Students Register</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-3 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo.png" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="" method="POST">
                <div class="row">
                  <div class="form-group col-6">
                    <input type="text" class="form-control <?php if(isset($input_errors['fname'])){ echo 'border-danger'; } ?>" id="fname" name="fname" placeholder="First Name" value="<?= isset($fname) ? $fname:'' ?>">
                  </div>
                  <div class="form-group col-6">
                    <input type="text" class="form-control <?php if(isset($input_errors['lname'])){ echo 'border-danger'; } ?>" id="lname" name="lname" placeholder="Last Name" value="<?= isset($lname) ? $lname:'' ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control <?php if(isset($input_errors['email'])){ echo 'border-danger'; } ?>" id="email" name="email" placeholder="Email" value="<?= isset($email) ? $email:'' ?>" >
                  <?php if(isset($email_exists)){ ?><span class="text-danger"><?= $email_exists ?></span><?php } ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control <?php if(isset($input_errors['phone'])){ echo 'border-danger'; } ?>" id="phone" name="phone" placeholder="Phone Number" value="<?= isset($phone) ? $phone:'' ?>" >
                  <?php if(isset($phone_exists)){ ?><span class="text-danger"><?= $phone_exists ?></span><?php } ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control <?php if(isset($input_errors['password'])){ echo 'border-danger'; } ?>" id="password" name="password" placeholder="Password" value="<?= isset($password) ? $password:'' ?>" >
                  <?php if(isset($password_exists)){ ?><span class="text-danger"><?= $password_exists ?></span><?php } ?>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" checked required>
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="register">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  if($success){
    ?>
    <script>
    swal({
      title: "Registration Successfully",
      text: "Thank you <?= $user ?>",
      icon: "success",
    });
  </script>
    <?php
  }
  ?>
  
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  
</body>

</html>
