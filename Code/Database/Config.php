<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "bookshelf";

$Conn = mysqli_connect($server, $user, $pass, $database);
// $i=0;
// $_SESSION[$i]=0;
// $Array=array();
// $_SESSION['array']=$Array;
// echo "hello world";
if (!$Conn) 
{
    die("<script>alert('Connection Failed.')</script>");
}

?>