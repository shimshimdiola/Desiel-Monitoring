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


            <form class="form-horizontal" action="#" method="post">
              <label class="col-sm-2 control-label p-0" for="example-input-small">Driver</label>
              <div class="form-group row">
                <div class="col-sm-12">
                  <?php
                  // Sample list of names
                  $names = [
                    "John Doe",
                    "Jane Smith",
                    "Alice Johnson",
                    "Bob Brown",
                    "Charlie Wilson",
                    "David Lee",
                    "Eve White",
                    "Frank Black",
                    "Grace Green",
                    "Hannah Red",
                    // Add more names as needed
                  ];
                  $options = [];
                  foreach ($names as $name) {
                    $options[] = ['value' => $name, 'label' => $name];
                  }
                  // You can add more options as needed
                  ?>
                  <select
                    class="select2 form-control mb-3 custom-select"
                    style="width: 100%; height: 36px;" name="driver" required>
                    <option value="">John Doe</option>
                    <optgroup label="Drivers">
                      <?php foreach ($options as $option) { ?>
                        <option value="<?php echo htmlspecialchars($option['value']); ?>"><?php echo htmlspecialchars($option['label']); ?></option>
                      <?php } ?>
                    </optgroup>
                  </select>
                </div>
              </div>
              <label class="col-sm-2 control-label p-0" for="example-input-small">Plate #</label>
              <div class="form-group row">
                <div class="col-sm-12">
                  <!-- plate no. -->
                  <?php
                  $options = [];
                  for ($i = 1; $i <= 20; $i++) {
                    // Generate random four-digit numbers like "XYZ 1234"
                    $plateNumber = 'XYZ ' . rand(1000, 9999);
                    $options[] = ['value' => substr($plateNumber, strpos($plateNumber, ' ') + 1) ?: '', 'label' => $plateNumber];
                  }
                  ?>
                  <select
                    class="select2 form-control mb-3 custom-select"
                    style="width: 100%; height: 36px;" name="plates" required>
                    <option value="">XYZ 1234</option>
                    <optgroup label="Plates">
                      <?php foreach ($options as $option) { ?>
                        <option value="<?php echo htmlspecialchars($option['value']); ?>"><?php echo htmlspecialchars($option['label']); ?></option>
                      <?php } ?>
                    </optgroup>
                  </select>
                </div>
              </div>
              <label class="col-sm-2 control-label p-0" for="Tracking">Traking</label>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="text" id="Tracking" name="tracking" class="form-control form-control-sm" placeholder="Ncs Delevery" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">
                  Close
                </button>
                <button type="submit" class="btn btn-primary">
                  Proceed
                </button>
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