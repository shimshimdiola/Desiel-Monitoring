// Generate a random tracking number for the QR code
const trackingNumberContent = "TRK-" + Math.random().toString(36).substring(2, 10).toUpperCase();
console.log("Tracking Number:", trackingNumberContent);

// Update display elements
document.getElementById("trackingNumberDisplay").innerText = trackingNumberContent;

// Set the current issue date
const today = new Date();
const options = { year: 'numeric', month: 'long', day: 'numeric' };
document.getElementById("issueDate").innerText = today.toLocaleDateString('en-US', options);

// Generate QR code
new QRCode(document.getElementById("qrcode"), {
  text: trackingNumberContent,
  width: 180,
  height: 180,
  colorDark: "#000000",
  colorLight: "#ffffff",
  correctLevel: QRCode.CorrectLevel.H
});

console.log(`QR Code generated for: ${trackingNumberContent}`);

// Handle form submission
document.getElementById("proceedBtn").addEventListener("click", function() {
  const driver = document.getElementById("driver").value.trim();
  const plate = document.getElementById("plates").value.trim();
  const tracking = document.getElementById("Tracking").value.trim();
  const now = new Date();

  if (!driver || !plate || !tracking) {
    alert("⚠️ Please fill in all fields before generating the receipt.");
    return;
  }

  // Update receipt content
  document.getElementById("driverDisplay").textContent = driver;
  document.getElementById("plateDisplay").textContent = plate;
  document.getElementById("trackingDisplay").textContent = tracking;
  document.getElementById("issueDate").textContent = now.toLocaleString();
  document.getElementById("trackingNumberDisplay").textContent = trackingNumberContent;

  // Show receipt
  document.getElementById("receipt").style.display = "block";

  // Save data using AJAX
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./api/save_refuel.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log("✅ Data saved successfully:", xhr.responseText);
    } else {
      console.error("❌ Failed to save data:", xhr.statusText);
    }
  };

  xhr.onerror = function() {
    console.error("❌ Network error while saving data.");
  };

  xhr.send(
    "driver=" + encodeURIComponent(driver) +
    "&plate=" + encodeURIComponent(plate) +
    "&tracking=" + encodeURIComponent(tracking) +
    "&trackingNumber=" + encodeURIComponent(trackingNumberContent)
  );
});

// Print function
function printReceipt() {
  window.print();
}
