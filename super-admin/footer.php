<style>
    .xs-copyright {
        text-align: center;
    }

    .xs-copyright-text {
        color: #535f6b;
        text-align: center;
    }

    .xs-copyright-text a {
        color: #003049;
        font-weight: 600;
    }

    .dark .xs-copyright-text a {
        color: #d32b29;
        font-weight: 600;
    }

    .xs-copyright-text a:hover {
        text-decoration: underline;
    }

    .xs-back {
        position: fixed;
        padding: 2px 40px;
        background-color: #003049 !important;
        border-top-left-radius: 60px;
        border-top-right-radius: 60px;
        z-index: 9999;
        bottom: 0;
        width: 100%;
    }

    .dark .xs-back {
        background-color: #d32b29 !important;
    }

    .xs-back-to-login-wraper {
        float: left;
    }

    .xs-back-to-home-wraper {
        float: left;
    }

    .xs-back-to-home {
        line-height: 50px;
        text-align: center;
        display: inline-block;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .xs-back-to-back-wraper {
        float: right;
    }

    .xs-back-to-back {
        line-height: 50px;
        text-align: center;
        display: inline-block;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .text-danger-icon:hover {
        color: #fff;
    }

    .dark .text-danger-icon:hover {
        color: #fff;
    }

    .xs-back-to-back-wraper a:hover {
        color: #fff;
    }

    @media only screen and (max-width: 1300px) {
        .wrapper-menu {
            color: #d32b29;
        }

        .dark .wrapper-menu {
            color: #003049;
        }
    }

    @media only screen and (max-width: 580px) {
        .xs-back-to-top-wraper {
            display: none;
        }

        .xs-copyright {
            padding: 10px 0px 50px 0;
            font-size: 13px;
        }

    }

    @media only screen and (min-width: 580px) {
        .xs-back {
            display: none;
        }

    }

    @media only screen and (max-width: 580px) {
        .xs-back-to-home-wraper {
            margin-left: 200px;
        }
    }

    @media only screen and (max-width: 530px) {
        .xs-back-to-home-wraper {
            margin-left: 180px;
        }

    }

    @media only screen and (max-width: 499px) {
        .xs-back-to-home-wraper {
            margin-left: 150px;
        }
    }

    @media only screen and (max-width: 449px) {
        .xs-back-to-home-wraper {
            margin-left: 125px;
        }
    }

    @media only screen and (max-width: 419px) {
        .xs-back-to-home-wraper {
            margin-left: 115px;
        }
    }

    @media only screen and (max-width: 399px) {
        .xs-back-to-home-wraper {
            margin-left: 105px;
        }
    }

    @media only screen and (max-width: 370px) {
        .xs-back-to-home-wraper {
            margin-left: 95px;
        }
    }

    @media only screen and (max-width: 360px) {
        .xs-back-to-home-wraper {
            margin-left: 90px;
        }
    }

    @media only screen and (max-width: 280px) {
        .xs-back-to-home-wraper {
            margin-left: 55px;
        }
    }
</style>
<footer class="mm-footer">
    <div class="container">
        <div class="xs-copyright">
            <div class="row">
                <div class="col-md-6">
                    <div class="xs-copyright-text">
                        &copy; Copyright 2022 <a href="https://www.rotaract3201.org/" target="blank">Rotaract 3201</a> - All Rights Reserved
                    </div>
                </div>
                <div class="col-md-6" style="text-align:right;">
                    <div class="xs-copyright-text">
                        Developed by <a href="https://sr-mediatech.com/" target="blank">SR Media Tech </a> - crafted by <a href="https://sr-mediatech.com/" target="blank">KS Globals</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="xs-back">
    <div class="xs-back-to-login-wraper">
        <a href="logout.php" class="xs-back-to-login">
            <svg class="svg-icon mr-0 text-danger-icon" width="30" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" style="padding-top: 15px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </a>
    </div>
    <div class="xs-back-to-home-wraper">
        <a href="dashboard.php" class="xs-back-to-home">
            <svg class="svg-icon mr-0 text-danger-icon" width="30" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
        </a>
    </div>
    <div class="xs-back-to-back-wraper">
        <a class="xs-back-to-back" href="javascript:history.go(-1)" onMouseOver="self.status.referrer;return true">
            <svg class="svg-icon mr-0 text-danger-icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16" stroke="currentColor">
                <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                <!--<path  fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>-->
            </svg>
        </a>
    </div>
</div>

<!-- Backend Bundle JavaScript -->
<script src="assets/js/backend-bundle.min.js"></script>

<!-- Flextree Javascript-->
<script src="assets/js/flex-tree.min.js"></script>
<script src="assets/js/tree.js"></script>
<script src="./assets/js/helper.js"></script>

<!-- Table Treeview JavaScript -->
<script src="assets/js/table-treeview.js"></script>

<!-- Masonary Gallery Javascript -->
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>

<!-- Mapbox Javascript -->
<script src="assets/js/mapbox-gl.js"></script>
<script src="assets/js/mapbox.js"></script>

<!-- Fullcalender Javascript -->
<script src='assets/vendor/fullcalendar/core/main.js'></script>
<script src='assets/vendor/fullcalendar/daygrid/main.js'></script>
<script src='assets/vendor/fullcalendar/timegrid/main.js'></script>
<script src='assets/vendor/fullcalendar/list/main.js'></script>

<!-- SweetAlert JavaScript -->
<script src="assets/js/sweetalert.js"></script>

<!-- Vectoe Map JavaScript -->
<script src="assets/js/vector-map-custom.js"></script>

<!-- Chart Custom JavaScript -->
<script src="assets/js/customizer.js"></script>

<!-- Chart Custom JavaScript -->
<script src="assets/js/chart-custom.js"></script>
<script src="assets/js/charts/01.js"></script>
<script src="assets/js/charts/02.js"></script>

<!-- slider JavaScript -->
<script src="assets/js/slider.js"></script>

<!-- Emoji picker -->
<script src="assets/vendor/emoji-picker-element/index.js" type="module"></script>

<!-- app JavaScript -->
<script src="assets/js/app.js"></script>
</body>


</html>