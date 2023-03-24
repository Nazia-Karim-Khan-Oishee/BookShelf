<?php 

include 'Config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['user_name'])) 
{
    header("Location: dashboard.php");
}

if (isset($_POST['submit'])) 
{
    $Name = $_POST['Name'];
	$user_name = $_POST['user_name']; 
    $email = $_POST["email"];
	$Just_Set = false;
    $Validate = true;
	$MobileNumber = $_POST['MobileNumber'];
	$checkpassword = ($_POST['password']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $uppercase = preg_match('@[A-Z]@', $checkpassword);
    $lowercase = preg_match('@[a-z]@', $checkpassword);
    $number    = preg_match('@[0-9]@', $checkpassword);
    $specialchars = preg_match('@[^\w]@', $checkpassword);
    
    if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($checkpassword)<5 ) 
    {
        $Validate= false;
    }
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if($Validate)
	{        

        if ($password === $cpassword) 
        {
            if(strlen($MobileNumber)<11)
            {
                $MobileNumberErr = "Invalid Mobile Number.";
                unset($Name);
                unset($user_name);
                unset($MobileNumber);
                unset($email);
                $_POST['Name'] = "";
                $_POST['user_name'] = "";
                $_POST['email'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            }
            else
            {    
                if(strlen($user_name)<6)
                {
                    $usernameErr = "Length of username should be at least 6 characters.";
                    unset($Name);
                unset($user_name);
                unset($MobileNumber);
                unset($email);
                    $_POST['Name'] = "";
                $_POST['user_name'] = "";
                $_POST['email'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                }
                else
                {
                    $check_query = mysqli_query($Conn, "SELECT * FROM users where email ='$email'");
                    $rowCount = mysqli_num_rows($check_query);
                    if($rowCount > 0)
                    {
                        $emailErr = "User with email already exists!";
                        unset($Name);
                unset($user_name);
                unset($MobileNumber);
                unset($email);
                        $_POST['Name'] = "";
                $_POST['user_name'] = "";
                $_POST['email'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = ""; 
                    }
                    else
                    { 
                        $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
                        $result = mysqli_query($Conn, $sql);
                        if (!$result->num_rows > 0) 
                        {
                            $password=password_hash($password,PASSWORD_BCRYPT);
                            $sql = "INSERT INTO users (Name, user_name, MobileNumber,email, password)
                                    VALUES ('$Name', '$user_name', '$MobileNumber', '$email', '$password')";
                            $result = mysqli_query($Conn, $sql);
                            // echo"hello world";
                            if ($result)
                            {
                                $otp = rand(100000,999999);
                                $_SESSION['otp'] = $otp;
                                $_SESSION['email'] = $email;
                                require "Mail/phpmailer/PHPMailerAutoload.php";
                                $mail = new PHPMailer;
                
                                $mail->isSMTP();
                                $mail->Host='smtp-relay.sendinblue.com';
                                $mail->Port=587;
                                $mail->SMTPAuth=true;
                                $mail->SMTPSecure='tls';
                
                                $mail->Username='#######';
                                $mail->Password='#######';
                
                                $mail->setFrom('#######','OTP Verification');
                                $mail->addAddress($_POST["email"]);
            
                                $mail->isHTML(true);
                                $mail->Subject = "Your verification code";
                                $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                                <br>
                                <p></p>
                                <br>
                                <p>With regrads,</p>
                                <b>Agrowculture</b>";
                
                                if(!$mail->send())
                                {
                                    $emailErr="Error in sending email";
                                    $delsql = "DELETE FROM users WHERE user_name = '$user_name'";
                                    $result = mysqli_query($Conn, $delsql);
                                    unset($Name);
                                    unset($user_name);
                                    unset($MobileNumber);
                                    unset($email);
                                    $_POST['Name'] = "";
                $_POST['user_name'] = "";
                $_POST['email'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                                }
                                else
                                { 
                                    unset($Name);
                unset($user_name);
                unset($MobileNumber);
                unset($email);
                                    $_POST['Name'] = "";
                $_POST['user_name'] = "";
                $_POST['email'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                                    header('Location: verification.php');     
                                }
                                $_POST['password'] = "";
                                $_POST['cpassword'] = "";
                            } 
                            else 
                            {
                                $err="Something Wrong Went.Please try again later.";
                                $delsql = "DELETE FROM users WHERE user_name = '$user_name'";
                                    $result = mysqli_query($Conn, $delsql);
                                unset($Name);
                unset($user_name);
                unset($MobileNumber);
                unset($email);
                                $_POST['Name'] = "";
                $_POST['user_name'] = "";
                $_POST['email'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                            }
                        } 
                        else 
                        {
                            $usernameErr="user_name already exists.";
                            unset($Name);
                unset($user_name);
                unset($MobileNumber);
                unset($email);
                            $_POST['Name'] = "";
                $_POST['user_name'] = "";
                $_POST['email'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                        }
                    }
                }
            } 
        }
        else 
        {
            $ConfirmErr = "Password Doesn't Not Match.";
            unset($Name);
                unset($user_name);
                unset($MobileNumber);
                unset($email);
            unset($Name);
            unset($user_name);
            unset($MobileNumber);  unset($email);
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
        }
    }

    else 
    {   
        $PassErr="Password should contain at least one uppercase letter, one lowercase letter, one special character and one number";
        unset($Name);
                unset($user_name);
                unset($MobileNumber);
                unset($email);
            unset($Name);
            unset($user_name);
            unset($MobileNumber);  unset($email);
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
    }
}
else 
{
    $emailErr="Invalid Email";
                                    
                                    unset($Name);
                                    unset($user_name);
                                    unset($MobileNumber);
                                    unset($email);
                                    $_POST['Name'] = "";
                $_POST['user_name'] = "";
                $_POST['email'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SignUp.css">
    <link href="http://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Create Account</title>
</head>

<body>
    <div class="navbar">
        <nav>

            <ul>
                <li>
                    <div class="zoom"><a href="getstartedpage.php">HOME</a></div>
                </li>
                <li>
                    <div class="zoom"><a href="4optionss.php">SERVICES</a></div>
                </li>
                <!--<li><div class="zoom"><a href="dashboard.php">DASHBOARD</a></div></li> -->
            </ul>

        </nav>
    </div>
    <div class="container1">
        <div class="container">
            <form class="form" action="" method="POST" id="createAccount">
                <h1 class="form__title">Create Account</h1>
                <!-- Name -->
                <div class="form__message form__message--error"></div>
                <span class="error"> <?php echo $err;?></span>

                <div class="form__input-group">
                    <!-- <div class="tooltip"> -->
                    <input type="text" class="form__input" name="Name" autofocus placeholder="Name" autocomplete="off"
                        value="<?php echo $Name; ?>" required>
                    <!-- <span class="tooltiptext">Tooltip text</span> -->
                    <!-- </div> -->
                    <div class="form__input-error-message"></div>
                </div>
                <!-- Username -->
                <div class="form__input-group">
                    <div class="tooltip">
                        <input type="text" class="form__input" name="user_name" autofocus placeholder="Username"
                            autocomplete="off" value="<?php echo $user_name; ?>" required>
                        <span class="tooltiptext">Length of username should be at least 6 characters.</span>
                    </div>
                    <span class="error"> <?php echo $usernameErr;?></span>
                    <div class="form__input-error-message"></div>
                </div>
                <!-- Mobile Number -->
                <div class="form__input-group">
                    <!-- <div class="tooltip"> -->
                    <input type="text" class="form__input" name="MobileNumber" autofocus placeholder="Mobile Number"
                        autocomplete="off" value="<?php echo $MobileNumber; ?>" required>
                    <!-- <span class="tooltiptext">Tooltip text</span>
                </div> -->
                    <span class="error"> <?php echo $MobileNumberErr;?></span>
                    <div class="form__input-error-message"></div>
                    <div class="form__input-error-message"></div>
                </div>
                <!-- Email -->
                <div class="form__input-group">
                    <!-- <div class="tooltip"> -->
                    <input type="text" class="form__input" name="email" autofocus placeholder="email ID"
                        autocomplete="off" value="<?php echo $email; ?>" required>
                    <!-- <span class="tooltiptext">Tooltip text</span>
                </div> -->
                    <span class="error"> <?php echo $emailErr;?></span>
                    <div class="form__input-error-message"></div>
                    <div class="form__input-error-message"></div>
                </div>
                <!-- Password -->
                <div class="tooltip">
                    <div class="form__input-group">
                        <input type="password" class="form__input" name="password" id="myInput" autofocus
                            placeholder="Password" autocomplete="off" value="<?php echo $_POST['password']; ?>"
                            required>
                        <input type="checkbox" onclick="myFunction()"><span class="error2">Show Password</span><br>
                        <span class="tooltiptext">Password should contain at least one uppercase letter, one lowercase
                            letter, one special character and one number</span>
                    </div>
                    <span class="error"> <?php echo $PassErr;?></span>
                    <div class="form__input-error-message"></div>
                    <div class="form__input-error-message"></div>
                </div>
                <!-- Confirm Password -->
                <div class="form__input-group">
                    <!-- <div class="tooltip"> -->
                    <input type="password" class="form__input" name="cpassword" id="myInput2" autofocus
                        placeholder="Confirm Password" autocomplete="off" value="<?php echo $_POST['cpassword']; ?>"
                        required>
                    <input type="checkbox" onclick="myFunction2()"><span class="error2">Show Password</span><br>
                    <!-- <span class="tooltiptext">Tooltip text</span>
                </div> -->
                </div>
                <span class="error"> <?php echo $ConfirmErr;?></span>
                <div class="form__input-error-message"></div>
                <div class="form__input-error-message"></div>
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
                <!-- Submit -->
                <input type="submit" name="submit" class="form__button" value="Continue" />
                <br>
                <br>
                <p class="form__text">
                    <a class="form__link" href="INDEX.php" id="linkLogin">Already have an account? Sign in</a>
                </p>
            </form>
        </div>
        <br>
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
            <div>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>