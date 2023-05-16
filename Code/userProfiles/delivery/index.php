<!DOCTYPE html>
<html>
<?php session_start(); 
if (!isset($_SESSION['email'])) {
    // User is not logged in, redirect to the login page
    header('Location: http://localhost/BookShelf/Code/LoginAuth/login.php');
    exit;
}; ?>
<head>
  <title>Products Page</title>
  <link href="../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="../../css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
  <script defer src="script.js"></script>
</head>
<body>
<?php
    require 'navbar.php';
    Navbar();
    ?>
  <section>
    hi
  </section>
</body>
</html>
