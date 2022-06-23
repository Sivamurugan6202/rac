<?php
include("./config/init.php");
include "club-header.php";
$project = new Project;
// print_r($_SESSION['cid']);
$projects = $project->getProjects($_SESSION['cid']);

?>
<style>
    .filter .container {
        overflow: hidden;
        margin-top: 30px;
    }

    .filter #myBtnContainer {
        margin-left: 120px;
    }

    @media (max-width: 992px) {
        .filter #myBtnContainer {
            margin-left: 50px;
        }

        .filter .btn {
            margin-bottom: 10px;
        }
    }

    .filter .filterDiv {
        float: left;
        color: #ffffff;
        display: none;
        /* Hidden by default */
    }

    /* The "show" class is added to the filtered elements */
    .filter a {
        color: white;
    }

    .filter .show {
        display: block;
    }

    /* Style the as */
    .filter .btn {
        color: white !important;
        margin-right: 15px;
    }

    .filter p {
        color: black !important;
        margin-bottom: 15px !important;
    }

    /* Add a light grey background on mouse-over */
    /* .filter .btn:hover {
  background-color: #ddd;
} */

    /* Add a dark background to the active a */
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


    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/about_bg.jpg')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>Ongoing/ Upcoming Events</h2>
                <!-- <p>Rotary International District 3201</p> -->
                <ul class="xs-breadcumb">
                    <li class="badge badge-pill badge-primary"><a href="club-index.php" class="color-white"> Home /</a> ongoing-upcoming events</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="filter xs-section-padding">
        <div id="myBtnContainer">
            <a class="btn btn-primary" onclick="filterSelection('all')"> Show all</a>
            <a class="btn btn-primary" onclick="filterSelection('ongoing')">Ongoing</a>
            <a class="btn btn-primary" onclick="filterSelection('upcoming')"> Upcoming</a>
            <!-- <a class="btn btn-primary" onclick="filterSelection('fruits')"> Fruits</a>
  <a class="btn btn-primary" onclick="filterSelection('colors')"> Colors</a> -->
        </div>

        <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
        <div class="container">
            <div class="row">
                <?php foreach ($projects as $pro) : ?>
                    <?php $d = date_create($pro->post_date);
                    $d = date_format($d, "Y/M/d");
                    $d = explode('/', $d); ?>
                    <div class="col-lg-6 filterDiv ongoing" id='cont'>
                        <div class="col-lg-12 row xs-single-event">
                            <div class="col-md-5">
                                <div class="xs-event-image">
                                    <img src="assets/images/event/event_1.jpg" alt="">
                                    <div class="xs-entry-date">
                                        <span class="entry-date-day"><?php echo $d[1]; ?></span>
                                        <span class="entry-date-month"><?php echo $d[1]; ?></span>
                                    </div>
                                    <div class="xs-black-overlay"></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="xs-event-content">
                                    <a class="event-tilte"><?php echo $pro->name; ?></a>
                                    <p>venue: <span><?php echo $pro->venue; ?></span></p>
                                    <p>Time: <span><?php echo $pro->time; ?></span></p>
                                    <p>Event Chairman: <span><?php echo $pro->event_chairman; ?></span></p>
                                    <div class="xs-countdown-timer" data-countdown="20"></div>
                                    <!-- <a href="#" class="btn btn-primary">
                                Learn More
                            </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--  -->

            </div>
        </div>
    </section>

</body>
<script>
    var con = <?php echo json_encode($projects); ?>;
    const cont = document.getElementById("cont");

    function filterSelection(cmd) {
        if (cmd == 'ongoing') {
            const newCon = con.filter((m) => {
                const dt = new Date(m.post_date);
                const dt1 = new Date();
                if (dt1 > dt) {
                    return m;
                }
            })
        } else if (cmd == 'upcoming') {
            const newCon = con.filter((m) => {
                const dt = new Date(m.post_date);
                const dt1 = new Date();
                if (dt1 < dt) {
                    return m;
                }
            })
        } else {
            const newCon = con
        }


        console.log(newCon);
    }
</script>

<?php
include "club-footer.php";
?>