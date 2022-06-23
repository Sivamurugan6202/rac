<?php

include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 

  $myusername = $_POST['name'];
  $mypassword = $_POST['password'];
  $mdd = md5($mypassword);


  $sql1 = "SELECT * FROM super_admin WHERE user_id = '$myusername' and password = '$mdd' ";
  $result1 = mysqli_query($db, $sql1);
  $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
  // $active = $row['active'];

  $count1 = mysqli_num_rows($result1);
  if ($count1 >= 1) {
    $_SESSION['admin_log'] = $mdd;
    $_SESSION['base_group'] = $row1['groups'];
    $_SESSION['admin_superid'] = $row1['id'];
    $_SESSION['admin_name'] = $myusername;
    echo $_SESSION['base_group'];

    //   print_r($row1);
    echo "<script>window.location.href='../super-admin/dashboard.php'</script>";
  }


  $sql = "SELECT * FROM iclub WHERE cid = '$myusername' and password = '$mypassword' ";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  // $active = $row['active'];

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if ($count >= 1) {
    // session("myusername");
    $_SESSION['useradmin_cid'] = $mdd;
    $_SESSION['cid'] = $myusername;
    //  print_r($_SESSION['cid']);

    $_SESSION['club_group'] = $row['groups'];
    // echo "<script>alert('logged in')</script>"; 
    echo "<script>window.location.href='./rtr/dashboard.php';</script>";

    //  header("location: rtr/dashboard.php");
  } else {
    //  $error = "Your Login Name or Password is invalid";
    echo "<script>alert('Credentials dont match');</script>";
    echo "<script>window.location.href='./index.html';</script>";
  }
}
