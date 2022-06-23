<?php
include "club-header.php";
?>
<style>
    .table .row {
        margin: auto;
    }

    .table .row .text-muted {
        text-align: center;
    }
</style>
<section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/about_bg.jpg')">
    <div class="xs-black-overlay"></div>
    <div class="container">
        <div class="color-white xs-inner-banner-content">
            <h2>Board Details</h2>
            <p>Rotary International District 3201</p>
            <ul class="xs-breadcumb">
                <li class="badge badge-pill badge-primary"><a href="club-index.php" class="color-white"> Home /</a> About</li>
            </ul>
        </div>
    </div>
</section>
<section class="xs-section-padding table">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-muted font-14 mb-4">
                                    Board Of Directors Details
                                </h2>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>RI.ID</th>
                                            <th>Name</th>
                                            <th>Designate</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            <td>xxxxxxx</td>
                                            <td>xxxxxxxx</td>
                                            <td>xxxxxxxxxx</td>

                                        </tr>

                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div>
        </div>
    </div>
</section>
<?php
include "club-footer.php";
?>