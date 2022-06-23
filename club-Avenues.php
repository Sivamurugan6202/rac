<?php
// include("./config/init.php");
include "club-header.php";
$project = new Project;
$clubs = new Club;
$club = $clubs->getClubWCid($_COOKIE['cid']);
// print_r($_SESSION['cid']);
$projects = $project->getProjectSs($_COOKIE['cid']);
foreach($projects as $cv){
    unset($cv->password);
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
            margin-left: 35px;
        }

        .filter .btn {
            margin-bottom: 10px;
        }
    }

    .filter .filterDiv {
        float: left;
        color: #ffffff;
        display: none;
        margin-bottom: 15px;
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
                <h2>OUR AVENUES</h2>
                <!-- <p>Rotary International District 3201</p> -->
                <!--<ul class="xs-breadcumb">-->
                <!--    <li class="badge badge-pill badge-primary"><a href="club-index.php?cid=<?php echo $_COOKIE['cid']?>" class="color-white"> Home /</a> Avenues</li>-->
                <!--</ul>-->
            </div>
        </div>
    </section>
    <section class="filter xs-section-padding">
        <div id="myBtnContainer">
            <a class="btn btn-primary" onclick="reset()">All</a>
            <a class="btn btn-primary" onclick="filterSelection('Community_Service')">Community</a>
            <a class="btn btn-primary" onclick="filterSelection('Professional_Service')">Professional</a>
            <a class="btn btn-primary" onclick="filterSelection('Club_Service')"> Club</a>
            <a class="btn btn-primary" onclick="filterSelection('International_Service')">International</a>
            <a class="btn btn-primary" onclick="filterSelection('District_Priority_Projects')">DPP</a>
        </div>

        <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
        <div class="container">
            <div class="row" id='cont'>
                <?php if (!empty($projects)) { ?>
                    <?php foreach ($projects as $pro) : ?>
                        <?php if ($date < date($pro->post_date) || $date == ($pro->post_date)) {
                            continue;
                        } ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="xs-box-shadow xs-single-journal" style="margin-bottom: 50px;">
                                <div class="entry-thumbnail " style="height: 350px;    background-image: url('assets/images/club_projects/<?php echo $pro->project_poster; ?>');background-size: cover;background-repeat: no-repeat;background-position: center;">
                                    <!--<img src="assets/images/club_projects/<?php echo $pro->project_poster; ?>" alt="">-->
                                    <div class="post-author">
                                        <span class="xs-round-avatar">
                                            <img class="img-responsive" src="assets/images/club_logo/<?php echo isset($club->logo)?$club->logo:'rtrlogo1.png'; ?>" alt="">
                                        </span>
                                        <span class="author-name">
                                            <a style="cursor: default;"><?php echo dashReplace($pro->avenue); ?></a>
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
                                                <?php echo dateFix($pro->from_date); ?>
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
                        <!--  -->
                    <?php endforeach; ?>
                <?php } else { ?>
                    <div class='col-md-12'>
                        <h5 style='text-align: center;width: 100%;font-weight:600;'>No events as of now</h5>
                    </div>
                <?php } ?>
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
    const cont = document.getElementById("cont");
    var con = <?php echo json_encode($projects); ?>;
    // console.log(con);
    var club = <?php echo json_encode($club) ?>;
    const d = new Date();
    con = con.filter(c => {
        const d1 = new Date(c.post_date);
        console.log(d);
        console.log(d1);
        if (d1 < d && d1.getDate() != d.getDate()) {
            return c
        }

    })
    var newCon = con;
    // console.log(newCon);

    function filterSelection(cmd) {



        var NewCon = newCon.filter(c => {
            if (cmd == 'all') {
                return c;
            }
            if (c.avenue == cmd) {
                return c;
            }
        })
        cont.innerHTML = '';
        console.log(NewCon);
        console.log(NewCon.length);
        if (NewCon.length == 0) {
            console.log('hey');
            cont.innerHTML += `<div class='col-md-12'><h5 style="text-align:center; font-weight:600;">No Events as of now</h5></div>'`;
        } else {
            NewCon.forEach(c => {
                dtr = c.from_date.split("-");
                dtr = dtr[2] + '-' + dtr[1] + '-' + dtr[0];
                rm = c.avenue.split("_");
                rm = rm.join(" ");
                cont.innerHTML += `
            <div class="col-lg-4 col-md-6">
                    <div class="xs-box-shadow xs-single-journal" style="margin-bottom: 50px;">
                        <div class="entry-thumbnail " style="height: 350px;    background-image: url('assets/images/club_projects/${c.project_poster}');background-size: cover;background-repeat: no-repeat;background-position: center;">
                            <div class="post-author">
                                <span class="xs-round-avatar">
                                    <img class="img-responsive" src="assets/images/club_logo/<?php echo isset($club->logo)?$club->logo:'rtrlogo1.png'; ?>" alt="">
                                </span>
                                <span class="author-name">
                                    <a href="#">${rm}</a>
                                </span>
                            </div>
                        </div>
                        <div class="entry-header">
                            <div class="entry-meta">
                                <span class="date" style="font-size: 16px;">
                                    <a rel="bookmark" class="entry-time" style="float: right;">
                                    ${c.time}
                                    </a>
                                    <a rel="bookmark" class="entry-date">
                                    ${dtr}                                    </a>
                                </span>
                            </div>
                            <h4 class="entry-title">
                                <p style="text-align:center;">${c.name}</p>
                            </h4>
                        </div>
                        <span class="xs-separetor"></span>
                        <div class="post-meta">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <span class="comments-link" style="padding-top: 15px;">
                                        <!-- <i class="fa fa-comments-o"></i> -->
                                        <p>venue: <span>${c.venue}</span></p>
                                    </span>

                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <span class="view-link">
                                        <a href="club-avenuesdetails.php?pid=${c.pid}" class="btn btn-primary" style="color: white;">View More</a>
                                    </span>
                                </div>
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