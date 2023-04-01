<?php 
include '../../../Database/Config.php';
$SuccessMessage="";
if(isset($_POST['submit'])){
$book_name = mysqli_real_escape_string($Conn, $_POST['book_name']);
$isbn = mysqli_real_escape_string($Conn, $_POST['isbn']);
$author_name = mysqli_real_escape_string($Conn, $_POST['author_name']);
$publisher_name = mysqli_real_escape_string($Conn, $_POST['publisher_name']);
$edition_no = mysqli_real_escape_string($Conn, $_POST['edition_no']);
$quantity = mysqli_real_escape_string($Conn, $_POST['quantity']);
$dummy_quantity=$quantity;
$SuccessMessage="";
$sql = "INSERT INTO book (ISBN, name,  author, edition, publisher) VALUES ('$isbn', '$book_name', '$author_name',  '$edition_no', '$publisher_name')";
$sql2 = "INSERT INTO all_copies_of_books (ISBN) VALUES ('$isbn')";
while($dummy_quantity>0)
{
  $inserted=mysqli_query($Conn, $sql2);
  $dummy_quantity--;
}
if(mysqli_query($Conn, $sql) ){
  $SuccessMessage ="Books added successfully.";
  // echo "Book added successfully.";
} else{
  $SuccessMessage ="ERROR: Could not able to add books";
  //echo "ERROR: Could not able to execute $sql. " . mysqli_error($Conn);
}

}
// Close connection
mysqli_close($Conn);
?>
<!DOCTYPE html>
<html>

<head>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <title>Add Products</title>
    <link href="../../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="../../../css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="index.css">
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <?php
  require 'navbar.php';
  Navbar();
  ?>

    <section class="d-flex justify-content-center">

        <div class="card addBook-card border-dark text-center mt-3">
            <div class="card-header bg-dark">Add new book</div>

            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Book Name:</span>
                        <input type="text" class="form-control" name="book_name" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ISBN:</span>
                        <input type="text" class="form-control" name="isbn" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Author Name:</span>
                        <input type="text" class="form-control" name="author_name" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Publisher Name:</span>
                        <input type="text" class="form-control" name="publisher_name" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Edition No.:</span>
                        <input type="text" class="form-control" name="edition_no" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Quantity:</span>
                        <input type="text" class="form-control" name="quantity" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <!-- <div class="mb-3">
          <label for="formFile" class="form-label">Upload Photo</label>
          <input class="form-control" type="file" id="formFile">
        </div> -->
                    <button type="submit" name="submit" class="btn btn-dark">Add Book</button><br>
                    <span class="error"> <?php echo $SuccessMessage;?></span>
                </form>
            </div>
        </div>
    </section>
</body>

</html>