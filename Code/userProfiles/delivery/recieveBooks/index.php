<?php
include '../../../Database/Config.php';
$SuccessMessage = "";
$curr_email = "";
error_reporting(0);

session_start();
if ($_SESSION['email']) {
    $curr_email = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Books to be recieved</title>
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

            <form action="process_delivery.php" method="POST">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Book Title</th>
                                <th>Copy ID</th>
                                <th>Customer Name</th>
                                <th>Customer Contact</th>
                                <th>Customer Address</th>
                                <th>Recieved</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Book 1</td>
                                <td>1</td>
                                <td>Arpa</td>
                                <td>016969420</td>
                                <td>Gorib jayga</td>
                                <td><input type="checkbox" class="form-check-input" name="books[]" value="Book 1"></td>
                            </tr>
                            <tr>
                                <td>Book 2</td>
                                <td>2</td>
                                <td>Oishee</td>
                                <td>0171717171</td>
                                <td>Shobuj poth</td>
                                <td><input type="checkbox" class="form-check-input" name="books[]" value="Book 1"></td>
                            </tr>
                            
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
