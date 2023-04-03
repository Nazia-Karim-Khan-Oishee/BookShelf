<?php
include '../../../Database/Config.php';
// Check if division is set
if (isset($_POST['division'])) {

  // Escape special characters in division
  $division = mysqli_real_escape_string($Conn, $_POST['division']);
  echo $division;

  // Query to get all districts under the selected division
  $sql = "SELECT DISTINCT district FROM location WHERE division = '$division'";
  $result = mysqli_query($Conn, $sql);

  // Check if there are any districts found
  if (mysqli_num_rows($result) > 0) {
    // Create an array to hold the districts
    $districts = array();
    // Loop through all districts and add them to the array
    while ($row = mysqli_fetch_assoc($result)) {
      $districts[] = $row['district'];
    }
    // Return the districts as a JSON-encoded array
    echo json_encode($districts);
  } else {
    // If no districts found, display a message
    echo json_encode("NNo districts foundd");
  }

} else {
  // If division is not set, display a message
  echo json_encode(array('message' => 'Please select a division first'));
}

// Close the database Connection
mysqli_close($Conn);
?>
