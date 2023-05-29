<?php
include '../../../Database/Config.php';
$SuccessMessage = "";
$curr_email = "";
error_reporting(0);

session_start();
if ($_SESSION['email']) {
    $curr_email = $_SESSION['email'];
}
$sql = "SELECT * FROM deliveryman where email='$curr_email'";
$result = mysqli_query($Conn, $sql);
if($result)
{
    $row = mysqli_fetch_assoc($result);

    // Access the location_id column value and store it in a variable
    $locationId = $row['location_id'];

    // Use the locationId variable as needed
}

$sql2 = "SELECT book_location_delivery.delivery_id as DeliveryID,book_location_delivery.copy_id as CopyId,customer.name as CustomerName,customer.contact_no as ContactNo,customer.email as email,book.name as BookName,book.ISBN as ISBN,location.area as Area FROM book_location_delivery,location,customer,deliveryman,book where location.location_id='$locationId' and book_location_delivery.location_id='$locationId' and deliveryman.location_id='$locationId'
 and book_location_delivery.ISBN=book.ISBN and book_location_delivery.email=customer.email
 ";

// Execute the query
$result2 = mysqli_query($Conn, $sql2);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Books to be delivered</title>
    <link href="../../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="../../../css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" />

</head>

<body>
    <div class="main-container">
        <?php
        require 'navbar.php';
        Navbar();
        ?>

        <div class="content-container w-75 mx-auto">
            <h1>Delivery Information</h1>

            <form action="" method="POST">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Book Title</th>
                                <th>Copy ID</th>
                                <th>Customer Name</th>
                                <th>Customer Contact</th>
                                <th>Delivery Address</th>
                                <th>Delivered</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                // Check if there are any records
                if (mysqli_num_rows($result2)) {
                    while($row = mysqli_fetch_assoc($result2)) {
                       
                ?>
                            <tr>
                                <td>
                                    <?php echo $row['BookName'];?>
                                </td>
                                <td>
                                    <?php echo $row['CopyId'];?>

                                </td>
                                <td>
                                    <?php echo $row['CustomerName'];?></td>

                                </td>
                                <td>
                                    <?php echo $row['ContactNo'];?>
                                </td>
                                </td>
                                <td>
                                    <?php echo $row['Area'];?>
                                </td>

                                </td>
                                <td><input type="checkbox" class="form-check-input" name="books[]"
                                        value="<?php  $row['DeliveryID']?>"></td>
                            </tr>
                            <?php 
                            }
                        }
                            ?>

                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>