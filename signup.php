<?php
$showAlert = false;
$ShowError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "/xampp/htdocs/loginsystem/partial/db.connect.php";
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if ($password == $cpassword) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$username', '$hash', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $showAlert = True;
      // header("location:login.php");
    } else {
      die('error' . mysqli_connect_errno());
    }
  } else {
    $ShowError = true;
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Signup our iSecure</title>
</head>

<body>
  <?php require '/xampp/htdocs/loginsystem/partial/nav.php'   ?>
  <?php
  if ($showAlert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success !</strong> you are ready to login
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
       </div>";
  }
  if ($ShowError) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Success !</strong> your password does not match
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
       </div>";
  }
  ?>

  <div class="container my-4">
    <h1 class="heading , d-flex , align-item-center , justify-content-center">SignUp to our website</h1>
    <form action="/loginsystem/signup.php" , method="POST">
      <div class="mb-4 my-4 md-6 ">
        <label for="username" class="form-label">Username</label>
        <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        <div id="username" class="form-text"></div>
      </div>
      <div class="mb-3 my-4 ">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
        We'll never share your password else.
      </div>
      <div class="mb-3 my-4">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" id="cpassword">
        Make sure to type the same password
      </div>

      <button type="submit" class="btn btn-primary">SignUp</button>
    </form>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>