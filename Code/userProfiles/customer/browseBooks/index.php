<?php 
include '../../../Database/Config.php';
session_start(); 
if (!isset($_SESSION['email'])) {
    // User is not logged in, redirect to the login page
    header('Location: http://localhost/BookShelf/Code/LoginAuth/login.php');
    exit;
}

// Query to fetch book ID, name, author, and image from the book table
$sql = "SELECT * FROM book";

// Execute the query
$result = mysqli_query($Conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Browse Books</title>
    <link href="../../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="../../../css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" />
    <script defer src="script.js"></script>
    <style>
        .fade-in-book {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 1s ease-in-out, transform 1s ease-in-out;
        }
        .fade-in-book.fade-in {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
</head>
<body>
    <?php
    require 'navbar.php';
    Navbar();
    ?>
    <section class="section-products mt-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                       
                        <h2>Available Books</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Product -->
                <?php
                // Check if there are any records
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div id="product-1" class="single-product fade-in-book" >
                        <div class="part-1" style="background-image: url('../../../../images/<?php echo $row['image']; ?>');">
                            <ul>
                            <li><a href="../Book/index.php?ISBN=<?php echo $row['ISBN'] ?>"><i class='bx bx-cart-add bx-md' style="background-color: transparent;"></i></a></li>

                            </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title"><?php echo $row["name"] ?></h3>
                            <h4 class="product"><?php echo $row["author"] ?></h4><br>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                else {
                    echo "<p>No books found</p>";
                }
                // Close the database connection
                mysqli_close($Conn);
                ?>
            </div>
        </div>
    </section>
</body>
</html>
