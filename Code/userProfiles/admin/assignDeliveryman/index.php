<?php
include '../../../Database/Config.php';

// Check if a book ID is set in the URL
session_start();
if (!isset($_SESSION['email'])) {
    // User is not logged in, redirect to the login page
    header('Location: ../../../LoginAuth/login.php');
    exit;
}
if (isset($_POST['submit'])) {

    $division = $_POST['division'];
    $district = $_POST['district'];
    $area = $_POST['area'];
    $sql = "SELECT LOCATION_ID FROM location WHERE division='$division' AND district='$district' AND area='$area' LIMIT 1";
    $result = mysqli_query($Conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $location_id = $row['LOCATION_ID'];
    $result = mysqli_query($Conn, $sql);
    $email = $_POST['email'];

    // Update the deliveryman's location in the database
    $updateSql = "UPDATE deliveryman SET location_id='$location_id' WHERE email='$email'";
    mysqli_query($Conn, $updateSql);
}
// Fetch all deliverymen from the database
$sql="SELECT * 
FROM deliveryman
LEFT OUTER JOIN location ON deliveryman.location_id = location.location_id";

$result = mysqli_query($Conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
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
        <div class="container d-flex justify-content-center mt-3">

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Area</th>
                        <th>District</th>
                        <th>Division</th>
                        <th>Assign</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <div class="modal fade" id="exampleModal<?php echo $row['email'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Assign</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['area']; ?></td>
                        <td><?php echo $row['district']; ?></td>
                        <td><?php echo $row['division']; ?></td>
                        <td><button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal<?php echo $row['email'] ?>">Assign Location</button></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
<script>
$(document).ready(function() {
    $(document).on("change", "#division", function() {
        var division = $(this).val();
        var districtSelect = $(this).closest(".modal-content").find("#district");
        $.ajax({
            url: "fetch-districts.php",
            method: "POST",
            data: {
                division: division
            },
            dataType: "text",
            success: function(data) {
                districtSelect.html(data);
                var districtsString = data.substring(data.indexOf('["') + 2, data
                    .lastIndexOf('"]'));
                var districts = districtsString.split('","');
                districtSelect.find('option').remove();
                for (var i = 0; i < districts.length; i++) {
                    var option = document.createElement("option");
                    option.value = districts[i];
                    option.text = districts[i];
                    districtSelect.append(option);
                    console.log(districts[i]);
                }
            }
        });
    });

    $(document).on("change", "#district", function() {
        var district = $(this).val();
        var areaSelect = $(this).closest(".modal-content").find("#area");
        $.ajax({
            url: "fetch-areas.php",
            method: "POST",
            data: {
                district: district
            },
            dataType: "text",
            success: function(data) {
                areaSelect.html(data);
                var areasString = data.substring(data.indexOf('["') + 2, data.lastIndexOf(
                    '"]'));
                var areas = areasString.split('","');
                areaSelect.find('option').remove();
                for (var i = 0; i < areas.length; i++) {
                    var option = document.createElement("option");
                    option.value = areas[i];
                    option.text = areas[i];
                    areaSelect.append(option);
                    console.log(areas[i]);
                }
            }
        });
    });
});
</script>



</html>