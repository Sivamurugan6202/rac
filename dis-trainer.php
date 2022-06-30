<?php
include("./config/init.php");
$trainer = new Trainers;
$trainers = $trainer->getTrainers();

include "dis-header.php";
?>
<!doctype html>
<html class="no-js" lang="en">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">-->

<!-- Template Style sheet -->
<link href="team/css/style.css" rel="stylesheet">

<body>
    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/club-bg.png')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>DISTRICT TRAINER</h2>
            </div>
        </div>
    </section>
    <section class="team xs-section-padding">
        <div class="container">
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