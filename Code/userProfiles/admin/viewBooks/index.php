<?php 
include '../../../Database/Config.php';

// Query to fetch all books from the book table
$sql = "SELECT * FROM book";
// $sql2 = "SELECT count(*) as quantity FROM all_copies_of_books where all_copies_of_books.ISBN = book.ISBN group by all_copies_of_books.ISBN";

// Execute the query
$result = mysqli_query($Conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Products Page</title>
    <script defer src="script.js"></script>
    <link href="../../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="../../../css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    
    <link href="style.css" rel="stylesheet" />
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
                $isbn = $row['ISBN'];
                $number_of_books_query = "SELECT count(*) as count FROM all_copies_of_books WHERE ISBN = $isbn";
                $number_of_books_result = mysqli_query($Conn, $number_of_books_query);
                $number_of_books_row = mysqli_fetch_assoc($number_of_books_result);
                $number_of_books = $number_of_books_row['count'];
              echo "<tr>";
              echo "<td>".$row["name"]."</td>";
              echo "<td>".$row["edition"]."</td>";
              echo "<td>".$row["author"]."</td>";
              echo "<td>".$row["publisher"]."</td>";

              echo "<td>". $number_of_books
              // $sqll = 'SELECT count(*) as quantity FROM all_copies_of_books where all_copies_of_books.ISBN = $row['ISBN']';
              // $result2 = mysqli_query($Conn, $sqll);
              // $row2 = mysqli_fetch_assoc($result2);
              // echo ( $row2);
              .

                "</td>";
                echo "<td>";
                echo "<button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#addQuantityModal'>+</button>";
                echo "<button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#removeCopyModal'>-</button>";
                
                // Modal for adding quantity
                echo "<div class='modal fade' id='addQuantityModal' tabindex='-1' role='dialog' aria-labelledby='addQuantityModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='addQuantityModalLabel'>Add Quantity</h5>
                                </div>
                                <div class='modal-body'>
                                    <form>
                                        <div class='form-group'>
                                            <label for='quantity'>Quantity</label>
                                            <input type='number' class='form-control' id='quantity' name='quantity' required>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <button type='button' class='btn btn-primary' name='add' onclick='addQuantity()'>Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>";
                
                // Modal for removing copy
                echo "<div class='modal fade' id='removeCopyModal' tabindex='-1' role='dialog' aria-labelledby='removeCopyModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='removeCopyModalLabel'>Remove Copy</h5>
                                </div>
                                <div class='modal-body'>
                                    <form>
                                        <div class='form-group'>
                                            <label for='copyId'>Copy ID</label>
                                            <input type='text' class='form-control' id='copyId' name='copyId' required>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <button type='button' class='btn btn-primary' name='remove' onclick='removeCopy()'>Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>";
                
                    echo "</td>";
                echo "</tr>";
                }
                } else {
                // If no records are found
                echo "<tr>
                    <td colspan='6'>No records found</td>
                </tr>";
                }

                // Close the database connection
                mysqli_close($Conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>