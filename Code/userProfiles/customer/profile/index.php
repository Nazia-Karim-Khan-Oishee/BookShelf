<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
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
                        <div class="input-group w-75">
                            <input type="file" class="form-control profile" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image">
                        </div>
                        <input type="submit" class="btn btn-dark mt-3" id="inputGroupFileAddon04" name="profileimg" value="Update Profile Picture" />
                    </form>
                </div>
                <div>
                    <div class="card profile-card">
                        <div class="card-body">
                            <h4 class="card-title">Reader Profile</h4>
                            <form id="form" action="" method="POST">
                                <div id="errorPass" class="form-label"></div>
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email ID">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Contact</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Contact">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Fine amount</label>
                                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Fine amount">
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