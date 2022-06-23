<?php
include("./config/init.php");
unset($_SESSION['admin_log']);
unset($_SESSION['base_group']);
session_unset();

echo "<script>window.location.href='../user-admin';</script>";
