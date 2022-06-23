<!doctype html>
<html class="no-js" lang="en">
<?php
include("./config/init.php");
$cb = new Club;
// print_r($_SESSION['cid']);
// echo $_COOKIE['cid'];
$cbs = $cb->getClubWCid(isset($_GET['cid']) ? $_GET['cid'] : $_COOKIE['cid']);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rotaract Club of <?php echo $cbs->name; ?></title>
    <!--<meta name="description" content="">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto+Slab:400,700" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <!--<link rel="apple-touch-icon" href="apple-touch-icon.html">-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/xsIcon.css">
    <link rel="stylesheet" href="assets/css/isotope.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/plugins.css" />

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/responsive.css" />
    <link rel='stylesheet alternate' title='color-1' type='text/css' href='assets/css/colors/color-1.css'>
    <link rel='stylesheet alternate' title='color-2' type='text/css' href='assets/css/colors/color-2.css'>
    <link rel='stylesheet alternate' title='color-3' type='text/css' href='assets/css/colors/color-3.css'>
</head>
<header class="xs-header header-transparent">
    <div class="container">
        <nav class="xs-menus">
            <div class="nav-header">
                <div class="nav-toggle"></div>
                <!-- <a href="index.html" class="nav-logo">
                    <img src="assets/images/club_Logo.png" alt="">
                </a> -->
            </div>
            <div class="nav-menus-wrapper row">
                <div class="xs-logo-wraper col-lg-2 xs-padding-0">
                    <a class="nav-brand" href="club-index.php?cid=<?php echo $_COOKIE['cid']?>" style="padding-top:5px;">
                        <img src="assets/images/club_logo/<?php echo isset($cbs->logo) ? $cbs->logo : 'rtrlogo1.png'; ?>" height="100px" width="120px">
                    </a>
                </div>
                <div class="col-lg-7">
                    <ul class="nav-menu">
                        <li><a href="./club-index.php?cid=<?php echo $_COOKIE['cid']; ?>">Home</a></li>
                        <li><a href="club-about.php">about us</a></li>
                        <li><a href="club-ongoing-events.php">Events</a>
                            <ul class="nav-dropdown">
                                <li><a href="dis-event.php">District Events</a></li>
                                <li><a href="club-ongoing-events.php">Club Events</a></li>
                            </ul>
                        </li>
                        <li><a href="club-Avenues.php">Services</a>
                        </li>
                        <li><a href="club-contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="xs-navs-button d-flex-center-end col-lg-3">
                    <a href="user-admin/index.html" target="_blank" class="btn btn-primary">
                        <span class="badge"></i></span> Login
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>