<?php
include '../../../Database/Config.php';

// Check if the district ID is set
if (isset($_POST['district'])) {
    // Retrieve the district ID from the POST data
    $district = $_POST['district'];

    // Query to fetch the areas that belong to the selected district
    $sql = "SELECT * FROM location WHERE district_id = $district";

    // Execute the query and fetch the results
    $result = mysqli_query($Conn, $sql);
    $areas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $areas[] = $row;
    }

    // Return the areas as a JSON-encoded array
    echo json_encode($areas);
}

// Close the database connection
mysqli_close($Conn);
?>
