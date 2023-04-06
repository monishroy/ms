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
                                <th>Job Status</th>
                                <th>Added On</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>Monish Roy</td>
                                <td>407401</td>
                                <td>1502002992</td>
                                <td>2019-20</td>
                                <td>Computer</td>
                                <td>
                                  <label class="badge badge-info">Joined</label>
                                </td>
                                <td>May 15, 2015</td>
                                <td>Edit</td>
                              </tr>
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
