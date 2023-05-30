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
                    // echo "<script>alert('$locationId');</script>";

}

$sql2 = "SELECT DISTINCT book_location_retrieval.retrieval_id as DeliveryID,book_location_retrieval.copy_id as CopyId,customer.fine_amount as FineAmount, customer.name as CustomerName,customer.contact_no as ContactNo,customer.email as email,book.name as BookName,book.ISBN as ISBN,location.area as Area 
FROM book_location_retrieval,location,customer,deliveryman,book where location.location_id='$locationId' and book_location_retrieval.location_id='$locationId' and deliveryman.location_id='$locationId'
 and book_location_retrieval.ISBN=book.ISBN and book_location_retrieval.email=customer.email and book_location_retrieval.retrieval_date<NOW()
";

$result2 = mysqli_query($Conn, $sql2);

if (isset($_POST['submit'])) {
    if (!empty($_POST['books'])) {
        $deliveryIds = $_POST['books'];
        $deliveryIds = array_map(function($id) use ($Conn) {
            return mysqli_real_escape_string($Conn, $id);
        }, $deliveryIds); // Sanitize the delivery IDs

        $deliveryIdsString = "'" . implode("','", $deliveryIds) . "'"; // Create a comma-separated string of quoted delivery IDs

        $find_delivery_ids = "SELECT copy_id FROM book_location_retrieval WHERE retrieval_id IN ($deliveryIdsString)";
        $result3 = mysqli_query($Conn, $find_delivery_ids);

        if ($result3) {
            $copyIds = array();

            while ($row_result = mysqli_fetch_assoc($result3)) {
                $copyIds[] = $row_result['copy_id'];
            }

            $copyIdsString = "'" . implode("','", $copyIds) . "'"; // Create a comma-separated string of quoted copy IDs
            $update_copy_id = "UPDATE all_copies_of_books SET borrowed = 0 WHERE copy_id IN ($copyIdsString)";
            $update = mysqli_query($Conn, $update_copy_id);
            $sql = "update customer set fine_amount=0 where email in (select email from book_location_retrieval where retrieval_id IN ($deliveryIdsString))";
            $result = mysqli_query($Conn, $sql);
            $del_delivery_id = "DELETE FROM book_location_retrieval WHERE retrieval_id IN ($deliveryIdsString)";
            $delete = mysqli_query($Conn, $del_delivery_id);
            

            if ($delete) {
                echo "<script>alert('Selected retrievals deleted successfully.');</script>";

                 header("Location: index.php");

            } else {
                echo "<script>alert('Failed to delete selected retrievals.');</script>";
                // echo "<script>alert('$deliveryIdsString');</script>";
            }
        }

    }
            $sql2 = "select location_id FROM deliveryman where email='$curr_email' ";
            $result2 = mysqli_query($Conn, $sql2);
            $row = mysqli_fetch_assoc($result2);
            $locationId = $row['location_id'];
            $sql= "update customer set fine_amount= fine_amount+100, effective_date=NOW() where email in (select email from book_location_retrieval where location_id='$locationId' and retrieval_date<NOW())";
            $result = mysqli_query($Conn, $sql);
            $sql= "update book_location_retrieval set retrieval_date= DATE_ADD(NOW(), INTERVAL 5 MINUTE) where location_id='$locationId' and retrieval_date<NOW()";
            $result = mysqli_query($Conn, $sql);
            header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Books to be received</title>
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
            <h1>Retrieval Information</h1>

            <form action="" method="POST">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Book Title</th>
                                <th>Copy ID</th>
                                <th>Customer Name</th>
                                <th>Customer Contact</th>
                                <th>Fine Amount</th>
                                <th>Customer Address</th>
                                <th>Received</th>
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
                                <td>
                                    <?php echo $row['FineAmount'];?>
                                </td>
                                <td>
                                    <?php echo $row['Area'];?>
                                </td>
                                <td><input type="checkbox" class="form-check-input" name="books[]"
                                        value="<?php echo $row['DeliveryID']; ?>"></td>
                            </tr>
                            <?php 
                            }
                        }
                            ?>

                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>