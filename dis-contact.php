<?php
include("./config/init.php");
include "dis-header.php";
$manage = new Management();
$managements = $manage->getManagements();
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


    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/contact_bg.jpg')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>CONTACT US</h2>
                <!--<p>Give a helping hand for the Society</p>-->
                <ul class="xs-breadcumb">
                    <li class="badge badge-pill badge-primary"><a href="indexs.php" class="color-white"> Home /</a> Contact</li>
                </ul>
            </div>
        </div>
    </section>

    <main class="xs-main">

        <section class="xs-contact-section-v2">
            <div class="container">
                <div class="xs-contact-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="xs-contact-form-wraper">
                                <h4>Drop us a line</h4>
                                <form action="dis-enquiry.php" method="post"  class="xs-contact-form contact-form-v2">
                                    <div class="input-group">
                                        <input type="text" name="name" id="xs-name" class="form-control" placeholder="Enter Your Name">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="email" name="email" id="xs-email" class="form-control" placeholder="Enter Your Email-ID">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
                                        </div>
                                    </div>
                                    <div class="input-group massage-group">
                                        <textarea name="message" placeholder="Enter Your Message"  class="form-control" cols="30" rows="10"required></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary"  type="submit" value="submit" name="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="xs-maps-wraper map-wraper-v2">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125323.40216246534!2d76.89719409707816!3d11.01187008134325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859af2f971cb5%3A0x2fc1c81e183ed282!2sCoimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1621099662723!5m2!1sen!2sin" height="429" style="border:0;width: -webkit-fill-available;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="xs-contact-details">
                <div class="container">
                    <div class="row">
                        <?php foreach ($managements as $key => $member) : ?>
                            <?php if ($key > 2) {
                                break;
                            } ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="xs-contact-details">
                                    <div class="xs-widnow-wraper">
                                        <div class="xs-window-top">
                                            <img src="assets/images/dist_management/<?php echo $member->profile_pic; ?>" alt="">
                                        </div>
                                    </div>
                                    <ul class="xs-unorder-list">
                                        <li style="letter-spacing: 1px; font-size: 18px;font-weight: 600;"><i class="fa fa-user  color-green"></i> <?php echo $member->name; ?> </li>
                                        <li style="letter-spacing: 0.7px; font-size: 15px;font-weight: 400;"><i class="fa fa-user color-green"></i> <?php echo $member->designation; ?> </li>
                                        <!--<li><i class="fa fa-phone color-green"></i><?php echo $member->phone; ?> </li>-->
                                        <!--<li><i class="fa fa-envelope color-green"></i><a href="https://demo.xpeedstudio.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a9c7c8c4cce9d0c6dcdbcdc6c4c8c0c787cac6c4">[email&#160;protected]</a></li>-->
                                    </ul>
                                    <ul class="xs-social-list-v2">
                                        <!--<li><a href="https://www.facebook.com/<?php echo $member->fb_id; ?>" class="color-facebook "><i class="fa fa-facebook color-yellow"></i></a></li>-->
                                        <li><a href="https://www.instagram.com/<?php echo $member->insta; ?>" class="color-instagram "><i class="fa fa-instagram color-yellow"></i></a></li>
                                        <li><a href="https://in.linkedin.com/in/<?php echo $member->linked; ?>" class="color-linkedin "><i class="fa fa-linkedin color-yellow"></i></a></li>
                                        <!-- <li><a href="#" class="color-pinterest"><i class="fa fa-pinterest"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!--  -->

                    </div>
                </div>
            </section>
        </section>
    </main>
</body>

<?php
include "dis-footer.php";
?>

</html>