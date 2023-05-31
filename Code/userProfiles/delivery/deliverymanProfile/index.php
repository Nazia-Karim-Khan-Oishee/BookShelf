<?php
include '../../../Database/Config.php';
$SuccessMessage = "";
$curr_email = "";
error_reporting(0);

session_start();
if ($_SESSION['email']) {
    $curr_email = $_SESSION['email'];
}

// $sqlo = "SELECT * FROM deliveryman where email='$curr_email'";
// $resulto = mysqli_query($Conn, $sql);
// $rowo = mysqli_fetch_assoc($result);
// if(!$rowo[location_id])
// {

// }
$area="Not assigned";
$district="Not assigned";
$division="Not assigned";

$sql = "SELECT * FROM deliveryman WHERE email='$curr_email'";
// and location.location_id=deliveryman.location_id";
$result = mysqli_query($Conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row[location_id])
{
    // and location.location_id=deliveryman.location_id";
$sqlo = "SELECT * FROM location.location_id=deliveryman.location_id";
$resulto = mysqli_query($Conn, $sqlo);
$rowo = mysqli_fetch_assoc($resulto);
$area=$rowo['area'];
$district=$rowo['district'];
$division=$rowo['division'];
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['mobile'];

    $sql = "UPDATE deliveryman SET name='$name', contact_no='$contact' WHERE email='$curr_email'";
    if (mysqli_query($Conn, $sql)) {
        $_SESSION['flash_message'] = "Profile updated successfully.";
        if (isset($_SESSION['flash_message'])) {
            $message = $_SESSION['flash_message'];
            unset($_SESSION['flash_message']);
        }
        
    } else {
        $_SESSION['flash_message'] = "ERROR: Could not update profile.";
        if (isset($_SESSION['flash_message'])) {
            $message = $_SESSION['flash_message'];
            unset($_SESSION['flash_message']);
        }
        echo '<script>window.reload()</script>';
    }
    header("Location: index.php");
}

if(isset($_POST['updateProfile'])){
$Get_image_name = $_FILES['image']['name'];
$image_Path = "../../../../images/".basename($Get_image_name);
$sql = "Update deliveryman set picture='$Get_image_name' where email='$curr_email'";
// $upload=mysqli_query($Conn, $sql);
if(mysqli_query($Conn, $sql) ){
    echo "<script>alert('hello')</script>";
move_uploaded_file($_FILES['image']['tmp_name'], $image_Path);

  $_SESSION['flash_message']="profile picture uploaded successfully.";
  if(isset($_SESSION['flash_message'])) {
      $message = $_SESSION['flash_message'];
      unset($_SESSION['flash_message']);
      //echo $message;
  }
   //echo "Book added successfully.";
} else{
  $_SESSION['flash_message']="ERROR: Could not able to upload profile picture";
  if(isset($_SESSION['flash_message'])) {
      $message = $_SESSION['flash_message'];
      unset($_SESSION['flash_message']);
  //echo "ERROR: Could not able to execute $sql. " . mysqli_error($Conn);
}
    echo '<script>window.reload()</script>';

}
header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Deliveryman Profile</title>
    <link href="../../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="../../../css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" />
    <script defer src="script.js"></script>
</head>

<body>
    <div class="main-container d-flex">
        <?php
        require 'navbar.php';
        Navbar();
        ?>
        <section class="container-fluid m-auto">
            <div class="d-flex justify-content-center">
                <div class="profile-deliveryman">
                    <img src="" class="rounded mt-5" width="150px" />
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input class="d-none" type="file" name="img" accept="image/*" />
                        <?php
                        if ($row['picture'] != null) {
                            echo "<img src='../../../../images/" . $row['picture'] . "' style='width:200px;height:150px;'>";
                        } else {
                            echo "<img src='../../../../images/user.jpg' style='width:200px;height:150px;'>";
                        }
                        ?>
                        <br>
                        <br>
                        <div class="input-group w-75">
                            <input type="file" name="image" class="form-control profile" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image">
                        </div>
                        <input type="submit" name="updateProfile" class="btn btn-dark mt-1" id="inputGroupFileAddon04"
                            name="profileimg" value="Update Profile Picture" /><br>
                        <span class="error"><?php echo $message; ?></span>
                    </form>
                </div>
                <div>
                    <div class="card profile-card">
                        <div class="card-body">
                            <h4 class="card-title">Profile</h4>
                            <form id="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                                method="POST">
                                <div id="errorPass" class="form-label"></div>
                                <div class="row mt-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="<?php echo $row['name']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="<?php echo $row['email']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Contact</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            value="<?php echo $row['contact_no']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Area</label>
                                        <input type="text" class="form-control" id="area" name="area"
                                            value="<?php echo $area; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">District</label>
                                        <input type="text" class="form-control" id="district" name="district"
                                            value="<?php echo $district; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Division</label>
                                        <input type="text" class="form-control" id="division" name="division"
                                            value="<?php echo $division; ?>" disabled>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-dark mt-1" name="submit" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>