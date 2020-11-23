@extends('layouts.admin')

@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-12">
              <h5 class="h2 text-white d-inline-block mb-0">Orders</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <div class="row">
        <div class="col-xl-7">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Payment History</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Month</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Installment</th>
                    <th scope="col">Status</th>
                    <th class="text-right" scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">January</th>
                    <td>10-03-2020</td>
                    <td>14,583/-</td>
                    <td><i class="fas fa-arrow-up text-success mr-3"></i> pending</td>
                    <td align="right"><button type="button" class="btn btn-sm btn-success">Approved</button>
                      <button type="button" class="btn btn-sm btn-warning">Reject</button></td>
                  </tr>
                  <tr>
                    <th scope="row">January</th>
                    <td>10-03-2020</td>
                    <td>14,583/-</td>
                    <td><i class="fas fa-arrow-up text-success mr-3"></i> pending</td>
                    <td align="right"><button type="button" class="btn btn-sm btn-success">Approved</button>
                      <button type="button" class="btn btn-sm btn-warning">Reject</button></td>
                  </tr>
                  <tr>
                    <th scope="row">January</th>
                    <td>10-03-2020</td>
                    <td>14,583/-</td>
                    <td><i class="fas fa-arrow-up text-success mr-3"></i> pending</td>
                    <td align="right"><button type="button" class="btn btn-sm btn-success">Approved</button>
                      <button type="button" class="btn btn-sm btn-warning">Reject</button></td>
                  </tr>
                  <tr>
                    <th scope="row">January</th>
                    <td>10-03-2020</td>
                    <td>14,583/-</td>
                    <td><i class="fas fa-arrow-up text-success mr-3"></i> pending</td>
                    <td align="right"><button type="button" class="btn btn-sm btn-success">Approved</button>
                      <button type="button" class="btn btn-sm btn-warning">Reject</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-5">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Approval</h3>
                </div>
              </div>
            </div>
            asdasdasd
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Customer Details </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input disabled type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input disabled type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Telephone</label>
                        <input disabled type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input disabled type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input disabled id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <input disabled type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input disabled type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">About Me</label>
                    <textarea disabled rows="4" class="form-control" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">QKP TECH PVT LTD</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>

@endsection