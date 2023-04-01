<?php
include '../../../Database/Config.php';

// Check if a book ID is set in the URL
if (isset($_GET['ISBN'])) {

    // Retrieve the book ID from the URL parameter
    $ISBN = $_GET['ISBN'];

    // Query to fetch the book with the specified ID from the book table
    $sql = "SELECT * FROM book WHERE ISBN = $ISBN";

    // Execute the query
    $result = mysqli_query($Conn, $sql);

    // Check if the query was successful and if there is exactly one record
    if (mysqli_num_rows($result) == 1) {

        // Retrieve the book details from the query result
        $book = mysqli_fetch_assoc($result);

?>

        <!DOCTYPE html>
        <html>

        <head>
            <title><?php echo $book['name'] ?></title>
            <link href="../../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
            <link href="../../../css/bootstrap.min.css" rel="stylesheet" />
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="../../../js/bootstrap.min.js"></script>
            <link href="../style.css" rel="stylesheet" />
            <link href="style.css" rel="stylesheet" />
        </head>

        <body>
            <?php
            require 'navbar.php';
            Navbar();
            ?>
            <section class="section-product-details">
                <div class="container d-flex justify-content-center">

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <label for="exampleFormControlInput1" class="form-label mb-3">Duration in weeks :</label>
                                        <select class="form-select mb-3" aria-label="Default select example">
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="3">4</option>
                                        </select>
                                        <label for="address" class="form-label mb-3">Address:</label>
                                        <select class="form-select mb-3" id="division" name="division">
                                            <option selected>Division</option>
                                        </select>
                                        <select class="form-select mb-3" id="district" name="district">
                                            <option selected>District</option>
                                        </select>
                                        <select class="form-select mb-3" id="area" name="area">
                                            <option selected>Area</option>
                                        </select>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter delivery point..">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Borrow</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3" style="max-width: 768px;width:768px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/Bookshelf/Code/img/book3.jpg" alt="<?php echo $book['name'] ?>" class="product-image">
                            </div>
                            <div class="col-md-8 d-flex">
                                <div class="card-body">
                                    <div class="book-description m-5">
                                        <h2 class="product-title"><?php echo $book['name'] ?></h2>
                                        <h3 class="product-author"><?php echo $book['author'] ?></h3>
                                        <p class="product-description">Description</p>
                                        <input type="hidden" name="book_id" value="<?php echo $book['ISBN'] ?>">
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Borrow Book</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                 
                </div>
            </section>
        </body>
        <script>
            const myModal = document.getElementById('myModal')
            const myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', () => {
                myInput.focus()
            })
        </script>

        </html>

<?php
    } else {
        // If there is no book with the specified ID in the database, show an error message
        echo "<p>Book not found</p>";
    }

    // Close the database connection
    mysqli_close($Conn);
} else {
    // If no book ID is set in the URL, redirect the user back to the book catalog page
    header('Location: ../browsebook/index.php');
    exit;
}
?>