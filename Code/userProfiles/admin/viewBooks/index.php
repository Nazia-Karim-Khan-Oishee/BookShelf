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
          <tr>
            <td>Book 1</td>
            <td>1st</td>
            <td>Author A</td>
            <td>Publisher P</td>
            <td>10</td>
            <td>
              <button class="btn btn-success" onclick="addQuantity(this)">+</button>
              <button class="btn btn-danger" onclick="removeQuantity(this)">-</button>
            </td>
          </tr>
          <tr>
            <td>Book 2</td>
            <td>2nd</td>
            <td>Author B</td>
            <td>Publisher Q</td>
            <td>5</td>
            <td>
              <button class="btn btn-success" onclick="addQuantity(this)">+</button>
              <button class="btn btn-danger" onclick="removeQuantity(this)">-</button>
            </td>
          </tr>
          <tr>
            <td>Book 3</td>
            <td>3rd</td>
            <td>Author C</td>
            <td>Publisher R</td>
            <td>2</td>
            <td>
              <button class="btn btn-success" onclick="addQuantity(this)">+</button>
              <button class="btn btn-danger" onclick="removeQuantity(this)">-</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</body>
</html>
