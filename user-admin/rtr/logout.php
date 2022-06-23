<?php   
session_start(); //to ensure you are using same session
unset($_SESSION['useradmin_cid']);
session_unset();
session_destroy(); //destroy the session
echo $_SESSION['useradmin_cid'];
// header("location:../"); //to redirect back to "index.php" after logging out
echo "<script>window.location.href='../'</script>";
exit();
?>