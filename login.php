<?php
require ('connection.inc.php');
require ('functions.inc.php');

if(isset($_SESSION['ADMIN_LOGIN'])){
  header('location: index.php');
}
if(isset($_SESSION['USER_LOGIN'])){
  header('location: u-index.php');
}

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $input_errors = array();

  if(empty($email)) {
    $input_errors['email'] = "invalid!";
  }
  if(empty($password)) {
    $input_errors['password'] = "invalid !";
  }

  $result = mysqli_query($con, "SELECT * FROM `user` WHERE `email` = '$email' OR `phone` = '$email'");
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if( password_verify($password, $row['password'])){
      if($row['status'] == 1){
        if(isset($_POST['remember-me'])){
          if($row['user_type'] == 1){
            setcookie('emailcookie',$email,time()+86400);
            setcookie('passwordcookie',$password,time()+86400);

            $_SESSION['ADMIN_LOGIN'] = $email;
            header('location: index.php');
            exit(0);
          }else{
            $_SESSION['USER_LOGIN'] = $email;
            header('location: u-index.php');
            exit(0);
          }
        }else{
          if($row['user_type'] == 1){
            $_SESSION['ADMIN_LOGIN'] = $email;
            header('location: index.php');
            exit(0);
          }else{
            $_SESSION['USER_LOGIN'] = $email;
            header('location: u-index.php');
            exit(0);
          }
        }
      }else{
        $user_type = "Your account deactive !";
      }
    }else{
      $password_error = "Password Worng!";
    }
  }else{
    $email_error = "Email Address Wrong !";
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Students Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- endinject -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
              <?php
              if(isset($user_type)){
                ?>
                <div class="alert alert-danger" role="alert">
                  <?= $user_type ?>
                </div>
                <?php
              }
              ?>
              
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control <?php if(isset($input_errors['email'])){ echo 'border-danger'; } ?>" id="email" name="email" placeholder="Email of Phone"  value="<?= isset($email) ? $email:'' ?>" >
                  <?php if(isset($email_error)){ ?><span class="text-danger"><?= $email_error ?></span><?php } ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control <?php if(isset($input_errors['password'])){ echo 'border-danger'; } ?>" id="password" name="password" placeholder="Password"  value="<?= isset($password) ? $password:'' ?>" >
                  <?php if(isset($password_error)){ ?><span class="text-danger"><?= $password_error ?></span><?php } ?>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary" name="login" type="submit">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="remember-me" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
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
