<?php
include("./config/init.php");
include "dis-header.php";
$project = new Project;
$club = new Club;
$club_av = $project->getTodaysProjects();
$management = new Management;
$mags = $management->getManagements();
$member = new Members;
$trainers = new Trainers;
?>
<!doctype html>
<html class="no-js" lang="en">


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

    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/dis-about_bg.jpg')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>ABOUT US</h2>
                <p>Rotary International District 3201</p>
                <ul class="xs-breadcumb">
                    <li class="badge badge-pill badge-primary"><a href="index.php" class="color-white"> Home /</a> About</li>
                </ul>
            </div>
        </div>
    </section>

    <main class="xs-main">

        <div class="xs-video-popup-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 content-center">
                        <div class="xs-video-popup-wraper">
                            <img src="assets/images/backgrounds/video_bg.jpg" alt="">
                            <div class="xs-video-popup-content">
                                <a href="https://www.youtube.com/watch?v=ydkXyELD9i4" class="xs-video-popup xs-round-btn">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="xs-content-section-padding">
            <div class="container">
                <div class="xs-heading row xs-mb-60">
                    <div class="col-md-12 col-xl-12">
                        <h2 class="xs-title">Rotaract</h2>
                        <h6 align="justify" style="font-size:16px;    line-height: 1.5;">Rotary is an International Service Organization with a global network of professional and business people who unite to seek a lasting change across the Globe and in our Community. Owning the pride of being the world's first service LTV_Final, Rotary traces its history since 23rd February 1905 and owns the credit of being the longest serving organsation in the world.<br><br>
                            Rotaract stands for "Rotary in action". Rotaract - a worldwide Youth Wing Organisation of Rotary which focuses on service, leadership, Individual professional development, development of the community, international networking and fellowship. Young adults who are above 18 years of age with a common passion to make a difference, come together and operate with a motto - "Fellowship Through Service". The organisation amalgamates versatile, talented youth who invest time and interest to uplift the society as they empower themselves. Rotaract Clubs can be Community-based those which are self-governed or Institution-based, which function associated with Universities or any Educational Institutions. Rotaract traces its existence since 1968 and have never flagged down in its motto till date.

                        </h6>
                    </div>
                </div>
                <div class="xs-heading row xs-mb-60">
                    <div class="col-md-12 col-xl-12">
                        <h2 class="xs-title">Rotary International District 3201</h2>
                        <h6 align="justify" style="font-size:16px;    line-height: 1.5;">RID 3201 is a Rotary sponsored Community Organization formed in July 2008 which covers few regions of the Southern Indian States of Tamil Nadu and Kerala.<br><br>
                            Efficiently functioning in the revenue districts of Coimbatore, Kochi, Idukki, Palakkad and Thrissur, the District consists of 87 active Clubs and the count is still rising ! 3201 is strong and sound with 2,300 vibrant, enthusiastic young Rotaractors. Rotaract 3201 have become a wide platform to various youngsters to improve their skills and become the future leaders and entrepreneurs, also achieving their ultimate goals of serving the society with humanity.


                        </h6>
                    </div>
                </div>
                <div class="xs-heading row xs-mb-60">
                    <div class="col-md-12 col-xl-12">
                        <h2 class="xs-title">What do we do?</h2>
                        <ul class="xs-unorder-list play green-icon" style="font-size:18px;    line-height: 1.5;">
                            <li>Recognize the dignity and value of all useful occupations as opportunities to serve.</li>
                            <li>Recognize, practice, and promote ethical standards as leadership qualities and vocational responsibilities. </li>
                            <li>Develop professional and leadership skills.</li>
                            <li>Provide opportunities for personal and group activities to serve the community and promote international understanding and goodwill towards all people.</li>
                            <li>Develop knowledge and understanding of the needs, problems, and opportunities in the community and worldwide.</li>
                            <li>Emphasize respect for the rights of others, based on recognition of the worth of each individual.</li>
                        </ul>
                        <!--<h6 align="justify" style="font-size:16px;    line-height: 1.5;">We can’t cross the sea merely by standing and staring at the water! All that required is “ACTION”!<br><br>-->
                        <!--Rising from the bustling mass and navigating through the pool of opportunities , Rotaractors dedicate their passion, energy, wit and wisdom to take action on sustainable and impactful projects. Rotaract is a platform where people find a fair amount of chance to contribute something to the society that adds value to humanity. <br><br>-->
                        <!--Our actions are not only grounded by skills but also by principles, values, good citizenship, sustainability, creativity and lifelong learning. We believe that a firm impact could be realized by supporting communities, educating tomorrow’s workforce and working side by side to take action through service. Opportunity dances with those who are already on the dance floor. Creating opportunities, exchanging ideas, developing stewardship and professional skills and having fun through service are our action is all about. We ensure that ideas are never left unchallenged, which plays a key role in shaping the fabric of the community.<br><br>-->
                        <!--We challenge things differently through innovative projects and extraordinary ideas proving that life standards could be altered just by altering the altitudes of human minds. We act responsibly by using our knowledge of local issues to identify areas of need, then applying our expertise and diverse perspectives to find a solution. We strive to achieve the pinnacle of excellence by leveraging the experience in the broadest possible manner. While acknowledging people’s success and encouraging their pursuits, we keep working and we keep taking action to create lasting changes. We were, we are and we will be lime lighted for the extra step we take and no doubt, we will always be a voice than being an echo!<br><br>Remember you are one decision away from an entirely different life.<br><br>-->
                        <div class="xs-btn-wraper" style=" float: left;">
                            <a href="dis-clubs.php" target="_blank" class="btn btn-primary">
                                <span class="badge"></span> Join Us Member
                            </a>
                            <a href="dis-contact.php" target="_blank" class="btn btn-primary">
                                <span class="badge"></span> Join Us Partner
                            </a>
                        </div>

                        </h6>
                    </div>
                </div>
            </div>
        </section>

        <div class="xs-funfact-section xs-content-section-padding waypoint-tigger parallax-window" style="background-image: url('assets/images/backgrounds/rtr-count_bg.jpg')">
            <div class="container">
                <div class="row col-lg-12 xs-heading mx-auto">
                    <h2 class="xs-title color-white small" align="justify">The Rotaract District 3201 was formed in July 2008. The clubs are spread over part of the Southern Indian states of Kerala and Tamilnadu.</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="xs-single-funFact color-white">
                            <i class="icon-planet-earth" ></i>
                            <span class="number-percentage-count number-percentage" data-value="<?php echo $club->getCount(); ?>" data-animation-duration="<?php echo $club->getCount(); ?>"><?php echo $club->getCount(); ?></span><span>+</span>
                            <small><br>No. of Clubs</small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="xs-single-funFact color-white">
                            <i class="icon-group"></i>
                            <span class="number-percentage-count number-percentage" data-value="<?php echo $management->getCount(); ?>" data-animation-duration="<?php echo $management->getCount(); ?>"><?php echo $management->getCount(); ?></span><span>+</span>
                            <small><br>No.of Cabinets</small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="xs-single-funFact color-white">
                            <i class="icon-children"></i>
                            <span class="number-percentage-count number-percentage" data-value="<?php echo $member->getCount(); ?>" data-animation-duration="<?php echo $member->getCount(); ?>"><?php echo $member->getCount(); ?></span><span>+</span>
                            <small><br>No. of Rotaractors</small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="xs-single-funFact color-white">
                            <i class="icon-donation_2"></i>
                            <span class="number-percentage-count number-percentage" data-value="<?php echo $project->getCount(); ?>" data-animation-duration="<?php echo $club->getCount(); ?>"><?php echo $project->getCount(); ?></span><span>+</span>
                            <small><br>No. of Projects</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xs-black-overlay"></div>
        </div>

        <section class="xs-content-section-padding">
            <div class="container">
                <div class="xs-heading row xs-mb-60">
                    <div class="col-md-12 col-xl-12">
                        <h2 class="xs-title">The Four Way Test</h2>
                        <h6 align="justify" style="font-size:16px;    line-height: 1.5;">Before performing the projects, the Rotaractors ensure the authenticity of the project by applying the Rotary's famous Four Way Test. From the earliest days of the organization, Rotarians and Rotaractors were concerned with promoting high ethical standards in their professional lives. One of the world's most widely printed and quoted statements of business ethics is the four - way test, created in 1932 by Rtn. Herbert J. Taylor (who later served as Rotary International President) and was adopted by Rotary in 1943.</h6>
                        <div class="xs-service-promo">
                            <br>
                            <h5 style="font-size:18px;    line-height: 1.5;">Before any Rotaract activity, a Rotaractor examines the activity with following four questions:</h5>
                            <br>
                            <ul class="xs-unorder-list play green-icon" style="font-size:18px;    line-height: 1.5;">
                                <li>Is it the TRUTH?</li>
                                <li>Is it FAIR to all concerned?</li>
                                <li>Will it build GOOD WILL and BETTER FRIENDSHIP?</li>
                                <li>Will it be BENEFICIAL to all concerned?</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<?php
include "dis-footer.php";
?>


</html>