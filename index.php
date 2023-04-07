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
                        <p class="fs-30 mb-2">61344</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4">Total Bookings</p>
                        <p class="fs-30 mb-2">61344</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Recent Students Added</p>
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
                        <table
                            id="example"
                            class="display expandable-table"
                            style="width: 100%"
                          >
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Registration</th>
                                <th>Phone</th>
                                <th>Session</th>
                                <th>Dipartment</th>
                                <th>Company</th>
                                <th>Status</th>
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

                                $company = $row['company'];
                                $res = mysqli_query($con, "SELECT * FROM `company` WHERE `id` = '$company'");
                                $company_data = mysqli_fetch_assoc($res);

                                ?>
                                <tr>
                                  <td><?= $sl ?></td>
                                  <td><?= ucwords($row['fname'].' '.$row['lname']) ?></td>
                                  <td><?= $row['roll'] ?></td>
                                  <td><?= $row['registration'] ?></td>
                                  <td><?= $row['phone'] ?></td>
                                  <td><?= $session_data['name'] ?></td>
                                  <td><?= $department_data['name'] ?></td>
                                  <td><?= $company_data['name'] ?></td>
                                  <td>
                                    <?php
                                      if($row['status'] == 1){
                                        ?>
                                        <a class="badge badge-success" href="status-update.php?activeStudent=<?= $row['id'] ?>">Active</a>
                                        <?php
                                      }else{
                                        ?>
                                        <a  class="badge badge-danger" href="status-update.php?deactiveStudent=<?= $row['id'] ?>">Deactive</a>
                                        <?php
                                      }
                                    ?>
                                  </td>
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