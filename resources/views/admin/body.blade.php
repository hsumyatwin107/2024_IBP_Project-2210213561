<div class="main-panel">
  <div class="content-wrapper">

    <!-- Upgrade Card -->
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
          <div class="card-body py-0 px-0 px-sm-3">
            <div class="row align-items-center">
              <div class="col-4 col-sm-3 col-xl-2">
                <img src="admin/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="Upgrade">
              </div>
              <div class="col-5 col-sm-7 col-xl-8 p-0">
                <h4 class="mb-1 mb-sm-0">Need more features?</h4>
                <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with advanced scholarship tools!</p>
              </div>
              <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row">
      <!-- Applications Received -->
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">1,245</h3>
                  <p class="text-success ml-2 mb-0 font-weight-medium">+5.2%</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success">
                  <span class="mdi mdi-account-multiple icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Applications Received</h6>
          </div>
        </div>
      </div>

      <!-- Scholarships Approved -->
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">732</h3>
                  <p class="text-success ml-2 mb-0 font-weight-medium">+8.7%</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success">
                  <span class="mdi mdi-school icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Scholarships Approved</h6>
          </div>
        </div>
      </div>

      <!-- Applications Pending -->
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">413</h3>
                  <p class="text-warning ml-2 mb-0 font-weight-medium">-1.8%</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-warning">
                  <span class="mdi mdi-timer-sand icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Applications Pending</h6>
          </div>
        </div>
      </div>

      <!-- Scholarships Rejected -->
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">100</h3>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">-0.5%</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-danger">
                  <span class="mdi mdi-close-circle icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Scholarships Rejected</h6>
          </div>
        </div>
      </div>
    </div>

    <!-- Transaction History and Open Projects -->
    <div class="row">
      <!-- Recent Applications -->
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recent Applications</h4>
            <canvas id="application-history" class="transaction-chart"></canvas>

            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1">Application from: Ahmed K.</h6>
                <p class="text-muted mb-0">18 May 2025, 10:22 AM</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <h6 class="font-weight-bold mb-0">Under Review</h6>
              </div>
            </div>

            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1">Application from: Leyla S.</h6>
                <p class="text-muted mb-0">17 May 2025, 04:45 PM</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <h6 class="font-weight-bold mb-0">Approved</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Ongoing Scholarship Projects -->
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title mb-1">Ongoing Scholarship Projects</h4>
              <p class="text-muted mb-1">Current status overview</p>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="preview-list">

                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-primary">
                        <i class="mdi mdi-file-document"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">Erasmus Turkey Scholarship</h6>
                        <p class="text-muted mb-0">30 active beneficiaries</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">Last updated: 3 days ago</p>
                        <p class="text-muted mb-0">5 pending applications</p>
                      </div>
                    </div>
                  </div>

                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-school"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">Graduate Research Grants</h6>
                        <p class="text-muted mb-0">20 ongoing research projects</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">Last updated: 5 days ago</p>
                        <p class="text-muted mb-0">10 pending reviews</p>
                      </div>
                    </div>
                  </div>

                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="mdi mdi-timer-sand"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">Undergraduate Support</h6>
                        <p class="text-muted mb-0">Funding for 45 students</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">Last updated: Yesterday</p>
                        <p class="text-muted mb-0">7 new applications</p>
                      </div>
                    </div>
                  </div>

                  <div class="preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-danger">
                        <i class="mdi mdi-alert-circle"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">Scholarship Appeals</h6>
                        <p class="text-muted mb-0">12 unresolved cases</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">Last updated: 2 days ago</p>
                        <p class="text-muted mb-0">Review pending</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
