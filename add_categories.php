        <?php
          $title = 'Add Student';
          require ('header.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Add Catagories</h3>
                  </div>
                  <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button
                          class="btn btn-sm btn-light bg-white"
                          type="button"
                        >
                          <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
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
                          <div class="form-group">
                            <label for="department_name">Department Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="department_name"
                              name="department_name"
                              placeholder="Department Name"
                            />
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="department" class="btn btn-primary mr-2">
                        Submit
                      </button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                    <div class="table-responsive mt-3">
                      <table class="display expandable-table" style="width: 100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Computer</td>
                            <td>
                              <a class="cursor-pointer" href=""><label class="badge badge-success">Active</label></a>
                            </td>
                            <td>
                              <a class="text-info fs-5" href=""><i class='bx bx-edit'></i></a>
                              <a class="text-danger fs-5 lh-1" href=""><i class='bx bx-trash' ></i></a>
                            </td>
                          </tr>
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
                          <div class="form-group">
                            <label for="session_name">Session Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="session_name"
                              name="session_name"
                              placeholder="Session Name"
                            />
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="session" class="btn btn-primary mr-2">
                        Submit
                      </button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                    <div class="table-responsive mt-3">
                      <table class="display expandable-table" style="width: 100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>2019-20</td>
                            <td><label class="badge badge-success">Active</label></td>
                            <td>
                              <a class="text-info fs-5" href=""><i class='bx bx-edit'></i></a>
                              <a class="text-danger fs-5 lh-1" href=""><i class='bx bx-trash' ></i></a>
                            </td>
                          </tr>
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
                          <div class="form-group">
                            <label for="company-name">Company Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="company-name"
                              name="company_name"
                              placeholder="Company Name"
                            />
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="company" class="btn btn-primary mr-2">
                        Submit
                      </button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                    <div class="table-responsive mt-3">
                      <table class="display expandable-table" style="width: 100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>M Notion</td>
                            <td><label class="badge badge-success">Active</label></td>
                            <td>
                              <a class="text-info fs-5" href=""><i class='bx bx-edit'></i></a>
                              <a class="text-danger fs-5 lh-1" href=""><i class='bx bx-trash' ></i></a>
                            </td>
                          </tr>
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
          require ('footer.php');
          ?>