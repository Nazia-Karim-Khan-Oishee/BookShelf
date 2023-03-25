<?php 

include 'Config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email'])) 
{
     header("Location: dashboard.php");
    //  echo"hello world";

}

if (isset($_POST['submit'])) 
{
	$email = $_POST['email'];
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
                $_POST['password'] = "";
                $_POST['email'] = "";
                //unset($user_name);
                header("Location: dashboard.php");
                // echo"hello ". $row['email'];

    
            }
            else 
            {
                $WrongPass="Wrong Password.";
                $_POST['password'] = "";
                $_POST['user_name'] = "";
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
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


    <link rel="stylesheet" href="LogIn.css">
    <link href="http://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Log In</title>
</head>

<body>
    <div class="navbar">
        <nav>

            <ul>
                <li>
                    <div class="zoom"><a href="SignUp.php">HOME</a></div>
                </li>

                <!--<li><div class="zoom"><a href="dashboard.php">DASHBOARD</a></div></li> -->
            </ul>

        </nav>
    </div>

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
                <a href="SignUp.php">Create account</a>
            </p>
            </form>
        </div>
    </div>
    <footer>
        <div class="row">
            <div class="col">
                <h3>AGROWCULTURE</h3>
                <p>AgrowCulture is a platform created to expand the exposure of the people working in the agricultural
                    sector. On a single platform, AgrowCulture connects these people with funders and customers by
                    eliminating intermediaries. It also enables Bangladesh agriculture financing. Anyone can connect
                    through AgrowCulture to help finance our farmers.</p>
            </div>
            <div class="col">
                <h5>Address <div class="underline"><span></span></div>
                </h5>
                <p>Islamic University of Technology</p>
                <p>Boardbazar, Gazipur</p>
            </div>
            <div class="col">
                <h5>Links <div class="underline"><span></span></div>
                </h5>
                <ul>
                    <li><a href="getstartedpage.php">HOME</a></li>
                    <li><a href="4optionss.php">SERVICES</a></li>
                    <li><a href="aboutus.php">ABOUT US</a></li>
                    <li><a href="aboutus.php">CONTACTS</a></li>
                </ul>
            </div>

            <ul class="social_icon">
                <li><a href="#">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a></li>
                <li><a href="#">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a></li>
                <li><a href="#">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a></li>
                <li><a href="#">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a></li>
            </ul>
        </div>
        <hr>
        <p class="copyright">2022 Copyright © AgrowCulture. | Legal | Privacy Policy | Design by Namiha</p>

        </div>
    </footer>
</body>

</html>