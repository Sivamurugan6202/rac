<?php
include("./config/init.php");
include "dis-header.php";
$trainer = new Trainers;
?>

<style>
    .rs-technology {
        padding-top: 200px;
    }

    .rs-technology .first {
        margin-bottom: 100px;
    }

    .rs-technology .site-heading h2 {
        color: black;
    }

    /*.rs-technology .main{*/
    /*    box-shadow: 0px 0px 20px rgb(0 0 0 / 15%);*/
    /*}*/

    .rs-technology .technology-item {
        text-align: center;
        padding: 20px 40px 20px 40px;
    }

    .rs-technology .technology-item a {
        overflow: hidden;
    }

    .xs-heading {
        margin-bottom: 30px;
    }
</style>

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

<!-- Technology Section Start -->
<div class="rs-technology">
    <div class="container first">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-heading xs-heading text-center">
                        <h2 class="xs-title">TECHNICAL SUPPORT</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="https://sr-mediatech.com/">
                    <div class="technology-item main">
                        <div class="logo-img">
                            <img src="assets/images/sponsers/sr.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="https://sr-mediatech.com/">
                    <div class="technology-item main">
                        <div class="logo-img">
                            <img src="assets/images/sponsers/ks.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container 2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-heading xs-heading text-center">
                        <h2 class="xs-title">OUR SPONSORS</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $sponsors = $trainer->getSponsors(); ?>
            <?php foreach ($sponsors as $sponsor) : ?>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="technology-item">
                        <a href="#">
                            <div class="logo-img">
                                <img src="assets/images/sponsers/<?php echo $sponsor->logo; ?>" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Technology Section End -->

<?php
include "dis-footer.php";
?>