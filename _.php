<?php

/**
 * Refuel ID Entry Page (Scan or Manual Input)
 */
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/db/connection.php';

$trackingNumber = '';
$login_error = '';

// ✅ Handle form submission (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $trackingNumber = trim($_POST['tracking_number'] ?? '');

  if (empty($trackingNumber)) {
    // Redirect with error (avoids form resubmission)
    header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode("Please enter your Refuel ID / Tracking Number to proceed."));
    exit;
  } elseif (strlen($trackingNumber) < 10) {
    header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode("Invalid Refuel ID. Please check the number on your card or receipt."));
    exit;
  } else {
    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `purchase_order` WHERE tracking_number = ? AND ltrs = 0 LIMIT 1");
    if ($stmt === false) {
      header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode("Database error. Please try again later."));
      exit;
    }

    $stmt->bind_param('s', $trackingNumber);
    if ($stmt->execute()) {
      $result = $stmt->get_result();
      if ($result->num_rows == 0) {
        // Redirect with error
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode("No tracking number found."));
        exit;
      } else {
        // Redirect to driver page
        $row = $result->fetch_assoc();
        $redirect_url = BASE_URL . "pages/driver/index.php?" . http_build_query([
          'order_id' => $row['order_id'],
          'tracking_number' => $row['tracking_number'],
          'driver' => $row['driver'],
          'plate_number' => $row['plate_number'],
          'time_stamp' => $row['time_stamp'],
          'date_stamp' => $row['date_stamp'],
          'delevery' => $row['delevery']
        ]);
        header("Location: " . $redirect_url);
        exit;
      }
    } else {
      header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode("Execution error. Please try again later."));
      exit;
    }
  }
}

// ✅ Capture error messages from GET after redirect
if (isset($_GET['error'])) {
  $login_error = htmlspecialchars($_GET['error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Refuel Log: Scan or Enter ID</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/html5-qrcode"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f3f4f6;
    }

    #reader {
      width: 100%;
      aspect-ratio: 1/1;
      margin: 20px auto;
      border: 4px solid #ef4444;
      border-radius: 12px;
      background: #000;
      overflow: hidden;
      display: none;
    }
  </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4 bg-gray-100">

  <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-xl w-full max-w-lg border border-gray-200">

    <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b-2 border-red-500 pb-2 flex items-center justify-center">
      <span class="mr-2 text-3xl">⛽</span> Refuel ID Entry
    </h2>

    <p class="text-sm text-center text-gray-600 mb-6">
      Scan the Refuel QR code or manually enter the tracking number.
    </p>

    <div id="scanner-area" class="text-center">
      <div id="reader" class="mx-auto max-w-sm"></div>

      <button class="btn w-full sm:w-auto text-xl bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200 shadow-md shadow-red-300" id="open-camera">
        📷 Start Scan
      </button>
      <button class="btn mt-3 sm:mt-0 sm:ml-4 w-full sm:w-auto bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200" id="stop-camera" style="display: none;">
        Stop Camera
      </button>

      <p id="result" class="mt-5 p-3 text-sm font-medium text-gray-700 bg-gray-50 border border-gray-300 rounded-lg">
        Waiting for scan...
      </p>
    </div>

    <div class="mt-8 pt-4 border-t border-dashed border-gray-300 login-form-area">
      <center>
        <p class="mb-5 text-gray-500 text-sm font-semibold">— OR ENTER MANUALLY —</p>
      </center>

      <form action="" method="POST">
        <?php if ($login_error): ?>
          <div class="message p-3 mb-4 rounded-lg border bg-red-100 text-red-700 border-red-400">
            <?= $login_error ?>
          </div>
        <?php endif; ?>

        <div class="input-group mb-4">
          <input type="text" id="tracking_number" name="tracking_number"
            placeholder="Enter Refuel ID / Tracking Number"
            value="<?= htmlspecialchars($trackingNumber); ?>"
            class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-150"
            required />
        </div>

        <div class="input-group">
          <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-md shadow-blue-300">
            Proceed to Log
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    const resultContainer = document.getElementById("result");
    const openCameraBtn = document.getElementById("open-camera");
    const stopCameraBtn = document.getElementById("stop-camera");
    const readerDiv = document.getElementById("reader");
    const trackingInput = document.getElementById("tracking_number");
    const html5QrCode = new Html5Qrcode("reader");

    function onScanSuccess(decodedText) {
      resultContainer.innerText = "✅ QR Code Scanned: " + decodedText + ". Loading data...";
      trackingInput.value = decodedText;

      html5QrCode.stop().then(() => {
        readerDiv.style.display = "none";
        openCameraBtn.style.display = "inline-block";
        stopCameraBtn.style.display = "none";
        openCameraBtn.innerText = "📷 Start Scan";
        document.querySelector('form').submit();
      }).catch(err => console.error("Error stopping scanner:", err));
    }

    function onScanError() {}

    openCameraBtn.addEventListener("click", () => {
      openCameraBtn.innerText = "Requesting Camera...";
      openCameraBtn.disabled = true;

      navigator.mediaDevices.getUserMedia({
          video: {
            facingMode: "environment"
          }
        })
        .then(() => {
          readerDiv.style.display = "block";
          resultContainer.innerText = "Scanning for QR code...";
          openCameraBtn.style.display = "none";
          stopCameraBtn.style.display = "inline-block";
          openCameraBtn.disabled = false;

          html5QrCode.start({
              facingMode: "environment"
            }, {
              fps: 60,
              qrbox: 270
            }, onScanSuccess, onScanError)
            .catch(err => {
              alert("Error starting scanner: " + err);
              readerDiv.style.display = "none";
              openCameraBtn.innerText = "📷 Start Scan";
              openCameraBtn.style.display = "inline-block";
              stopCameraBtn.style.display = "none";
              openCameraBtn.disabled = false;
            });
        })
        .catch(err => {
          alert("Please allow camera access to scan QR codes.");
          openCameraBtn.innerText = "📷 Start Scan";
          openCameraBtn.disabled = false;
        });
    });

    stopCameraBtn.addEventListener("click", () => {
      html5QrCode.stop().then(() => {
        readerDiv.style.display = "none";
        openCameraBtn.style.display = "inline-block";
        stopCameraBtn.style.display = "none";
        resultContainer.innerText = "Camera stopped.";
        openCameraBtn.innerText = "📷 Start Scan";
      }).catch(err => console.error("Error stopping camera:", err));
    });
  </script>
</body>

</html>