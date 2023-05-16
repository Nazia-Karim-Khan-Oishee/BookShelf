<?php 

include '../Database/Config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email'])) 
{
    if($_SESSION['email']==="admin@gmail.com")
    {
    header("Location: ../userProfiles/admin/viewBooks/index.php");

    }
    if( $_SESSION['role']==="Reader")
    {
      header("Location: ../userProfiles/customer/browseBooks/index.php");
      }
    else 
    {
      header("Location: ../userProfiles/delivery/checklist.php");
    }  

}

if (isset($_POST['submit'])) 
{
	$email = $_POST['email'];
            $password = ($_POST['password']);
    if($email === 'admin@gmail.com' && $password === 'admin')
    {
        $_SESSION['email'] = 'admin@gmail.com';
        header("Location: ../userProfiles/admin/viewBooks/index.php");
        
    }
    else {
        
        $password = md5($_POST['password']);
        //$cpassword = md5($_POST['cpassword']);
        $sql = "SELECT * FROM users WHERE email='$email'";// AND password='$password'";
        $result = mysqli_query($Conn, $sql);
        if ($result->num_rows > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            
                 
                if(password_verify($password,$row['password']))
                {
        
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['role'] = $row['role'];
                    if( $_SESSION['role']==="Reader")
                    {
                        $sql_customer = "SELECT * FROM customer WHERE email='$email'";// AND password='$password'";
                        $result_customer = mysqli_query($Conn, $sql_customer);
                        $res_customer = mysqli_fetch_assoc($result_customer);
                        $_SESSION['user_name'] = $res_customer['name'];
                       // echo $_SESSION['user_name'];
    
                        $_POST['password'] = "";
                        $_POST['email'] = "";
                        //unset($user_name);
                        header("Location: ../userProfiles/customer/browseBooks/index.php");
                        // echo"hello ". $row['email'];
    
                    }
                 else
                    {
                         $sql_deliveryman = "SELECT * FROM deliveryman WHERE email='$email'";// AND password='$password'";
                        $result_deliveryman = mysqli_query($Conn, $sql_deliveryman);
                        $res = mysqli_fetch_assoc($result_deliveryman);
                        $_SESSION['user_name'] = $res['name'];
                        echo $_SESSION['user_name'];
                        $_POST['password'] = "";
                        $_POST['email'] = "";
                        //unset($user_name);
                        header("Location: ../userProfiles/delivery/checklist.php");
                        // echo"hello ". $row['email'];
    
                    }
        
                }
                else 
                {
                    $WrongPass="Wrong Password.";
                    $_POST['password'] = "";
                    $_POST['email'] = "";
                    unset($user_name);
                }
           
        } 
        else 
        {
            $WrongUser="Invalid Email.";
            $_POST['password'] = "";
            $_POST['email'] = "";
            unset($user_name);
            // echo "<p class='er'>Wrong Password.</big></p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />

    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="login.css">
    <link href="http://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Log In</title>
</head>

<body>
    <?php
  require 'navbar.php';
  Navbar();
  ?>


    <div class="container1">

        <div class="container">
            <div class="titleDiv">
                <h1 class="form__title">Login</h1>
                <p class="form__text">Welcome back!</p>
            </div>
            <form action="" method="POST" class="form" id="login">
                <div class="form__message form__message--error"></div>
                <!-- email -->
                <div class="form__input-group">
                    <input type="email" class="form__input" name="email" id="email" autofocus placeholder="Enter email"
                        autocomplete="off" value="<?php echo $email; ?>" required>
                    <span class="error"> <?php echo $WrongUser;?></span>
                    <div class="form__input-error-message"></div>
                </div>
                <!-- Password -->
                <div class="form__input-group">
                    <input type="password" class="form__input" name="password" id="myInput" autofocus
                        placeholder="Enter password" autocomplete="off" value="<?php echo $_POST['password']; ?>"
                        required>
                    <input type="checkbox" onclick="myFunction()"><span class="error2">Show Password</span><br>
                    <span class="error"> <?php echo $WrongPass;?></span>
                    <div class="form__input-error-message"></div>
                </div>
                <script>
                function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }

                function myFunction2() {
                    var x = document.getElementById("myInput2");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
                </script>
                <button class="form__button" type="submit" id="submitBtn" name="submit" value="Login"
                    requied>Continue</button>
            </form>

            <p class="form__text">Don't have an account?
                <a href="signup.php">Create account</a>
            </p>
            </form>
        </div>
    </div>

</body>

</html>