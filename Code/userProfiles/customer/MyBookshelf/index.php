<?php
session_start();
if (!isset($_SESSION['email'])) {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit;
}
include '../../../Database/Config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM customer_book,book WHERE customer_book.email='$email' and customer_book.ISBN=book.ISBN and customer_book.return_date <= NOW()";
$previouslyBorrowedBooks = mysqli_query($Conn, $sql);
$sql = "SELECT * FROM customer_book,book WHERE customer_book.email='$email' and customer_book.ISBN=book.ISBN and customer_book.return_date > NOW() limit 1";
$currentlyBorrowedBooks = mysqli_query($Conn, $sql);
$sql = "SELECT delivery_date From book_location_delivery,customer_book where book_location_delivery.email='$email' and return_date > NOW() limit 1";
$deliveryDate = mysqli_query($Conn, $sql);
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
        <div class="mt-5">
            <h1>Currently Borrowed Book</h1>
            <div class="card mb-3 " style="width:600px">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php
                                    if ($currentlyBorrowedBooksresult = mysqli_fetch_assoc($currentlyBorrowedBooks)) {
                                        echo "../../../../images/" . $currentlyBorrowedBooksresult['image'];
                                    } else {
                                        echo "empty.png";
                                    }
                                    ?>" class="product-image p-2" style="width: 200px; height: 300px;">
                    </div>

                    <div class="col-md-8 d-flex">
                        <div class="card-body">
                            <div class="curr$currentlyBorrowedBooks-description m-5">
                                <?php

                                if ($currentlyBorrowedBooksresult) {
                                    $deliveryDateResult = mysqli_fetch_assoc($deliveryDate);
                                    echo "<h2 class='product-title'>" . $currentlyBorrowedBooksresult['name'] . "</h2>";
                                    echo "<h3 class='product-author'>" . $currentlyBorrowedBooksresult['author'] . "</h3>";
                                    echo "<h5 class='product-publisher'>" . "Delivery date: " . date('d-m-Y', strtotime($currentlyBorrowedBooksresult['issue_date'])) . "</h5>";
                                    echo "<h5 class='product-publisher'>" . "Return date: " . date('d-m-Y', strtotime($currentlyBorrowedBooksresult['return_date'])) . "</h5>";

                                } else {
                                    echo "<h4>No books currently borrowed</h4>";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-5">
            <h1>Previously Borrowed Books</h1>
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

        </div>
        <table id="book-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Edition No</th>
                    <th>Author Name</th>
                    <th>Publisher Name</th>
                    <th>Borrow Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($previouslyBorrowedBooks) > 0) {
                    while ($row = mysqli_fetch_assoc($previouslyBorrowedBooks)) {
                        $isbn = $row['ISBN'];
                        $number_of_books_query = "SELECT count(*) as count FROM all_copies_of_books WHERE ISBN = '$isbn'";
                        $number_of_books_previouslyBorrowedBooks = mysqli_query($Conn, $number_of_books_query);
                        $number_of_books_row = mysqli_fetch_assoc($number_of_books_previouslyBorrowedBooks);
                        $number_of_books = $number_of_books_row['count'];
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["edition"] . "</td>";
                        echo "<td>" . $row["author"] . "</td>";
                        echo "<td>" . $row["publisher"] . "</td>";
                        echo "<td>" . $row["issue_date"] . "</td>";
                        echo "<div class='modal fade' id='addQuantityModal" . $isbn . "'  tabindex='-1' role='dialog' aria-labelledby='addQuantityModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='addQuantityModalLabel'>Add Quantity</h5>
                                </div>
                                <div class='modal-body'>
                                    <form action='' method='POST'>
                                        <div class='form-group'>
                                            <label for='quantity'>Quantity</label>
                                            <input type='hidden' name='isbn' value='" . $isbn . "'>
                                            <input type='number' class='form-control' id='quantity' name='quantity' required>
                                        </div>
                                    
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <button type='submit' name='add' class='btn btn-primary' >Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>";
                        echo "<div class='modal fade' id='removeCopyModal" . $isbn . "' tabindex='-1' role='dialog' aria-labelledby='removeCopyModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='removeCopyModalLabel'>Remove Copy</h5>
                                </div>
                                <div class='modal-body'>
                                    <form action='' method='POST'>
                                        <div class='form-group'>
                                            <label for='copyId'>Copy ID</label>
                                            <input type='hidden' name='isbn' value='" . $isbn . "'>
                                            <input type='text' class='form-control' id='copyId' name='copyId' required>
                                        </div>
                                    
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <button type='submit' name='remove' class='btn btn-primary' >Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>";

                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>
                    <td colspan='6'>No records found</td>
                </tr>";
                }
                mysqli_close($Conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>