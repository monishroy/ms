        <?php
          $title = 'Students';
          require ('header.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">All Message</h3>
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

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
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
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Dipartment</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sl = 1;
                              $result = mysqli_query($con, "SELECT * FROM `message` WHERE `status` = '1' ORDER BY `id` desc");
                              while($row=mysqli_fetch_assoc($result)){
                                $user_id = $row['user_id'];
                                $res = mysqli_query($con, "SELECT * FROM `user` WHERE `id` = '$user_id'");
                                $user_data = mysqli_fetch_assoc($res);

                                $phone = $user_data['phone'];
                                $res = mysqli_query($con, "SELECT * FROM `students` WHERE `phone` = '$phone'");
                                $student_data = mysqli_fetch_assoc($res);

                                $department = $student_data['department'];
                                $res = mysqli_query($con, "SELECT * FROM `department` WHERE `id` = '$department'");
                                $department_data = mysqli_fetch_assoc($res);
                                ?>
                                <tr>
                                  <td><?= $sl ?></td>
                                  <td><?= ucwords($student_data['fname'].' '.$student_data['lname']) ?></td>
                                  <td><?= $student_data['roll'] ?></td>
                                  <td><?= $user_data['phone'] ?></td>
                                  <td><?= $row['subject'] ?></td>
                                  <td><?= $row['message'] ?></td>
                                  <td><?= $department_data['name'] ?></td>
                                  <td>
                                    <a class="text-info fs-5" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#messageReplay-<?= $row['id'] ?>"><i class='bx bx-reply'></i></a>
                                    <a class="text-danger fs-5 lh-1" onclick="return confirm('Are you sure to delete ?')" href="delete.php?message=<?= $row['id'] ?>"><i class='bx bx-trash' ></i></a>
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
          $result = mysqli_query($con, "SELECT * FROM `message`");
          while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="modal fade" id="messageReplay-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form class="forms-sample" action="data_update.php" method="POST">
                    <div class="modal-body">
                      <div class="row">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="first-name">Subject</label>
                            <input
                              type="text"
                              class="form-control"
                              id="first-name"
                              value="<?= $row['subject'] ?>"
                              readonly
                            />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="last-name">Message</label>
                            <input
                              type="text"
                              class="form-control"
                              id="last-name"
                              value="<?= $row['message'] ?>"
                              readonly
                            />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="last-name">Replay</label>
                            <input
                              type="text"
                              class="form-control"
                              id="last-name"
                              name="replay"
                              placeholder="Replay this Message.."
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="message_replay" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <?php
            //Message Alert
            if(isset($_SESSION['message-success'])){
              ?>
              <script>
                swal({
                  title: "<?= $_SESSION['message-success']; ?>",
                  text: "Thank you",
                  icon: "success",
                });
              </script>
              <?php
              unset($_SESSION['message-success']);
            }
            if(isset($_SESSION['message-error'])){
              ?>
              <script>
                swal({
                  title: "<?= $_SESSION['message-error']; ?>",
                  text: "Please Try Again",
                  icon: "error",
                });
              </script>
              <?php
              unset($_SESSION['message-error']);
            }
          ?>
          <?php
          require ('footer.php');
          ?>
