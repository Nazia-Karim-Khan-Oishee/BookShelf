<?php 
include '../../../Database/Config.php';

// Query to fetch book ID, name, and author from the book table
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
</head>

<body>
    <?php
    require 'navbar.php';
    Navbar();
    ?>
    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Book Catalogue</h3>
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
                    <div id="product-1" class="single-product">
                        <div class="part-1">
                            <ul>
                                <li><a href="../Book/index.php?ISBN=<?php echo $row["ISBN"] ?>"><i class="fas fa-info-circle"></i></a></li>
                            </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title"><?php echo $row["name"] ?></h3>
                            <h4 class="product"><?php echo $row["author"] ?></h4><br>
                        </div>
                    </div>
                </div>
                <?php } 

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