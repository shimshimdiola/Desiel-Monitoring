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
                Modal title
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
              <p>
                Cras mattis consectetur purus sit amet
                fermentum. Cras justo odio, dapibus ac
                facilisis in, egestas eget quam. Morbi leo
                risus, porta ac consectetur ac, vestibulum
                at eros.
              </p>
              <p>
                Praesent commodo cursus magna, vel
                scelerisque nisl consectetur et. Vivamus
                sagittis lacus vel augue laoreet rutrum
                faucibus dolor auctor.
              </p>
              <p>
                Aenean lacinia bibendum nulla sed
                consectetur. Praesent commodo cursus magna,
                vel scelerisque nisl consectetur et. Donec
                sed odio dui. Donec ullamcorper nulla non
                metus auctor fringilla.
              </p>
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
                <th>Tracking #</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Dummy delivery/tracking data
              $data = [
                ["2025-10-01", "08:30 AM", "John Doe", "ABC-1234", "Manila", "TRK001"],
                ["2025-10-02", "09:45 AM", "Mark Reyes", "XYZ-5678", "Cebu", "TRK002"],
                ["2025-10-03", "02:10 PM", "Alex Cruz", "KLM-9101", "Davao", "TRK003"],
                ["2025-10-04", "11:25 AM", "Chris Tan", "DEF-2345", "Baguio", "TRK004"],
                ["2025-10-05", "07:50 AM", "Ella Santos", "GHI-6789", "Iloilo", "TRK005"],
                ["2025-10-06", "03:40 PM", "James Lee", "JKL-4321", "Batangas", "TRK006"],
                ["2025-10-07", "06:20 AM", "Maria Lopez", "MNO-8765", "Zamboanga", "TRK007"],
                ["2025-10-08", "01:15 PM", "Liam Dela Cruz", "PQR-5432", "Taguig", "TRK008"],
                ["2025-10-09", "10:30 AM", "Sophia Garcia", "STU-1111", "Quezon City", "TRK009"],
                ["2025-10-10", "04:55 PM", "Noah Fernandez", "VWX-2222", "Pasig", "TRK010"]
              ];
              ?>
              <?php foreach ($data as $row): ?>
                <tr>
                  <td><?= $row[0] ?></td>
                  <td><?= $row[1] ?></td>
                  <td><?= $row[2] ?></td>
                  <td><?= $row[3] ?></td>
                  <td><?= $row[4] ?></td>
                  <td><?= $row[5] ?></td>
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