<div class="row">
  <!-- Start content -->
  <div class="col-lg-12 col-sm-12">



    <div class="text-right mb-2">
      <!-- Small modal -->
      <button
        type="button"
        class="btn btn-primary waves-effect waves-light"
        data-toggle="modal"
        data-animation="bounce"
        data-target=".bs-example-modal-center">
        Order Now
      </button>
    </div>
    <div
      class="modal fade bs-example-modal-center"
      tabindex="-1"
      role="dialog"
      aria-labelledby="mySmallModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLabel">
              Desiel Monitoring System
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">



            <form class="form-horizontal"><label class="col-sm-2 control-label p-0" for="example-input-small">Small</label>
              <div class="form-group row">
                <div class="col-sm-12"><input type="text" id="example-input-small" name="example-input-small" class="form-control form-control-sm" placeholder=".input-sm"></div>
               
              </div>
            </form>




          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="card">
      <div class="card-body table-responsive">
        <div class>
          <table
            id="datatable2"
            class="table dt-responsive nowrap"
            style=" border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Driver</th>
                <th>Plate #</th>
                <th>Distination</th>
                <th>Tracking</th>
                <th>Tracking #</th>
                <th>Status</th>
              </tr>
            </thead>


            <tbody>
              <?php
              // Dummy delivery/tracking data
              $data = [
                ["2025-10-01", "08:30 AM", "John Doe", "ABC-1234", "Manila", "Route", "TRK001", "In Transit",],
                ["2025-10-01", "08:30 AM", "John Doe", "ABC-1234", "Manila", "Trunking", "TRK001", "delivered",],
                ["2025-10-01", "08:30 AM", "John Doe", "ABC-1234", "Manila", "Houling", "TRK001", "delivered",],
                ["2025-10-01", "08:30 AM", "John Doe", "ABC-1234", "Manila", "Ncs Delevery", "TRK001", "delivered",],
              ];
              // Function to assign Zoogler badge class
              function getStatusBadge($status)
              {
                $statusLower = strtolower(trim($status));
                switch ($statusLower) {
                  case 'in transit':
                    $badgeClass = "badge badge-boxed badge-soft-info";
                    break;
                  case 'delivered':
                    $badgeClass = "badge badge-boxed badge-soft-success";
                    break;
                  case 'pending':
                    $badgeClass = "badge badge-boxed badge-soft-pink";
                    break;
                  default:
                    $badgeClass = "badge badge-boxed badge-soft-primary";
                    break;
                }
                return '<span class="' . $badgeClass . '">' . htmlspecialchars($status) . '</span>';
              }
              ?>
              <?php foreach ($data as $row): ?>
                <tr>
                  <td><?= $row[0] ?></td>
                  <td><?= $row[1] ?></td>
                  <td><?= $row[2] ?></td>
                  <td><?= $row[3] ?></td>
                  <td><?= $row[4] ?></td>
                  <td><?= $row[5] ?></td>
                  <td><?= $row[6] ?></td>
                  <td><?= getStatusBadge($row[7]) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>


          </table>
        </div>
      </div>
    </div>
  </div>




  <!-- End content -->
</div>