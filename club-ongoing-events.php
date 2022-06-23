<?php
// include("./config/init.php");
include "club-header.php";
$project = new Project;
// print_r($_SESSION['cid']);
$projects = $project->getProjects($_COOKIE['cid']);
$newProjects = [];
foreach ($projects as $key => $pro) {
    if ($date <=$pro->from_date) {
        $newProjects[$key] = $pro;
    }
}
foreach($projects as $cv){
    unset($cv->password);
    unset($cv->id);
    unset($cv->description);
    unset($cv->conclusion);
    unset($cv->rtn_count);
    unset($cv->rtr_count);
    unset($cv->report_submitted);
    unset($cv->report);
    unset($cv->grp_email);
    unset($cv->rtr_email);
    unset($cv->insta);
    unset($cv->mail);
    unset($cv->fb);
    unset($cv->linked);
    unset($cv->phone);
    unset($cv->udate);
    unset($cv->status);
    unset($cv->del);
    unset($cv->poster_2);
    unset($cv->poster_1);
    unset($cv->poster_3);
    unset($cv->project_with);
    unset($cv->groups);
    unset($cv->phone);
    unset($cv->type);
    unset($cv->pdate);
    unset($cv->president_name);
unset($cv->secretary_name);
    
}
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


    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/clubevent_bg.jpg')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>ONGOING / UPCOMING EVENTS</h2>
                <!-- <p>Rotary International District 3201</p> -->
                <!--<ul class="xs-breadcumb">-->
                <!--    <li class="badge badge-pill badge-primary"><a href="club-index.php?cid=<?php echo $_COOKIE['cid']?>" class="color-white"> Home /</a> ongoing-upcoming events</li>-->
                <!--</ul>-->
            </div>
        </div>
    </section>
    <section class="filter xs-section-padding">
        <div id="myBtnContainer">
            <a class="btn btn-primary" onclick="reset()"> Show all</a>
            <a class="btn btn-primary" onclick="filterSelection('ongoing')">Ongoing</a>
            <a class="btn btn-primary" onclick="filterSelection('upcoming')"> Upcoming</a>
            <!-- <a class="btn btn-primary" onclick="filterSelection('fruits')"> Fruits</a>
  <a class="btn btn-primary" onclick="filterSelection('colors')"> Colors</a> -->
        </div>

        <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
        <div class="container">
            <div class="row" id='cont'>
                <?php if(empty($newProjects)){
                   echo "<h5 style='text-align: center;width: 100%;font-weight:600;'>No Events as of now!</h5>"; 
                }?>

                <?php foreach ($newProjects as $pro) : ?>
                    <?php $d = date_create($pro->from_date);
                    $d = date_format($d, "Y/M/d");
                    $d = explode('/', $d);
                    $dt = str_replace('-', '/', $pro->from_date); ?>

                    <div class="col-lg-6  ongoing">
                        <div class="col-lg-12 row xs-single-event">
                            <div class="col-md-5">
                                <div class="xs-event-image">
                                    <img src="assets/images/club_projects/<?php echo $pro->project_poster ?>" alt="">
                                    <div class="xs-entry-date">
                                        <span class="entry-date-day"><?php echo $d[2]; ?></span>
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
    function reset(){
        window.location.reload();
    }
</script>
<script>
    var con = <?php echo json_encode($projects); ?>;
    con = con.filter(c => {
        dat4 = new Date();
        dat5 = new Date(c.from_date)
        console.log(dat4,'-',dat5);
        dat4.setHours(0,0,0,0);
        dat5.setHours(0,0,0,0);
        console.log(dat4.getTime(),dat5.getTime());
        if (dat5.getTime() >= dat4.getTime()) {
            return c;
        }
    })
    const cont = document.getElementById("cont");
    var newCon = con
    console.log(newCon);

    function filterSelection(cmd) {
        if (cmd == 'ongoing') {
            console.log('ongoing');
            newCon = con.filter((m) => {
                const dt = new Date(m.from_date);
                const dt1 = new Date();
                dt.setHours(0,0,0,0);
                dt1.setHours(0,0,0,0);
                console.log(dt);
                console.log(dt.getTime());
                                console.log(dt1);

                console.log(dt1.getTime());
 
                if (dt.getTime()==dt1.getTime()) {
                    console.log('here');
                    console.log(m);
                    return m;
                }
            })
        } else if (cmd == 'upcoming') {
            console.log('upcoming');
            newCon = con.filter((m) => {
                const dt = new Date(m.from_date);
                const dt1 = new Date();
                if (dt1 < dt) {
                    return m;
                }
            })
        } else {
            console.log('all');

            // newCon = con;
            //  console.log(newCon);
        }

        cont.innerHTML = '';
        console.log(newCon);
        if (newCon.length == 0) {
            console.log('hey');
            cont.innerHTML += `<div class='col-md-12'><h5 style="text-align:center; font-weight:600;">No Events as of now</h5></div>'`;
        } else {
            newCon.forEach(c => {
                av = new Date(c.from_date);
                month = av.toLocaleString('default', {
                    month: 'long'
                });
                cont.innerHTML += `
        <div class="col-lg-6  ongoing">
                    <div class="col-lg-12 row xs-single-event">
                        <div class="col-md-5">
                            <div class="xs-event-image">
                                <img src="assets/images/club_projects/${c.project_poster}" alt="">
                                <div class="xs-entry-date">
                                    <span class="entry-date-day">${av.getDate()}</span>
                                    <span class="entry-date-month">${month}</span>
                                </div>
                                <div class="xs-black-overlay"></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="xs-event-content">
                                <a class="event-tilte">${c.name}</a>
                                <p>venue: <span>${c.venue}</span></p>
                                <p>Time: <span>${c.time}</span></p>
                                <p>Event Chairman: <span>${c.event_chairman}</span></p>
                                <!-- <a href="#" class="btn btn-primary">
                                Learn More
                            </a> -->
                            </div>
                        </div>
                    </div>
                </div>
        `;
            })
        }

    }
</script>

<?php
include "club-footer.php";
?>