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
                      <form action="data-insert.php" enctype="multipart/form-data" method="POST">
                        <label for="">Changes Profile Pictute </label>
                        <input type="hidden" name="id" value="<?= $user_info['id'] ?>">
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
              <div class="col-md-4 stretch-card grid-margin">
                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-title">Charts</p>
                        <div class="charts-data">
                          <div class="mt-3">
                            <p class="mb-0">Data 1</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="progress progress-md flex-grow-1 mr-4">
                                <div class="progress-bar bg-inf0" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">5k</p>
                            </div>
                          </div>
                          <div class="mt-3">
                            <p class="mb-0">Data 2</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="progress progress-md flex-grow-1 mr-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">1k</p>
                            </div>
                          </div>
                          <div class="mt-3">
                            <p class="mb-0">Data 3</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="progress progress-md flex-grow-1 mr-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">992</p>
                            </div>
                          </div>
                          <div class="mt-3">
                            <p class="mb-0">Data 4</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="progress progress-md flex-grow-1 mr-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">687</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                    <div class="card data-icon-card-primary">
                      <div class="card-body">
                        <p class="card-title text-white">Number of Meetings</p>
                        <div class="row">
                          <div class="col-8 text-white">
                            <h3>34040</h3>
                            <p class="text-white font-weight-500 mb-0">
                              The total number of sessions within the date
                              range.It is calculated as the sum .
                            </p>
                          </div>
                          <div class="col-4 background-icon"></div>
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
                          <img src="images/faces/face1.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">Isabella Becker</p>
                            <p class="mb-0">
                              Sales dashboard have been created
                            </p>
                            <small>9:30 am</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex">
                          <img src="images/faces/face2.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">Adam Warren</p>
                            <p class="mb-0">You have done a great job #TW111</p>
                            <small>10:30 am</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex">
                          <img src="images/faces/face3.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">Leonard Thornton</p>
                            <p class="mb-0">
                              Sales dashboard have been created
                            </p>
                            <small>11:30 am</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex">
                          <img src="images/faces/face4.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">George Morrison</p>
                            <p class="mb-0">
                              Sales dashboard have been created
                            </p>
                            <small>8:50 am</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex">
                          <img src="images/faces/face5.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">Ryan Cortez</p>
                            <p class="mb-0">Herbs are fun and easy to grow.</p>
                            <small>9:00 am</small>
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