<?php 
include '../../../Database/Config.php';
session_start(); 
if (!isset($_SESSION['email'])) {
    // User is not logged in, redirect to the login page
    header('Location: ../../../LoginAuth/login.php');
    exit;
}
if(isset($_POST['add'])){
    $isbn = mysqli_real_escape_string($Conn, $_POST['isbn']);
    $quantity = mysqli_real_escape_string($Conn, $_POST['quantity']);
    $dummy_quantity=$quantity;
    $SuccessMessage="";
    $sql2 = "INSERT INTO all_copies_of_books (ISBN) VALUES ('$isbn')";
    while($dummy_quantity>0)
    {
      $inserted=mysqli_query($Conn, $sql2);
      $dummy_quantity--;
    }
    if($inserted){
      $SuccessMessage ="Books added successfully.";
      echo "Book added successfully.";
    } else{
      $SuccessMessage ="ERROR: Could not able to add books";
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($Conn);
    }
    echo "<script>window.location.href='index.php'</script>";
}
if(isset($_POST['remove'])){
    echo "Removing books";
    $isbn = mysqli_real_escape_string($Conn, $_POST['isbn']);
    $copy_id = mysqli_real_escape_string($Conn, $_POST['copyId']);
    $SuccessMessage="";
    $sql2 = "Delete from all_copies_of_books where copy_id='$copy_id' and ISBN='$isbn'";
    $deleted=mysqli_query($Conn, $sql2);
    if($deleted){
      $SuccessMessage ="Books removed successfully.";
      echo "Book removed successfully.";
    } else{
      $SuccessMessage ="ERROR: Could not able to remove books";
      echo "ERROR: Could not able to execute $sql2. " . mysqli_error($Conn);
    }
    echo "<script>window.location.href='index.php'</script>";
}
$sql = "SELECT * FROM book";
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
                    <th>Add Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $isbn = $row['ISBN'];
                $number_of_books_query = "SELECT count(*) as count FROM all_copies_of_books WHERE ISBN = '$isbn'";
                $number_of_books_result = mysqli_query($Conn, $number_of_books_query);
                $number_of_books_row = mysqli_fetch_assoc($number_of_books_result);
                $number_of_books = $number_of_books_row['count'];
              echo "<tr>";
              echo "<td>".$row["name"]."</td>";
              echo "<td>".$row["edition"]."</td>";
              echo "<td>".$row["author"]."</td>";
              echo "<td>".$row["publisher"]."</td>";

              echo "<td>". $number_of_books."</td>";
                echo "<td>";
                echo "<button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#addQuantityModal". $isbn."'>+</button>";
                //echo "<button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#removeCopyModal".$isbn."'>-</button>";
                echo "<div class='modal fade' id='addQuantityModal". $isbn."'  tabindex='-1' role='dialog' aria-labelledby='addQuantityModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='addQuantityModalLabel'>Add Quantity</h5>
                                </div>
                                <div class='modal-body'>
                                    <form action='' method='POST'>
                                        <div class='form-group'>
                                            <label for='quantity'>Quantity</label>
                                            <input type='hidden' name='isbn' value='". $isbn."'>
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
                // echo "<div class='modal fade' id='removeCopyModal".$isbn."' tabindex='-1' role='dialog' aria-labelledby='removeCopyModalLabel' aria-hidden='true'>
                //         <div class='modal-dialog' role='document'>
                //             <div class='modal-content'>
                //                 <div class='modal-header'>
                //                     <h5 class='modal-title' id='removeCopyModalLabel'>Remove Copy</h5>
                //                 </div>
                //                 <div class='modal-body'>
                //                     <form action='' method='POST'>
                //                         <div class='form-group'>
                //                             <label for='copyId'>Copy ID</label>
                //                             <input type='hidden' name='isbn' value='". $isbn."'>
                //                             <input type='text' class='form-control' id='copyId' name='copyId' required>
                //                         </div>
                                    
                //                 </div>
                //                 <div class='modal-footer'>
                //                     <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>

                //                     <button type='submit' name='remove' class='btn btn-primary' >Save changes</button>
                //                 </div>
                //                 </form>
                //             </div>
                //         </div>
                //     </div>";
                
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