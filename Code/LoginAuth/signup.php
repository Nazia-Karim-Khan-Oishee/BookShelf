<?php 

include '../Database/Config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email'])) 
{
    if( $_SESSION['role']==="Reader")
                {
                    
                    header("Location: ../userProfiles/customer/dashboard.php");
                }
else {
                    header("Location: ../userProfiles/delivery/dashboard.php");

}
      //   echo "hello customer";

}

if (isset($_POST['submit'])) 
{
    
    $email = $_POST["email"];
    $contact_no = $_POST["contact_no"];
	$Just_Set = false;
    $Validate = true;
    $role = $_POST['Field'];
    $user_name = $_POST['user_name'];
	 $_SESSION['email'] = $email;
      $_SESSION['role'] = $role;
        $_SESSION['user_name'] = $user_name;
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
        if(strlen($contact_no)==11)
        {
               if($Validate)
            {        
                if ($password === $cpassword) 
                {
                    
                    
                    $check_query = mysqli_query($Conn, "SELECT * FROM users where email ='$email'");
                    $rowCount = mysqli_num_rows($check_query);
                    if($rowCount > 0)
                    {
                        $emailErr = "User with email already exists!";
                        unset($email);
                    unset($password);
                    unset($cpassword);
                    unset($user_name);
                     unset($contact_no);
                                   $_POST['contact_no'] = "";
                     $_POST['user_name'] = "";
                    $_POST['email'] = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = ""; 
                }
                
                else
                {
                    $password=password_hash($password,PASSWORD_BCRYPT);
                    if($role ==="Reader")
                    {
                               
                              $sql = "INSERT INTO users (email, password, role) 
                                         VALUES ('$email', '$password', '$role')";
    
                                $result = mysqli_query($Conn, $sql);
                                $sql_customer = "INSERT INTO customer (email, name, contact_no, fine_amount) 
                                         VALUES ('$email', '$user_name', '$contact_no', 0)";
                                         $result2 = mysqli_query($Conn, $sql_customer);
    
                                if($result && $result2 )
                                {
    
                                     header("Location: ../userProfiles/customer/browseBooks/index.php");
                                      unset($email);
                                    unset($password);
                                    unset($cpassword);
                                    unset($user_name);
                                     unset($contact_no);
                                   $_POST['contact_no'] = "";
                                    $_POST['email'] = "";
                                    $_POST['password'] = "";
                                    $_POST['cpassword'] = "";
                                    $_POST['user_name'] = "";
                                 
                                }
                                else 
                                {
                                     echo"something went wrong";
                                      unset($email);
                                    unset($password);
                                    unset($cpassword);
                                    unset($user_name);
                                     unset($contact_no);
                                   $_POST['contact_no'] = "";
                                    $_POST['email'] = "";
                                    $_POST['password'] = "";
                                    $_POST['cpassword'] = "";
                                    $_POST['user_name'] = "";
    
                                }
                              }
                              else {
                                
                              $sql = "INSERT INTO users (email, password, role) 
                                         VALUES ('$email', '$password', '$role')";
    
                                $result = mysqli_query($Conn, $sql);
                                $sql_deliveryman = "INSERT INTO deliveryman (email, name, contact_no) 
                                         VALUES ('$email', '$user_name', '$contact_no')";
                                         $result2 = mysqli_query($Conn, $sql_deliveryman);
    
                                if($result && $result2 )
                                {
    
                                     header("Location: ../userProfiles/delivery/checklist.php");
                                      unset($email);
                                    unset($password);
                                    unset($cpassword);
                                    unset($user_name);
                                     unset($contact_no);
                                   $_POST['contact_no'] = "";
                                    $_POST['email'] = "";
                                    $_POST['password'] = "";
                                    $_POST['cpassword'] = "";
                                    $_POST['user_name'] = "";
                                 
                                }
                                else 
                                {
                                     echo"something went wrong";
                                      unset($email);
                                    unset($password);
                                    unset($cpassword);
                                    unset($user_name);
                                     unset($contact_no);
                                   $_POST['contact_no'] = "";
                                    $_POST['email'] = "";
                                    $_POST['password'] = "";
                                    $_POST['cpassword'] = "";
                                    $_POST['user_name'] = "";
    
                                }
                              }
                             
                        }
                    }
                                else 
                                {
                                    $ConfirmErr="Password doesn't match";
                                   
                                    unset($email);
                                    unset($password);
                                    unset($cpassword);
                                    unset($user_name);
                                    unset($contact_no);
                                   $_POST['contact_no'] = "";
                                    $_POST['email'] = "";
                                    $_POST['password'] = "";
                                    $_POST['cpassword'] = "";
                                    $_POST['user_name'] = "";
    
                                }
                             
        }
        else 
        {   
            $PassErr="Password should contain at least one uppercase letter, one lowercase letter, one special character and one number";
            unset($email);
                unset($password);
                unset($cpassword);
                unset($user_name);   
                unset($contact_no);
                $_POST['contact_no'] = "";
                $_POST['email'] = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                $_POST['user_name'] = "";
        }
        }
        else {
                       $contactErr="Contact no must be 11 digits long";
                           
                                     unset($email);
                                unset($password);
                                unset($cpassword);
                                unset($user_name);
                                unset($contact_no);
                                $_POST['contact_no'] = "";
                                $_POST['email'] = "";
                                $_POST['password'] = "";
                                $_POST['cpassword'] = "";
                                $_POST['user_name'] = "";
        }
    }
                    else 
                    {
                          $emailErr="Invalid Email";
                           
                                     unset($email);
                                unset($password);
                                unset($cpassword);
                                unset($user_name);
                                 unset($contact_no);
                                $_POST['contact_no'] = "";
                                $_POST['email'] = "";
                                $_POST['password'] = "";
                                $_POST['cpassword'] = "";
                                $_POST['user_name'] = "";
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


    <link rel="stylesheet" href="signup.css">
    <link href="http://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Sign Up</title>
</head>

<body>
    <?php
  require 'navbar.php';
  Navbar();
  ?>


    <div class="container1">
        <div class="container">
            <form class="form" action="" method="POST" id="createAccount">
                <h1 class="form__title">Create Account</h1>

                <h5 class="form__title">Choose a role</h5>
                <h6 class="form__title">
                    <input type="radio" name="Field" value="Reader" required /> Reader
                    <input type="radio" name="Field" value="DeliveryMan" required /> Delivery Man<br>
                </h6>

                <!-- Email -->
                <div class="form__input-group">
                    <!-- <div class="tooltip"> -->
                    <input type="email" class="form__input" name="email" autofocus placeholder="email ID"
                        autocomplete="off" value="<?php echo $email; ?>" required>
                    <!-- <span class="tooltiptext">Tooltip text</span>
                </div> -->
                    <span class="error"> <?php echo $emailErr;?></span>
                    <div class="form__input-error-message"></div>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <!-- <div class="tooltip"> -->
                    <input type="text" class="form__input" name="contact_no" autofocus placeholder="contact no"
                        autocomplete="off" value="<?php echo $contact_no; ?>" required>
                    <!-- <span class="tooltiptext">Tooltip text</span>
                </div> -->
                    <span class="error"> <?php echo $contactErr;?></span>
                    <div class="form__input-error-message"></div>
                    <div class="form__input-error-message"></div>
                </div>
                <!-- user_name -->
                <div class="form__input-group">
                    <!-- <div class="tooltip"> -->
                    <input type="text" class="form__input" name="user_name" autofocus placeholder="user name"
                        autocomplete="off" value="<?php echo $user_name; ?>" required>
                    <!-- <span class="tooltiptext">Tooltip text</span>
                </div> -->
                    <!-- <span class="error"> php echo $user_error;?></span> -->
                    <div class="form__input-error-message"></div>
                    <div class="form__input-error-message"></div>
                </div>
                <!-- Password -->
                <!-- <div class="tooltip"> -->
                <div class="form__input-group">
                    <input type="password" class="form__input" name="password" id="myInput" autofocus
                        placeholder="Password" autocomplete="off" value="<?php echo $_POST['password']; ?>" required>
                    <input type="checkbox" onclick="myFunction()"><span class="error2">Show Password</span><br>
                    <!-- <span class="tooltiptext">Password should contain one uppercase letter,lowercase
                            letter, special character and number</span> -->
                    <!-- </div> -->
                </div>
                <span class="error"> <?php echo $PassErr;?></span>
                <div class="form__input-error-message"></div>
                <div class="form__input-error-message"></div>
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
                    <a class="form__link" href="LogIn.php" id="linkLogin">Already have an account? Sign in</a>
                </p>
            </form>
        </div>
        <br>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>