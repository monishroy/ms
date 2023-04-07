        <?php
          $title = 'Categories';
          require ('header.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Categories</h3>
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
              <div class="col-md-4">
                <div class="card mb-3">
                  <div class="card-body">
                    <h4 class="card-title">Add Department</h4>
                    <form class="forms-sample" action="data-insert.php" method="POST">
                      <div class="row">
                        <div class="col-12">
                          <?php
                            if(isset($_SESSION['department-success'])){
                              ?>
                              <div class="alert alert-success" role="alert">
                                <?= $_SESSION['department-success']; ?>
                              </div>
                              <?php
                              unset($_SESSION['department-success']);
                            }
                            if(isset($_SESSION['department-error'])){
                              ?>
                              <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['department-error']; ?>
                              </div>
                              <?php
                              unset($_SESSION['department-error']);
                            }
                          ?>
                          <div class="form-group">
                            <label for="department_name">Department Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="department_name"
                              name="department_name"
                              placeholder="Department Name"
                              required
                            />
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="department" class="btn btn-primary mr-2">
                        Submit
                      </button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                    <div class="table-responsive mt-3">
                      <table class="display expandable-table" style="width: 100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          $result = mysqli_query($con, "SELECT * FROM `department`");
                          while($row=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                              <td><?= $i ?></td>
                              <td><?= $row['name'] ?></td>
                              <td>
                                <a class="text-info fs-5" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#department-<?= $row['id'] ?>"><i class='bx bx-edit'></i></a>
                                <a class="text-danger fs-5 lh-1" onclick="return confirm('Are you sure to delete ?')" href="delete.php?department=<?= $row['id'] ?>"><i class='bx bx-trash' ></i></a>
                              </td>
                            </tr>
                            <?php
                            $i++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-3">
                  <div class="card-body">
                    <h4 class="card-title">Add Session</h4>
                    <form class="forms-sample" action="data-insert.php" method="POST">
                      <div class="row">
                        <div class="col-12">
                          <?php
                            if(isset($_SESSION['session-success'])){
                              ?>
                              <div class="alert alert-success" role="alert">
                                <?= $_SESSION['session-success']; ?>
                              </div>
                              <?php
                              unset($_SESSION['session-success']);
                            }
                            if(isset($_SESSION['session-error'])){
                              ?>
                              <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['session-error']; ?>
                              </div>
                              <?php
                              unset($_SESSION['session-error']);
                            }
                          ?>
                          <div class="form-group">
                            <label for="session_name">Session Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="session_name"
                              name="session_name"
                              placeholder="Session Name"
                              required
                            />
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="session" class="btn btn-primary mr-2">
                        Submit
                      </button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                    <div class="table-responsive mt-3">
                      <table class="display expandable-table" style="width: 100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          $result = mysqli_query($con, "SELECT * FROM `session`");
                          while($row=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                              <td><?= $i ?></td>
                              <td><?= $row['name'] ?></td>
                              <td>
                                <a class="text-info fs-5" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#session-<?= $row['id'] ?>"><i class='bx bx-edit'></i></a>
                                <a class="text-danger fs-5 lh-1" onclick="return confirm('Are you sure to delete ?')" href="delete.php?session=<?= $row['id'] ?>"><i class='bx bx-trash' ></i></a>
                              </td>
                            </tr>
                            <?php
                            $i++;
                          }
                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Company</h4>
                    <form class="forms-sample" action="data-insert.php" method="POST">
                      <div class="row">
                        <div class="col-12">
                          <?php
                            if(isset($_SESSION['company-success'])){
                              ?>
                              <div class="alert alert-success" role="alert">
                                <?= $_SESSION['company-success']; ?>
                              </div>
                              <?php
                              unset($_SESSION['company-success']);
                            }
                            if(isset($_SESSION['company-error'])){
                              ?>
                              <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['company-error']; ?>
                              </div>
                              <?php
                              unset($_SESSION['company-error']);
                            }
                          ?>
                          <div class="form-group">
                            <label for="company-name">Company Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="company-name"
                              name="company_name"
                              placeholder="Company Name"
                              required
                            />
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="company" class="btn btn-primary mr-2">
                        Submit
                      </button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                    <div class="table-responsive mt-3">
                      <table class="display expandable-table" style="width: 100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          $result = mysqli_query($con, "SELECT * FROM `company`");
                          while($row=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                              <td><?= $i ?></td>
                              <td><?= $row['name'] ?></td>
                              
                              <td>
                                <a class="text-info fs-5" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#company-<?= $row['id'] ?>"><i class='bx bx-edit'></i></a>
                                <a class="text-danger fs-5 lh-1" onclick="return confirm('Are you sure to delete ?')" href="delete.php?company=<?= $row['id'] ?>"><i class='bx bx-trash' ></i></a>
                              </td>
                            </tr>
                            <?php
                            $i++;
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
          <!-- content-wrapper ends -->
          <?php
          $result = mysqli_query($con, "SELECT * FROM `department`");
          while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="modal fade" id="department-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="data_update.php" method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name" placeholder="Department Name" required="" value="<?= $row['name'] ?>">
                      </div>
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="update_department" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
          <?php
          $result = mysqli_query($con, "SELECT * FROM `session`");
          while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="modal fade" id="session-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Session</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="data_update.php" method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="session_name">Session Name</label>
                        <input type="text" class="form-control" id="session_name" name="session_name" placeholder="Session Name" required="" value="<?= $row['name'] ?>">
                      </div>
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="update_session" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
          <?php
          $result = mysqli_query($con, "SELECT * FROM `company`");
          while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="modal fade" id="company-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="data_update.php" method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required="" value="<?= $row['name'] ?>">
                      </div>
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="update_company" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
          <?php
          require ('footer.php');
          ?>