<?php
include '../../../Database/Config.php';

// Check if the division ID is set
if (isset($_POST['division'])) {
    // Retrieve the division ID from the POST data
    $division = $_POST['division'];
    echo "hello";

    // Query to fetch the districts that belong to the selected division
    $sql = "SELECT district FROM location WHERE division = $division";

    // Execute the query and fetch the results
    $result = mysqli_query($Conn, $sql);
    $districts = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $districts[] = $row;
    }

    // Return the districts as a JSON-encoded array
    echo json_encode($districts);
}

// Close the database connection
mysqli_close($Conn);
?>
