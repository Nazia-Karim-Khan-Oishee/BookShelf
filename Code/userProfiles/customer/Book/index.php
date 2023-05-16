<?php
include '../../../Database/Config.php';

// Check if a book ID is set in the URL
session_start();
if (isset($_GET['ISBN'])) {

    // Retrieve the book ID from the URL parameter
    $ISBN = $_GET['ISBN'];

    // Query to fetch the book with the specified ID from the book table
    $sql = "SELECT ISBN FROM book WHERE ISBN = '$ISBN'";
    // Execute the query
    $result = mysqli_query($Conn, $sql);
    $disabled="";
   

    // Check if the query was successful and if there is exactly one record
    if (mysqli_num_rows($result)) {
        $email = $_SESSION['email'];
        $sql = "SELECT count(*) as count from all_copies_of_books where ISBN = '$ISBN' and borrowed=0" ;
        $res = mysqli_query($Conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $count = $row["count"];
        $sql = "SELECT count(*) as count from customer_book where email = '$email'";
        $res = mysqli_query($Conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $count2 = $row["count"];
        if($count<=0 || $count2>=1){
            $disabled="disabled";
        }
        // Retrieve the book details from the query result
        $book = mysqli_fetch_assoc($result);
       

        if (isset($_POST['submit'])) {

            $duration = $_POST['duration'];
            $division = $_POST['division'];
            $district = $_POST['district'];
            $area = $_POST['area'];
            $sql = "SELECT CURRENT_DATE() + 3 as delivery_date";
            $result = mysqli_query($Conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $delivery_date = $row["delivery_date"];
            $sql = "SELECT CURRENT_DATE() + 7*$duration as return_date";
            $result = mysqli_query($Conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $return_date = $row["return_date"];
            $sql = "SELECT LOCATION_ID FROM location WHERE division='$division' AND district='$district' AND area='$area' LIMIT 1";
            $result = mysqli_query($Conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $location_id = $row['LOCATION_ID'];
            $result = mysqli_query($Conn, $sql);
            $order_id = uniqid();
            $query = "SELECT * FROM book_location_delivery WHERE delivery_id = '$order_id'";
            $result = $Conn->query($query);

            $query = "SELECT copy_id FROM all_copies_of_books WHERE ISBN = '$ISBN' and BORROWED=0  LIMIT 1";
            $result = $Conn->query($query);
            $row = $result->fetch_assoc();
            $copy_id = $row["copy_id"];


            // If ID already exists, generate a new one
            while ($result->num_rows > 0) {
                $order_id = uniqid();
                $query = "SELECT * FROM book_location_delivery WHERE delivery_id = '$order_id'";
                $result = $Conn->query($query);
            }
            $sql = "INSERT INTO `customer_book` (`email`, `ISBN`, `copy_id`,`return_date`,`issue_date`) VALUES ( '$email', '$ISBN','$copy_id', '$return_date' ,'$delivery_date' );";
            $result = mysqli_query($Conn, $sql);
            $sql = "INSERT INTO `book_location_delivery` (`delivery_id`, `email`, `ISBN`, `copy_id`,`location_id`,`delivery_date`) VALUES ( '$order_id','$email', '$ISBN','$copy_id', '$location_id' ,'$delivery_date' );";
            $sql2 = "INSERT INTO `book_location_retrieval` (`retrieval_id`, `email`, `ISBN`, `copy_id`,`location_id`,`retrieval_date`) VALUES ( '$order_id','$email', '$ISBN','$copy_id', '$location_id' ,'$return_date' );";
            $result = mysqli_query($Conn, $sql);
            $result2 = mysqli_query($Conn, $sql2);
            if ($result && $result2) {
                $sql = "UPDATE all_copies_of_books SET BORROWED=1 WHERE copy_id='$copy_id' and ISBN='$ISBN'";
                $result = mysqli_query($Conn, $sql);
                echo '<script>alert("Order Placed Successfully")</script>';
            } else {
                echo '<script>alert("Order Failed")</script>';
            }
        }




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
        <div class="container d-flex justify-content-center mt-5">

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <label for="exampleFormControlInput1" class="form-label mb-3">Duration in weeks
                                    :</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="duration"
                                    name="duration">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3">4</option>
                                </select>
                                <label for="address" class="form-label mb-3">Address:</label>
                                <select class="form-select mb-3" id="division" name="division">
                                    <option selected>Select Division</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Rangpur">Rangpur</option>
                                </select>
                                <select class="form-select mb-3" id="district" name="district">
                                    <option selected>Select District</option>
                                </select>
                                <select class="form-select mb-3" id="area" name="area">
                                    <option selected>Select Area</option>
                                </select>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Enter delivery point..">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Borrow</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 768px;width:768px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/Bookshelf/Code/img/book3.jpg" alt="<?php echo $book['name'] ?>"
                            class="product-image">
                    </div>
                    <div class="col-md-8 d-flex">
                        <div class="card-body">
                            <div class="book-description m-5">
                                <h2 class="product-title"><?php echo $book['name'] ?></h2>
                                <h3 class="product-author"><?php echo $book['author'] ?></h3>
                                <p class="product-description">Description</p>
                                <input type="hidden" name="book_id" value="<?php echo $book['ISBN'] ?>">
                                <button class="btn btn-primary" <?php echo $disabled ?> data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Borrow Book</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
</body>
<script>
$(document).ready(function() {
    $("#division").change(function() {
        var division = $(this).val();
        $.ajax({
            url: "fetch-districts.php",
            method: "POST",
            data: {
                division: division
            },
            dataType: "text",
            success: function(data) {
                $("#district").html(data);
                var districtsString = data.substring(data.indexOf('["') + 2, data
                    .lastIndexOf('"]'));
                var districts = districtsString.split('","');
                for (var i = 0; i < districts.length; i++) {
                    var option = document.createElement("option");
                    option.value = districts[i];
                    option.text = districts[i];
                    districtSelect.appendChild(option);
                    console.log(districts[i]);
                }
            }
        });
    });

    $("#district").change(function() {
        var district = $(this).val();
        $.ajax({
            url: "fetch-areas.php",
            method: "POST",
            data: {
                district: district
            },
            dataType: "text",
            success: function(data) {
                $("#area").html(data);
                var areasString = data.substring(data.indexOf('["') + 2, data.lastIndexOf(
                    '"]'));
                var areas = areasString.split('","');
                for (var i = 0; i < areas.length; i++) {
                    var option = document.createElement("option");
                    option.value = areas[i];
                    option.text = areas[i];
                    areaSelect.appendChild(option);
                    console.log(areas[i]);
                }
            }
        });
    });
});

var divisionSelect = document.getElementById("division");
var districtSelect = document.getElementById("district");
var areaSelect = document.getElementById("area");

// Add an event listener to the division select element
divisionSelect.addEventListener("change", function() {
    // Clear the district and area select options
    districtSelect.innerHTML = "<option value=''>Select District</option>";
    areaSelect.innerHTML = "<option value=''>Select Area</option>";

    // Get the selected division value
    var selectedDivision = divisionSelect.value;


    // Make an AJAX request to get the districts for the selected division
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch-districts.php?division=" + selectedDivision);
    xhr.onload = function() {
        console.log(xhr.responseText);
        // Parse the JSON response
        var districts = JSON.parse(xhr.responseText);
        // Add the district options to the district select element
        for (var i = 0; i < districts.length; i++) {
            var option = document.createElement("option");
            option.value = districts[i];
            option.text = districts[i];
            districtSelect.appendChild(option);
            console.log(districts[i]);
        }
    };
    xhr.send();
});

// Add an event listener to the district select element
districtSelect.addEventListener("change", function() {
    // Clear the area select options
    areaSelect.innerHTML = "<option value=''>Select Area</option>";

    // Get the selected district value
    var selectedDistrict = districtSelect.value;

    // Make an AJAX request to get the areas for the selected district
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch-areas.php?district=" + selectedDistrict);
    xhr.onload = function() {
        // Parse the JSON response
        var areas = JSON.parse(xhr.responseText);

        // Add the area options to the area select element
        for (var i = 0; i < areas.length; i++) {
            var option = document.createElement("option");
            option.value = areas[i].id;
            option.text = areas[i].name;
            areaSelect.appendChild(option);
        }
    };
    xhr.send();
});
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