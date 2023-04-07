        <?php
        $title = 'Deshboard';
        require ('u-header.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome <?= ucwords($user_info['fname'].' '.$user_info['lname']) ?></h3>
                  </div>
                  <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white" type="button">
                          <i class="mdi mdi-calendar"></i> Today (<?= date('d M Y') ?>)
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            $user_id = $user_info['id'];
            $message = mysqli_query($con, "SELECT * FROM `message` WHERE `user_id` = '$user_id'");
            $count_message = mysqli_num_rows($message);

            $phone = $user_info['phone'];
            $students = mysqli_query($con, "SELECT * FROM `students` WHERE `phone` = '$phone'");
            $count_students = mysqli_num_rows($students);
            if($count_students == 0){
              $complete_profile = '55%';
            }else{
              $complete_profile = '98%';
            }
            ?>
            <div class="row">
              <div class="col-md-6 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4">Complete Profile</p>
                        <p class="fs-30 mb-2"><?= $complete_profile ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4">Total Bookings</p>
                        <p class="fs-30 mb-2">61344</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 ">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4">Total Message</p>
                        <p class="fs-30 mb-2"><?= $count_message ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4">Total Bookings</p>
                        <p class="fs-30 mb-2">61344</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Message Admin</h4>
                    <?php
                      if(isset($_SESSION['message-success'])){
                        ?>
                        <div class="alert alert-success" role="alert">
                          <?= $_SESSION['message-success']; ?>
                        </div>
                        <?php
                        unset($_SESSION['message-success']);
                      }
                      if(isset($_SESSION['message-error'])){
                        ?>
                        <div class="alert alert-danger" role="alert">
                          <?= $_SESSION['message-error']; ?>
                        </div>
                        <?php
                        unset($_SESSION['message-error']);
                      }
                    ?>
                    <form class="forms-sample" action="data-insert.php" method="POST">
                      <input type="hidden" name="user_id" value="<?= $user_info['id'] ?>">
                      <div class="form-group">
                        <label for="Subject">Subject</label>
                        <input type="text" class="form-control" id="Subject" autocomplete="off" name="subject" placeholder="Subject" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Message</label>
                        <textarea class="form-control"  name="message" id="exampleTextarea1" rows="4" required></textarea>
                      </div>
                      <button type="submit" name="send_message" class="btn btn-primary mr-2">Send Message</button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <?php
          require ('u-footer.php');
          ?>