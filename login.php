<?php
 $login = false ;
 $ShowError = false ;
 if($_SERVER["REQUEST_METHOD"]== "POST"){
 include "/xampp/htdocs/loginsystem/partial/db.connect.php";
 $username = $_POST['username'];
 $password = $_POST['password'];

//  $sql = "SELECT * FROM `users` WHERE username ='$username' AND password = '$password' ";
  $sql = "SELECT * FROM `users` WHERE username ='$username' ";
//  "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$username', '$password', current_timestamp())";
 $result = mysqli_query($conn , $sql);
 $num =  mysqli_num_rows($result);
  if($num == 1){
   //  database me table ki row ko display krwane ke liye  ek bar me ek so while loop use 
   while ($row = mysqli_fetch_assoc($result)) {
     if (password_verify($password , $row['password'])) {
       $login = true;
           session_start();
          $_SESSION['loggedin'] = true ;
          $_SESSION['username'] = $username ;
          header("location: welcome.php");
     }
     else {
      $ShowError = true ;

     }
    }
    // // location ke : ek dm touch kr kr likhna wrna nhi chlega
    //  header("location: welcome.php");
     }
  
  else{
      $ShowError = true ;
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

    <title>Login our iSecure</title>
  </head>
  <body>
       <?php  require '/xampp/htdocs/loginsystem/partial/nav.php'   ?> 
     <?php
       if($login){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success !</strong> Your are logged in
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
       </div>";
       }
       if($ShowError){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>invalid !</strong> your id and password does not match
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
       </div>";
       }
        ?>

    <div class="container my-4">
         <h1 class="heading , d-flex , align-item-center , justify-content-center" >Login to our website</h1>
        <form action="/loginsystem/login.php" , method="POST" >
            <div class="mb-4 my-4 md-6 ">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                <div id="username" class="form-text"></div>
            </div>
            <div class="mb-3 my-4 ">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
           

            <button type="submit" class="btn btn-primary">Login</button>
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