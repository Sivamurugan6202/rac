<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rotaract 3201 Admin</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets\images\rtrlogo1.png" />
    <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
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
</head>
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .navbar-list .nav-item .dropdown-menu li {
        align-items: center;
    }

    /*.navbar-list .nav-item .dropdown-menu li svg{*/
    /*    margin-bottom: 12px;*/
    /*}*/
    @media (min-width: 1300px) {
        .mm-top-navbar .mm-navbar-custom {
            float: right;
        }
    }
</style>

<body class="  ">
    <!-- loader Start -->
    <!-- <div id="loading">
          <div id="loading-center">
          </div>
    </div> -->
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <div class="mm-sidebar  sidebar-default ">
            <div class="mm-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="dashboard.php" class="header-logo">
                    <img src="assets/images/rtrlogo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                    <img src="assets/images/rtrlogo.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                </a>
                <div class="side-menu-bt-sidebar">
                    <i class="ri-menu-3-line wrapper-menu"></i>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="mm-sidebar-menu">
                    <?php $dat['cid'] = '3910';
                    $dat['name'] = 'club';
                    $dat['president_name'] = 'president'; ?>
                    <ul id="mm-sidebar-toggle" class="side-menu">
                        <li class="">
                            <a href="dashboard.php">
                                <i><svg class="svg-icon" id="mm-dash" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </i>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="clublist.php">
                                <i><svg class="svg-icon" id="mm-app-1" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                </i>
                                <span class="ml-2">Clubs</span>
                            </a>
                        </li>

                        <li>
                            <a href="projectlist.php">
                                <i><svg class="svg-icon" id="mm-form-1" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                </i>
                                <span class="ml-2">Club Projects</span>
                            </a>
                        </li>
                        <li>
                            <a href="memberlist.php">
                                <i><svg class="svg-icon" id="mm-table-1-2" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <line x1="4" y1="10" x2="20" y2="10" />
                                        <line x1="10" y1="4" x2="10" y2="20" />
                                    </svg>
                                </i>
                                <span class="ml-2">Membership</span>
                            </a>
                        </li>
                        <?php if ($_SESSION['base_group'] == 5) : ?>
                            <li>
                                <a href="noproject.php">
                                    <i><svg class="svg-icon" id="mm-form-2" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </i>
                                    <span class="ml-2">Number of Projects</span>
                                </a>
                            </li>
                            <li>
                                <a href="managementlist.php">
                                    <i><svg class="svg-icon" id="mm-icon-1" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </i>
                                    <span class="ml-2">Management</span>
                                </a>
                            </li>
                            <li>
                                <a href="trainerlist.php">
                                    <i><svg class="svg-icon" id="mm-icon-1-1" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                            <polyline points="2 17 12 22 22 17"></polyline>
                                            <polyline points="2 12 12 17 22 12"></polyline>
                                        </svg>
                                    </i>
                                    <span class="ml-2">Trainers</span>
                                </a>
                            </li>

                            <li>
                                <a href="eventlist.php">
                                    <i><svg class="svg-icon" id="mm-user-1-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </i>
                                    <span class="ml-2">Events</span>
                                </a>
                            </li>
                            <li>
                                <a href="slider.php">
                                    <i><svg class="svg-icon" id="mm-icon-1-2" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                            <polyline points="2 17 12 22 22 17"></polyline>
                                            <polyline points="2 12 12 17 22 12"></polyline>
                                        </svg>
                                    </i>
                                    <span class="ml-2">slider</span>
                                </a>
                            </li>
                            <li>
                                <a href="gallery.php">
                                    <i><svg class="svg-icon" id="mm-icon-2" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </i>
                                    <span class="ml-2">Gallery</span>
                                </a>
                            </li>
                            <li>
                                <a href="sponsor.php">
                                    <i><svg class="svg-icon" id="mm-table-1-3" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect x="4" y="4" width="16" height="16" rx="2" />
                                            <line x1="4" y1="10" x2="20" y2="10" />
                                            <line x1="10" y1="4" x2="10" y2="20" />
                                        </svg>
                                    </i>
                                    <span class="ml-2">Sponsor</span>
                                </a>
                            </li>
                            <li>
                                <a href="mental-health.php">
                                    <i><svg class="svg-icon" id="mm-icon-2" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </i>
                                    <span class="ml-2">Mental Health</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <li>
                            <a href="bloodlist.php">
                                <i><svg class="svg-icon" id="mm-app-2" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                </i>
                                <span class="ml-2">Blood</span>
                            </a>
                        </li>

                        <li>
                            <a href="report.php">
                                <i><svg class="svg-icon" id="mm-chat-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </i>
                                <span class="ml-2">Report</span>

                            </a>
                        </li>

                        <!--<li>-->
                        <!--    <a href="logout.php">-->
                        <!--        <i><svg class="svg-icon mr-0 text-primary" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
                        <!--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />-->
                        <!--            </svg>-->
                        <!--        </i>-->
                        <!--        <span class="ml-2">Log Out</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>
                </nav>
            </div>
            <div class="pt-5 pb-2"></div>
        </div>
    </div>
    <div class="mm-top-navbar">
        <div class="mm-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="mm-navbar-logo d-flex align-items-center justify-content-between">
                    <i class="ri-menu-line wrapper-menu"></i>
                </div>
                <div class="d-flex align-items-center hospi-wrapper">
                    <div class="nav-item nav-icon change-mode">
                        <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                            <div class="custom-switch-inner">
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
                    <div class="navbar-nav navbar-list align-items-center">
                        <div class="nav-item nav-icon dropdown">
                            <a href="#" class="nav-item nav-icon dropdown-toggle pr-2 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/logo.png" class="img-fluid avatar-rounded" alt="user" style="height: 50px;margin-left: 15px; background:white; border-radius:10px;">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-item d-flex svg-icon">
                                    <svg class="svg-icon mr-0" id="h-02-p" xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="margin-top: 5px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                    <a href="editprofile.php?aid=<?php echo $_SESSION['admin_superid'] ?>">Edit Profile</a>
                                </li>
                                <li class="dropdown-item  d-flex svg-icon border-top">
                                    <svg class="svg-icon mr-0" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <a href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>