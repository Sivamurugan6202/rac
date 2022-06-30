<?php
include "dis-header.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Team Page HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Our Team Page HTML Template" name="keywords">
    <meta content="Our Team Page HTML Template" name="description">


    <style>
        .gal-img {
            padding: 25px;
        }

        .xs-section-padding .gal-img .image a img {
            transform: scale(1);
            transition: 0.3s ease-in-out;
        }

        .xs-section-padding .gal-img .image a:hover img {
            transform: scale(1.2);
        }
    </style>

</head>

<body>
    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/gallery-bg.jpg'">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>DISTRICT GALLERY</h2>
                <p>People may doubt what you say, but they will believe what you do.</p>
                <ul class="xs-breadcumb">
                    <li class="badge badge-pill badge-primary"><a href="index.php" class="color-white"> Home /</a> Gallery</li>
                </ul>
            </div>
        </div>
    </section>

    <main class="xs-main">

        <section class="xs-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 gal-img">
                        <div class="image">
                            <a href="gallery.php?grp=oneLove"><img src="assets/images/gallery-1/1.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4 gal-img">
                        <div class="image">
                            <a href="gallery.php?grp=rotabuzz"><img src="assets/images/gallery-1/2.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4 gal-img">
                        <div class="image">
                            <a href="gallery.php?grp=district_initiatives"><img src="assets/images/gallery-1/3.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4 gal-img">
                        <div class="image">
                            <a href="gallery.php?grp=district_events"><img src="assets/images/gallery-1/4.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4 gal-img">
                        <div class="image">
                            <a href="gallery.php?grp=rotaractmind"><img src="assets/images/gallery-1/5.png" alt=""></a>
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