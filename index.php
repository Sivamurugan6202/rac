<?php
include("./config/init.php");
include "dis-header.php";
$project = new Project;
$club = new Club;
$club_av = $project->getTodaysProjects();
$management = new Management;
$mags = $management->getManagements();
$member = new Members;
$trainer = new Trainers;
$sliders = $trainer->getSliders();
?>

<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.xpeedstudio.com/html/charitypress/index-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Apr 2021 06:33:40 GMT -->
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

<!-- Font Awesome -->

<!-- team css -->
<link rel="stylesheet" href="assets/css/team.css">
<!-- team css end -->

<style>
    .venue {
        text-align: center;
        margin-top: 5px;
    }

    .venue h4 {
        font-size: 1.14286em;
    }

    .venue p {
        color: #959595;
        font-size: 0.875em;
    }
</style>
<style>
    /*calendar start*/
    .technology-section .auto-container {
        position: static;
        max-width: 1200px;
        padding: 0px 15px;
        margin: 0 auto;
    }

    .technology-section.sec-title {
        position: relative;
        margin-bottom: 55px;
    }

    .technology-section.sec-title .title {
        position: relative;
        color: #0060ff;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
    }

    .technology-section .sec-title h2 {
        position: relative;
        color: #141d38;
        margin-top: 15px;
    }

    .technology-section .sec-title .text {
        position: relative;
        margin-top: 18px;
    }

    .technology-section .sec-title.light .text,
    .technology-section .sec-title.light .title,
    .technology-section .sec-title.light h2 {
        color: #ffffff;
    }

    .technology-section .sec-title.centered {
        text-align: center !important;
    }

    .technology-section {
        position: relative;
        padding: 110px 0px 70px;
    }

    .technology-section .title-column {
        position: relative;
    }

    .technology-section .title-column .inner-column {
        position: relative;
        padding-top: 30px;
    }

    .technology-section:before {
        position: absolute;
        content: '';
        left: 0px;
        top: 0px;
        right: 0px;
        bottom: 0px;
        background-color: rgb(14 14 14 / 63%);
    }

    .technology-section .blocks-column {
        position: relative;
    }

    .technology-section .blocks-column .inner-column {
        position: relative;
    }

    .technology-section .blocks-column .inner-column .technology-block:nth-child(4) {
        margin-left: -100px;
    }

    .technology-block {
        position: relative;
        margin-bottom: 30px;
    }

    .technology-block .inner-box {
        position: relative;
        padding: 30px 10px;
        text-align: center;
        border-radius: 30px;
        border: 1px dashed rgba(255, 255, 255, 0.60);
        transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
    }

    .technology-block .inner-box .overlay-link {
        position: absolute;
        left: 0px;
        top: 0px;
        right: 0px;
        bottom: 0px;
        display: block;
        z-index: 1;
    }

    .technology-block .inner-box .icon-box {
        position: relative;
        color: #d52b29;
        font-size: 64px;
        line-height: 1em;
        transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
    }

    .technology-block .inner-box:hover .icon-box {
        transform: rotateY(180deg);
    }

    .technology-block .inner-box h6 {
        position: relative;
        color: #d52b29;
        margin-top: 18px;
        font-size: 18px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
    }

    .technology-block .inner-box:hover {
        border-color: #f9f9f9;
        background-color: #f9f9f9;
    }

    .technology-block .inner-box:hover .icon-box {
        color: #003049;
    }

    .technology-block .inner-box:hover h6 {
        color: #003049;
    }

    .technology-section.style-two .technology-block {
        width: 25%;
        padding: 0px 15px;
    }

    .technology-section.style-two .technology-block h6 {
        text-transform: capitalize;
    }

    @media only screen and (max-width: 1023px) {
        .technology-section .blocks-column .inner-column .technology-block:nth-child(4) {
            margin-left: 0px;
        }

        .technology-section.style-two .technology-block {
            width: 50%;
        }

        .rtl .technology-section .title-column {
            order: 1;
        }

        .rtl .technology-section .blocks-column {
            order: 2;
        }
    }

    @media only screen and (max-width: 479px) {
        .technology-section.style-two .technology-block {
            width: 100%;
        }
    }

    /*calendar end*/

    .sponsors-section.auto-container {
        position: static;
        max-width: 1200px;
        padding: 0px 15px;
        margin: 0 auto;
    }

    .sponsors-section {
        position: relative;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .sponsors-section:before {
        position: absolute;
        content: '';
        left: 0px;
        top: 0px;
        right: 0px;
        height: 50%;
        background-color: #f5f5f5;
    }

    .sponsors-section .carousel-outer {
        position: relative;
        padding: 30px 30px;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.10);
    }

    .sponsors-section .owl-dots {
        display: none;
    }

    .sponsors-section .owl-nav {
        position: absolute;
        left: -40px;
        top: 42px;
        right: -30px;
    }

    .sponsors-section .owl-nav .owl-prev {
        position: absolute;
        left: 0px;
        width: 30px;
        height: 100px;
        color: #333333;
        font-size: 20px;
        text-align: center;
        line-height: 98px;
        margin-left: 10px;
        border-radius: 50px;
        display: inline-block;
        border: 1px solid #555555;
        transition: all 300ms ease;
        -webkit-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        background-color: #ffffff;
    }

    .sponsors-section .owl-nav .owl-next {
        position: absolute;
        right: 0px;
        width: 30px;
        height: 100px;
        color: #333333;
        font-size: 20px;
        text-align: center;
        line-height: 98px;
        margin-left: 10px;
        border-radius: 50px;
        display: inline-block;
        border: 1px solid #555555;
        transition: all 300ms ease;
        -webkit-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        background-color: #ffffff;
    }

    .sponsors-section .owl-nav .owl-prev:hover,
    .sponsors-section .owl-nav .owl-next:hover {
        color: #ffffff;
        background-color: #555555;
        border-color: #555555;
    }

    .sponsors-section .owl-carousel .owl-stage-outer {
        padding: 20px 0px;
    }

    .sponsors-section .owl-theme .image-box {
        margin: 0px 15px;
    }

    .sponsors-section .owl-carousel {
        margin: 0px -15px;
        width: auto;
    }

    .sponsors-section .image-box {
        position: relative;
        text-align: center;
        transition: all 300ms ease;
        -webkit-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
    }

    .sponsors-section .image-box img {
        position: relative;
        display: inline-block;
        width: auto;
        max-width: 100%;
        opacity: 0.9;
        transition: all 300ms ease;
        -webkit-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
    }

    .sponsors-section .image-box img:hover {
        opacity: 1;
        -webkit-filter: grayscale(0%);
        filter: grayscale(0%);
    }

    .sponsors-section.style-two {
        border-bottom: 1px solid #dddddd;
    }

    .sponsors-section.style-two .carousel-outer {
        box-shadow: none;
        padding-left: 0px;
        padding-right: 0px;
    }

    .sponsors-section.style-two:before {
        display: none;
    }

    .sponsors-section.style-two .owl-nav,
    .sponsors-section.style-two .owl-dots {
        display: none;
    }

    .sponsors-section.style-three:before {
        display: none;
    }

    .sponsors-section.style-three .sec-title .text {
        margin-top: 40px;
    }

    @media only screen and (max-width: 1140px) {
        .sponsors-section .sec-title .text {
            max-width: 550px;
        }

        .sponsors-section .sec-title .text br {
            display: none;
        }

        .sponsors-section .owl-nav .owl-prev {
            left: 30px;
        }

        .sponsors-section .owl-nav .owl-next {
            right: 30px;
        }
    }

    @media only screen and (max-width: 1023px) {
        .sponsors-section.style-three .pull-right {
            width: 100%;
        }

        .sponsors-section.style-three .sec-title .text {
            margin-top: 20px;
        }

        .sponsors-section .sec-title .text {
            max-width: 100%;
        }

        .sponsors-section.style-three .sec-title .text br {
            display: none;
        }
    }
</style>

<body>


    <!--[if lt IE 10]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!--<div id="preloader">-->
    <!--    <div class="spinner">-->
    <!--        <div class="double-bounce1"></div>-->
    <!--        <div class="double-bounce2"></div>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- <div class='colors'>
        <a href="#" class="btn btn-primary panel_opener"><i class="fa fa-gear"></i></a>
        <div class="colors_panel">
            <h5>Colors</h5>
            <a class='color-1' data-val='color-1' href='#'></a>
            <a class='color-2' data-val='color-2' href='#'></a>
            <a class='color-3' data-val='color-3' href='#'></a>
        </div>
    </div> -->



    <section class="xs-welcome-slider">
        <div class="xs-banner-slider owl-carousel">
            <?php foreach ($sliders as $slide) : ?>
                <div class="xs-welcome-content" style="background-image: url(assets/images/dist_sliders/<?php echo $slide->name; ?>);">
                    <div class="container row">
                        <div class="xs-welcome-wraper banner-verion-2 color-white col-md-10 content-left">
                            <h2>CELEBRATE ROTARACT</h2>
                        </div>
                        <div class="xs-welcome-wraper banner-verion-2 color-white col-md-2 content-left">
                            <div class="xs-btn-wraper">
                                <a href="user-admin/index.html" target="_blank" class="btn btn-primary">
                                    <span class="badge"></span> Login
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="xs-black-overlay"></div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="xs-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="xs-feature-text-content">
                        <div class="xs-heading">
                            <!-- <h2>Rotaract</h2> -->
                            <h3 class="xs-title" data-title="About Us">Rotaract an acronym for "Rotary in Action"</h3>
                            <span class="xs-separetor bg-bondiBlue"></span>
                        </div>
                        <p align="justify">All of us have leisure time and we all have our own way of spending it.The best way perhaps to kill our leisure time is to involve in a Rotaract club. Rotaract Club not only ensures that you had a whale of your time in leisure;
                            it also molds you into a citizen for the society. You get equipped with good leadership development skills, thorough knowledge on community's woes and solutions and thereby emerge as a person of great value.</p>
                        <a href="dis-about.php" class="btn btn-primary bg-light-red">About us</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="xs-feature-image-box image-1">
                        <img src="assets/images/dis_home/image-1.jpg" alt="">
                    </div>
                    <div class="xs-feature-image-box image-2">
                        <img src="assets/images/dis_home/image-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- before pasting -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-67816487-1', 'auto');
        ga('send', 'pageview');
    </script>

    <!-- team start -->
    <section class="xs-section-padding">
        <div class="container">
            <div class="xs-heading row xs-mb-60">
                <div class="col-md-12 col-xl-12">
                    <h2 class="xs-title">DISTRICT COUNCIL MEMBERS</h2>
                </div>
            </div>
            <div class="row active-with-click">
                <?php foreach ($mags as $key => $m) : ?>
                    <?php if ($key > 3) {
                        break;
                    } ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <article class="material-card Red">
                            <h2>
                                <span><?php echo $m->name; ?></span>
                                <strong><?php echo $m->designation; ?></strong>
                            </h2>
                            <div class="mc-content">
                                <div class="img-container">
                                    <img class="img-responsive" src="./assets/images/dist_management/<?php echo $m->profile_pic; ?>">
                                </div>
                                <div class="mc-description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ...
                                </div>
                            </div>
                            <a class="mc-btn-action">
                                <i class="fa fa-bars"></i>
                            </a>
                            <div class="mc-footer">
                                <div class="team-social">
                                    <ul class="xs-social-list-v2">
                                        <li><a target=_parent href="#" class="fa fa-fw fa-envelope"></a></li>
                                        <li><a target=_parent href="https://in.linkedin.com/in/<?php echo $m->linked; ?>" class="fa fa-fw fa-linkedin"></a></li>
                                        <li><a target=_parent href="https://www.instagram.com/<?php echo $m->insta; ?>" class="fa fa-fw fa-instagram"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <div style="text-align: center;">
        <a href="dis-directory.php" class="btn btn-primary bg-light-red">View All Council Members</a>
        </a>
    </div>
    <!-- team end -->

    <!-- event start -->

    <section class="xs-section-padding">
        <div class="container">
            <div class="xs-heading row xs-mb-60">
                <div class="col-md-9 col-xl-9">
                    <h2 class="xs-title">DISTRICT EVENTS</h2>
                </div>
            </div>
            <div class="row" id='dist_eve'>
                <?php $event = new Event;
                $events = $event->getDistEvents();
                if (empty($events)) {
                    echo "<p>No Events as of now!</p>";
                }
                ?>
                <?php $cntc = 0; ?>
                <?php if (!empty($events)) { ?>
                    <?php foreach ($events as $key => $event) : ?>
                        <?php $d = date_create($event->date);
                        $d = date_format($d, "Y/M/d");
                        $d = explode('/', $d);
                        $ev = explode('_', $event->xiv_rotaract);
                        $ev = implode(' ', $ev); ?>
                        <!--// $time>$event->time-->
                        <?php if ($date > $event->date) {
                            continue;
                        } ?>
                        <?php if ($key > 4) {
                            break;
                        } ?>
                        <?php $cntc++; ?>
                        <?php $color = ['event-green', 'event-purple', 'event-blue', 'event-red'];
                        $ran = rand(0, 3);
                        ?>
                        <div class="col-lg-6 row xs-single-event <?php echo $color[$key]; ?>">
                            <div class="col-md-5">
                                <div class="xs-event-image">
                                    <img src="assets/images/dist_events/<?php echo $event->banner; ?>" alt="">
                                    <div class="xs-entry-date">
                                        <span class="entry-date-day"><?php echo $d[2]; ?></span>
                                        <span class="entry-date-month"><?php echo $d[1]; ?></span>
                                    </div>
                                    <div class="xs-black-overlay"></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="xs-event-content">
                                    <a class="event-tilte"><?php echo  ucwords($event->name); ?></a>
                                    <a class="event-tilte"><?php echo ucwords($ev); ?></a>
                                    <div class="col-lg-6 col-md-6">
                                        <span>
                                            <p>venue : <span><?php echo $event->venue; ?></span></p>
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <span>
                                            <p>Time: <span><?php echo $event->time; ?></span></p>
                                        </span>
                                    </div>
                                    <!-- <?php echo str_replace('-', '/', $event->date); ?> -->
                                    <div class="xs-countdown-timer" data-countdown="<?php echo str_replace('-', '/', $event->date); ?>"></div>
                                    <a href="dis-eventdetails.php?eid=<?php echo $event->id; ?>" class="btn btn-primary">
                                        View More</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <div class='col-md-12'>
                        <h3 style='text-align:center'>No More Current District Events</h3>
                    </div>
                <?php } ?>
                <?php if ($cntc == 0) {
                    echo "                  <div class='col-md-12'>
                        <h3 style='text-align:center'>No Upcoming events as of now</h3>
                    </div>";
                } ?>
            </div>
        </div>
        <div style="text-align: center;">
            <a href="dis-event.php" class="btn btn-primary bg-light-red">
                <span class="badge"></span> View All Events
            </a>
        </div>
    </section>

    <!-- event end -->

    <!--calendar start-->
    <section class="technology-section style-two" style="background-image: url(assets/images/backgrounds/Calender_bg.jpg)">
        <div class="auto-container">
            <!-- Sec Title -->
            <!--<div class="sec-title light centered">-->
            <!--    <div class="title">Services</div>-->
            <!--</div>-->
            <div class="row">
                <!-- Technology Block -->
                <div class="technology-block">
                    <div class="inner-box">
                        <a href="dis-calendar.php" class="overlay-link"></a>
                        <div class="icon-box">
                            <svg aria-hidden="true" width="50" height="50" focusable="false" data-prefix="fas" data-icon="calendar-alt" class="svg-inline--fa fa-calendar-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path>
                            </svg>
                        </div>
                        <h6>District Calendar</h6>
                    </div>
                </div>
                <!-- Technology Block -->
                <div class="technology-block">
                    <div class="inner-box">
                        <a href="dpp.php" class="overlay-link"></a>
                        <div class="icon-box">
                            <svg aria-hidden="true" width="50" height="50" focusable="false" data-prefix="fas" data-icon="building" class="svg-inline--fa fa-building fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M436 480h-20V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v456H12c-6.627 0-12 5.373-12 12v20h448v-20c0-6.627-5.373-12-12-12zM128 76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76zm0 96c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40zm52 148h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12zm76 160h-64v-84c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v84zm64-172c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40z"></path>
                            </svg>
                        </div>
                        <h6>District Priority Projects</h6>
                    </div>
                </div>
                <!-- Technology Block -->
                <div class="technology-block">
                    <div class="inner-box">
                        <a href="https://drive.google.com/drive/folders/1DBHwAXDPjixnGX1X10ueHzgy-vD5ZRHB?usp=sharing" class="overlay-link"></a>
                        <div class="icon-box">
                            <svg aria-hidden="true" width="50" height="50" focusable="false" data-prefix="fas" data-icon="file-alt" class="svg-inline--fa fa-file-alt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm64 236c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-64c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-72v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm96-114.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"></path>
                            </svg>
                        </div>
                        <h6>District Newsletter</h6>
                    </div>
                </div>
                <!-- Technology Block -->
                <div class="technology-block">
                    <div class="inner-box">
                        <a href="donate.php" class="overlay-link"></a>
                        <div class="icon-box">
                            <svg aria-hidden="true" width="50" height="50" focusable="false" data-prefix="fas" data-icon="hand-holding-heart" class="svg-inline--fa fa-hand-holding-heart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor" d="M275.3 250.5c7 7.4 18.4 7.4 25.5 0l108.9-114.2c31.6-33.2 29.8-88.2-5.6-118.8-30.8-26.7-76.7-21.9-104.9 7.7L288 36.9l-11.1-11.6C248.7-4.4 202.8-9.2 172 17.5c-35.3 30.6-37.2 85.6-5.6 118.8l108.9 114.2zm290 77.6c-11.8-10.7-30.2-10-42.6 0L430.3 402c-11.3 9.1-25.4 14-40 14H272c-8.8 0-16-7.2-16-16s7.2-16 16-16h78.3c15.9 0 30.7-10.9 33.3-26.6 3.3-20-12.1-37.4-31.6-37.4H192c-27 0-53.1 9.3-74.1 26.3L71.4 384H16c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16h356.8c14.5 0 28.6-4.9 40-14L564 377c15.2-12.1 16.4-35.3 1.3-48.9z"></path>
                            </svg>
                        </div>
                        <h6>Donate Now</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--calendar end-->

    <!-- club start -->

    <section class="bg-gray waypoint-tigger xs-section-padding xs-popularCauses-v2">
        <div class="container">
            <div class="xs-heading row xs-mb-60">
                <div class="col-md-9 col-xl-9">
                    <h2 class="xs-title">CLUB EVENTS</h2>
                </div>
            </div>
            <div class="row">
                <?php $ctnce = 0; ?>
                <?php foreach ($club_av as $key => $av) : ?>

                    <?php if ($date > $av->from_date) {
                        continue;
                    } ?>
                    <?php if ($cntce >= 6) {
                        break;
                    } ?>
                    <?php $cntce++; ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="xs-popular-item xs-box-shadow" style="margin-bottom: 50px;">
                            <div class="xs-item-header" style="height: 350px;    background-image: url('assets/images/club_projects/<?php echo $av->project_poster; ?>');background-size: cover;background-repeat: no-repeat;background-position: center;">
                                <!--<img src="assets/images/club_projects/<?php echo $av->project_poster; ?>" alt="">-->
                                <div class="xs-skill-bar">
                                    <div class="xs-skill-track bg-purple"></div>
                                </div>
                            </div>
                            <div class="xs-item-content">
                                <ul class="xs-simple-tag xs-mb-20">
                                    <li>
                                        <a>
                                            <h2><?php echo $av->proj_name; ?></h2>
                                        </a>
                                    </li>
                                </ul>
                                <?php $ast = explode('_', $av->avenue);
                                $ast = implode(' ', $ast); ?>
                                <a class="xs-post-title xs-mb-30"><?php echo $ast; ?></a>
                                <ul class="xs-list-with-content">
                                    <li><?php echo dateFix($av->from_date); ?><span>Date</span></li>
                                    <li style="text-align:end;"><?php echo $av->time; ?><span>Time</span></li>

                                </ul>
                                <div class="venue">
                                    <h4><?php echo $av->venue ?></h4>
                                    <p>Venue</p>
                                </div>
                                <span class="xs-separetor"></span>
                                <div class="row xs-margin-0">
                                    <div class="xs-round-avatar">
                                        <img src="assets/images/club_logo/<?php echo $av->logo; ?>" alt="">
                                    </div>
                                    <div class="xs-avatar-title">
                                        <a><span>By</span><?php echo $av->club_name; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if ($cntce == 0) {
                    echo " <div class='col-md-12'>
                        <h3 style='text-align:center'>No Upcoming events as of now</h3>
                    </div>";
                } ?>
            </div>
        </div>
        <div style="text-align: center;">
            <a href="dis-clubevent.php" class="btn btn-primary bg-light-red">
                <span class="badge"></span> View More
            </a>
        </div>

    </section>

    <!-- club end -->

    <!-- gallery start -->

    <section class="xs-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="xs-text-content xs-pr-20">
                        <h2 class="color-navy-blue">GALLERY</h2>
                        <p>Many are valiant purposes formed that end merely in words! Many are the deeds intended those are yet to be done! Many are the designs projected those are yet to begun! For in life and in career, dispatch is better than discourse! It is through “ACTION!” that we evolve. Rotary in action, “ROTARACT”, comprises of a healthy mix of youngsters who excel at transforming ideas into ACTION and causing an IMPACT!</p>
                        <blockquote>
                            You are one click away from witnessing whom we are and what we do!
                        </blockquote>
                        <a href="dis-gallery.php" class="btn btn-primary bg-light-red " target="_blank">
                            <span class="badge "></span> View More
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ">
                    <div class="xs-feature-image ">
                        <img src="assets/images/dis_home/image-3.jpg " alt=" ">
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 ">
                    <div class="xs-feature-image "> <img src="assets/images/dis_home/image-4.jpg " alt=" "> </div>
                </div>
            </div>
        </div>
    </section>

    <div class="xs-section-paddding xs-ipad-overlay xs-funFact-v3 waypoint-tigger " style="background-image: url('assets/images/backgrounds/rtr-active_bg.jpg'); ">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-5 "></div>
                <div class="col-lg-7 ">
                    <div class="xs-funfact-content-wraper ">
                        <div class="xs-heading ">
                            <h2 class="xs-title ">The strength of the team is each individual member. The strength of each member is the team.</h2>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="media xs-single-funFact-v3 xs-mb-50 ">
                                    <span class="d-flex icon-children "></span>
                                    <div class="media-body ">
                                        <span class="number-percentage-count number-percentage " data-value="<?php echo $member->getCount(); ?> " data-animation-duration="3500 "><?php echo $member->getCount(); ?></span> <span style="font-size: 2.28571em;color: #fff;font-weight: 700;line-height: 1;"> +</span>
                                        <small>Active Members</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="media xs-single-funFact-v3 xs-mb-50 ">
                                    <span class="d-flex icon-like "></span>
                                    <div class="media-body ">
                                        <span class="funfact-sign "></span>
                                        <span class="number-percentage-count number-percentage " data-value="<?php echo $project->getCount(); ?> " data-animation-duration="3500 "><?php echo $project->getCount(); ?></span> <span style="font-size: 2.28571em;color: #fff;font-weight: 700;line-height: 1;"> +</span>
                                        <small>Projects</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="media xs-single-funFact-v3 ">
                                    <span class="d-flex icon-team_2 "></span>
                                    <div class="media-body ">
                                        <span class="number-percentage-count number-percentage " data-value="<?php echo $club->getCount(); ?> " data-animation-duration="3500 "><?php echo $club->getCount(); ?></span> <span style="font-size: 2.28571em;color: #fff;font-weight: 700;line-height: 1;"> +</span>
                                        <small>Active Clubs</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="media xs-single-funFact-v3 ">
                                    <i class="icon-group" style="display: block;font-size: 5em;color: white;padding-right: 25px;"></i>
                                    <div class="media-body ">
                                        <span class="number-percentage-count number-percentage " data-value="<?php echo $trainer->getCount(); ?>" data-animation-duration="<?php echo $trainer->getCount(); ?> "><?php echo $trainer->getCount(); ?></span> <span style="font-size: 2.28571em;color: #fff;font-weight: 700;line-height: 1;"> +</span>
                                        <small>Certified Trainer</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-gray waypoint-tigger xs-section-padding xs-popularCauses-v2">
        <div class="container">
            <div class="xs-heading row xs-mb-60">
                <div class="col-md-9 col-xl-9">
                    <h2 class="xs-title">OUR SPONSORS</h2>
                </div>
            </div>
            <!--Sponsors Section-->
            <section class="sponsors-section">
                <div class="auto-container">

                    <div class="carousel-outer">
                        <!--Sponsors Slider-->
                        <ul class="sponsors-carousel owl-carousel owl-theme">
                            <li>
                                <div class="image-box">
                                    <a href="https://sr-mediatech.com/"><img src="assets/images/sponsers/sr.png" alt="Awesome Image"></a>
                                </div>
                            </li>
                            <li>
                                <div class="image-box">
                                    <a><img src="assets/images/sponsers/ks.png" alt="Awesome Image"></a>
                                </div>
                            </li>
                            <?php
                            $sponsors = $trainer->getSponsors();
                            foreach ($sponsors as $key => $sponsor) : ?>
                                <?php if ($key > 2) {
                                    break;
                                } ?>
                                <li>
                                    <div class="image-box">
                                        <a><img src="assets/images/sponsers/<?php echo $sponsor->logo ?>" alt="<?php echo $sponsor->name; ?>"></a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </section>
            <!--End Sponsors Section-->
        </div>
        <div style="text-align: center;">
            <a href="sponsor.php" class="btn btn-primary bg-light-red">
                <span class="badge"></span> View More
            </a>
        </div>
    </section>
    <section class="xs-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="xs-feature-image-box-app image-1">
                        <img src="assets/images/backgrounds/new_app_img.png" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="xs-feature-text-content" style="padding-top: 10px;">
                        <div class="xs-heading">
                            <h3 class="xs-title-app">Unlock Exclusive Experience</h3>
                            <h5 class="xs-title-p">Just Scan to Explore and Report at your finger tips now. Download Rotaract District 3201 App</h5>
                        </div>
                        <!--<p align="justify" style="text-align: center;"><img src="assets/images/backgrounds/play_store.png" alt=""></p>-->
                        <div class="xs-feature-image-box-qr image-1" style="text-align: center;">
                            <img src="assets/images/backgrounds/App_QR.png" alt="">
                            <p align="justify" style="text-align: center;">(Android users only)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</body>
<?php
include "dis-footer.php";
?>
<script type="text/javascript">
    (function($) {

        "use strict";
        // Sponsors Item Carousel
        if ($('.sponsors-carousel').length) {
            $('.sponsors-carousel').owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                smartSpeed: 500,
                autoplay: 1000,
                navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    800: {
                        items: 4
                    },
                    1024: {
                        items: 5
                    }
                }
            });
        }
    })(window.jQuery);
</script>
<script>
    $(function() {
        $('.material-card > .mc-btn-action').click(function() {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });
</script>

</html>