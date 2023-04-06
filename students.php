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
                    <h3 class="font-weight-bold">Students</h3>
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
                    <div class="d-flex justify-content-between">
                      <a class="btn btn-primary mb-3" href="add_student.php"
                        >Add Student</a
                      >
                      <div class="row mb-3">
                        <form class="d-flex justify-content-end">
                          <a class="btn btn-primary mx-3" href="">Print</a>
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
                                <th>Session</th>
                                <th>Dipartment</th>
                                <th>Company</th>
                                <th>Status</th>
                                <th>Added On</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sl = 1;
                              $result = mysqli_query($con, "SELECT * FROM `students`");
                              while($row=mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                  <td><?= $sl ?></td>
                                  <td><?= ucwords($row['fname'].' '.$row['lname']) ?></td>
                                  <td><?= $row['roll'] ?></td>
                                  <td><?= $row['registration'] ?></td>
                                  <td><?= $row['session'] ?></td>
                                  <td><?= $row['department'] ?></td>
                                  <td><?= $row['company'] ?></td>
                                  <td>
                                    <?php
                                      if($row['status'] == 1){
                                        ?>
                                        <a class="" href="status_active?id=<?= base64_encode($row['id']) ?>"><label class="badge badge-success">Active</label></a>
                                        <?php
                                      }else{
                                        ?>
                                        <a class="" href="status_active?id=<?= base64_encode($row['id']) ?>"><label class="badge badge-danger">Deactive</label></a>
                                        <?php
                                      }
                                    ?>
                                    
                                  </td>
                                  <td><?= date('d M Y', strtotime($row['datetime'])) ?></td>
                                  <td>
                                    <a class="text-info fs-5" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#department-<?= $row['id'] ?>"><i class='bx bx-edit'></i></a>
                                    <a class="text-danger fs-5 lh-1" onclick="return confirm('Are you sure to delete ?')" href="delete.php?department=<?= $row['id'] ?>"><i class='bx bx-trash' ></i></a>
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
          require ('footer.php');
          ?>
