<?php
error_reporting(0);
include("./config/init.php");
include "header.php";
if (!isset($_GET['cid'])) {
    echo "<script>window.location.href='./report.php'</script>";
}
$cid = $_GET['cid'];

$project = new Project;
$member = new Members;
$meeting = new Meeting;
// print_r($prevMonthName);
$count = $project->getMonthCount($cid, $prevMonthName);
$projects = $project->getMonthBaseReport($cid, $prevMonthName);
$meetings = $meeting->getMonthBaseReport($cid, $prevMonthName);

?>
<style>
    .card-body {
        padding: 20px;
    }

    .header-title {
        margin-top: 10px;
    }

    .header-title .filter-head {
        margin-left: 69px;
    }

    .header-title select {
        width: 260px;
        border: 1.5px solid #f75676;
        margin: 10px;
    }

    .header-title .month,
    .header-title .year {
        width: 130px;
        margin: 5px;
    }

    @media (min-width: 1200px) {
        .header-title .sub-button {
            margin-left: 180px;
        }
    }

    .header-title .sub-button {
        margin-top: 10px;
        width: 150px;
        font-size: 15px;
        text-transform: uppercase;
    }

    .buttonDisabled {
        pointer-events: none;
    }

    /* .header-title select option:hover{
    background-color: #f53158 !important;
} */
</style>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="top-block-one text-center">
                            <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-sunglasses-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v.116A4.22 4.22 0 0 1 8 5c.35 0 .69.04 1 .116V5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-1.994-1.839A2.99 2.99 0 0 0 8 6c-.393 0-.74.064-1.006.161A2 2 0 0 1 5 8h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM4.969 9.75A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .866-.5z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h2><b><?php echo $count->club; ?></b></h2>
                                <p class="text-danger-head">Club Service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="top-block-one text-center">
                            <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h2><b><?php echo $count->community; ?></b></h2>
                                <p class="text-danger-head">Community Service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="top-block-one text-center">
                            <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z" />
                                    <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h2 class=""><b><?php echo $count->professional; ?></b></h2>
                                <p class="text-danger-head">Professional Service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="top-block-one text-center">
                            <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h2><b><?php echo $count->international; ?></b></h2>
                                <p class="text-danger-head">International Service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="top-block-one text-center">
                            <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                    <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h2><b><?php echo $count->dpp; ?></b></h2>
                                <p class="text-danger-head">District Priority Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="top-block-one text-center">
                            <div class="icon mm-icon-box-2 d-block mx-auto text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h2><b><?php echo $count->tot_meetings; ?></b></h2>
                                <p class="text-danger-head">Total Meetings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="top-block-one text-center">
                            <div class="icon mm-icon-box-2 d-block mx-auto text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h2><b><?php echo $count->tot_members; ?></b></h2>
                                <p class="text-danger-head">Total Members</p>
                                <!-- <span class="text-success"><i class="ri-arrow-up-s-fill"></i>+842.73%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="top-block-one text-center">
                            <div class="icon mm-icon-box-2 d-block mx-auto text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h2><b><?php echo $count->new_members; ?></b></h2>
                                <p class="text-danger-head">Newly Joined Members</p>
                                <!-- <span class="text-success"><i class="ri-arrow-up-s-fill"></i>+842.73%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="head-title" style="margin-bottom:15px;">
            <h4 class="title-1">Join Projects With :</h4>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $count->rotary; ?></h2>
                                <p class="mb-0 text-danger">Rotary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $count->rotaract; ?></h2>
                                <p class="mb-0 text-danger">Rotaract</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $count->interact; ?></h2>
                                <p class="mb-0 text-danger">Interact</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height buttonDisabled" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                                    <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $count->other; ?></h2>
                                <p class="mb-0 text-danger">Other</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="row" style="width: 100%;">
                            <div class="col-lg-9 col-md-9" style="text-align: left;">
                                <div class="header-title">
                                    <h4 class="card-title">Monthly Report</h4>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 10px;text-align: center;">
                                <div class="header-action">
                                    <a href="oldreport.php?cid=<?php echo $cid ?>" class="btn btn-outline-dark" style="width: 120px;">
                                        Old Report
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Venue</th>
                                        <th>Time</th>
                                        <th>No.of Rtr</th>
                                        <th>No.of Rtn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cntc = 1; ?>
                                    <?php foreach ($projects as $key => $pro) : ?>
                                        <?php $d1 = explode(' ', $pro->pdate); ?>
                                        <tr>
                                            <td><?php echo $cntc++; ?></td>
                                            <td><?php echo $pro->name; ?></td>
                                            <td><?php echo dateFix($d1[0]); ?></td>
                                            <td><?php echo $pro->type; ?></td>
                                            <td><?php echo $pro->venue; ?></td>
                                            <td><?php echo $pro->time; ?></td>
                                            <td><?php echo $pro->rtr_count; ?></td>
                                            <td><?php echo $pro->rtn_count; ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <?php foreach ($meetings as $key => $pro) : ?>
                                        <tr>
                                            <td><?php echo $cntc++; ?></td>
                                            <td><?php echo $pro->name; ?></td>
                                            <td><?php echo dateFix($pro->post_date); ?></td>
                                            <td><?php echo $pro->type; ?></td>
                                            <td><?php echo $pro->venue; ?></td>
                                            <td><?php echo $pro->time; ?></td>
                                            <td><?php echo $pro->rtr_count; ?></td>
                                            <td><?php echo $pro->rtn_count; ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="report.php" class="btn btn-outline-dark">Back</a>
                        </div>
                        <div class="col-md-6 mb-3" style="text-align:right;padding-right: 45px;">
                            <?php if ($_SESSION['base_group'] == 5) : ?>
                                <button data-id='<?php echo $count->id; ?>' onclick="rejectFunc(this)" class="btn btn-info" <?php if ($count->status) {
                                                                                                                                echo "disabled";
                                                                                                                            } ?>>Reject</button>
                                <button data-idd="<?php echo $cid; ?>" onClick="newSub(this)" class="btn btn-info" <?php if ($count->status) {
                                                                                                                        echo "disabled";
                                                                                                                    } ?>>Submit</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const newSub = (select) => {
        id = select.dataset.idd;
        console.log(id)
        if (confirm("are you sure, you wanna submit?")) {
            window.location.href = `./submit-report.php?cid=${id}`;
        } else {
            console.log('');
        }

    }
</script>
<script>
    function rejectFunc(selected) {
        id = selected.dataset.id;
        if (confirm("Are you sure you wanna reject the report?")) {
            window.location.href = `reject.php?id=${id}`;
        } else {
            console.log("");
        }

    }
</script>


<!-- Wrapper End-->

<?php
include "footer.php";
?>