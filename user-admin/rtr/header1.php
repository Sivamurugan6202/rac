<!doctype html>
<html lang="en">
<?php
include("./config/init.php");
$cb = new Club;
// print_r($_SESSION['cid']);
$cbs = $cb->getClubWCid($_SESSION['cid']);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rotaract Club of <?php echo $cbs->name ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/user_header/L2.png" />
    <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="assets/css/morris.css">
    <link rel="stylesheet" href="assets/css/backende209.css?v=1.0.0">
    <link rel="stylesheet" href="assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="assets/vendor/%40icon/dripicons/dripicons.css">

    <link rel='stylesheet' href='assets/vendor/fullcalendar/core/main.css' />
    <link rel='stylesheet' href='assets/vendor/fullcalendar/daygrid/main.css' />
    <link rel='stylesheet' href='assets/vendor/fullcalendar/timegrid/main.css' />
    <link rel='stylesheet' href='assets/vendor/fullcalendar/list/main.css' />
    <link rel="stylesheet" href="assets/vendor/mapbox/mapbox-gl.css">

    <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>


    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">

    <style>
        body br {
            display: none;
        }

        @media (max-width: 1300px) {
            .mm-top-navbar .row .navbar {
                display: none;
            }
        }
    </style>

</head>

<body class="hospi-wrapper  ">
    <!--loader Start -->
    <!-- <div id="loading">
        <div id="loading-center">
        </div>
    </div> -->
    <!--loader END -->
    <!--Wrapper Start -->

    <div class="wrapper bg-h-full l-horizontal overflow-hidden">
        <div class="header-style-1 mm-top-navbar">
            <div class="container-fluid container-md mm-navbar-custom">
                <div class="row">
                    <nav class="navbar c-navbar navbar-expand-lg navbar-light px-0" style="width:100%;background-color: white;margin: 10px;height: 65px;border-radius:35px;">
                        <div class="mm-navbar-logo d-flex align-items-center justify-content-between" style="width:100%;">
                            <div class="col-md-5 col-sm-5 col-lg-5">
                                <a href="dashboard.php" class="header-logo">
                                    <img src="assets/images/user_header/L1.png" class="img-fluid rounded-normal" alt="logo">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <div class="menu-horizontal">
                                    <nav class="mm-sidebar-menu">
                                        <a href="dashboard.php" class="header-logo">
                                            <img src="../../assets/images/club_logo/<?php echo isset($cbs->logo) ? $cbs->logo : 'rtrlogo1.png'; ?>" class="img-fluid rounded-normal light-logo" alt="../assets/images/rtrlogo1.png" style="margin-left:35px;height:60px; ">
                                            <img src="../../assets/images/club_logo/<?php echo isset($cbs->logo) ? $cbs->logo : 'rtrlogo1.png'; ?>" class="img-fluid rounded-normal darkmode-logo" alt="../assets/images/rtrlogo1.png" style="margin-left:35px;height:60px; ">
                                        </a>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="d-flex align-items-center">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav navbar-list align-items-center">
                                            <li class="nav-item nav-icon search-content">

                                            </li>
                                            <li class="nav-item">
                                                <div class="mm-sidebar-logo d-flex align-items-center justify-content-between">
                                                    <a href="dashboard.php" class="header-logo">
                                                        <img src="assets/images/user_header/L3.png" class="img-fluid rounded-normal light-logo" alt="logo">
                                                        <img src="assets/images/user_header/L3.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                                                    </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </nav>
                <div class="row head-bottom" style="margin: 18px 0;">
                    <div class="col-md-2">
                        <div class="nav-item nav-icon change-mode">
                            <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                                <div class="custom-switch-inner">
                                    <p class="mb-0"> </p>
                                    <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                                    <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                        <span class="switch-icon-left">
                                            <svg class="svg-icon" id="h-moon" height="20" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                            </svg>
                                        </span>
                                        <span class="switch-icon-right">
                                            <svg class="svg-icon" id="h-sun" height="20" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <a href="dashboard.php" class="header-logo">
                            <h4 style="color: #fff; text-align: center; font-size: 25px;padding: 10px;">ROTARACT CLUB OF <span style="font-size: 25px; text-align: center; font-weight: 600;text-transform: uppercase;"><?php echo isset($cbs->name) ? $cbs->name : ''; ?></span></h4>
                        </a>
                    </div>
                    <div class="col-md-2 profile">
                        <div class="navbar-nav navbar-list align-items-center">
                            <div class="nav-item nav-icon dropdown">
                                <a href="#" class="nav-item nav-icon dropdown-toggle pr-2 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../../assets/images/club_logo/<?php echo isset($cbs->logo) ? $cbs->logo : 'rtrlogo1.png'; ?>" class="img-fluid avatar-rounded" alt="user" style="height: 40px; background:white; border-radius:10px;">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <li class="dropdown-item d-flex svg-icon">
                                        <svg class="svg-icon mr-0" id="h-01-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <a href="myprofile.php?uid=<?php echo $cbs->id; ?>">My Profile</a>
                                    </li>
                                    <li class="dropdown-item d-flex svg-icon border-top">
                                        <svg class="svg-icon mr-0" id="h-02-p" xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="margin-top: 5px;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                        </svg>
                                        <a href="editprofile.php?uid=<?php echo $cbs->id; ?>">Edit Profile</a>
                                    </li>
                                    <li class="dropdown-item d-flex svg-icon border-top">
                                        <svg class="svg-icon mr-0" id="h-03-p" xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="margin-top: 5px;">
                                            <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                        </svg>
                                        <a href="clubabout.php">Edit Club About</a>
                                    </li>
                                    <li class="dropdown-item  d-flex svg-icon border-top" style="border-bottom: 1px solid #deeaff;">
                                        <svg class="svg-icon mr-0" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <a href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>