<?php
include("./config/init.php");
include "dis-header.php";
if (isset($_GET['eid'])) {
	$id = $_GET['eid'];
	$events = new Event;
	$event = $events->getEvent($id);
// 	print_r($event);
	$event_posters = $events->getEventPosters($id);
// 	print_r($event_posters);
}
?>
<!doctype html>
<html class="no-js" lang="en">


<body>
	<!--[if lt IE 10]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--<div id="preloader">-->
	<!--	<div class="spinner">-->
	<!--		<div class="double-bounce1"></div>-->
	<!--		<div class="double-bounce2"></div>-->
	<!--	</div>-->
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


	<div class="container">
		<div class="xs-event-content" style="padding-top:170px; text-align:center;">
			<h4><?php echo $event->name; ?></h4>
			<!--<p>Give a helping hand for poor people</p>-->
			<!--<ul class="xs-breadcumb">-->
			<!--	<li class="badge badge-pill badge-primary"><a href="index.php" class="color-white"> Home /</a> Events</li>-->
			<!--</ul>-->
		</div>
	</div>

	<main class="xs-main">

		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="xs-event-banner">
							<img src="assets/images/dist_events/<?php echo $event->banner; ?>" alt="">
						</div>
						<div class="row">
							<div class="col-lg-8 xs-event-wraper">
								<div class="xs-event-content">
									<h4>Event Detalis</h4>
									<p><?php echo $event->description; ?>.</p>
								</div>

								<div class="xs-horizontal-tabs">

									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#facilities" role="tab">Host Details</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#contactUs" role="tab">Contact us</a>
										</li>
									</ul>

									<div class="tab-content">
										<div class="tab-pane fade show active" id="facilities" role="tabpanel">
											<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th style="text-align: center;font-size: 20px;">Host Club</th>
													</tr>
												</thead>


												<tbody>
													<tr>
														<td><?php echo $event->host_club; ?></td>
													</tr>

												</tbody>
											</table>
											<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100" style="margin-top: 60px;">
												<thead>
													<tr>
														<th>Host President</th>
														<th>Host Secretary</th>
														<th>Event convenor</th>
													</tr>
												</thead>


												<tbody>
													<tr>
														<td><?php echo $event->host_chairman; ?></td>
														<td><?php echo $event->host_secretary; ?></td>
														<td><?php echo $event->host_conveyer; ?></td>

													</tr>

												</tbody>
											</table>
										</div>
										<div class="tab-pane" id="contactUs" role="tabpanel">
											<div class="xs-contact-form-wraper">
												<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th colspan="2">Email-ID</th>
															<th>Phone Number</th>
														</tr>
													</thead>


													<tbody>
														<tr>
															<td colspan="2"><?php echo $event->email; ?></td>
															<td><?php echo $event->phone; ?></td>

														</tr>

													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">

								<div class="xs-event-schedule-widget">
									<div class="media xs-event-schedule">
										<div class="d-flex xs-evnet-meta-date">
											<span class="xs-event-date">18</span>
											<span class="xs-event-month">July</span>
										</div>
										<div class="media-body">
											<h5><?php echo $event->xiv_rotaract; ?></h5>
										</div>
									</div>
									<ul class="list-group xs-list-group">
										<li class="d-flex justify-content-between">
											Chair:
											<span><?php echo $event->event_chairman; ?></span>
										</li>
										<li class="d-flex justify-content-between">
											Secretary:
											<span><?php echo $event->event_secretary; ?></span>
										</li>
										<li class="d-flex justify-content-between">
											Venue:
											<span><?php echo $event->venue; ?></span>
										</li>
										<li class="d-flex justify-content-between">
											Date:
											<span><?php echo $event->date; ?></span>
										</li>
										<li class="d-flex justify-content-between">
											Phone:
											<span><?php echo $event->phone; ?></span>
										</li>
									</ul>
								</div>

								<div class="xs-event-schedule-widget">
									<h3 class="widget-title">Event Posters</h3>
									<style>
										/* Slideshow container */
										.slideshow-container {
											max-width: 1000px;
											position: relative;
											box-sizing: border-box;
											margin: auto;
										}

										/* Hide the images by default */
										.slideshow-container .mySlides {
											display: none;
										}

										/* Next & previous buttons */
										.slideshow-container .prev,
										.slideshow-container .next {
											cursor: pointer;
											position: absolute;
											top: 50%;
											width: auto;
											margin-top: -22px;
											padding: 16px;
											color: white;
											font-weight: bold;
											font-size: 18px;
											transition: 0.6s ease;
											border-radius: 0 3px 3px 0;
											user-select: none;
										}

										/* Position the "next button" to the right */
										.slideshow-container .next {
											right: 0;
											border-radius: 3px 0 0 3px;
										}

										/* On hover, add a black background color with a little bit see-through */
										.slideshow-container .prev:hover,
										.slideshow-container .next:hover {
											background-color: rgba(0, 0, 0, 0.8);
										}

										/* Caption text */
										.slideshow-container .text {
											color: #f2f2f2;
											font-size: 15px;
											padding: 8px 12px;
											position: absolute;
											bottom: 8px;
											width: 100%;
											text-align: center;
										}

										/* Number text (1/3 etc) */
										.slideshow-container .numbertext {
											color: #f2f2f2;
											font-size: 12px;
											padding: 8px 12px;
											position: absolute;
											top: 0;
										}

										/* The dots/bullets/indicators */
										.slideshow-container .dot {
											cursor: pointer;
											height: 15px;
											width: 15px;
											margin: 0 2px;
											background-color: #bbb;
											border-radius: 50%;
											display: inline-block;
											transition: background-color 0.6s ease;
										}

										.slideshow-container .active,
										.slideshow-container .dot:hover {
											background-color: #717171;
										}

										/* Fading animation */
										.slideshow-container .fade {
											opacity: 1;
										}

										.slideshow-container .fade {
											-webkit-animation-name: fade;
											-webkit-animation-duration: 1.5s;
											animation-name: fade;
											animation-duration: 1.5s;
										}

										@-webkit-keyframes fade {
											from {
												opacity: .4
											}

											to {
												opacity: 1
											}
										}

										@keyframes fade {
											from {
												opacity: .4
											}

											to {
												opacity: 1
											}
										}
									</style>

									<!-- Slideshow container -->
									<div class="slideshow-container">
										<?php foreach ($event_posters as $ep) : ?>
											<!-- Full-width images with number and caption text -->
											<div class="mySlides fade">
												<img src="./assets/images/dist_events/<?php echo $ep->poster; ?>" style="width:100%">
												<!-- <div class="text">Caption Text</div> -->
											</div>
										<?php endforeach; ?>



										<!-- Next and previous buttons -->
										<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
										<a class="next" onclick="plusSlides(1)">&#10095;</a>
									</div>
									<br>

									<!-- The dots/circles -->
									<div style="text-align:center">
										<span class="dot" onclick="currentSlide(1)"></span>
										<span class="dot" onclick="currentSlide(2)"></span>
										<span class="dot" onclick="currentSlide(3)"></span>
									</div>

									<script>
										var slideIndex = 1;
										showSlides(slideIndex);

										// Next/previous controls
										function plusSlides(n) {
											showSlides(slideIndex += n);
										}

										// Thumbnail image controls
										function currentSlide(n) {
											showSlides(slideIndex = n);
										}

										function showSlides(n) {
											var i;
											var slides = document.getElementsByClassName("mySlides");
											var dots = document.getElementsByClassName("dot");
											if (n > slides.length) {
												slideIndex = 1
											}
											if (n < 1) {
												slideIndex = slides.length
											}
											for (i = 0; i < slides.length; i++) {
												slides[i].style.display = "none";
											}
											for (i = 0; i < dots.length; i++) {
												dots[i].className = dots[i].className.replace(" active", "");
											}
											slides[slideIndex - 1].style.display = "block";
											dots[slideIndex - 1].className += " active";
										}
									</script>
								</div>
							</div>
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