<?php
// include("./config/init.php");
include "club-header.php";
$projects = new Project;
$id = $_GET['pid'];
$project = $projects->getProject($id);

?>
<!DOCTYPE html>
<html lang="en-US">
<style>
    .xs-section-padding .container .xs-event-image img {
        height: auto;
    }

    .xs-section-padding .container .xs-event-content {
        margin-left: 50px;
    }

    .xs-section-padding .container .xs-event-content .event-tilte {
        font-size: 35px;
    }

    .xs-section-padding .container .xs-event-content p {
        font-size: 20px;
    }

    @media (max-width: 992px) {
        .xs-section-padding .container .xs-event-image img {
            height: auto;
        }

        .xs-section-padding .container .xs-event-content {
            margin-left: 0px;
        }

        .xs-section-padding .container .xs-event-content .event-tilte {
            font-size: 25px;
        }

        .xs-section-padding .container .xs-event-content p {
            font-size: 15px;
        }
    }

    .gallery {
        font-family: "Asap", sans-serif;
        color: #989898;
        margin: 10px;
        font-size: 16px;
        margin-top: -105px;
    }

    .gallery #demo {
        height: 100%;
        position: relative;
        overflow: hidden;
    }


    .gallery .green {
        background-color: #6fb936;
    }

    .gallery .thumb {
        margin-bottom: 30px;
    }


    .gallery .galleryimg.zoom {
        width: 100%;
        height: 200px;
        border-radius: 5px;
        object-fit: cover;
    }


    .gallery .transition {
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
    }

    .gallery .modal-header {

        border-bottom: none;
    }

    .gallery .modal-title {
        color: #000;
    }

    .gallery .modal-footer {
        display: none;
    }
</style>

<body>
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
    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/club_about_bg.jpg')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>EVENT DETAILS</h2>
                <!--<p>Rotary International District 3201</p>-->
                <!--<ul class="xs-breadcumb">-->
                <!--    <li class="badge badge-pill badge-primary"><a href="club-index.php" class="color-white"> Home /</a> About</li>-->
                <!--</ul>-->
            </div>
        </div>
    </section>
    <section class="xs-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 row xs-single-event">
                    <div class="col-md-5">
                        <div class="xs-event-image">
                            <img src="./assets/images/club_projects/<?php echo $project->project_poster ?>" alt="">
                            <!-- <div class="xs-entry-date">
                                <span class="entry-date-day">13</span>
                                <span class="entry-date-month">june</span>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="xs-event-content">
                            <a class="event-tilte"><?php echo $project->name; ?></a>
                            <p>Venue : <span><?php echo $project->venue; ?></span></p>
                            <p>Event Date : <span><?php echo dateFix($project->post_date); ?></span></p>
                            <p>Event Time : <span><?php echo $project->time; ?></span></p>

                            <p>Event Chair : <span><?php echo $project->event_chairman; ?></span></p>

                            <p>No.of.Rotaractors : <span><?php echo is_null($project->rtr_count) ? ' -' : $project->rtr_count; ?></span></p>
                            <p>No.of.Rotarians : <span><?php echo isset($project->rtn_count) ? $project->rtn_count : ' -'; ?></span></p>
                            <!--<p>Description : <span><?php echo $project->description; ?></span></p>-->
                        </div>
                    </div>
                </div>
                
                    <div class="col-md-12">
                         <div class="xs-event-content">
                            <a class="event-tilte">EVENT IMAGES:</a>
                        </div>
                    </div>
                
                <div class="col-lg-12 row xs-single-event">
                    <div class="col-md-6">
                        <div class="xs-event-image">
                            <img src="./assets/images/club_projects/<?php echo $project->poster_2 ?>" alt="">
                            <!-- <div class="xs-entry-date">
                                <span class="entry-date-day">13</span>
                                <span class="entry-date-month">june</span>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="xs-event-image">
                            <img src="./assets/images/club_projects/<?php echo $project->poster_3 ?>" alt="">
                            <!-- <div class="xs-entry-date">
                                <span class="entry-date-day">13</span>
                                <span class="entry-date-month">june</span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery">
        <!-- Page Content -->
        <div class="container page-top">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <img src="./assets/images/club_projects/<?php echo $project->poster2; ?>" class="zoom img-fluid " alt="">
                </div>
                <!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
                <!--    <img src="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid" alt="">-->
                <!--</div>-->

                <!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
                <!--    <img src="https://images.pexels.com/photos/158827/field-corn-air-frisch-158827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid " alt="">-->
                <!--</div>-->

                <!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
                <!--    <img src="https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid " alt="">-->
                <!--</div>-->

                <!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
                <!--    <img src="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid " alt="">-->
                <!--</div>-->

                <!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
                <!--    <img src="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid " alt="">-->
                <!--</div>-->

                <!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
                <!--    <img src="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid " alt="">-->
                <!--</div>-->

                <!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
                <!--    <img src="https://images.pexels.com/photos/1038002/pexels-photo-1038002.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid " alt="">-->
                <!--</div>-->
            </div>
        </div>
    </section>
</body>

<?php
include "club-footer.php";
?>