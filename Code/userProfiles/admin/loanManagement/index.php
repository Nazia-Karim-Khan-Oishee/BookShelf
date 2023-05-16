<?php 
include '../../../Database/Config.php';
session_start(); 
if (!isset($_SESSION['email'])) {
    // User is not logged in, redirect to the login page
    header('Location: http://localhost/BookShelf/Code/LoginAuth/login.php');
    exit;
}
$sql = "SELECT name, contact_no, fine_amount, effective_date FROM customer WHERE fine_amount > 0 and effective_date < SYSDATE()";
$result = $Conn->query($sql);
?>
<!DOCTYPE html>
<html><head>
    <title>Loan Information</title>
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
            <h1>Loan Information</h1>
        </div>
        <table id="book-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Contact No</th>
                    <th>Fine Amount to be paid</th>
                    <th>Effective Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['contact_no'] . "</td>";
                        echo "<td>" . $row['fine_amount'] . "</td>";
                        echo "<td>" . $row['effective_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No loan information found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>