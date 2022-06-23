<?php
include("./config/init.php");
include "dis-header.php";
$event = new Event;
$events = $event->getDistEvents();
// $events = $event->getPosters();
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


    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/dis-event_bg.jpg')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>DISTRICT EVENTS</h2>
                <!--<p>Give a helping hand for poor people</p>-->
                <ul class="xs-breadcumb">
                    <li class="badge badge-pill badge-primary"><a href="index.php" class="color-white"> Home /</a>District Events</li>
                </ul>
            </div>
        </div>
    </section>

    <main class="xs-main">

        <section class="xs-section-padding">
            <div class="container">
                <div class="xs-heading row xs-mb-60">
                    <div class="col-md-9 col-xl-9">
                        <h2 class="xs-title">DISTRICT EVENTS</h2>
                    </div>
                </div>
                <div class="row">

                    <?php foreach ($events as $key => $event) : ?>
                        <?php $d = date_create($event->date);
                        $d = date_format($d, "Y/M/d");
                        $d = explode('/', $d); ?>
                        <?php $color = ['event-green', 'event-purple', 'event-blue', 'event-red'];
                        $ran = rand(0, 3); ?>
                        <div class="col-lg-6 row xs-single-event <?php echo $color[$ran]; ?>">
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
                                    <a class="event-tilte"><?php echo ucwords($event->xiv_rotaract); ?></a>
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
                                    <div class="xs-countdown-timer" data-countdown="<?php echo str_replace('-', '/', $event->date); ?>"></div>
                                    <a href="dis-eventdetails.php?eid=<?php echo $event->id; ?>" class="btn btn-primary">
                                        View More</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <!--<div class="row">-->
                <!--    <div class="col-md-12 col-xl-12">-->
                <!--        <h4 class="xs-title" style="text-align:center; font-size:20px; margin: 30px;">Files yet to be Loaded up, so just stay soon</h4>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </section>
    </main>

</body>

<?php
include "dis-footer.php";
?>

</html>