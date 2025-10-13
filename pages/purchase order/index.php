<style>
  /* Receipt Styling */
  .invoice-container {
    width: 320px;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    padding: 18px;
    box-sizing: border-box;
    font-family: "Courier New", Courier, monospace;
    color: #222;
    border-top: 5px solid #1a73e8;
    margin: 20px auto;
  }

  .invoice-header {
    text-align: center;
    border-bottom: 1px dashed #ccc;
    padding-bottom: 8px;
    margin-bottom: 10px;
  }

  .invoice-header h1 {
    font-size: 18px;
    margin: 5px 0;
    letter-spacing: 0.5px;
    color: #1a73e8;
  }

  .invoice-header p {
    margin: 0;
    font-size: 11px;
    color: #555;
  }

  .invoice-details {
    font-size: 13px;
    line-height: 1.5;
  }

  .invoice-details p {
    margin: 6px 0;
    display: flex;
    justify-content: space-between;
  }

  .qr-section {
    text-align: center;
    border-top: 1px dashed #ccc;
    margin-top: 15px;
    padding-top: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    /* <-- Centers everything inside */
  }

  .qr-section p {
    font-size: 12px;
    margin-bottom: 8px;
    font-weight: bold;
  }

  #qrcode {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 8px;
    background: #fff;
    border: 1px dashed #ccc;
    border-radius: 5px;
    min-width: 120px;
    min-height: 120px;
  }


  .print-btn {
    display: block;
    width: 100%;
    background: #1a73e8;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 8px;
    font-size: 14px;
    margin-top: 10px;
    cursor: pointer;
  }

  @media print {
    body * {
      visibility: hidden;
    }

    #receipt,
    #receipt * {
      visibility: visible;
    }

    #receipt {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      box-shadow: none;
    }

    .print-btn {
      display: none;
    }
  }
</style>
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
            <h5 class="modal-title" id="exampleModalLabel">
              Diesel Monitoring System
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
            <form class="form-horizontal" id="refuelForm" method="POST">
              <!-- Driver -->
              <label class="col-sm-2 control-label p-0">Driver</label>
              <div class="form-group row">
                <div class="col-sm-12">
                  <?php
                  $names = ["John Doe", "Jane Smith", "Alice Johnson", "Bob Brown", "Charlie Wilson"];
                  ?>
                  <select class="select2 form-control mb-3 custom-select" name="driver" id="driver" required>
                    <option value="">Select Driver</option>
                    <?php foreach ($names as $name) { ?>
                      <option value="<?php echo htmlspecialchars($name); ?>"><?php echo htmlspecialchars($name); ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <!-- Plate -->
              <label class="col-sm-2 control-label p-0">Plate #</label>
              <div class="form-group row">
                <div class="col-sm-12">
                  <?php
                  $options = [];
                  for ($i = 1; $i <= 10; $i++) {
                    $plateNumber = 'XYZ ' . rand(1000, 9999);
                    $options[] = ['value' => $plateNumber, 'label' => $plateNumber];
                  }
                  ?>
                  <select class="select2 form-control mb-3 custom-select" name="plates" id="plates" required>
                    <option value="">Select Plate</option>
                    <?php foreach ($options as $option) { ?>
                      <option value="<?php echo htmlspecialchars($option['value']); ?>">
                        <?php echo htmlspecialchars($option['label']); ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <!-- Tracking -->
              <label class="col-sm-2 control-label p-0">Tracking</label>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="text" id="Tracking" name="tracking" class="form-control form-control-sm" placeholder="Enter Tracking Info" required />
                </div>
              </div>
              <!-- Receipt (Hidden by default) in qr.js  -->
              <div class="invoice-container mt-4" id="receipt" style="display:none;">
                <br>
                <div class="invoice-header">
                  <h1>Refuel Tracking Slip</h1>
                  <p>Official Record</p>
                </div>
                <div class="invoice-details">
                  <p><strong>Issued On:</strong> <span id="issueDate"></span></p>
                  <p><strong>Driver:</strong> <span id="driverDisplay"></span></p>
                  <p><strong>Plate #:</strong> <span id="plateDisplay"></span></p>
                  <p><strong>Tracking:</strong> <span id="trackingDisplay"></span></p>
                  <p><strong>Type:</strong> Diesel Refuel</p>
                  <p><strong>Tracking No.:</strong> <span id="trackingNumberDisplay"></span></p>
                </div>
                <div class="qr-section">
                  <p>Scan for Quick Access:</p>
                  <div id="qrcode"></div>
                </div>
                <button class="print-btn" onclick="printReceipt()">Print Receipt</button>
              </div>
              <div class="modal-footer">
                <button type="button" id="proceedBtn" class="btn btn-primary">Placed & Generate Invoice</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Dummy delivery/tracking data
              $data = [
                ["2025-10-01", "08:30 AM", "John Doe", "ABC-1234", "Manila", "Route", "TRK001", "In Transit", 1],
                ["2025-10-01", "08:30 AM", "John Doe", "ABC-1234", "Manila", "Trunking", "TRK001", "delivered", 2],
                ["2025-10-01", "08:30 AM", "John Doe", "ABC-1234", "Manila", "Houling", "TRK001", "delivered", 3],
                ["2025-10-01", "08:30 AM", "John Doe", "ABC-1234", "Manila", "Ncs Delevery", "TRK001", "delivered", 4],
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
                  <td>
                    <a type=" button" class="btn btn-sm btn-success" href="<?= $row[8] ?>"><i class="fas fa-eye"></i></a>
                    <a type=" button" class="btn btn-sm btn-danger" href="<?= $row[8] ?>"><i class="fas fa-trash-alt"></i></a>
                  </td>
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