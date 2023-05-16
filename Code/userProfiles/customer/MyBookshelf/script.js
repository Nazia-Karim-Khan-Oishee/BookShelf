function searchBooks() {
    // Get the search input, filter select elements, and their values
    var searchInput = document.getElementById("search-input");
    var filterSelect = document.getElementById("filter-select");
    var searchValue = searchInput.value.toLowerCase();
    var filterValue = filterSelect.value;
  
    // Get the table rows
    var rows = document.getElementsByTagName("tr");
    for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
  
      // Get the cells in the row
      var cells = row.getElementsByTagName("td");
  
      // Set the row style to display:none by default
      row.style.display = "none";
  
      // Loop through the cells and check if they match the filter
      for (var j = 0; j < cells.length; j++) {
        var cell = cells[j];
        var cellValue = cell.textContent.toLowerCase();
        var cellDataColumn = cell.getAttribute("data-column");
          if (cellValue.indexOf(searchValue) > -1) {
            // If the cell value matches the filter and search input, display the row
            row.style.display = "";
            break;
          }
      }
    }
  }
  
  // Add event listeners to search input and filter select elements
  document.getElementById("search-input").addEventListener("keyup", searchBooks);
  document.getElementById("filter-select").addEventListener("change", searchBooks);