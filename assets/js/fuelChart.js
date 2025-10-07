console.log("fuelChart.js loaded");


document.addEventListener("DOMContentLoaded", function () {
    // Generate random transport data for a specific month and year
function generateTransportData(year = 2025, month = 10, days = 30) {
  return Array.from({ length: days }, (_, i) => {
    const day = String(i + 1).padStart(2, "0");
    const formattedMonth = String(month).padStart(2, "0");
    return {
      date: `${year}-${formattedMonth}-${day}`,
      liters: Math.floor(Math.random() * 90099),
      amount: Math.floor(Math.random() * 90099)
    };
  });
}

// Example: Generate October 2025 data
const transportData = generateTransportData(2025, 10, 30);

console.log(transportData);


    
    console.log(transportData);
    
    // --- Split data for “This Week” (last 7 days) and “Last Month” ---
    const thisWeekData = transportData.slice(-7);
    const lastMonthData = transportData;
  
    // --- Helper function to map chart data ---
    const formatData = (data) => ({
      labels: data.map(row => row.date),
      liters: data.map(row => row.liters),
      amount: data.map(row => row.amount)
    });
  
    const chartSets = {
      thisWeek: formatData(thisWeekData),
      lastMonth: formatData(lastMonthData)
    };
  
    // --- Create Chart ---
    const ctx = document.getElementById("fuelChart").getContext("2d");
  
    const fuelChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: chartSets.thisWeek.labels,
        datasets: [
          {
            label: "Liters Used (L)",
            borderColor: "#007bff",
            backgroundColor: "rgba(0,123,255,0.05)",
            borderWidth: 3,
            pointRadius: 3,
            pointBackgroundColor: "#007bff",
            data: chartSets.thisWeek.liters,
            fill: false,
            tension: 0.4
          },
          {
            label: "Amount (₱)",
            borderColor: "#ff6384",
            backgroundColor: "rgba(255,99,132,0.05)",
            borderWidth: 3,
            pointRadius: 3,
            pointBackgroundColor: "#ff6384",
            data: chartSets.thisWeek.amount,
            fill: false,
            tension: 0.4
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: "top", labels: { color: "#444" } },
          title: {
            display: true,
            text: "Fuel Usage and Amount (This Week)",
            font: { size: 16 }
          }
        },
        scales: {
          x: { ticks: { color: "#333", maxRotation: 90, minRotation: 45 } },
          y: { beginAtZero: true, ticks: { color: "#333" } }
        }
      }
    });
  
    // --- Update Chart Function ---
    function updateChart(dataSet, title) {
      fuelChart.data.labels = dataSet.labels;
      fuelChart.data.datasets[0].data = dataSet.liters;
      fuelChart.data.datasets[1].data = dataSet.amount;
      fuelChart.options.plugins.title.text = title;
      fuelChart.update();
    }
  
    // --- Button Actions ---
    document.getElementById("thisWeekBtn").addEventListener("click", function () {
      document.getElementById("thisWeekBtn").classList.add("active");
      document.getElementById("lastMonthBtn").classList.remove("active");
      updateChart(chartSets.thisWeek, "Fuel Usage and Amount (This Week)");
    });
  
    document.getElementById("lastMonthBtn").addEventListener("click", function () {
      document.getElementById("lastMonthBtn").classList.add("active");
      document.getElementById("thisWeekBtn").classList.remove("active");
      updateChart(chartSets.lastMonth, "Fuel Usage and Amount (October 2025)");
    });
  });
  