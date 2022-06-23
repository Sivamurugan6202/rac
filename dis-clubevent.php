<?php
include("./config/init.php");
include "dis-header.php";
$project = new Project;
$club_av = $project->getAllProjects();
foreach($club_av as $cv){
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
    /*.filter a {*/
    /*    color: white;*/
    /*}*/

    .filter .show {
        display: block;
    }

    /* Style the as */
    .filter .btn {
        color: white !important;
        margin-right: 15px;
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


    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/event_bg.jpg')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>CLUB EVENTS</h2>
                <!--<p>Give a helping hand for poor people</p>-->
                <ul class="xs-breadcumb">
                    <li class="badge badge-pill badge-primary"><a href="index.php" class="color-white"> Home /</a>Club
                        Events</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="filter xs-section-padding">
        <div id="myBtnContainer">
            <a class="btn btn-primary" onclick="ref()"> Show all</a>
            <a class="btn btn-primary" onclick="filterSelection('ongoing')">Ongoing</a>
            <a class="btn btn-primary" onclick="filterSelection('upcoming')"> Upcoming</a>
            <!-- <a class="btn btn-primary" onclick="filterSelection('fruits')"> Fruits</a>
            <a class="btn btn-primary" onclick="filterSelection('colors')"> Colors</a> -->
        </div>

        <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
        <div class="container">
            <?php $cntc=0;?>
            <div class="row" id='cont'>
                <?php foreach ($club_av as $key => $av) : ?>
                    <?php if ($date > $av->from_date) {
                        continue;
                    } ?>
                    <?php $cntc++;?>
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
                <?php if($cntc==0){
                    echo "<h5 style='text-align:center;font-weight:600;font-size: 20px;'>No EVents as of now!</h5>";
                }?>

            </div>
        </div>
    </section>

</body>
<script>
    function ref() {
        window.location.reload();
    }
</script>
<script>
    var con = <?php echo json_encode($club_av); ?>;
    const cont = document.getElementById("cont");
    var newCon = con

    function filterSelection(cmd) {
        if (cmd == 'ongoing') {
            console.log('ongoing');
            newCon = con.filter((m) => {
                const dt = new Date(m.post_date);
                const dt1 = new Date();
                const dt2 = new Date(m.from_date);
                console.log(dt2.getMonth());
                // console.log(dt2);
                console.log(dt1.getMonth() + 1);
                if (dt1 > dt && dt2.getDate() == dt1.getDate() && dt2.getMonth() + 1 == dt1.getMonth() + 1) {
                    return m;
                }
            })
        } else if (cmd == 'upcoming') {
            console.log('upcoming');
            newCon = con.filter((m) => {
                const dt = new Date(m.from_date);
                const dt1 = new Date();
                dt.setHours(0,0,0,0);
                dt1.setHours(0,0,0,0);
                if (dt1 < dt) {
                    return m;
                }
            })
        } else {
            console.log('all');

            newCon = con;
            //  console.log(newCon);
        }

        cont.innerHTML = '';
        console.log(newCon);
        if (newCon.length == 0) {
            console.log('hey');
            cont.innerHTML += `<div class='col-md-12'><h5 style="text-align:center;font-weight:600;font-size: 20px;">No events as of now</h5></div>'`;
        } else {
            newCon.forEach(c => {
                ast = c.avenue.split('_');
                ast = ast.join(' ');
                dst = c.post_date.split("-");
                dst = dst[2] + '-' + dst[1] + '-' + dst[0];
                cont.innerHTML += `
            <div class="col-lg-4 col-md-6">
                    <div class="xs-popular-item xs-box-shadow">
                        <div class="xs-item-header" style="height: 350px;    background-image: url('assets/images/club_projects/${c.project_poster}');background-size: cover;background-repeat: no-repeat;background-position: center;">
                            <div class="xs-skill-bar">
                                <div class="xs-skill-track bg-purple"></div>                                
                            </div>
                        </div>
                        <div class="xs-item-content">
                            <ul class="xs-simple-tag xs-mb-20">
                                <li>
                                    <a><h2>${c.proj_name}</h2></a>    
                                </li>
                            </ul>
 
                            <a class="xs-post-title xs-mb-30">${ast}</a>
                            <ul class="xs-list-with-content">
                                <li>${dst}<span>Date</span></li>
                                <li style="text-align:end;">${c.time}<span>Time</span></li>
                            </ul>
                                <div class="venue">
                                    <h4>${c.venue}</h4>
                                    <p>Venue</p>
                                </div>
                            <span class="xs-separetor"></span>
                            <div class="row xs-margin-0">
                                <div class="xs-round-avatar">
                                    <img src="assets/images/club_logo/${c.logo}" alt="">
                                </div>
                                <div class="xs-avatar-title">
                                <a><span>By</span>${c.club_name}</a>
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
include "dis-footer.php";
?>