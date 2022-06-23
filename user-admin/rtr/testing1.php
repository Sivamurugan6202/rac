
<?php
session_start();
$ex_server= 'localhost';
$ex_username='u883782638_rac';
$ex_password='Impact@3201';
$ex_database= 'u883782638_rac';
$ex_db = mysqli_connect($ex_server,$ex_username,$ex_password,$ex_database);
  $ex_cid=$_SESSION['cid'];
    $ex_mdd=$_SESSION['useradmin_cid'];
    // echo $ex_cid;

        $sql1 = "SELECT * FROM iclub WHERE cid = '$ex_cid' ";
      $result1 = mysqli_query($ex_db,$sql1);
      $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
      
      echo md5($row1['password']);
      echo "<br>";
      echo $ex_mdd;