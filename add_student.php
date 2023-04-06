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
                    <h3 class="font-weight-bold">Add Student</h3>
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
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="" method="POST">
                      <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="first-name"
                              name="first-name"
                              placeholder="First Name"
                            />
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="last-name"
                              name="last-name"
                              placeholder="Last Name"
                            />
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input
                              type="email"
                              class="form-control"
                              id="email"
                              name="email"
                              placeholder="Email"
                            />
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="department">Department</label>
                            <select
                              class="form-control"
                              id="department"
                              name="department"
                            >
                              <option>Computer</option>
                              <option>Civil</option>
                              <option>Electrical</option>
                              <option>Electronics</option>
                              <option>Mechanical</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-4">
                          <div class="form-group">
                            <label for="roll">Roll</label>
                            <input
                              type="number"
                              class="form-control"
                              id="roll"
                              name="roll"
                              placeholder="Roll"
                            />
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="registration">Registration</label>
                            <input
                              type="number"
                              class="form-control"
                              id="registration"
                              name="registration"
                              placeholder="Registration"
                            />
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="session">Session</label>
                            <select
                              class="form-control"
                              id="session"
                              name="session"
                            >
                              <option>2019-2020</option>
                              <option>2019-2020</option>
                              <option>2019-2020</option>
                              <option>2019-2020</option>
                              <option>2019-2020</option>
                              <option>2019-2020</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="phone-number">Phone Number</label>
                            <input
                              type="number"
                              class="form-control"
                              id="phone-number"
                              name="phone"
                              placeholder="Phone Number"
                            />
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input
                              type="text"
                              class="form-control"
                              id="password"
                              name="password"
                              placeholder="Password"
                              value="123456"
                            />
                          </div>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">
                        Submit
                      </button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <?php
          require ('footer.php');
          ?>