// Open add quantity modal

// Add quantity
function addQuantity() {
  let quantity = document.getElementById('quantity').value;
  // Do something with the quantity value
  closeAddQuantityModal();
}

// Remove copy
function removeCopy() {
  let copyId = document.getElementById('copyId').value;
  // Do something with the copyId value
  closeRemoveCopyModal();
}

// Close modal when user clicks outside of it
window.onclick = function(event) {
  let addQuantityModal = document.getElementById('addQuantityModal');
  let removeCopyModal = document.getElementById('removeCopyModal');
  
  if (event.target == addQuantityModal) {
      addQuantityModal.style.display = 'none';
  } else if (event.target == removeCopyModal) {
      removeCopyModal.style.display = 'none';
  }
}

  // Search and filter function
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




//---------------------------------------------------------------- removed codes
  // function addQuantity(button) {
//     // Get the quantity cell of the row containing the clicked button
//     var quantityCell = button.parentNode.previousSibling;
  
//     // Get the current quantity value
//     var currentQuantity = parseInt(quantityCell.textContent);
  
//     // Increment the quantity by 1
//     var newQuantity = currentQuantity + 1;
  
//     // Update the quantity cell with the new value
//     quantityCell.textContent = newQuantity;
//   }
  
//   function removeQuantity(button) {
//     // Get the quantity cell of the row containing the clicked button
//     var quantityCell = button.parentNode.previousSibling;
  
//     // Get the current quantity value
//     var currentQuantity = parseInt(quantityCell.textContent);
  
//     // Decrement the quantity by 1, but only if it's greater than 0
//     var newQuantity = currentQuantity > 0 ? currentQuantity - 1 : 0;
  
//     // Update the quantity cell with the new value
//     quantityCell.textContent = newQuantity;
//   }
  
  
  
  
  