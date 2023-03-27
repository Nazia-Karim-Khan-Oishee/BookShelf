<?php 
include '../../../Database/Config.php';

// Query to fetch all books from the book table
$sql = "SELECT * FROM book";

// Execute the query
$result = mysqli_query($Conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Products Page</title>
  <link href="../../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="../../../css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script defer src="script.js"></script>
  <link href="style.css" rel="stylesheet"/>
</head>
<body>
<?php
    require 'navbar.php';
    Navbar();
    ?>
    <div class="container">
      <div class="d-flex justify-content-between mt-4">
      <h1>Book Inventory</h1>
      <div class="d-flex justify-content-around">
        <div class="search-class">
          <input type="text" id="search-input" class="form-control search-book" placeholder="Search a book">
        </div>
        <div>
          <select id="filter-select" class="form-control">
            <option value="all">All <i class='bx bx-chevron-down'></i></option>
            <option value="bookname">Book Name</option>
            <option value="editionno">Edition No</option>
            <option value="authorname">Author Name</option>
            <option value="publishername">Publisher Name</option>
          </select>
        </div>
      </div>
      <a href="../addBooks/index.php" class="btn btn-dark">Add New Book</a>
      </div>
      
      <table id="book-table" class="table table-striped">
        <thead>
          <tr>
            <th>Book Name</th>
            <th>Edition No</th>
            <th>Author Name</th>
            <th>Publisher Name</th>
            <th>Quantity</th>
            <th>Add / Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Check if there are any records
          if (mysqli_num_rows($result) > 0) {
            // Loop through each record
            while($row = mysqli_fetch_assoc($result)) {
              // Display the record in the table row
              echo "<tr>";
              echo "<td>".$row["name"]."</td>";
              echo "<td>".$row["edition"]."</td>";
              echo "<td>".$row["author"]."</td>";
              echo "<td>".$row["publisher"]."</td>";
              echo "<td>5</td>";
              echo "<td>";
              echo "<button class='btn btn-success'>+</button>";
              echo "<button class='btn btn-danger'>-</button>";
              echo "</td>";
              echo "</tr>";
            }
          } else {
            // If no records are found
            echo "<tr><td colspan='6'>No records found</td></tr>";
          }

          // Close the database connection
          mysqli_close($Conn);
          ?>
        </tbody>
      </table>
    </div>
</body>
</html>
