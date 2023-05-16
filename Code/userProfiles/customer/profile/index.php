<?php 

include '../../../Database/Config.php';
$SuccessMessage="";
$curr_email="";
error_reporting(0);

session_start();
if($_SESSION['email']){

    $curr_email =  $_SESSION['email'];
}


if(isset($_POST['submit'])){
$Get_image_name = $_FILES['image']['name'];
$image_Path = "../../../../images/".basename($Get_image_name);
$sql = "Update customer set picture='$Get_image_name' where email='$curr_email'";
// $upload=mysqli_query($Conn, $sql);
if(mysqli_query($Conn, $sql) ){
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

}
}
$sql = "Select * from customer where email='$curr_email'";
$result=mysqli_query($Conn, $sql) ;
$result2=mysqli_query($Conn, $sql) ;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
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
                <div class="profile-customer">
                    <img src="" class="rounded mt-5" width="150px" />
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input class="d-none" type="file" name="img" accept="image/*" />
                        <?php
                             $row = mysqli_fetch_assoc($result);
                             if($row['picture']!=null)
                                 {

                            echo "<img src='../../../../images/".$row['picture']."'  style = 'width:200px;height:150px;' >";?>
                        <br>
                        <?php }
                        else {
                            echo "<img src='../../../../images/user.jpg'  style = 'width:200px;height:150px;' >";?>
                        <br>
                        <?php }

                        
                            ?>
                        <br>
                        <div class="input-group w-75">
                            <input type="file" name="image" class="form-control profile" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image">
                        </div>
                        <input type="submit" name="submit" class="btn btn-dark mt-3" id="inputGroupFileAddon04"
                            name="profileimg" value="Update Profile Picture" /><br>
                        <span class="error"> <?php echo $message;?></span>

                    </form>
                </div>
                <div>
                    <div class="card profile-card">
                        <div class="card-body">
                            <h4 class="card-title">Profile</h4>
                            <form id="form" action="" method="POST">
                                <?php 
           $row = mysqli_fetch_assoc($result2)?>
                                <div id="errorPass" class="form-label"></div>
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder=<?php echo $row['name']?> disabled>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder=<?php echo $row['email']?> disabled>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Contact</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            placeholder=<?php echo $row['contact_no']?> disabled>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Fine amount</label>
                                        <input type="number" class="form-control" name="amount" id="amount"
                                            placeholder="Fine amount" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>