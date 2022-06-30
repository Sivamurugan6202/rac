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

<head>

	<style>
		#image-gallery .modal-footer {
			display: block;
		}

		.thumb {
			margin-top: 15px;
			margin-bottom: 15px;
		}

		.thumbnail {
			border: none;
		}

		.thumb figcaption {
			padding: 2em;
			color: #fff;
			text-transform: uppercase;
			font-size: 1.25em;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
		}

		.thumb figcaption,
		.thumb figcaption>a {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}

		.thumb figcaption>a {
			z-index: 1000;
			text-indent: 200%;
			white-space: nowrap;
			font-size: 0;
			opacity: 0;
		}

		.thumb figcaption {
			padding: 12px;
			margin-top: -45px;
		}

		.thumb .thumbnail figcaption::before,
		.thumb .thumbnail figcaption::after {
			position: absolute;
			content: '';
			opacity: 0;
		}

		.thumb .thumbnail figcaption::before {
			top: 50px;
			right: 30px;
			bottom: 50px;
			left: 30px;
			border-top: 1px solid #fff;
			border-bottom: 1px solid #fff;
			transform: scale(0, 1);
			transform-origin: 0 0;
		}

		.thumb .thumbnail figcaption::after {
			top: 30px;
			right: 50px;
			bottom: 30px;
			left: 50px;
			border-right: 1px solid #fff;
			border-left: 1px solid #fff;
			transform: scale(1, 0);
			transform-origin: 100% 0;
		}

		.thumb .thumbnail figcaption::before,
		.thumb .thumbnail figcaption::after {
			transition: opacity 0.35s, transform 0.35s;
		}

		.thumb .thumbnail:hover figcaption::before,
		.thumb .thumbnail:hover figcaption::after {
			opacity: 1;
			transform: scale(1);
		}

		.thumb .thumbnail:hover figcaption:before {
			background: rgba(31, 30, 30, 0.5);
		}

		.thumb .thumbnail:hover figcaption::after {
			transition-delay: 0.15s;
		}

		.thumb .thumbnail .h4 {
			padding-top: 30%;
			text-align: center;
			transition: transform 0.35s;
			opacity: 0;
		}

		.thumb .thumbnail:hover .h4,
		.thumb .thumbnail:hover p {
			opacity: 1;
		}

		.thumb .thumbnail p {
			text-align: center;
			text-transform: none;
			opacity: 0;
			transform: translate3d(0, -10px, 0);
		}

		.thumb .thumbnail img,
		.thumb .thumbnail .h4 {
			transform: translate3d(0, -25px, 0);
		}

		.thumb .thumbnail p {
			letter-spacing: 1px;
			font-size: 18px;
		}

		.thumb .thumbnail .h4,
		.thumb .thumbnail p {
			margin: 0;
		}

		.thumb .thumbnail .h4 {
			word-spacing: -0.15em;
			font-size: 18px;
			font-weight: 600;
		}
	</style>
</head>

<body>
	<section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/dist_events/<?php echo $event->banner; ?>')">
		<div class="xs-black-overlay"></div>
		<div class="container">
			<div class="color-white xs-inner-banner-content">
				<h2><?php echo $event->name; ?></h2>
			</div>
		</div>
	</section>
	<main class="xs-main">
		<section class="xs-section-padding">
			<div class="container">
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
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#maplocation" role="tab">Map location</a>
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
												<th style="text-align: center;font-size: 16px;">Host President</th>
												<th style="text-align: center;font-size: 16px;">Host Secretary</th>
												<!-- <th>Event convenor</th> -->
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $event->host_chairman; ?></td>
												<td><?php echo $event->host_secretary; ?></td>
												<!-- <td><?php echo $event->host_conveyer; ?></td> -->

											</tr>
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="contactUs" role="tabpanel">
									<div class="xs-contact-form-wraper">
										<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
											<thead>
												<tr>
													<th colspan="2" style="text-align: center;font-size: 16px;">Email-ID</th>
													<th style="text-align: center;font-size: 16px;">Phone Number</th>
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
								<div class="tab-pane" id="maplocation" role="tabpanel">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125323.47046917326!2d76.967235!3d11.011709600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859af2f971cb5%3A0x2fc1c81e183ed282!2sCoimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1656512044629!5m2!1sen!2sin" width="640" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
							</div>
						</div>
						<div class="xs-event-content">
							<h4>Event Images</h4>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-xs-6 thumb">
								<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="./assets/images/dist_events/def1.jpg" data-target="#image-gallery">
									<img class="img-thumbnail" src="./assets/images/dist_events/def1.jpg" alt="Another alt text">
								</a>
							</div>
							<div class="col-lg-4 col-md-4 col-xs-6 thumb">
								<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="./assets/images/dist_events/def.jpg" data-target="#image-gallery">
									<img class="img-thumbnail" src="./assets/images/dist_events/def.jpg" alt="Another alt text">
								</a>
							</div>
							<div class="col-lg-4 col-md-4 col-xs-6 thumb">
								<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="./assets/images/dist_events/def1.jpg" data-target="#image-gallery">
									<img class="img-thumbnail" src="./assets/images/dist_events/def1.jpg" alt="Another alt text">
								</a>
							</div>
						</div>
						<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
										</button>
									</div>
									<div class="modal-body">
										<img id="image-gallery-image" class="img-responsive col-md-12" src="">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
										</button>

										<button type="button" id="show-next-image" class="btn btn-primary float-right"><i class="fa fa-arrow-right"></i>
										</button>
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
									Chair :
									<span><?php echo $event->event_chairman; ?></span>
								</li>
								<li class="d-flex justify-content-between">
									Secretary :
									<span><?php echo $event->event_secretary; ?></span>
								</li>
								<li class="d-flex justify-content-between">
									Venue :
									<span><?php echo $event->venue; ?></span>
								</li>
								<li class="d-flex justify-content-between">
									Date :
									<span><?php echo $event->date; ?></span>
								</li>
								<li class="d-flex justify-content-between">
									Phone :
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
		</section>
	</main>


</body>

<?php
include "dis-footer.php";
?>
<script>
	let modalId = $('#image-gallery');

	$(document)
		.ready(function() {

			loadGallery(true, 'a.thumbnail');

			//This function disables buttons when needed
			function disableButtons(counter_max, counter_current) {
				$('#show-previous-image, #show-next-image')
					.show();
				if (counter_max === counter_current) {
					$('#show-next-image')
						.hide();
				} else if (counter_current === 1) {
					$('#show-previous-image')
						.hide();
				}
			}

			/**
			 *
			 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
			 * @param setClickAttr  Sets the attribute for the click handler.
			 */

			function loadGallery(setIDs, setClickAttr) {
				let current_image,
					selector,
					counter = 0;

				$('#show-next-image, #show-previous-image')
					.click(function() {
						if ($(this)
							.attr('id') === 'show-previous-image') {
							current_image--;
						} else {
							current_image++;
						}

						selector = $('[data-image-id="' + current_image + '"]');
						updateGallery(selector);
					});

				function updateGallery(selector) {
					let $sel = selector;
					current_image = $sel.data('image-id');
					$('#image-gallery-title')
						.text($sel.data('title'));
					$('#image-gallery-image')
						.attr('src', $sel.data('image'));
					disableButtons(counter, $sel.data('image-id'));
				}

				if (setIDs == true) {
					$('[data-image-id]')
						.each(function() {
							counter++;
							$(this)
								.attr('data-image-id', counter);
						});
				}
				$(setClickAttr)
					.on('click', function() {
						updateGallery($(this));
					});
			}
		});

	// build key actions
	$(document)
		.keydown(function(e) {
			switch (e.which) {
				case 37: // left
					if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
						$('#show-previous-image')
							.click();
					}
					break;

				case 39: // right
					if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
						$('#show-next-image')
							.click();
					}
					break;

				default:
					return; // exit this handler for other keys
			}
			e.preventDefault(); // prevent the default action (scroll / move caret)
		});
</script>

</html>