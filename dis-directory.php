<?php
include("./config/init.php");
$management = new Management;
$mags = $management->getManagements();
include "dis-header.php";
?>
<!doctype html>
<html lang="en">
<!-- team css -->
<link rel="stylesheet" href="assets/css/team.css">
<!-- team css end -->

<body>
    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/club-bg.png')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>DISTRICT COUNCIL MEMBERS</h2>
            </div>
        </div>
    </section>
    <section class="xs-section-padding">
        <div class="container">
            <div class="row active-with-click">
                <?php foreach ($mags as $m) : ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <article class="material-card Red">
                            <h2>
                                <span><?php echo $m->name; ?></span>
                                <strong><?php echo $m->designation; ?></strong>
                            </h2>
                            <div class="mc-content">
                                <div class="img-container">
                                    <img class="img-responsive" src="./assets/images/dist_management/<?php echo $m->profile_pic; ?>" alt="Team Image">
                                </div>
                                <div class="mc-description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ...
                                </div>
                            </div>
                            <a class="mc-btn-action">
                                <i class="fa fa-bars"></i>
                            </a>
                            <div class="mc-footer">
                                <div class="team-social">
                                    <ul class="xs-social-list-v2">
                                        <li><a target=_parent href="#" class="fa fa-fw fa-envelope"></a></li>
                                        <li><a target=_parent href="https://in.linkedin.com/in/<?php echo $m->linked; ?>" class="fa fa-fw fa-linkedin"></a></li>
                                        <li><a target=_parent href="https://www.instagram.com/<?php echo $m->insta; ?>" class="fa fa-fw fa-instagram"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</body>
<!-- before pasting -->
<?php
include "dis-footer.php";
?>
<script>
    $(function() {
        $('.material-card > .mc-btn-action').click(function() {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });
</script>

</html>