<?php
include "club-header.php";
$manage=new Management;
$project= new Project;
$club= new Club;
$mem= new Members;
$mags=$manage->getManagementsWCid($_COOKIE['cid']);
$desc=$club->getClubDes($_COOKIE['cid']);
// print_r($mags);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Team Page </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Our Team Page HTML Template" name="keywords">
    <meta content="Our Team Page HTML Template" name="description">

    <!-- Favicon -->
    <link href="team/img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">-->

    <!-- Template Style sheet -->
    <link href="team/css/style.css" rel="stylesheet">

    <style>
            .container {
            padding-left: 30px;
        }
        .main-panel .row{
            margin-right: auto;
            margin-left: auto;
        }
        .main-panel .row .col-12{
            padding-right: 0px; 
            padding-left: 0px;
        }
        .profile {
            margin-bottom: 50px;
        }

        .profile .row .p-2 {
            margin-left: 145px;
        }

        .profile .row .p-3 {
            margin-left: 125px;
        }

        @media (max-width: 992px) {
            .profile .row .p-2 {
                margin-left: 0px;
            }

            .profile .row .p-3 {
                margin-left: 0px;
            }
        }

        @media (max-width: 720px) {
            .table .row {
                padding: 0px !important;
            }
            .container-fluid {
                width: 100%;
                padding-right: 0px;
                padding-left: 0px;
                margin-right: 0px;
                margin-left: 0px;
            }
            .main-panel .row{
                margin-right: 0px;
                margin-left: 0px;
        }
        }
    </style>

</head>

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

    <div class='colors'>
        <a href="#" class="btn btn-primary panel_opener"><i class="fa fa-gear"></i></a>
        <div class="colors_panel">
            <h5>Colors</h5>
            <a class='color-1' data-val='color-1' href='#'></a>
            <a class='color-2' data-val='color-2' href='#'></a>
            <a class='color-3' data-val='color-3' href='#'></a>
        </div>
    </div>


    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/club_about/<?php echo isset($desc->img1)?$desc->img1:'def-1.jpg';?>')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>ABOUT US</h2>
                <!--<p>Rotary International District 3201</p>-->
                <!--<ul class="xs-breadcumb">-->
                <!--    <li class="badge badge-pill badge-primary"><a href="club-index.php?cid=<?php echo $_COOKIE['cid']?>" class="color-white"> Home /</a> About</li>-->
                <!--</ul>-->
            </div>
        </div>
    </section>

    <main class="xs-main">
        <section class="xs-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="xs-feature-text-content">
                            <div class="xs-heading">
                                <!-- <h2>Rotaract</h2> -->
                                <h3 class="xs-title" data-title="About Us">Club History</h3>
                                <span class="xs-separetor bg-bondiBlue"></span>
                            </div>
                            <p align="justify" style="font-size: 20px;"><?php echo isset($desc->description)?$desc->description:"All of us have leisure time and we all have our own way of spending it. The best way perhaps to kill our leisure time is to involve in a Rotaract club. Rotaract Club not only ensures that you had a whale of your time in leisure;
                                it also molds you into a citizen for the society. You get equipped with good leadership development skills, thorough knowledge on community's woes and solutions and thereby emerge as a person of great value."?></p>

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="xs-feature-image-box image-1">
                            <img src="assets/images/club_about/<?php echo isset($desc->img2)?$desc->img2:'def-3.jpeg';?>" alt="" style="margin-left: 50px;>
                        </div>
                        <div class="xs-feature-image-box image-2">
                            <img src="assets/images/club_about/<?php echo isset($desc->img3)?$desc->img3:'def-2.jpeg';?>"alt="">
                    </div>
                </div>
            </div>
        </section>
        
        <div class="xs-section-paddding xs-ipad-overlay xs-funFact-v3 waypoint-tigger" style="background-image: url( 'assets/images/backgrounds/club_statistics-1.jpg'); ">
            <div class="container ">
                <div class="row ">
                    <div class="xs-funfact-content-wraper ">
                        <div class="xs-heading ">
                            <h2 class="xs-title ">The strength of the team is each individual member. The strength of each member is the team.</h2>
                            <!--<p>Just by shopping online for new clothes via Give as you Live, means you could easily raise  a year for your charity. There are hundreds of leading retailers including M&S, Asos, Debenhams, House of Fraser, Next and New Look.-->
                            <!--</p>-->
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="media xs-single-funFact-v3 xs-mb-50 ">
                                    <span class="d-flex icon-children "></span>
                                    <div class="media-body ">
                                        <span class="number-percentage-count number-percentage " data-value="<?php echo $mem->getTotMember($_COOKIE['cid']); ?> " data-animation-duration="3500 "><?php echo $mem->getTotMember($_COOKIE['cid']); ?> </span>
                                        <small>No.of Rotaractors</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="media xs-single-funFact-v3 ">
                                    <span class="d-flex icon-like "></span>
                                    <div class="media-body ">
                                        <span class="number-percentage-count number-percentage " data-value="<?php echo $project->getClubProjectsCount($_COOKIE['cid']); ?> " data-animation-duration="3500 "><?php echo $project->getClubProjectsCount($_COOKIE['cid']); ?></span>
                                        <small>No.of Projects</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="media xs-single-funFact-v3 ">
                                    <span class="d-flex icon-team_2 "></span>
                                    <div class="media-body ">
                                        <span class="number-percentage-count number-percentage " data-value="<?php echo $manage->getClubManagementCount($_COOKIE['cid']); ?>" data-animation-duration="<?php echo $manage->getClubManagementCount($_COOKIE['cid']); ?> "><?php echo $manage->getClubManagementCount($_COOKIE['cid']); ?></span>
                                        <small>No.of Board Members</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="xs-section-padding table" style="padding-top:10px;">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="text-muted font-14 mb-4" style="text-align:center;">
                                            Board Of Directors Details
                                        </h2>
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Member-ID</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach ($mags as $mag) : ?>
                                                    <tr>
                                                        <td><?php echo isset($mag->rid) ? $mag->rid : ""; ?></td>
                                                        <td><?php echo isset($mag->name) ? $mag->name : ""; ?></td>
                                                        <td><?php echo isset($mag->designation) ? $mag->designation : ""; ?></td>

                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                    </div>
                </div>
            </div>
        </section>

    </main>


</body>

<?php
include "club-footer.php";
?>

</html>