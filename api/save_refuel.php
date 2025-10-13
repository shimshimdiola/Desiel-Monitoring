<?php
include '../db/connection.php'; // or your DB connection file
// Set timezone
date_default_timezone_set('Asia/Manila');

// Get current date and time
$raw_time_stamp = date("Y-m-d\TH:i:s");
$time_stamp = date("h:i A", strtotime($raw_time_stamp));
$date_stamp = date("Y-m-d");

// Get form data safely
$driver = $_POST['driver'] ?? '';
$plate = $_POST['plate'] ?? '';
$trackingNumber = $_POST['trackingNumber'] ?? '';
echo $delivery = $_POST['tracking'] ?? ''; // Assuming you have a delivery field

// Prepare and insert data
$stmt = $conn->prepare("
    INSERT INTO `purchase_order` 
    (`tracking_number`, `driver`, `plate_number`, `delevery`, `date_stamp`, `time_stamp`) 
    VALUES (?, ?, ?, ?, ?, ?)
"); 

$stmt->bind_param("ssssss", $trackingNumber, $driver, $plate, $delivery, $date_stamp, $time_stamp);

// Execute the query
if ($stmt->execute()) {
    echo "✅ Purchase order saved successfully!";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
