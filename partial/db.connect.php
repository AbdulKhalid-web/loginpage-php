<?php
$userserver = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($userserver,$username,$password ,$database );
if(!$conn) {
   die('error'. 'mysqli_connect_error');
}

?>