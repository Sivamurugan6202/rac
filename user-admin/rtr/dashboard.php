<?php
// session_start();
include "header1.php";

// error_reporting(0);
// include "db.php";
// include("./config/init.php");
// echo $_SESSION['cid'];
if (!isset($_SESSION['cid'])) {
    echo "<script>window.location.href='log/index.html'</script>";
} else {

    // print_r($_SESSION['cid']);
    $project = new Project;
    $meeting = new Meeting;
    $member = new Members;
    $management = new Management;
    $member->getNew($_SESSION['cid']);
    // $project->getProjectCount($_SESSION['cid']);
    // $editpillar1 = mysqli_query($conn, "SELECT * FROM iclub WHERE name= '" . $_SESSION['cid'] . "' ");
    // $row1 = mysqli_fetch_array($editpillar1);
}
?>

<div class="content-page hospi-content">
    <div class="container-fluid container-md">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="d-flex align-items-center justify-content-between welcome-content">
                    <div class="navbar-breadcrumb">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-sunglasses-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v.116A4.22 4.22 0 0 1 8 5c.35 0 .69.04 1 .116V5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-1.994-1.839A2.99 2.99 0 0 0 8 6c-.393 0-.74.064-1.006.161A2 2 0 0 1 5 8h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM4.969 9.75A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .866-.5z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $project->getService('club_service', $_SESSION['cid']); ?></b></h2>
                                    <p class="text-danger-head">Club Service</p>
                                    <!-- <span class="text-danger"><i class="ri-arrow-down-s-fill"></i></span> -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $project->getService('community_service', $_SESSION['cid']); ?></b></h2>
                                    <p class="text-danger-head">Community Service</p>
                                    <!-- <span class="text-danger"><i class="ri-arrow-down-s-fill"></i></span> -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z" />
                                        <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2 class=""><b><?php echo $project->getService('professional_service', $_SESSION['cid']); ?></b></h2>
                                    <p class="text-danger-head">Professional Service</p>
                                    <!-- <span class="text-success"><i class="ri-arrow-up-s-fill"></i> +82.73%</span> -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $project->getService('international_service', $_SESSION['cid']); ?></b></h2>
                                    <p class="text-danger-head">International Service</p>
                                    <!-- <span class="text-danger"><i class="ri-arrow-down-s-fill"></i>-42.96%</span> -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                        <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $project->getService('District_Priority_Projects', $_SESSION['cid']); ?></b></h2>
                                    <p class="text-danger-head">District Priority Projects</p>
                                    <!-- <span class="text-danger"><i class="ri-arrow-down-s-fill"></i></span> -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="top-block-one text-center">
                                <div class="text-danger icon mm-icon-box-2 d-block mx-auto rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <h2><b><?php echo $project->getProjectW($_SESSION['cid']); ?></b></h2>
                                    <p class="text-danger-head">Rotary/Rotaract/Interact</p>
                                    <!-- <span class="text-success"><i class="ri-arrow-up-s-fill"></i>+842.73%</span> -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- ***project-details-start*** -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="text-info-head">Club Projects</p>
            </div>
        </div>
        <!-- <a href="projectlist.php" class="btn btn-danger" style="margin-bottom:20px;">Project</a> -->

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="icon d-block mx-auto rounded text-danger-svg">
                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" width="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>

                            </div>
                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Total Projects</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $project->getProjectCount($_SESSION['cid']); ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="icon d-block mx-auto rounded text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                    <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                                </svg>
                            </div>
                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Joint Project with Rotary</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $project->getProjectWith("rotary", $_SESSION['cid']);  ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="icon d-block mx-auto rounded text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Joint Project with other Rotaract Club</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $project->getProjectWith("rotaract", $_SESSION['cid']);  ?></b></h2>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height">
                    <a href="projectlist.php">
                        <div class="card-body">
                            <div class="icon d-block mx-auto rounded text-danger-svg">
                                <svg width="45" height="45" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.5586 27.1172C33.0403 27.1172 27.6774 32.156 27.1588 38.543H24.8412C24.6245 35.8745 23.5621 33.4418 21.9232 31.5132L31.5089 21.9274C32.4719 22.7465 33.5465 23.4102 34.716 23.9047C36.2497 24.5538 37.8787 24.8828 39.5586 24.8828C41.2384 24.8828 42.8675 24.5537 44.4011 23.9048C45.8829 23.2781 47.2134 22.3813 48.3559 21.2388C49.4985 20.0962 50.3953 18.7657 51.022 17.2839C51.6709 15.7503 52 14.1213 52 12.4414C52 10.9474 51.738 9.48492 51.2199 8.09758C51.0727 7.70148 50.6897 7.43641 50.2684 7.43641C50.1475 7.43641 50.0287 7.45773 49.9139 7.50039C49.66 7.59484 49.4579 7.78273 49.3451 8.02953C49.2324 8.27633 49.2222 8.55258 49.3167 8.80648C49.7494 9.96734 49.9688 11.1902 49.9688 12.4414C49.9688 14.6385 49.2911 16.7319 48.0369 18.4845C46.8998 16.4948 45.1826 14.9874 43.1649 14.1633C44.3746 13.1379 45.1445 11.6087 45.1445 9.90234C45.1445 6.82226 42.6387 4.31641 39.5586 4.31641C36.4785 4.31641 33.9727 6.82226 33.9727 9.90234C33.9727 11.6083 34.7422 13.1372 35.9515 14.1627C33.9335 14.9863 32.2159 16.4931 31.0786 18.4823C29.8255 16.7301 29.1484 14.6376 29.1484 12.4414C29.1484 9.66164 30.2321 7.04742 32.1973 5.08016C34.1646 3.11492 36.7788 2.03125 39.5586 2.03125C41.0169 2.03125 42.4277 2.3268 43.7511 2.90977C43.881 2.96664 44.0192 2.99609 44.1603 2.99609C44.5625 2.99609 44.9282 2.75844 45.0906 2.38977C45.3161 1.87688 45.0825 1.27664 44.5706 1.05117C42.9873 0.353438 41.3024 0 39.5606 0H39.5586C37.8787 0 36.2497 0.329063 34.716 0.978047C33.2342 1.60469 31.9038 2.50148 30.7612 3.64406C29.6187 4.78664 28.7219 6.11711 28.0952 7.59891C27.4463 9.1325 27.1172 10.7616 27.1172 12.4414C27.1172 14.1213 27.4463 15.7503 28.0952 17.2839C28.5898 18.4534 29.2534 19.5281 30.0726 20.4911L20.4869 30.0769C18.5582 28.438 16.1256 27.3756 13.4571 27.1589V24.8412C19.844 24.3226 24.8828 18.9597 24.8828 12.4414C24.8828 5.58116 19.3016 0 12.4414 0C5.58116 0 0 5.58116 0 12.4414C0 18.9597 5.03882 24.3226 11.4258 24.8412V27.1589C5.03882 27.6774 0 33.0403 0 39.5586C0 46.4188 5.58116 52 12.4414 52C18.9597 52 24.3226 46.9612 24.8412 40.5742H27.1589C27.6774 46.9612 33.0403 52 39.5586 52C46.4188 52 52 46.4188 52 39.5586C52 32.6984 46.4188 27.1172 39.5586 27.1172ZM36.0039 9.90234C36.0039 7.94229 37.5985 6.34766 39.5586 6.34766C41.5187 6.34766 43.1133 7.94229 43.1133 9.90234C43.1133 11.8552 41.5302 13.4447 39.5801 13.4565C39.5726 13.4565 39.5651 13.4561 39.5576 13.4561C39.5504 13.4561 39.5433 13.4565 39.5361 13.4565C37.5865 13.4442 36.0039 11.8549 36.0039 9.90234ZM39.5363 15.4877C39.5438 15.4877 39.5511 15.4883 39.5586 15.4883C39.5658 15.4883 39.5729 15.4878 39.58 15.4878C42.5814 15.4967 45.2705 17.2893 46.5958 20.1121C44.6691 21.881 42.1887 22.8516 39.5586 22.8516C36.9277 22.8516 34.4454 21.8803 32.5193 20.1103C33.845 17.2882 36.5345 15.4962 39.5363 15.4877ZM8.88672 9.90234C8.88672 7.94229 10.4814 6.34766 12.4414 6.34766C14.4015 6.34766 15.9961 7.94229 15.9961 9.90234C15.9961 11.8552 14.413 13.4447 12.4629 13.4565C12.4554 13.4565 12.4479 13.4561 12.4404 13.4561C12.4332 13.4561 12.4261 13.4565 12.419 13.4565C10.4693 13.4442 8.88672 11.8549 8.88672 9.90234ZM12.4414 15.4883C12.4486 15.4883 12.4557 15.4878 12.4628 15.4878C15.4627 15.4967 18.1504 17.2874 19.4763 20.1076C17.6222 21.8104 15.1513 22.8516 12.4414 22.8516C9.7305 22.8516 7.25867 21.8096 5.40434 20.1056C6.73085 17.2861 9.41891 15.4962 12.4191 15.4877C12.4266 15.4878 12.4339 15.4883 12.4414 15.4883ZM12.4414 2.03125C18.1816 2.03125 22.8516 6.7012 22.8516 12.4414C22.8516 14.6907 22.1343 16.7755 20.9168 18.4795C19.7797 16.4922 18.0637 14.9867 16.0477 14.1633C17.2574 13.1378 18.0273 11.6087 18.0273 9.90234C18.0273 6.82226 15.5215 4.31641 12.4414 4.31641C9.36132 4.31641 6.85547 6.82226 6.85547 9.90234C6.85547 11.6083 7.62501 13.1372 8.83431 14.1627C6.81799 14.9855 5.10179 16.4906 3.96429 18.4773C2.74777 16.7737 2.03125 14.6897 2.03125 12.4414C2.03125 6.7012 6.7012 2.03125 12.4414 2.03125ZM12.4414 49.9688C6.7012 49.9688 2.03125 45.2988 2.03125 39.5586C2.03125 33.8184 6.7012 29.1484 12.4414 29.1484C18.1816 29.1484 22.8516 33.8184 22.8516 39.5586C22.8516 45.2988 18.1816 49.9688 12.4414 49.9688ZM32.5215 47.2228C33.8511 44.3972 36.5486 42.6055 39.5576 42.6055C42.5667 42.6055 45.2644 44.398 46.5935 47.2247C44.7395 48.9276 42.2685 49.9688 39.5586 49.9688C36.8477 49.9688 34.3759 48.9268 32.5215 47.2228ZM39.5586 40.5742C37.5985 40.5742 36.0039 38.9796 36.0039 37.0195C36.0039 35.0595 37.5985 33.4648 39.5586 33.4648C41.5187 33.4648 43.1133 35.0595 43.1133 37.0195C43.1133 38.9796 41.5187 40.5742 39.5586 40.5742ZM48.034 45.5968C46.8969 43.6096 45.1806 42.1043 43.1643 41.2811C44.3744 40.2556 45.1445 38.7262 45.1445 37.0195C45.1445 33.9394 42.6387 31.4336 39.5586 31.4336C36.4785 31.4336 33.9727 33.9394 33.9727 37.0195C33.9727 38.7259 34.7425 40.2549 35.9521 41.2804C33.9355 42.103 32.219 43.6079 31.0815 45.5945C29.865 43.8908 29.1484 41.8069 29.1484 39.5586C29.1484 33.8184 33.8184 29.1484 39.5586 29.1484C45.2988 29.1484 49.9688 33.8184 49.9688 39.5586C49.9688 41.8079 49.2515 43.8928 48.034 45.5968Z" style="fill: currentColor;" />
                                    <path d="M17.829 34.1433C17.3623 33.8322 16.7318 33.9582 16.4206 34.4249L11.1085 42.3931L8.41895 38.9351C8.07445 38.4923 7.43643 38.4126 6.99372 38.757C6.55091 39.1014 6.47118 39.7394 6.81558 40.1822L10.3703 44.7525C10.563 45.0004 10.8592 45.1446 11.1719 45.1446C11.1843 45.1446 11.1967 45.1444 11.2091 45.1439C11.5353 45.132 11.8359 44.9641 12.017 44.6924L18.1107 35.5517C18.4218 35.085 18.2957 34.4544 17.829 34.1433Z" style="fill: currentColor;" />
                                    <path d="M47.8684 5.61539C48.4293 5.61539 48.884 5.16068 48.884 4.59976C48.884 4.03885 48.4293 3.58414 47.8684 3.58414C47.3075 3.58414 46.8528 4.03885 46.8528 4.59976C46.8528 5.16068 47.3075 5.61539 47.8684 5.61539Z" style="fill: currentColor;" />
                                </svg>
                            </div>
                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Joint Project with Rotary</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $project->getProjectWith("interact", $_SESSION['cid']);  ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- ***project-details-End*** -->

        <!-- ***Meeting-details-start*** -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="text-info-head">Club Meetings</p>
            </div>
        </div>
        <!-- <a href="meetinglist.php" class="btn btn-danger" style="margin-bottom:20px;">Meetings</a> -->

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height position-relative overflow-hidden card-overlay-image">
                    <a href="meetinglist.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Total Meetings</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $meeting->getTotMeeting($_SESSION['cid']);  ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height position-relative overflow-hidden card-overlay-image">
                    <a href="meetinglist.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Board Meetings</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $meeting->getMeetingCount("board_meeting", $_SESSION['cid']); ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height  position-relative overflow-hidden card-overlay-image">
                    <a href="meetinglist.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">General Body Meetings</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $meeting->getMeetingCount("general_body_meeting", $_SESSION['cid']); ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height  position-relative overflow-hidden card-overlay-image">
                    <a href="meetinglist.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                                    <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Rotary / Other Meeting</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $meeting->getMeetingCount("other_meeting", $_SESSION['cid']); ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- ***Meeting-details-End*** -->

        <!-- ***Members-details-start*** -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="text-info-head">Club Members</p>
            </div>
        </div>
        <!-- <a href="memberlist.php" class="btn btn-danger" style="margin-bottom:20px;">Members</a> -->

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height position-relative overflow-hidden card-overlay-image">
                    <a href="memberlist.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Total Members</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $member->getTotMember($_SESSION['cid']) ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height position-relative overflow-hidden card-overlay-image">
                    <a href="memberlist.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Active Members</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $member->getMemberCount("active", $_SESSION['cid']) ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height  position-relative overflow-hidden card-overlay-image">
                    <a href="memberlist.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Newly Joined Members</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $member->getNew($_SESSION['cid']) ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height  position-relative overflow-hidden card-overlay-image">
                    <a href="memberlist.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Inactive Members</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $member->getMemberCount("inactive", $_SESSION['cid']) ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- ***Members-details-End*** -->

        <!-- ***Management-details-start*** -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="text-info-head">Club Details</p>
            </div>
        </div>
        <!-- <a href="managementlist.php" class="btn btn-primary" style="margin-bottom:20px;">Management</a> <br> -->

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height position-relative overflow-hidden card-overlay-image">
                    <a href="managementlist.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Board Members</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $management->getCount($_SESSION['cid']); ?></b></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height position-relative overflow-hidden card-overlay-image">
                    <a href="birthday.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg width="40" height="40" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Today Birthday</p>
                                <div class="mm-cart-text">
                                    <h2 class=""><b><?php echo $member->getBirthdayCount($_SESSION['cid']); ?></b></h2>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height position-relative overflow-hidden card-overlay-image">
                    <a href="clubabout.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Club About & History</p>
                            </div>
                            <h6 class="mb-0 text-small">(Website)</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height position-relative overflow-hidden card-overlay-image">
                    <a href="clubwall.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-postage" viewBox="0 0 16 16">
                                    <path d="M4.75 3a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h6.5a.75.75 0 0 0 .75-.75v-8.5a.75.75 0 0 0-.75-.75h-6.5ZM11 12H5V4h6v8Z" />
                                    <path d="M3.5 1a1 1 0 0 0 1-1h1a1 1 0 0 0 2 0h1a1 1 0 0 0 2 0h1a1 1 0 1 0 2 0H15v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1h-1.5a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0H1v-1a1 1 0 1 0 0-2v-1a1 1 0 1 0 0-2V9a1 1 0 1 0 0-2V6a1 1 0 0 0 0-2V3a1 1 0 0 0 0-2V0h1.5a1 1 0 0 0 1 1ZM3 3v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1Z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Club Wall</p>
                            </div>
                            <h6 class="mb-0 text-small">(Website)</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- ***Management-details-End*** -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="text-info-head">Club Monthly Report</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-block card-stretch card-height position-relative overflow-hidden card-overlay-image">
                    <a href="report.php">
                        <div class="card-body">
                            <div class="mm-cart-image text-danger-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                </svg>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-danger">Monthly Report</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        Morris.Donut({
            element: 'graphh',
            data: [{
                    value: 770,
                    label: 'foo'
                },
                {
                    value: 15,
                    label: 'bar'
                },
                {
                    value: 10,
                    label: 'baz'
                },
                {
                    value: 5,
                    label: 'A really really long label'
                }
            ],
            formatter: function(x) {
                return x + "%"
            }
        }).on('click', function(i, row) {
            console.log(i, row);
        });
    </script>

    <?php
    include "footer1.php";
    // }
    ?>