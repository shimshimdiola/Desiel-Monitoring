<?php
include_once '../../config/config.php';
// Example path: pages/driver/index.php

// Get all parameters safely
// $order_id = isset($_GET['order_id']) ? htmlspecialchars($_GET['order_id']) : 'N/A';
$tracking_number = isset($_GET['tracking_number']) ? htmlspecialchars($_GET['tracking_number']) : 'N/A';
$driver = isset($_GET['driver']) ? htmlspecialchars($_GET['driver']) : 'N/A';
$plate_number = isset($_GET['plate_number']) ? htmlspecialchars($_GET['plate_number']) : 'N/A';
$delevery = isset($_GET['delevery']) ? htmlspecialchars($_GET['delevery']) : 'N/A';
$date_stamp = isset($_GET['date_stamp']) ? htmlspecialchars($_GET['date_stamp']) : 'N/A';
$time_stamp = isset($_GET['time_stamp']) ? htmlspecialchars($_GET['time_stamp']) : 'N/A';

// date_default_timezone_set('Asia/Manila');
// $raw_time_stamp = date("Y-m-d\TH:i:s"); // Default to current time if not provided
// $time_stamp = 'N/A'; // Initialize formatted time variable

// // Logic to convert the time to 12-hour format (g:i A) with AM/PM
// if ($raw_time_stamp !== 'N/A') {
//     $timestamp_seconds = strtotime($raw_time_stamp);
//     if ($timestamp_seconds !== false) {
//         // Format to 12-hour clock (e.g., 12:00 PM)
//         $time_stamp = date('h:i A', $timestamp_seconds);
//     } else {
//         // Fallback to original string if conversion fails
//         $time_stamp = htmlspecialchars($raw_time_stamp);
//     }
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Order Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Configure Inter font and smooth transitions */
        body {
            font-family: 'Inter', sans-serif;
            /* Using a common font */
            background-color: #f3f4f6;
            /* Light gray background */
        }

        /* Custom focus ring for data inputs (improves accessibility) */
        .data-input:focus {
            outline: none;
            border-color: #3b82f6;
            /* Blue-500 */
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.4);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-xl w-full max-w-lg border border-gray-200">

        <h1 class="text-xl font-semibold text-center text-gray-700 mb-6">
            Order:
            <span class="font-extrabold text-blue-600 tracking-wide"><?php echo $tracking_number ?></span>
        </h1>

        <div class="grid grid-cols-2 gap-x-4 gap-y-3 mb-8 p-4 bg-blue-50 rounded-xl">

            <div class="col-span-2 sm:col-span-1">
                <p class="text-xs font-semibold text-gray-500 uppercase">Driver</p>
                <p class="text-base font-bold text-gray-800"><?php echo $driver ?></p>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <p class="text-xs font-semibold text-gray-500 uppercase">Plate Number</p>
                <p class="text-base font-bold text-gray-800"><?php echo $plate_number ?></p>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <p class="text-xs font-semibold text-gray-500 uppercase">Delivery</p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-yellow-100 text-yellow-700 border border-yellow-300"><?php echo $delevery ?></span>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <p class="text-xs font-semibold text-gray-500 uppercase">Timestamp</p>
                <p class="text-base font-bold text-gray-800"><?php echo $time_stamp . ", " . $date_stamp ?></p>
            </div>
        </div>

        <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">⛽ Fuel Expense Tracking</h2>

        <form action="save_fuel_data.php" method="POST">

            <div class="space-y-4">
                <div>
                    <label for="ltrs" class="block text-sm font-medium text-gray-700 mb-1">Liters (Volume)</label>
                    <input
                        type="number"
                        id="ltrs"
                        name="ltrs"
                        value="0"
                        min="0"
                        step="0.01"
                        placeholder="Enter quantity in liters"
                        class="data-input w-full p-3 border border-gray-300 rounded-lg transition duration-150 focus:border-blue-500">
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price per Liter</label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="0.00"
                        min="0"
                        step="0.01"
                        placeholder="Enter price per unit"
                        class="data-input w-full p-3 border border-gray-300 rounded-lg transition duration-150 focus:border-blue-500">
                </div>

                <hr class="border-gray-200 pt-2">

                <div>
                    <label for="amount" class="block text-lg font-bold text-gray-800 mb-1">Total Fuel Amount</label>
                    <input
                        type="text"
                        id="amount"
                        value="₱0.00"
                        readonly
                        placeholder="Calculated automatically"
                        class="w-full p-4 text-xl font-extrabold text-blue-700 bg-blue-50 border-2 border-blue-300 rounded-lg text-center cursor-default">
                </div>
            </div>

            <div class="mt-8">
                <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-md shadow-blue-300">
                    <span class="inline-block mr-2">✅</span> Submit Fuel Data
                </button>
            </div>
        </form>

        <div class="mt-4">
            <a href="<?php echo BASE_URL ?>" class="block w-full text-center py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition duration-200">
                &larr; Back to Login
            </a>
        </div>

    </div>

    <script>
        const ltrsInput = document.getElementById('ltrs');
        const priceInput = document.getElementById('price');
        const amountInput = document.getElementById('amount');

        /**
         * Calculates the total amount (liters * price) and updates the amount input field.
         */
        function calculateAmount() {
            // Use || 0 to safely handle non-numeric or empty string inputs
            const liters = parseFloat(ltrsInput.value) || 0;
            const price = parseFloat(priceInput.value) || 0;

            const totalAmount = liters * price;

            // Update the result formatted to two decimal places with the peso symbol
            amountInput.value = "₱" + totalAmount.toFixed(2);
        }

        // Attach the calculation function to the 'input' event for real-time updates
        ltrsInput.addEventListener('input', calculateAmount);
        priceInput.addEventListener('input', calculateAmount);

        // Ensure the initial calculation is run
        calculateAmount();
    </script>

</body>

</html>