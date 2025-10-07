<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table
          id="datatable-buttons"
          class="table dt-responsive nowrap"
          style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th>Tracking #</th>
              <th>Driver</th>
              <th>Date</th>
              <th>Time</th>
              <th>Plate #</th>
              <th>Distination</th>
              <th>Litters</th>
              <th>Price</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Dummy delivery/tracking data (extended to 30 entries)
            $data = [
              ["TRK001", "John Doe", "2025-10-01", "08:30 AM", "ABC-1234", "Manila", 45, 62.50, 2812.50],
              ["TRK002", "Mark Reyes", "2025-10-02", "09:45 AM", "XYZ-5678", "Cebu", 50, 61.75, 3087.50],
              ["TRK003", "Alex Cruz", "2025-10-03", "02:10 PM", "KLM-9101", "Davao", 38, 63.00, 2394.00],
              ["TRK004", "Chris Tan", "2025-10-04", "11:25 AM", "DEF-2345", "Baguio", 42, 62.25, 2614.50],
              ["TRK005", "Ella Santos", "2025-10-05", "07:50 AM", "GHI-6789", "Iloilo", 40, 61.50, 2460.00],
              ["TRK006", "James Lee", "2025-10-06", "03:40 PM", "JKL-4321", "Batangas", 55, 62.10, 3415.50],
              ["TRK007", "Maria Lopez", "2025-10-07", "06:20 AM", "MNO-8765", "Zamboanga", 47, 63.25, 2972.75],
              ["TRK008", "Liam Dela Cruz", "2025-10-08", "01:15 PM", "PQR-5432", "Taguig", 52, 61.95, 3221.40],
              ["TRK009", "Sophia Garcia", "2025-10-09", "10:30 AM", "STU-1111", "Quezon City", 43, 62.80, 2690.40],
              ["TRK010", "Noah Fernandez", "2025-10-10", "04:55 PM", "VWX-2222", "Pasig", 49, 63.10, 3091.90],
              ["TRK011", "Olivia Reyes", "2025-10-11", "09:10 AM", "AAA-9876", "Cavite", 46, 61.60, 2833.60],
              ["TRK012", "Ethan Cruz", "2025-10-12", "02:40 PM", "BBB-8765", "Makati", 53, 62.20, 3296.60],
              ["TRK013", "Isabella Tan", "2025-10-13", "11:00 AM", "CCC-7654", "Pasay", 44, 63.00, 2772.00],
              ["TRK014", "Mason Garcia", "2025-10-14", "08:45 AM", "DDD-6543", "Mandaue", 50, 61.90, 3095.00],
              ["TRK015", "Ava Santos", "2025-10-15", "01:30 PM", "EEE-5432", "Bacolod", 41, 62.50, 2562.50],
              ["TRK016", "Jacob Flores", "2025-10-16", "07:15 AM", "FFF-4321", "Antipolo", 39, 63.40, 2472.60],
              ["TRK017", "Mia Castillo", "2025-10-17", "03:05 PM", "GGG-3210", "San Pablo", 48, 61.85, 2968.80],
              ["TRK018", "Lucas Ramos", "2025-10-18", "09:25 AM", "HHH-2109", "Calamba", 51, 62.75, 3200.25],
              ["TRK019", "Amelia Torres", "2025-10-19", "12:15 PM", "III-1098", "Lucena", 40, 63.00, 2520.00],
              ["TRK020", "Benjamin Perez", "2025-10-20", "05:45 PM", "JJJ-9087", "Cagayan", 45, 62.40, 2808.00],
              ["TRK021", "Charlotte Ramos", "2025-10-21", "08:00 AM", "KKK-8076", "Tagaytay", 43, 61.95, 2663.85],
              ["TRK022", "Henry Gutierrez", "2025-10-22", "10:25 AM", "LLL-7065", "Bataan", 50, 63.25, 3162.50],
              ["TRK023", "Ella Dizon", "2025-10-23", "01:40 PM", "MMM-6054", "Tarlac", 47, 62.50, 2937.50],
              ["TRK024", "Liam Navarro", "2025-10-24", "04:10 PM", "NNN-5043", "Bulacan", 56, 61.70, 3455.20],
              ["TRK025", "Grace Rivera", "2025-10-25", "06:35 AM", "OOO-4032", "Subic", 42, 63.10, 2640.20],
              ["TRK026", "Elijah Santos", "2025-10-26", "02:00 PM", "PPP-3021", "Clark", 53, 62.50, 3312.50],
              ["TRK027", "Scarlett Cruz", "2025-10-27", "09:55 AM", "QQQ-2010", "La Union", 46, 63.40, 2916.40],
              ["TRK028", "William Lopez", "2025-10-28", "12:45 PM", "RRR-1009", "Pampanga", 41, 61.90, 2537.90],
              ["TRK029", "Harper Gomez", "2025-10-29", "03:20 PM", "SSS-9998", "Laguna", 49, 62.60, 3067.40],
              ["TRK030", "Daniel Ramos", "2025-10-30", "08:10 AM", "TTT-8887", "Nueva Ecija", 52, 63.20, 3286.40],
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
                <td><?= $row[6] ?></td>
                <td><?= number_format($row[7], 2) ?></td>
                <td><?= number_format($row[8], 2) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
