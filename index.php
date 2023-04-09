        <?php
          $title = 'Dashboard';
          require ('header.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome <?= ucwords($admin_info['fname'].' '.$admin_info['lname']) ?></h3>
                  </div>
                  <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button
                          class="btn btn-sm btn-light bg-white"
                          type="button"
                        >
                          <i class="mdi mdi-calendar"></i> Today (<?= date('d M Y') ?>)
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            $student = mysqli_query($con, "SELECT * FROM `students`");
            $tatal_students = mysqli_num_rows($student);

            $user = mysqli_query($con, "SELECT * FROM `user`");
            $tatal_user = mysqli_num_rows($user);

            $message = mysqli_query($con, "SELECT * FROM `message` WHERE `status` = '1'");
            $tatal_message = mysqli_num_rows($message);
            ?>
            <div class="row">
              <div class="col-md-12 grid-margin transparent">
                <div class="row">
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4">Total Students</p>
                        <p class="fs-30 mb-2"><?= $tatal_students ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4">Total User</p>
                        <p class="fs-30 mb-2"><?= $tatal_user ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4">Total Bookings</p>
                        <p class="fs-30 mb-2">61</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4">Total Pandding Message</p>
                        <p class="fs-30 mb-2"><?= $tatal_message ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Recent Students Added</p>
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
                        <table
                            
                            class="display expandable-table"
                            style="width: 100%"
                          >
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Phone</th>
                                <th>Session</th>
                                <th>Dipartment</th>
                                <th>Added On</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sl = 1;
                              $result = mysqli_query($con, "SELECT * FROM `students` ORDER BY `id` desc LIMIT 7");
                              while($row=mysqli_fetch_assoc($result)){
                                $session = $row['session'];
                                $res = mysqli_query($con, "SELECT * FROM `session` WHERE `id` = '$session'");
                                $session_data = mysqli_fetch_assoc($res);

                                $department = $row['department'];
                                $res = mysqli_query($con, "SELECT * FROM `department` WHERE `id` = '$department'");
                                $department_data = mysqli_fetch_assoc($res);
                                ?>
                                <tr>
                                  <td><?= $sl ?></td>
                                  <td><?= ucwords($row['fname'].' '.$row['lname']) ?></td>
                                  <td><?= $row['roll'] ?></td>
                                  <td><?= $row['phone'] ?></td>
                                  <td><?= $session_data['name'] ?></td>
                                  <td><?= $department_data['name'] ?></td>
                                  
                                  <td><?= date('d M Y', strtotime($row['datetime'])) ?></td>
                                </tr>
                                <?php
                                $sl++;
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Recent User Added</p>
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
                        <table
                            class="display expandable-table"
                            style="width: 100%"
                          >
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Added On</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sl = 1;
                              $result = mysqli_query($con, "SELECT * FROM `user` ORDER BY `id` desc LIMIT 7");
                              while($row=mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                  <td><?= $sl ?></td>
                                  <td><?= ucwords($row['fname'].' '.$row['lname']) ?></td>
                                  <td><?= $row['email'] ?></td>
                                  <td><?= $row['phone'] ?></td>
                                  
                                  <td><?= date('d M Y', strtotime($row['datetime'])) ?></td>
                                </tr>
                                <?php
                                $sl++;
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <?php
          require ('footer.php');
          ?>