        <?php
        $title = 'Profle';
        require ('u-header.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Profile</h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <?php
                      if(isset($_SESSION['profile-success'])){
                        ?>
                        <div class="alert alert-success" role="alert">
                          <?= $_SESSION['profile-success']; ?>
                        </div>
                        <?php
                        unset($_SESSION['profile-success']);
                      }
                      if(isset($_SESSION['profile-error'])){
                        ?>
                        <div class="alert alert-danger" role="alert">
                          <?= $_SESSION['profile-error']; ?>
                        </div>
                        <?php
                        unset($_SESSION['profile-error']);
                      }
                    ?>
                    <div class="d-flex justify-content-center">
                      <img class="rounded border border-5" src="images/user/<?= $user_info['image'] ?>" style="max-height: 130px;" alt="">
                    </div>
                    <h3 class="text-center font-weight-bold mt-4"><?= ucwords($user_info['fname'].' '.$user_info['lname']) ?></h3>
                    <ul class="mt-4">
                      <li class=" font-weight-bold mb-3">
                        <div class="row">
                          <div class="col-3">
                            <h5>Name </h5>
                          </div>
                          <div class="col-9">:  <?= ucwords($user_info['fname'].' '.$user_info['lname']) ?></div>
                        </div>
                      </li>
                      <li class="font-weight-bold mb-3">
                        <div class="row">
                          <div class="col-3">
                            <h5>Email </h5>
                          </div>
                          <div class="col-9">:  <?= $user_info['email'] ?></div>
                        </div>
                      </li>
                      <li class=" font-weight-bold mb-3">
                        <div class="row">
                          <div class="col-3">
                            <h5>Phone </h5>
                          </div>
                          <div class="col-9">:  <?= $user_info['phone'] ?></div>
                        </div>
                      </li>
                      <li class=" font-weight-bold mb-3">
                        <div class="row">
                          <div class="col-3">
                            <h5>User Type </h5>
                          </div>
                          <div class="col-9">:  
                            <?php
                              if($user_info['user_type'] == 1){
                                ?>
                                <span class="badge badge-primay">Admin</span>
                                <?php
                              }else{
                                ?>
                                <span class="badge badge-info">User</span>
                                <?php
                              }
                            ?>
                          </div>
                        </div>
                      </li>
                      <li class=" font-weight-bold mb-3">
                        <div class="row">
                          <div class="col-3">
                            <h5>Status </h5>
                          </div>
                          <div class="col-9">:  
                            <?php
                              if($user_info['status'] == 1){
                                ?>
                                <span class="badge badge-success">Active</span>
                                <?php
                              }else{
                                ?>
                                <span class="badge badge-danger">Deactive</span>
                                <?php
                              }
                            ?>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="row">
                      <form action="data_update.php" enctype="multipart/form-data" method="POST">
                        <label for="">Changes Profile Pictute </label>
                        <input type="hidden" name="id" value="<?= $user_info['id'] ?>">
                        <input type="hidden" name="phone" value="<?= $user_info['phone'] ?>">
                        <div class="input-group col-xs-12">
                          <input type="file" name="image" class="form-control">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" name="upload_picture" type="submit">Upload</button>
                          </span>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <?php
                    $user_id = $user_info['id'];
                    $message = mysqli_query($con, "SELECT * FROM `message` WHERE `user_id` = '$user_id'");
                    $count_message = mysqli_num_rows($message);

                    $phone = $user_info['phone'];
                    $students = mysqli_query($con, "SELECT * FROM `students` WHERE `phone` = '$phone'");
                    $count_students = mysqli_num_rows($students);
                    $student_info = mysqli_fetch_assoc($students);
                    if($count_students != 0){
                      ?>
                      <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <p class="card-title">More Details</p>
                            <div class="charts-data">
                              <ul class="mt-4">
                                <li class=" font-weight-bold mb-3">
                                  <div class="row">
                                    <div class="col-3">
                                      <h5>Roll </h5>
                                    </div>
                                    <div class="col-9">:  <?= $student_info['roll'] ?></div>
                                  </div>
                                </li>
                                <li class="font-weight-bold mb-3">
                                  <div class="row">
                                    <div class="col-3">
                                      <h5>Registration </h5>
                                    </div>
                                    <div class="col-9">:  <?= $student_info['registration'] ?></div>
                                  </div>
                                </li>
                                <li class=" font-weight-bold mb-3">
                                  <div class="row">
                                    <div class="col-3">
                                      <h5>Session </h5>
                                    </div>
                                    <div class="col-9">:
                                      <?php
                                        $session_id = $student_info['session'];
                                        $data = mysqli_query($con, "SELECT * FROM `session`");
                                        while($session=mysqli_fetch_assoc($data)){
                                          if($session['id'] == $session_id){
                                          $session = $session['name'];
                                          echo "$session";
                                          }
                                        }
                                      ?>
                                    </div>
                                  </div>
                                </li>
                                <li class=" font-weight-bold mb-3">
                                  <div class="row">
                                    <div class="col-3">
                                      <h5>Department </h5>
                                    </div>
                                    <div class="col-9">:  
                                      <?php
                                        $department_id = $student_info['department'];
                                        $data = mysqli_query($con, "SELECT * FROM `department`");
                                        while($department=mysqli_fetch_assoc($data)){
                                          if($department['id'] == $department_id){
                                          $department = $department['name'];
                                          echo "$department";
                                          }
                                        }
                                      ?>
                                    </div>
                                  </div>
                                </li>
                                <li class=" font-weight-bold mb-3">
                                  <div class="row">
                                    <div class="col-3">
                                      <h5>Company </h5>
                                    </div>
                                    <div class="col-9">:  
                                      <?php
                                        $company_id = $student_info['company'];
                                        $data = mysqli_query($con, "SELECT * FROM `company`");
                                        while($company=mysqli_fetch_assoc($data)){
                                          if($company['id'] == $company_id){
                                          $company = $company['name'];
                                          echo "$company";
                                          }
                                        }
                                      ?>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                    }else{
                      
                    }
                  ?>
                  
                  <?php
                    $user_id = $user_info['id'];
                    $message = mysqli_query($con, "SELECT * FROM `message` WHERE `user_id` = '$user_id'");
                    $count_message = mysqli_num_rows($message);

                    $phone = $user_info['phone'];
                    $students = mysqli_query($con, "SELECT * FROM `students` WHERE `phone` = '$phone'");
                    $count_students = mysqli_num_rows($students);
                    $student_info = mysqli_fetch_assoc($students);
                    if(isset($student_info)){
                      $student_image = $student_info['image'];
                    }
                    if($count_students == 0){
                      $complete_profile = '55';
                    }elseif($student_image == 'default.png'){
                      $complete_profile = '95';
                    }else{
                      $complete_profile = '100';
                    }
                  ?>
                  <div class="col-md-12 stretch-card grid-margin">
                    <div class="card data-icon-card-<?php
                              if($complete_profile < 56){
                                echo 'primary';
                              }elseif($complete_profile < 96){
                                echo 'warning';
                              }else{
                                echo 'success';
                              }
                              ?>">
                      <div class="card-body">
                        <p class="card-title text-white">Profile Complete</p>
                        <div class="row">
                          <div class="col-8 text-white">
                            <h3><?= $complete_profile ?>%</h3>
                            <p class="text-white font-weight-500 mb-0">
                              <?php
                              if($complete_profile < 56){
                                echo 'Please Update your Profile.';
                              }elseif($complete_profile < 96){
                                echo 'All Most complete your Profile. Set your Profile Picture.';
                              }else{
                                echo 'Thanks, Complete Your Profile.';
                              }
                              ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Notifications</p>
                    <ul class="icon-data-list">
                      <li>
                        <div class="d-flex">
                          <div>
                            <ul class="list-ticked">
                              <?php
                              $user_id = $user_info['id'];
                              $res = mysqli_query($con, "SELECT * FROM `message` WHERE `user_id` = '$user_id'");
                              while($row=mysqli_fetch_assoc($res)){
                                ?>
                                <li>
                                  <span class="card-title"><?= $row['message'] ?></span>
                                </li>
                                <p class="mb-0">
                                  <?php $replay=$row['replay']; if(empty($replay)){ echo 'Please Wait... '; }else{ echo $replay; }  ?>
                                </p>
                                <small class="mb-4"><?= date('h:i a', strtotime($row['datetime'])) ?></small>
                                <?php
                              }
                              ?>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
          <?php
          require ('u-footer.php');
          ?>