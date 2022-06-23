<?php
include("./config/init.php");
include "dis-header.php";
$trainers=new Trainers;
if(!isset($_GET['grp'])){
    echo "<script>window.location.href='./dist-gallery.php'</script>";
}

$images=$trainers->getGalleryByType($_GET['grp']);

?>

<head>

    <style>
        #image-gallery .modal-footer {
            display: block;
        }

        .thumb {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .thumbnail{
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
.thumb .thumbnail:hover p{
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
.thumb .thumbnail .h4, .thumb .thumbnail p {
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

    <div class='colors'>
        <a href="#" class="btn btn-primary panel_opener"><i class="fa fa-gear"></i></a>
        <div class="colors_panel">
            <h5>Colors</h5>
            <a class='color-1' data-val='color-1' href='#'></a>
            <a class='color-2' data-val='color-2' href='#'></a>
            <a class='color-3' data-val='color-3' href='#'></a>
        </div>
    </div>


    <div class="container" style="padding-top: 170px;">
        <div class="xs-heading row xs-mb-60">
                <div class="col-md-12 col-xl-12" style="text-align:center;">
                    <h4 class="xs-title">GALLERY</h4>
                </div>
            </div>
        <div class="row">
            <div class="row">
                <?php if(empty($images)):?>
                <div>Empty</div>
                <?php else:?>
                <?php foreach($images as $img):?>
                <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="<?php echo $img->event_name;?>" data-image="./assets/images/dist_gallery/<?php echo $img->name;?>" data-target="#image-gallery">
                        <img class="img-thumbnail" src="./assets/images/dist_gallery/<?php echo $img->name;?>" alt="Another alt text">
                        <figcaption>
                            <div class="h4"><?php echo $img->event_name;?></div>
                            <p><?php echo dateFix($img->event_date);?></p>
                        </figcaption>
                    </a>
                </div>
                <?php endforeach;?>
                <?php endif;?>
                <!--<div class="col-lg-4 col-md-4 col-xs-6 thumb">-->
                <!--    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Event Name" data-image="https://images.pexels.com/photos/158971/pexels-photo-158971.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-target="#image-gallery">-->
                <!--        <img class="img-thumbnail" src="https://images.pexels.com/photos/158971/pexels-photo-158971.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Another alt text">-->
                <!--        <figcaption>-->
                <!--            <div class="h4">Event Name</div>-->
                <!--            <p>Date</p>-->
                <!--        </figcaption>-->
                <!--    </a>-->
                <!--</div>-->

                <!--<div class="col-lg-4 col-md-4 col-xs-6 thumb">-->
                <!--    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Event Name" data-image="https://images.pexels.com/photos/305070/pexels-photo-305070.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-target="#image-gallery">-->
                <!--        <img class="img-thumbnail" src="https://images.pexels.com/photos/305070/pexels-photo-305070.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Another alt text">-->
                <!--        <figcaption>-->
                <!--            <div class="h4">Event Name</div>-->
                <!--            <p>Date</p>-->
                <!--        </figcaption>-->
                <!--    </a>-->
                <!--</div>-->
                <!--<div class="col-lg-4 col-md-4 col-xs-6 thumb">-->
                <!--    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Event Name" data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-target="#image-gallery">-->
                <!--        <img class="img-thumbnail" src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Another alt text">-->
                <!--        <figcaption>-->
                <!--            <div class="h4">Event Name</div>-->
                <!--            <p>Date</p>-->
                <!--        </figcaption>-->
                <!--    </a>-->
                <!--</div>-->
                <!--<div class="col-lg-4 col-md-4 col-xs-6 thumb">-->
                <!--    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Event Name" data-image="https://images.pexels.com/photos/158971/pexels-photo-158971.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-target="#image-gallery">-->
                <!--        <img class="img-thumbnail" src="https://images.pexels.com/photos/158971/pexels-photo-158971.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Another alt text">-->
                <!--        <figcaption>-->
                <!--            <div class="h4">Event Name</div>-->
                <!--            <p>Date</p>-->
                <!--        </figcaption>-->
                <!--    </a>-->
                <!--</div>-->



                <!--<div class="col-lg-4 col-md-4 col-xs-6 thumb">-->
                <!--    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Event Name" data-image="https://images.pexels.com/photos/305070/pexels-photo-305070.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-target="#image-gallery">-->
                <!--        <img class="img-thumbnail" src="https://images.pexels.com/photos/305070/pexels-photo-305070.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Another alt text">-->
                <!--        <figcaption>-->
                <!--            <div class="h4">Event Name</div>-->
                <!--            <p>Date</p>-->
                <!--        </figcaption>-->
                <!--    </a>-->
                <!--</div>-->
            </div>


            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                            </button>

                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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