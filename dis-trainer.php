<?php
include("./config/init.php");
$trainer = new Trainers;
$trainers = $trainer->getTrainers();

include "dis-header.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.xpeedstudio.com/html/charitypress/index-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Apr 2021 06:33:40 GMT -->

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">-->

<!-- Template Style sheet -->
<link href="team/css/style.css" rel="stylesheet">

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
    <section class="team">
        <div class="container" style="padding-top:170px;">
            <div class="xs-heading row xs-mb-60">
                <div class="col-md-12 col-xl-12" style="text-align:center;">
                    <h4 class="xs-title">DISTRICT TRAINER</h4>
                </div>
            </div>
            <div class="row">

                <?php foreach ($trainers as $m) : ?>
                    <div class="column">

                        <div class="team-6">

                            <div class="team-img">
                                <img src="./assets/images/dist_trainers/<?php echo $m->profile_pic; ?>" alt="Team Image">
                            </div>
                            <div class="team-content agile_team_grid1">
                                <h2><?php echo $m->name; ?></h2>
                                <!--<h3>Certificate District Trainer</h3>-->
                                <h3><?php echo $m->club_name; ?></h3>
                                <div class="team-social">
                                    <ul class="xs-social-list-v2">
                                        <!--<li><a href="https://www.facebook.com/<?php echo $m->fb_id; ?>" class="color-facebook social-fb"><i class="fa fa-facebook"></i></a></li>-->
                                        <li><a href="https://www.instagram.com/<?php echo $m->insta; ?>" class="color-instagram social-in"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="https://in.linkedin.com/in/<?php echo $m->linked; ?>" class="color-linkedin social-li"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
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
</body>
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



<?php
include "dis-footer.php";
?>

</html>