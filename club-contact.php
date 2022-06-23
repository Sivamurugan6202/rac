<?php
include "club-header.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<style>

</style>

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


    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/club-contact_bg.jpg')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>CONTACT US</h2>
                <!--<p>Give a helping hand for poor people</p>-->
                <!--<ul class="xs-breadcumb">-->
                <!--    <li class="badge badge-pill badge-primary"><a href="club-index.php?cid=<?php echo $_COOKIE['cid']?>" class="color-white"> Home /</a> Contact</li>-->
                <!--</ul>-->
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
                                <form action="club-enquiry.php" method="POST" class="xs-contact-form contact-form-v2">
                                    <div class="input-group">
                                        <input type="text" name="username" id="xs-name" class="form-control" placeholder="Enter Your Name....." required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="email" name="email" id="xs-email" class="form-control" placeholder="Enter Your Email....." required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
                                        </div>
                                    </div>
                                    <div class="input-group massage-group">
                                        <textarea name="message" placeholder="Enter Your Message....." id="xs-massage" class="form-control" cols="30" rows="10"required></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                                        </div>
                                        
                    
                                    </div>
                                    <input name='cid' type='hidden' value="<?php echo $_COOKIE['cid'];?>"/>
                                
                                    <button class="btn btn-primary" type="submit" id="xs-submit">submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 cont-logo">
                            <div class="xs-maps-wraper map-wraper-v2" style="text-align: center;padding: 125px 0px;">
                                <img src="assets/images/rotaract_logo.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


</body>

<?php
include "club-footer.php";
?>

</html>