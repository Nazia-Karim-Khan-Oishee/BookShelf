<!DOCTYPE html>
<html>

<head>
  <title>Add Products</title>
  <link href="../../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="../../../css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script defer src="script.js"></script>
  <link href="style.css" rel="stylesheet"/>
</head>

<body>
  <?php
  require 'navbar.php';
  Navbar();
  ?>
  <section class="d-flex justify-content-center">
    <div class="card addBook-card border-dark text-center mt-3">
      <div class="card-header bg-dark">Add new book</div>
      <div class="card-body">
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Book Name:</span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">ISBN:</span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Author Name:</span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Publisher Name:</span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Edition No.:</span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Upload Photo</label>
          <input class="form-control" type="file" id="formFile">
        </div>
        <a href="#" class="btn btn-dark">Add Book</a>
      </div>
    </div>
  </section>
</body>

</html>