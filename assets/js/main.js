document.getElementById("masterlist_export").addEventListener("click", function() {
  // 1. Get the table element
  let table = document.getElementById("datatable2");

  // 2. Convert table to worksheet
  let ws = XLSX.utils.table_to_sheet(table);

  // 3. Create a new workbook and append the worksheet
  let wb = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(wb, ws, "Transport Data");

  // 4. Trigger Excel file download
  XLSX.writeFile(wb, "transport_fuel_data.xlsx");
});
