        <?php
          $title = 'Users';
          require ('header.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                    <h3 class="font-weight-bold">Users</h3>
                      <div class="row mb-3">
                        <form class="d-flex justify-content-end">
                          <a class="btn btn-primary mx-3" target="_blank" href="print_user.php">Print</a>
                          <input
                            class="form-control rounded-pill me-2"
                            type="search"
                            placeholder="Search..."
                            aria-label="Search"
                          />
                          <button
                            class="btn btn-outline-success mx-3"
                            type="submit"
                          >
                            Search
                          </button>
                        </form>
                      </div>
                    </div>
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
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>User Type</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sl = 1;
                              $result = mysqli_query($con, "SELECT * FROM `user` ORDER BY `id` desc");
                              while($row=mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                  <td><?= $sl ?></td>
                                  <td>
                                    <img src="images/user/<?= $row['image'] ?>" style="max-height: 50px; border-radius: 50%;" alt="profile" />
                                  </td>
                                  <td><?= ucwords($row['fname'].' '.$row['lname']) ?></td>
                                  <td><?= $row['email'] ?></td>
                                  <td><?= $row['phone'] ?></td>
                                  <td>
                                    <?php
                                      if($row['user_type'] == 1){
                                        ?>
                                        <a class="badge badge-primary" href="status-update.php?activeUserType=<?= $row['id'] ?>">Admin</a>
                                        <?php
                                      }else{
                                        ?>
                                        <a  class="badge badge-info" href="status-update.php?deactiveUserType=<?= $row['id'] ?>">User</a>
                                        <?php
                                      }
                                    ?>
                                  </td>
                                  <td>
                                    <?php
                                      if($row['status'] == 1){
                                        ?>
                                        <a class="badge badge-success" href="status-update.php?activeUser=<?= $row['id'] ?>">Active</a>
                                        <?php
                                      }else{
                                        ?>
                                        <a  class="badge badge-danger" href="status-update.php?deactiveUser=<?= $row['id'] ?>">Deactive</a>
                                        <?php
                                      }
                                    ?>
                                  </td>
                                  <td>
                                    <a class="text-warning fs-5" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#userEdit-<?= $row['id'] ?>"><i class='bx bx-edit'></i></a>
                                    <a class="text-danger fs-5 lh-1" onclick="return confirm('Are you sure to delete ?')" href="delete.php?user=<?= $row['id'] ?>"><i class='bx bx-trash' ></i></a>
                                  </td>
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
          $result = mysqli_query($con, "SELECT * FROM `user`");
          while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="modal fade" id="userEdit-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form class="forms-sample" action="data_update.php" method="POST">
                    <div class="modal-body">
                      <div class="row">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="first-name"
                              name="fname"
                              placeholder="First Name"
                              value="<?= $row['fname'] ?>"
                            />
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="last-name"
                              name="lname"
                              placeholder="Last Name"
                              value="<?= $row['lname'] ?>"
                            />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input
                              type="email"
                              class="form-control"
                              id="email"
                              name="email"
                              placeholder="Email"
                              value="<?= $row['email'] ?>"
                            />
                          </div>
                        </div>
                        
                        <div class="col-12">
                          <div class="form-group">
                            <label for="phone-number">Phone Number</label>
                            <input
                              type="number"
                              class="form-control"
                              id="phone-number"
                              name="phone"
                              placeholder="Phone Number"
                              value="<?= $row['phone'] ?>"
                            />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input
                              type="text"
                              class="form-control"
                              id="password"
                              name="password"
                              placeholder="Password"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="update_user" class="btn btn-primary">Save changes</button>
                    </form>
                    </div>
                </div>
              </div>
            </div>
            <?php
          }
          ?>

          <?php
          $result = mysqli_query($con, "SELECT * FROM `students`");
          while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="modal fade" id="studentView-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label >Full Name</label>
                          <input
                            type="text"
                            class="form-control"
                            value="<?= ucwords($row['fname'].' '.$row['lname']) ?>"
                            readonly
                          />
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input
                            type="email"
                            class="form-control"
                            value="<?= $row['email'] ?>"
                            readonly
                          />
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="department">Department</label>
                          <?php
                            $department_id = $row['department'];
                            $data = mysqli_query($con, "SELECT * FROM `department`");
                            while($department=mysqli_fetch_assoc($data)){
                              if($department['id'] == $department_id){
                                ?>
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="First Name"
                                  value="<?= $department['name'] ?>"
                                  readonly
                                />
                                <?php
                              }
                            }
                          ?>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="roll">Roll</label>
                          <input
                            type="text"
                            class="form-control"
                            value="<?= $row['roll'] ?>"
                            readonly
                          />
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="registration">Registration</label>
                          <input
                            type="number"
                            class="form-control"
                            value="<?= $row['registration'] ?>"
                            readonly
                          />
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="session">Session</label>
                            <?php
                              $session_id = $row['session'];
                              $data = mysqli_query($con, "SELECT * FROM `session`");
                              while($session=mysqli_fetch_assoc($data)){
                                if($session['id'] == $session_id){
                                ?>
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="First Name"
                                  value="<?= $session['name'] ?>"
                                  readonly
                                />
                                <?php
                              }
                            }
                          ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="phone-number">Phone Number</label>
                          <input
                            type="number"
                            class="form-control"
                            value="<?= $row['phone'] ?>"
                            readonly
                          />
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="company-name">Company Name</label>
                            <?php
                              $company_id = $row['company'];
                              $data = mysqli_query($con, "SELECT * FROM `company`");
                              while($company=mysqli_fetch_assoc($data)){
                                if($company['id'] == $company_id){
                                  ?>
                                  <input
                                  type="text"
                                  class="form-control"
                                  placeholder="First Name"
                                  value="<?= $company['name'] ?>"
                                  readonly
                                  />
                                  <?php
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="form-group">
                          <label for="phone-number">Added On</label>
                          <input
                            type="text"
                            class="form-control"
                            value="<?= date('d M Y', strtotime($row['datetime'])) ?>"
                            readonly
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <?php
            if(isset($_SESSION['user-success'])){
              ?>
              <script>
                swal({
                  title: "<?= $_SESSION['user-success']; ?>",
                  text: "Thank you",
                  icon: "success",
                });
              </script>
              <?php
              unset($_SESSION['user-success']);
            }
            if(isset($_SESSION['user-error'])){
              ?>
              <script>
                swal({
                  title: "<?= $_SESSION['user-error']; ?>",
                  text: "Please Try Again",
                  icon: "error",
                });
              </script>
              <?php
              unset($_SESSION['user-error']);
            }
          ?>
          <?php
          require ('footer.php');
          ?>
