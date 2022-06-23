<?php
session_start();
if(!isset($_SESSION['admin_log'])){
    echo "<script>window.location.href='../'</script>";
}
?>