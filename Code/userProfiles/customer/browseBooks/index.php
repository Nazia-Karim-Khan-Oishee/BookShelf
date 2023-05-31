<?php 
include '../../../Database/Config.php';
session_start(); 

// Check if the search query is set
if(isset($_GET['search_query'])) {
    $searchQuery = $_GET['search_query'];
    
    // Query to fetch book ID, name, author, and image from the book table based on the search query
    $sql = "SELECT * FROM book WHERE author LIKE CONCAT('%', ?, '%') OR name LIKE CONCAT('%', ?, '%')";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($Conn, $sql);
    
    // Bind the search query as a parameter
    mysqli_stmt_bind_param($stmt, "ss", $searchQuery, $searchQuery);
    
    // Execute the prepared statement
    mysqli_stmt_execute($stmt);
    
    // Get the result set
    $result = mysqli_stmt_get_result($stmt);
} else {
    // Query to fetch book ID, name, author, and image from the book table
    $sql = "SELECT * FROM book";
    
    // Execute the query
    $result = mysqli_query($Conn, $sql);
}
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
            
            <!-- Add the search form at the top of the page -->
            <div class="row justify-content-center text-center mt-3 mb-5">
                <div class="col-md-8 col-lg-6">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                        <div class="input-group">
                            <button class="btn btn-primary mx-2" type="submit">Show All</button>
                            <input type="text" class="form-control" name="search_query" placeholder="Search by author or book name" />
                            <div class="input-group-append">
                                <button class="btn btn-secondary mx-2" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
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
                    <div id="product-1" class="single-product fade-in-book">
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
