<?php
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "myDB";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

include("config.php");
if(isset($_POST['add'])) {

$name=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass=$_POST['password'];
$pdate=date('d-m-Y');


$sql = "INSERT INTO reg (username,email,phone,password,postdate) VALUES ('$name', '$email', '$phone','$pass','$pdate')";

if (mysqli_query($db, $sql)) {
     header("location: index.html");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
}


mysqli_close($db);
?>