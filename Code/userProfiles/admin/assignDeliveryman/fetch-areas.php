<?php
include '../../../Database/Config.php';
// Check if district is set
if (isset($_POST['district'])) {

  // Escape special characters in district
  $district = mysqli_real_escape_string($Conn, $_POST['district']);

  // Query to get all areas under the selected district
  $sql = "SELECT DISTINCT area FROM location WHERE district = '$district'";
  $result = mysqli_query($Conn, $sql);

  // Check if there are any areas found
  if (mysqli_num_rows($result) > 0) {
    // Create an array to hold the areas
    $areas = array();
    // Loop through all areas and add them to the array
    while ($row = mysqli_fetch_assoc($result)) {
      $areas[] = $row['area'];
    }
    // Return the areas as a JSON-encoded array
    echo json_encode($areas);
  } else {
    // If no areas found, display a message
    echo json_encode("No areas found");
  }

} else {
  // If district is not set, display a message
  echo json_encode(array('message' => 'Please select a district first'));
}

// Close the database Connection
mysqli_close($Conn);
?>
