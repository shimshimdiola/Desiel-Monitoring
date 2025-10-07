<!-- Fuel Monitoring Dashboard (Zoogler Template Style) -->
<div class="row">
  <!-- Start Content -->
  <div class="col-lg-9">
    <div class="row">
      <!-- Total Fuel Used -->
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="icon-contain">
              <div class="row">
                <div class="col-2 align-self-center">
                  <i class="fas fa-gas-pump text-gradient-primary"></i>
                </div>
                <div class="col-10 text-right">
                  <h5 class="mt-0 mb-1">1,245 L</h5>
                  <p class="mb-0 font-12 text-muted">Total Fuel Used</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Refuels This Month -->
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="icon-contain">
              <div class="row">
                <div class="col-2 align-self-center">
                  <i class="fas fa-truck text-gradient-success"></i>
                </div>
                <div class="col-10 text-right">
                  <h5 class="mt-0 mb-1">58</h5>
                  <p class="mb-0 font-12 text-muted">Refuels This Month</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Fuel Cost -->
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="icon-contain">
              <div class="row">
                <div class="col-2 align-self-center">
                  <i class="fas fa-coins text-gradient-danger"></i>
                </div>
                <div class="col-10 text-right">
                  <h5 class="mt-0 mb-1">₱185,700</h5>
                  <p class="mb-0 font-12 text-muted">Fuel Expenses</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Weekly/Monthly Fuel Chart -->
    <div class="card">
      <div class="card-body">
        <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
          <label class="btn btn-primary btn-sm active" id="thisWeekBtn">
            <input type="radio" name="options" checked /> This Week
          </label>
          <label class="btn btn-primary btn-sm" id="lastMonthBtn">
            <input type="radio" name="options" /> Last Month
          </label>
        </div>
        <h5 class="header-title mb-4 mt-0">Fuel Consumption Overview</h5>
        <canvas id="fuelChart" height="276" style="width: 100%;"></canvas>
      </div>
    </div>
  </div>
  <!-- Right Side Panel -->
  <div class="col-lg-3">
    <!-- Recent Activities -->
    <div class="card">
      <div class="card-body">
        <h5 class="header-title mb-4 mt-0">Recent Activities</h5>
        <ul class="list-unstyled activity-feed mb-0">
          <li class="activity-item">
            <i class="fas fa-gas-pump text-primary"></i>
            <span>Refueled 50L at Shell Station</span>
            <small class="text-muted d-block">2 hrs ago</small>
          </li>
          <li class="activity-item mt-3">
            <i class="fas fa-truck text-success"></i>
            <span>Trip Completed - 230km</span>
            <small class="text-muted d-block">5 hrs ago</small>
          </li>
          <li class="activity-item mt-3">
            <i class="fas fa-tools text-warning"></i>
            <span>Maintenance Check Scheduled</span>
            <small class="text-muted d-block">Yesterday</small>
          </li>
        </ul>
        <a href="#" class="btn btn-primary btn-sm btn-block mt-3 text-white">View All</a>
      </div>
    </div>
  </div>
</div>
