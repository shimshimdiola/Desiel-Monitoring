<div class="row">
  <!-- Start content -->
  <div class="col-lg-12 col-sm-12">

    <div class="card">
      <div class="card-body table-responsive">
        <div class>
          <table
            id="datatable2"
            class="table dt-responsive nowrap"
            style=" border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th>Tracking #</th>
                <th>Driver</th>
                <th>Date</th>
                <th>Time</th>
                <th>Distination</th>
                <th>Litter</th>
                <th>Price</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Dummy transport/fuel data
              $data = [
                ["TRK001", "John Doe", "2025-10-01", "08:30 AM", "Manila", 45, 62.50, 2812.50],
                ["TRK002", "Mark Reyes", "2025-10-02", "09:45 AM", "Cebu", 50, 61.75, 3087.50],
                ["TRK003", "Alex Cruz", "2025-10-03", "02:10 PM", "Davao", 38, 63.00, 2394.00],
                ["TRK004", "Chris Tan", "2025-10-04", "11:25 AM", "Baguio", 42, 62.25, 2614.50],
                ["TRK005", "Ella Santos", "2025-10-05", "07:50 AM", "Iloilo", 40, 61.50, 2460.00],
                ["TRK006", "James Lee", "2025-10-06", "03:40 PM", "Batangas", 55, 62.10, 3415.50],
                ["TRK007", "Maria Lopez", "2025-10-07", "06:20 AM", "Zamboanga", 47, 63.25, 2972.75],
                ["TRK008", "Liam Dela Cruz", "2025-10-08", "01:15 PM", "Taguig", 52, 61.95, 3221.40],
                ["TRK009", "Sophia Garcia", "2025-10-09", "10:30 AM", "Quezon City", 43, 62.80, 2690.40],
                ["TRK010", "Noah Fernandez", "2025-10-10", "04:55 PM", "Pasig", 49, 63.10, 3091.90]
              ];
              foreach ($data as $row): ?>
                <tr>
                  <td><?= $row[0] ?></td>
                  <td><?= $row[1] ?></td>
                  <td><?= $row[2] ?></td>
                  <td><?= $row[3] ?></td>
                  <td><?= $row[4] ?></td>
                  <td><?= $row[5] ?></td>
                  <td><?= number_format($row[6], 2) ?></td>
                  <td><?= number_format($row[7], 2) ?></td>
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