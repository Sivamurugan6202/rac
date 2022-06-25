<?php
error_reporting(0);
include("./config/init.php");

include "header.php";

$project = new Project;
$timings = $project->timings();

if ($_SESSION['base_group'] == 4) {
    $projects = $project->getAllProjects();
} else {
    $projects = $project->getGroupBased($_SESSION['base_group']);
}

?>
<style>
    .card-body {
        padding: 20px;
    }

    .popup {
        width: 100%;
        z-index: 100;
        height: 100%;
        position: fixed;
        display: none;
        background: #000000bf;
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background: #fff;
        color: black;
        width: 50%;
        margin-top: auto;
        margin-bottom: auto;
        padding: 20px;
        border-radius: 20px;
    }

    .dark .popup-content {
        background: #222;
        color: #fff;
        width: 50%;
        margin-top: auto;
        margin-bottom: auto;
        padding: 20px;
        border-radius: 20px;
    }

    .close1 {
        float: right;
        font-size: 18px;
        margin-top: -7px;
        margin-right: -2px;
        font-weight: 600;
        color: black;
        cursor: pointer;
    }

    .popup .popup-content h3 {
        color: #003049;
    }

    .dark .popup .popup-content h3 {
        color: #d32b29;
    }

    .popup .popup-content textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #003049;
        height: 120px;
        margin-bottom: 5px;
        border-radius: 7px;
    }

    .dark .popup .popup-content textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #d32b29;
        height: 120px;
        margin-bottom: 5px;
        border-radius: 7px;
        background: #222;
        color: #fff;
    }

    .popup .popup-content p {
        color: #003049;
        margin-bottom: 10px;
        font-size: 20px;
    }

    .dark .popup .popup-content p {
        color: #d32b29;
        margin-bottom: 10px;
        font-size: 20px;
    }

    @media (max-width: 991px) {
        .popup-content {
            width: 90%;
        }
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

    /* .header-title select option:hover{
    background-color: #f53158 !important;
} */
</style>
<div class="popup">
    <div class="popup-content">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="close1">X</h3>
            </div>
            <div class="col-lg-12">
                <form action="#" method="POST">
                    <div class="row">
                        <input type="hidden" id='popoid' name='del_id' />
                        <div class="col-lg-12">
                            <p>Reason for Deletion:</p>
                            <textarea type="text" name="del_reason" placeholder="Type Here..."></textarea>
                            <p style="font-style: italic;font-size: 11px;">Request for deletion would be approved by the District Secretariat based on the reason provided.</p>
                        </div>
                        <div class="col-lg-12" style="text-align: center;"><button type="submit" name='submit' class="btn btn-outline-dark">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card card-block card-stretch card-height" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-calendar2-minus" viewBox="0 0 16 16">
                                    <path d="M5.5 10.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $timings['ongoing']; ?></h2>
                                <p class="mb-0 text-danger-info">Pending Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-block card-stretch card-height" style="border-radius: 30px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="52" fill="currentColor" class="bi bi-calendar2-check" viewBox="0 0 16 16">
                                    <path d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $timings['completed']; ?></h2>
                                <p class="mb-0 text-danger-info">Approved Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="rejectprojectlist.php">
                    <div class="card card-block card-stretch card-height" style="border-radius: 30px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mm-cart-image text-danger-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-calendar-x" viewBox="0 0 16 16">
                                        <path d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z" />
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>
                                </div>
                                <div class="mm-cart-text">
                                    <h2 class="font-weight-700"><?php echo $timings['upcoming']; ?></h2>
                                    <p class="mb-0 text-danger-info">Reject Projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-block card-stretch card-height" style="border-radius: 30px;">
                    <div class="card-body" onclick="sortFunc('ongoing')">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger">
                                <svg width="50" height="52" aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar-alt" class="svg-inline--fa fa-calendar-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $timings['ongoing']; ?></h2>
                                <p class="mb-0 text-danger-info">On Going Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-block card-stretch card-height" style="border-radius: 30px;">
                    <div class="card-body" onclick="sortFunc('upcoming')">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mm-cart-image text-danger-svg">
                                <svg width="50" height="50" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.2031 23.3594C40.325 23.3594 41.2344 22.45 41.2344 21.3281C41.2344 20.2063 40.325 19.2969 39.2031 19.2969C38.0813 19.2969 37.1719 20.2063 37.1719 21.3281C37.1719 22.45 38.0813 23.3594 39.2031 23.3594Z" style="fill: currentColor;" />
                                    <path d="M43.875 4.0625H41.2344V2.03125C41.2344 0.909391 40.325 0 39.2031 0C38.0813 0 37.1719 0.909391 37.1719 2.03125V4.0625H27.9297V2.03125C27.9297 0.909391 27.0203 0 25.8984 0C24.7766 0 23.8672 0.909391 23.8672 2.03125V4.0625H14.7266V2.03125C14.7266 0.909391 13.8172 0 12.6953 0C11.5735 0 10.6641 0.909391 10.6641 2.03125V4.0625H8.125C3.64488 4.0625 0 7.70738 0 12.1875V43.875C0 48.3551 3.64488 52 8.125 52H23.6641C24.7859 52 25.6953 51.0906 25.6953 49.9688C25.6953 48.8469 24.7859 47.9375 23.6641 47.9375H8.125C5.88494 47.9375 4.0625 46.1151 4.0625 43.875V12.1875C4.0625 9.94744 5.88494 8.125 8.125 8.125H10.6641V10.1562C10.6641 11.2781 11.5735 12.1875 12.6953 12.1875C13.8172 12.1875 14.7266 11.2781 14.7266 10.1562V8.125H23.8672V10.1562C23.8672 11.2781 24.7766 12.1875 25.8984 12.1875C27.0203 12.1875 27.9297 11.2781 27.9297 10.1562V8.125H37.1719V10.1562C37.1719 11.2781 38.0813 12.1875 39.2031 12.1875C40.325 12.1875 41.2344 11.2781 41.2344 10.1562V8.125H43.875C46.1151 8.125 47.9375 9.94744 47.9375 12.1875V23.7656C47.9375 24.8875 48.8469 25.7969 49.9688 25.7969C51.0906 25.7969 52 24.8875 52 23.7656V12.1875C52 7.70738 48.3551 4.0625 43.875 4.0625Z" style="fill: currentColor;" />
                                    <path d="M39.7109 27.4219C32.9347 27.4219 27.4219 32.9347 27.4219 39.7109C27.4219 46.4872 32.9347 52 39.7109 52C46.4872 52 52 46.4872 52 39.7109C52 32.9347 46.4872 27.4219 39.7109 27.4219ZM39.7109 47.9375C35.1749 47.9375 31.4844 44.2471 31.4844 39.7109C31.4844 35.1747 35.1749 31.4844 39.7109 31.4844C44.247 31.4844 47.9375 35.1747 47.9375 39.7109C47.9375 44.2471 44.247 47.9375 39.7109 47.9375Z" style="fill: currentColor;" />
                                    <path d="M42.6562 37.6797H41.7422V35.5469C41.7422 34.425 40.8328 33.5156 39.7109 33.5156C38.5891 33.5156 37.6797 34.425 37.6797 35.5469V39.7109C37.6797 40.8328 38.5891 41.7422 39.7109 41.7422H42.6562C43.7781 41.7422 44.6875 40.8328 44.6875 39.7109C44.6875 38.5891 43.7781 37.6797 42.6562 37.6797Z" style="fill: currentColor;" />
                                    <path d="M30.3672 23.3594C31.489 23.3594 32.3984 22.45 32.3984 21.3281C32.3984 20.2063 31.489 19.2969 30.3672 19.2969C29.2454 19.2969 28.3359 20.2063 28.3359 21.3281C28.3359 22.45 29.2454 23.3594 30.3672 23.3594Z" style="fill: currentColor;" />
                                    <path d="M21.5312 32.1953C22.6531 32.1953 23.5625 31.2859 23.5625 30.1641C23.5625 29.0422 22.6531 28.1328 21.5312 28.1328C20.4094 28.1328 19.5 29.0422 19.5 30.1641C19.5 31.2859 20.4094 32.1953 21.5312 32.1953Z" style="fill: currentColor;" />
                                    <path d="M12.6953 23.3594C13.8171 23.3594 14.7266 22.45 14.7266 21.3281C14.7266 20.2063 13.8171 19.2969 12.6953 19.2969C11.5735 19.2969 10.6641 20.2063 10.6641 21.3281C10.6641 22.45 11.5735 23.3594 12.6953 23.3594Z" style="fill: currentColor;" />
                                    <path d="M12.6953 32.1953C13.8171 32.1953 14.7266 31.2859 14.7266 30.1641C14.7266 29.0422 13.8171 28.1328 12.6953 28.1328C11.5735 28.1328 10.6641 29.0422 10.6641 30.1641C10.6641 31.2859 11.5735 32.1953 12.6953 32.1953Z" style="fill: currentColor;" />
                                    <path d="M12.6953 41.0312C13.8171 41.0312 14.7266 40.1218 14.7266 39C14.7266 37.8782 13.8171 36.9688 12.6953 36.9688C11.5735 36.9688 10.6641 37.8782 10.6641 39C10.6641 40.1218 11.5735 41.0312 12.6953 41.0312Z" style="fill: currentColor;" />
                                    <path d="M21.5312 41.0312C22.6531 41.0312 23.5625 40.1218 23.5625 39C23.5625 37.8782 22.6531 36.9688 21.5312 36.9688C20.4094 36.9688 19.5 37.8782 19.5 39C19.5 40.1218 20.4094 41.0312 21.5312 41.0312Z" style="fill: currentColor;" />
                                    <path d="M21.5312 23.3594C22.6531 23.3594 23.5625 22.45 23.5625 21.3281C23.5625 20.2063 22.6531 19.2969 21.5312 19.2969C20.4094 19.2969 19.5 20.2063 19.5 21.3281C19.5 22.45 20.4094 23.3594 21.5312 23.3594Z" style="fill: currentColor;" />
                                </svg>
                            </div>
                            <div class="mm-cart-text">
                                <h2 class="font-weight-700"><?php echo $timings['upcoming']; ?></h2>
                                <p class="mb-0 text-danger-info">Upcoming Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="completedprojectlist.php">
                    <div class="card card-block card-stretch card-height" style="border-radius: 30px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mm-cart-image text-danger-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="52" fill="currentColor" class="bi bi-calendar2-check" viewBox="0 0 16 16">
                                        <path d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                        <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                                    </svg>
                                </div>
                                <div class="mm-cart-text">
                                    <h2 class="font-weight-700"><?php echo $timings['completed']; ?></h2>
                                    <p class="mb-0 text-danger-info">Completed Projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h3 style='text-align:left'>Club Project List</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Project Name</th>
                                        <th>Club Name</th>
                                        <th>Avenue</th>
                                        <th>Project Date</th>
                                        <th>Post Date</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody'>
                                    <?php foreach ($projects as $key => $pro) : ?>
                                        <?php $d = explode(' ', $pro->pdate); ?>
                                        <tr>

                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $pro->project_name ?></td>
                                            <td><?php echo $pro->club_name ?></td>
                                            <td><?php echo dashReplace($pro->avenue); ?></td>
                                            <td><?php echo dateFix($pro->from_date); ?></td>
                                            <td><?php echo dateFix($d[0]); ?></td>
                                            <td><?php echo $pro->time ?></td>
                                            <td><a href="#">
                                                    <button data-tooltip="Approval" class="btn btn-warning btn-xs">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                                        </svg>
                                                    </button>
                                                </a>

                                                <button data-tooltip="Reject" class="btn btn-warning btn-xs" data-id="<?php echo $pro->proj_id; ?>" onclick="popup(this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard-x" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z" />
                                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                                    </svg>
                                                </button>

                                                <a href="viewproject.php?uid=<?php echo $pro->proj_id ?>">
                                                    <button data-tooltip="View" class="btn btn-warning btn-xs">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="dashboard.php" class="btn btn-outline-dark">Back</a>
                        </div>
                        <div class="col-md-6 mb-3" style="text-align:right;padding-right: 45px;">
                            <!-- <a href="exportcsvproject.php" class="btn btn-info" style="width: 160px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                </svg> &nbsp; Export CSV
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='./assets/js/helper.js'></script>
<script>
    function popup(eval) {
        evalue = eval.dataset.id;
        console.log(evalue);
        document.getElementById("popoid").value = evalue;
        console.log(document.getElementById("popoid"))
        eval.disabled = true;
        document.querySelector(".popup").style.display = "flex";
    }
    document.querySelector(".close1").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "none";
    })
</script>
<script>
    const tbody = document.getElementById("tbody");
    const projects = <?php echo json_encode($projects); ?>;

    function dateFix(date) {
        date = date.split('-');
        date = `${date[2]}-${date[1]}-${date[0]}`;
        // console.log(`hi${date}`);

        return date;
    }

    function dashReplace(text) {
        text = text.split('_');
        text = text.join(' ');
        return text;
    }

    function sortFunc(cmd) {
        var newProjects = projects;

        tbody.innerHTML = '';
        // console.log(cmd);
        if (cmd == 'ongoing') {
            newProjects = projects.filter(p => {
                d1 = new Date(p.from_date);
                d2 = new Date();
                d1.setHours(0, 0, 0, 0)
                d2.setHours(0, 0, 0, 0)
                // console.log('hey');
                // console.log('-----');
                // console.log(d1);
                // console.log(d2);
                // console.log(d1.getTime()==d2.getTime())
                // console.log('-----');
                if (d1.getTime() == d2.getTime()) {
                    return p
                }
            })


        } else if (cmd == 'upcoming') {
            // console.log(newProjects)
            newProjects = projects.filter(p => {
                d1 = new Date(p.from_date);
                d2 = new Date();
                d2.setHours(0, 0, 0)
                d1.setHours(0, 0, 0)

                // console.log(d2);
                // console.log(d1);
                // console.log(d1==d2)
                if (d1.getTime() > d2.getTime()) {
                    return p;
                }
            })
            // console.log(newProjects);

        } else {
            newProjects = projects;
        }
        if (newProjects.length != 0) {
            newProjects.forEach((p, i) => {
                d = p.pdate.split(' ');
                t = p.avenue.split('_');
                date = d[0].split('-');
                date = `${date[2]}-${date[1]}-${date[0]}`;
                date1 = p.from_date.split('-');
                date1 = `${date1[2]}-${date1[1]}-${date1[0]}`;
                t = t.join(' ')
                tbody.innerHTML += `
            <tr>
                <td>${i+1}</td>
                <td>${p.project_name}</td>
                <td>${p.club_name}</td>
                <td>${t}</td>
                <td>${date1}</td>
                <td>${date}</td>
                <td>${p.time}</td>
                <td>${p.venue}</td>
                <td> <a href="viewproject.php?uid=${p.proj_id}"> 
                    <button data-tooltip="View" class="btn btn-warning btn-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg></button></a>
                </td>
            </tr>
            `;
            });
        } else {
            tbody.innerHTML = `
            <tr><div><p style='text-align:center'>No data available</p></div></tr>
            `;
        }
    }
</script>

<!-- Wrapper End-->

<?php
include "footer.php";

?>