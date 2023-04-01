<?php
    
    require 'script.php';
    
    function navbarCustomer(){
        ?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookShelf</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Browse Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My BookShelf</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link">Log Out</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-none d-lg-block">
                    <button class="btn btn-secondary"><a href="../../../LoginAuth/logout.php">Log Out</a></button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <?php echo navscript(); ?> -->
<?php
    }

    function navbarAdmin(){
      ?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookShelf</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Book Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Loan Management</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link">Log Out</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-none d-lg-block">
                    <button class="btn btn-secondary"><a href="../../../LoginAuth/logout.php">Log Out</a></button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <?php echo navscript(); ?> -->
<?php
  }

  function navbarDelivery(){
    ?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BookShelf</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item d-lg-none">
                    <a class="nav-link">Log Out</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-none d-lg-block">
                    <button class="btn btn-secondary"><a href="../../LoginAuth/logout.php">Log Out</a></button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <?php echo navscript(); ?> -->
<?php
}
?>