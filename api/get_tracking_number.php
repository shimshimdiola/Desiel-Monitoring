<?php

$stmt = $conn->prepare("SELECT * FROM `purchase_order` WHERE tracking_number = ?");
if ($stmt === false) {
    echo "Error preparing statement: " . $conn->error;
} else {
    $stmt->bind_param('s', $trackingNumber);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {

            header("Location:" . BASE_URL . "pages/driver/index.php?t=" . htmlspecialchars($row['driver']));
        }
    } else {
        echo "Error executing statement: " . $conn->error;
    }
}
$stmt->close();
$conn->close();
