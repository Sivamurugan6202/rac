<?php

// include("./config/init.php");

include "club-header.php";
$clubs= new Club;
$project= new Project;
$member= new Members;
$mangement= new Management;
if(!isset($_GET['cid'])){
    echo "<script>window.location.href='./dis-clubs.php'</script>";
}
$id=$_GET['cid'];
$club=$clubs->getClubWCid($id);
setcookie('cid', $club->cid, time() + (86400 * 30), "/");
// print_r($club);
// $_COOKIE['cid']=$club->cid;
// echo $_COOKIE['cid'];
$desc=$clubs->getclubDes($club->cid);
// print_r($desc);

$projects=$project->getProjectSs($club->cid);

?>
<!doctype html>
<html class="no-js" lang="en">


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

    <section class="xs-welcome-slider">
        <div class="xs-banner-slider owl-carousel">
            <div class="xs-welcome-content" style="background-image: url(assets/images/slider/club_slider-1.jpg);">
                <div class="container">
                    <div class="xs-welcome-wraper color-white">
                        <!--<img src="assets/images/rotary_logo.png" alt="" style="height:45px;">-->
                        <h2 style="font-size:45px;">Rotaract Club of <?php echo $club->name; ?></h2>
                        <p>Family of Rotary Club of <?php echo $club->family_rotaract; ?></p>
                        <div class="xs-btn-wraper">
                            <a href="#join-form" class="btn btn-outline-primary">
                                join us now
                            </a>
                            <a href="index.php" class="btn btn-primary">
                                <span class="badge"></i></span> District Home
                            </a>
                        </div>
                    </div>
                </div>
                <div class="xs-black-overlay"></div>
            </div>
            <div class="xs-welcome-content" style="background-image: url(assets/images/slider/club_slider-2.jpg);">
                <div class="container">
                    <div class="xs-welcome-wraper color-white">
                        <!--<img src="assets/images/rotary_logo.png" alt="" style="height:45px;">-->
                        <h2 style="font-size:45px;">Rotaract Club of <?php echo $club->name; ?></h2>
                        <p>Family of Rotary Club of <?php echo $club->family_rotaract; ?></p>
                        <div class="xs-btn-wraper">
                            <a href="#join-form" class="btn btn-outline-primary">
                                join us now
                            </a>
                            <a href="index.php" class="btn btn-primary">
                                <span class="badge"></i></span> District Home
                            </a>
                        </div>
                    </div>
                </div>
                <div class="xs-black-overlay"></div>
            </div>
            <div class="xs-welcome-content" style="background-image: url(assets/images/slider/club_slider-3.png);">
                <div class="container">
                    <div class="xs-welcome-wraper color-white">
                        <!--<img src="assets/images/rotary_logo.png" alt="" style="height:45px;">-->
                        <h2 style="font-size:45px;">Rotaract Club of <?php echo $club->name; ?></h2>
                        <p>Family of Rotary Club of <?php echo $club->family_rotaract; ?></p>
                        <div class="xs-btn-wraper">
                            <a href="#join-form" class="btn btn-outline-primary">
                                join us now
                            </a>
                            <a href="index.php" class="btn btn-primary">
                                <span class="badge"></i></span> District Home
                            </a>
                        </div>
                    </div>
                </div>
                <div class="xs-black-overlay"></div>
            </div>
        </div>
    </section>

    <section class="waypoint-tigger xs-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 row xs-archive-image">
                    <div class="col-md-12 xs-mb-30">
                        <img src="assets/images/club_about/<?php echo isset($desc->img1)?$desc->img1:'def-1.jpg';?>" alt="" class="rounded">
                    </div>
                    <div class="col-md-6 col-sm-6">
                             <img src="assets/images/club_about/<?php echo isset($desc->img2)?$desc->img2:'def-2.jpeg';?>" alt="" class="rounded">
                    </div>
                    <div class="col-md-6 col-sm-6">
                               <img src="assets/images/club_about/<?php echo isset($desc->img3)?$desc->img3:'def-3.jpeg';?>" alt="" class="rounded">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="xs-archive-content">
                        <div class="xs-heading">
                            <h3 class="xs-title big">About us</h3>
                        </div>
                        <p align="justify"><?php echo  isset($desc->main_content)?$desc->main_content:"Rotaract District Organisation 3201 has always been and continues to be the epitome of professionalism and a repository of dynamic minds decorating its proud community";?></p>
                        <h5>Our strategic priorities up to 2021 are:</h5>
                        <ul class="xs-unorder-list arrow">
                            <li><?php echo  isset($desc->pt1)?$desc->pt1:"Combo pack of personality & skill development with extra coupons of gaining knowledge";?></li>
                            <li><?php echo  isset($desc->pt2)?$desc->pt2:"Small acts multiplied by hundreds is the formula for a better community";?></li>
                            <li><?php echo  isset($desc->pt3)?$desc->pt3:"Expanding connections till the world feels small";?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="xs-section-paddding xs-ipad-overlay xs-funFact-v3 waypoint-tigger" style="background-image: url( 'assets/images/backgrounds/club_statistics-1.jpg') ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-12">
                    <div class="xs-funfact-content-wraper " style="padding: 50px 0;">
                        <div class="xs-heading ">
                            <h2 class="xs-title ">The strength of the team is each individual member. The strength of each member is the team. </h2>

                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-4">
                            <div class="media xs-single-funFact-v3 xs-mb-50 ">
                                <span class="d-flex icon-children "></span>
                                <div class="media-body ">
                                    <span class="number-percentage-count number-percentage " data-value="<?php echo $member->getTotMember($id); ?>" data-animation-duration="3500 ">0</span>
                                    <small>No.of Rotaractors</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="media xs-single-funFact-v3 ">
                                <span class="d-flex icon-like "></span>
                                <div class="media-body ">
                                    <span class="number-percentage-count number-percentage " data-value="<?php echo $project->getProjectCount($id); ?> " data-animation-duration="3500 ">0</span>
                                    <small>No.of Projects</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="media xs-single-funFact-v3 ">
                                <span class="d-flex icon-team_2 "></span>
                                <div class="media-body ">
                                    
                                    <span class="number-percentage-count number-percentage " data-value="<?php echo $mangement->getClubManagementCount($id); ?>" data-animation-duration="<?php echo $mangement->getClubManagementCount($id); ?> "></span>
                                    <small>No.of Board Members</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="xs-section-padding">
        <div class="container">
            <div class="xs-heading row xs-mb-60">
                <div class="col-md-9 col-xl-9">
                    <h2 class="xs-title">UPCOMING / ONGOING EVENTS</h2>
                </div>
                <div class="col-xl-3 col-md-3 xs-btn-wraper">
                    <a href="club-ongoing-events.php" class="btn btn-primary">View All Events</a>
                </div>
            </div>
            <div class="row">
                <?php $projs = $project->getProjects($club->cid); ?>
                <?php if (!empty($projs)) { ?>
                <?php $cntc=0;?>
                    <?php foreach ($projs as $key=>$pro) : ?>
                    <?php if($cntc>3){
                        break;
                    }?>
                        <?php
                        if ($date > $pro->post_date ) {
                            continue;
                        }
                        $d = date_create($pro->from_date);
                        $d = date_format($d, "Y/M/d");
                        $d = explode('/', $d); ?>
                        <?php $cntc++;?>

                        <div class="col-lg-6 row xs-single-event">
                            <div class="col-md-5">
                                <div class="xs-event-image">
                                    <img src="assets/images/club_projects/<?php echo $pro->project_poster; ?>" alt="">
                                    <div class="xs-entry-date">
                                        <span class="entry-date-day"><?php echo $d[2]; ?></span>
                                        <span class="entry-date-month"><?php echo $d[1]; ?></span>
                                    </div>
                                    <div class="xs-black-overlay"></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="xs-event-content">
                                    <a class="event-tilte"><?php echo $pro->name ?></a>
                                    <p>venue: <span><?php echo $pro->venue ?></span></p>
                                    <p>Time: <span><?php echo $pro->time ?></span></p>
                                    <p>Event Chairman: <span><?php echo $pro->event_chairman ?></span></p>
                                    <div class="xs-countdown-timer" data-countdown="<?php echo str_replace('-', '/', $pro->from_date); ?>"></div>
                                    <!-- <a href="#" class="btn btn-primary">
                                Learn More
                            </a> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php } ?>
                <?php if($cntc==0){
                   echo "<h5 style='text-align: center;width: 100%;font-weight:600;'>No Events as of now</h5>"; 
                }?>
                <!-- / -->
            </div>
        </div>
    </section>

    <section class="bg-navy-blue">
        <div class="container-fulid">
            <div class="xs-feature-content">
                <h2 class="color-white">The secret to getting ahead is getting started.</h2>
            </div>
        </div>
    </section>

    <section class="xs-feature-box-fulid">
        <div class="container-fulid">
            <div class="row xs-feature-box-wraper">
                <div class="col-md-12 col-lg-4 xs-feature-box">
                    <div class="xs-feature-box-content">
                        <h3 class="color-white">Alone we do little, together we do much</h3>
                        <a href="#join-form" class="btn btn-secondary btn-color-alt">
                            get involved
                        </a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 xs-feature-box highlight">
                    <div class="xs-feature-box-content">
                        <h3 class="color-white">Involve and evolve in the Organisation that constantly works at making the world a better place</h3>
                        <!--<p>For $10,000 or more you can fully fund a water project for a Community. 100% funds clean-->
                        <!--    water projects. 663 million people drink.</p>-->
                        <a href="#join-form" class="btn btn-secondary btn-color-alt">
                            Become an Volunteer
                        </a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 xs-feature-box">
                    <div class="xs-feature-box-content">
                        <h3 class="color-white">Connect with us on social media</h3>
                        <ul class="xs-social-list">
                            <li><a href="<?php echo isset($club->fb) ? $club->fb : '#'; ?>"><i class="fa fa-facebook"></i></a></li>
                            <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
                            <li><a href="<?php echo isset($club->insta) ? $club->insta : '#'; ?>"><i class="fa fa-instagram"></i></a></li>
                            <!-- <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li> -->
                            <li><a href="<?php echo isset($club->linked) ? $club->linked : '#'; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="xs-section-padding">
        <div class="container">
            <div class="xs-heading row xs-mb-60">
                <div class="col-md-9 col-xl-9">
                    <h2 class="xs-title">OUR AVENUES</h2>
                </div>
                <div class="col-xl-3 col-md-3 xs-btn-wraper">
                    <a href="club-Avenues.php" class="btn btn-primary">View All Avenues</a>
                </div>
            </div>
            <div class="row">
                <?php $cntc=0;?>
                <?php if (!empty($projects)) { ?>

                    <?php foreach ($projects as $pro) : ?>
                            <?php if($cntc>5){
                                break;
                            }?>

                        <?php if ($date < $pro->post_date || $date == $pro->post_date) {
                            continue;
                        } ?>
                        <?php $cntc++;?>    
                        <div class="col-lg-4 col-md-6">
                            <div class="xs-box-shadow xs-single-journal" style="margin-bottom: 50px;">
                                <div class="entry-thumbnail " style="height: 350px;    background-image: url('assets/images/club_projects/<?php echo $pro->project_poster; ?>');background-size: cover;background-repeat: no-repeat;background-position: center;">
                                    <!--<img src="assets/images/club_projects/<?php echo $pro->project_poster; ?>" alt="">-->
                                    <div class="post-author">
                                        <span class="xs-round-avatar">
                                            <img class="img-responsive" src="assets/images/club_logo/<?php echo isset($club->logo)? $club->logo:'rtrlogo1.png'; ?>" alt="">
                                        </span>
                                        <span class="author-name">
                                            <a style="cursor: default;"><?php echo isset($pro->avenue) ? dashReplace($pro->avenue) : '#'; ?></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="entry-header">
                                    <div class="entry-meta">
                                        <span class="date" style="font-size: 16px;">
                                            <a rel="bookmark" class="entry-time" style="float: right;">
                                                <?php echo $pro->time; ?>
                                            </a>
                                            <a rel="bookmark" class="entry-date">
                                                <?php echo isset($pro->from_date) ? dateFix($pro->from_date) : '#'; ?>
                                            </a>
                                        </span>
                                    </div>
                                    <h4 class="entry-title">
                                        <p style="text-align:center;"><?php echo $pro->name; ?></p>
                                    </h4>
                                </div>
                                <span class="xs-separetor"></span>
                                <div class="post-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <span class="comments-link" style="padding-top: 15px;">
                                                <!-- <i class="fa fa-comments-o"></i> -->
                                                <p>venue: <span><?php echo $pro->venue; ?></span></p>
                                            </span>

                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <span class="view-link">
                                                <a href="club-avenuesdetails.php?pid=<?php echo $pro->id; ?>" class="btn btn-primary" style="color: white;">View More</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!--  -->

                <?php } ?>
                    <?php if($cntc==0){
                   echo "<h5 style='text-align: center;width: 100%;font-weight:600;'>No Events as of now</h5>"; 
                }?>
            </div>
    </section>

    <section class="parallax-window xs-become-a-volunteer xs-section-padding join-form" id="join-form" style="background-image: url('assets/images/backgrounds/volunteer_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-7">
                    <div class="xs-volunteer-form-wraper bg-aqua">
                        <h2>Become a Rotaractor</h2>
                        <p>It only takes a minute to set up a campaign. Decide what to do. Pick a name. Pick a photo.
                            And just like that, you’ll be ready to start raising money.</p>
                        <form action="club-apply.php" method="POST" id="volunteer-form" class="xs-volunteer-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name='username' id="volunteer_name" class="form-control" placeholder="Enter Your Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="number"  name='phone' class="form-control" placeholder="Your Phone Number" required>
                                </div>
                                <div class="col-lg-6">
                                    <select name="prof" class="form-control" id="volunteer_brach" required>
                                        <option value="">Select</option>
                                        <option value="">Student</option>
                                        <option value="">Working</option>
                                        <option value="">Business</option>
                                        <option value="">Other</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name='email' id="volunteer_email" class="form-control" placeholder="Your Email-ID" required>
                                </div>
                            </div>
                            <input type='hidden' name='cid' value="<?php echo $_COOKIE['cid'];?>"/>
                            <textarea name="message" id="massage" placeholder="Why do want you join Rotaract" cols="30" class="form-control" rows="10" required></textarea>
                            <button type="submit" name='submit' class="btn btn-secondary btn-color-alt">Apply now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="xs-section-padding">
        <div class="container">
            <div class="xs-heading xs-mb-70 text-center">
                <h2 class="xs-mb-0 xs-title">Experience ample opportunities and wholistic development.</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="xs-service-promo">
                        <span class="icon-water"></span>
                        <h5>Club Service </h5>
                        <p>Projects done to maximize friendship/interaction within the club members and with other clubs in the district.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="xs-service-promo">
                        <span class="icon-groceries"></span>
                        <h5>Community Service </h5>
                        <p>Projects done to benefit the local community or an individual in the community.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="xs-service-promo">
                        <span class="icon-heartbeat"></span>
                        <h5>Professional Service</h5>
                        <p>Projects done with an idea to enhance the personal skills and leadership qualities of an individual.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="xs-service-promo">
                        <span class="icon-open-book"></span>
                        <h5>International Service</h5>
                        <p>Projects done in partnership with other voluntary organizations and Rotaract Clubs outside our District.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
    include "club-footer.php";
    ?>
</body>

</html>