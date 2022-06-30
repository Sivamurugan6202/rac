<?php
include("./config/init.php");
include "dis-header.php";

$club = new Club;
$clubs = $club->getClubs();
foreach ($clubs as $cl) {
    unset($cl->password);
    unset($cl->email);
    unset($cl->phone);
    unset($cl->grp_email);
    unset($cl->rtr_email);
    unset($cl->fb);
    unset($cl->insta);
    unset($cl->linked);
    unset($cl->groups);
    unset($cl->description);
    unset($cl->id);
    unset($cl->status);
    unset($cl->del);
}
// echo "<pre>";
// print_r($clubs);
// echo "</pre>";
?>
<style>
    .search {
        width: 100%;
        position: relative;
        display: flex;
    }

    .search ::placeholder {
        color: white;
        opacity: 1;
    }

    .searchTerm {
        width: 100%;
        border: 2px solid #f8f9fa;
        border-right: none;
        background: transparent;
        padding: 5px 5px 5px 10px;
        height: 50px;
        border-radius: 20px 0 0 20px;
        outline: none;
    }

    .searchTerm:focus {
        color: #f8f9fa;
    }

    .searchButton {
        padding-left: 1px;
        width: 40px;
        height: 50px;
        border: 2px solid #f8f9fa;
        border-left: none;
        background: transparent;
        text-align: center;
        color: #fff;
        border-radius: 0 20px 20px 0;
        cursor: pointer;
        font-size: 20px;
    }

    /*Resize the wrap to see the search bar change!*/

    .wrap {
        width: 20%;
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* filter */
    .filter .container {
        overflow: hidden;
        margin-top: 30px;
    }

    .filter #myBtnContainer {
        margin-left: 120px;
    }

    @media (max-width: 992px) {
        .filter #myBtnContainer {
            margin-left: 50px;
        }

        .filter .btn {
            margin-bottom: 10px;
        }
    }

    .filter .filterDiv {
        float: left;
        color: #ffffff;
        display: none;
        /* Hidden by default */
    }

    /* The "show" class is added to the filtered elements */
    .filter a {
        color: white;
    }

    .filter .show {
        display: block;
    }

    /* Style the as */
    .filter .btn {
        color: white !important;
        margin-right: 15px;
    }

    .filter p {
        color: #343a40 !important;
        margin-bottom: 15px !important;
        font-weight: 500;
    }

    span {
        font-weight: 400;
    }

    @media (max-width: 467px) {
        .wrap {
            width: 75%;
            top: 75%;
        }
    }

    /* Add a light grey background on mouse-over */
    /* .filter .btn:hover {
  background-color: #ddd;
} */

    /* Add a dark background to the active a */
</style>

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


    <section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/club-bg.png')">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>BASED ON CLUBS</h2>
                <!-- <p>Give a helping hand for poor people</p> -->
            </div>
        </div>
    </section>
    <div class="wrap">
        <form id='form_src'>

            <div class="search">
                <input type="text" class="searchTerm" id='src_box' placeholder="Rotaract Club of">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>

    </div>
    <section class="filter xs-section-padding">
        <div id="myBtnContainer">
            <a class="btn btn-primary" onclick="filterSelection('all')"> Show all</a>
            <a class="btn btn-primary" onclick="filterSelection('campus')">Institution</a>
            <a class="btn btn-primary" onclick="filterSelection('community')"> Community</a>
        </div>

        <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
        <div class="container">
            <div class="row" id='club_cont'>
                <?php foreach ($clubs as $cl) : ?>
                    <div class="col-lg-6 col-md-6 ">
                        <div class="row xs-single-event">
                            <div class="col-md-5">
                                <div class="xs-event-image">
                                    <img src="assets/images/club_logo/<?php echo isset($cl->logo) ? $cl->logo : 'rtrlogo1.png'; ?>">

                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="xs-event-content">
                                    <a href="club-index.php?cid=<?php echo $cl->cid; ?>"><?php echo $cl->name; ?></a>

                                    <p>Club ID : <span><?php echo $cl->cid; ?></span></p>
                                    <p>Charter Date : <span><?php echo isset($cl->udate) ? dateFix($cl->udate) : "-"; ?></span></p>
                                    <p>President Name : <span><?php echo $cl->president_name; ?></span></p>
                                    <p>Secretary Name : <span><?php echo $cl->secretary_name; ?></span></p>
                                    <a href="club-index.php?cid=<?php echo $cl->cid; ?>" target="_blank" class="btn btn-primary">
                                        Visit Us
                                    </a>
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
    const cont = document.getElementById('club_cont');
    const form_src = document.getElementById('form_src');
    const src_box = document.getElementById('src_box');
    const data = <?php echo json_encode($clubs); ?>;

    form_src.addEventListener('submit', (e) => {
        e.preventDefault();
        const srcText = src_box.value.toLowerCase();
        const words = srcText.split(" ");
        const result = []
        words.forEach(word => {
            data.forEach(d => {
                if (d.name.toLowerCase().includes(word)) {
                    result.push(d);
                }
            })
        })


        populate(result);


    })

    function filterSelection(cmd) {
        var newData = data.filter(d => {
            if (cmd == 'all') {
                return true;
            } else {
                return d.base == cmd;
            }
        });
        populate(newData);

    }

    function dateFix(date) {
        date = date.split("-");
        date = date[2] + "-" + date[1] + "-" + date[0];
        return date;
    }

    function populate(dat) {
        cont.innerHTML = '';

        dat.forEach(d => {

            cont.innerHTML += `
    <div class="col-lg-6 col-md-6 ">
                <div class="row xs-single-event event-green">
                    <div class="col-md-5">
                        <div class="xs-event-image">
                            <img src="assets/images/club_logo/${d.logo?d.logo:"rtrlogo1.png"}" alt="">

                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="xs-event-content">
                            <a href="./club-index.php?cid=${d.cid}">${d.name}</a>
                            <p>Club ID : <span>${d.cid}</span></p>
                            <p>Charter Date : <span>${d.udate?dateFix(d.udate):'-'}</span></p>
                            <p>President Name : <span>${d.president_name}</span></p>
                            <p>Secretary Name : <span>${d.secretary_name}</span></p>

                            <a href="club-index.php?cid=${d.cid}" target='_blank' class="btn btn-primary">
                                Visit Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    `;
        })


    }
</script>


<?php
include "dis-footer.php";
?>