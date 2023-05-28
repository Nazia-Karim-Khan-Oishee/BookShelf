<?php
    
    require 'script.php';
    require 'style.php';
    
    function navbarCustomer(){
        ?>
<nav class="navbar fixed-top navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookShelf</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                        href="http://localhost/BookShelf/Code/userProfiles/customer/Profile/index.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="http://localhost/BookShelf/Code/userProfiles/customer/browsebooks/index.php">Browse
                        Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="http://localhost/BookShelf/Code/userProfiles/customer/MyBookshelf/index.php">My
                        BookShelf</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link">Log Out</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-none d-lg-block">
                    <button class="btn btn-secondary logout-button"><a href="../../../LoginAuth/logout.php"
                            class="logout-button">Log Out</a></button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <?php echo navscript(); ?> -->
<?php echo style(); ?>
<?php
    }

    function navbarAdmin(){
      ?>
<nav class="navbar fixed-top navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookShelf</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="http://localhost/BookShelf/Code/userProfiles/admin/viewBooks/index.php">Book
                        Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="http://localhost/BookShelf/Code/userProfiles/admin/loanManagement/index.php">Loan
                        Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Assign Deliveryman</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link">Log Out</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-none d-lg-block">
                    <button class="btn btn-secondary logout-button"><a href="../../../LoginAuth/logout.php"
                            class="logout-button">Log Out</a></button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <?php echo navscript(); ?> -->
<?php echo style(); ?>
<?php
  }

  function navbarDelivery(){
    ?>
<nav class="navbar fixed-top navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookShelf</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../deliverymanProfile/index.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../deliveryBooks/index.php">Delivery
                        List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../recieveBooks/index.php">Receiving
                        List</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link">Log Out</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-none d-lg-block">
                    <button class="btn btn-secondary logout-button"><a href="../../../LoginAuth/logout.php"
                            class="logout-button">Log Out</a></button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <?php echo navscript(); ?> -->
<?php echo style(); ?>
<?php
}
    function navbarLanding(){
      ?>
<nav class="navbar fixed-top navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color:white;">BookShelf</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- <?php echo navscript(); ?> -->
<?php echo style(); ?>
<?php
}
?>